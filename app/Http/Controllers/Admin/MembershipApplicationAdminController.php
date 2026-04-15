<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ApplicationStatus;
use App\Http\Controllers\Controller;
use App\Models\MembershipApplication;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MembershipApplicationAdminController extends Controller
{
    public function index(Request $request): View
    {
        $query = MembershipApplication::query();

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }
        if ($request->filled('city')) {
            $query->where('city', $request->string('city'));
        }
        if ($request->filled('membership_type')) {
            $query->where('membership_type', $request->string('membership_type'));
        }
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date('date_from'));
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date('date_to'));
        }
        if ($request->filled('q')) {
            $term = '%'.$request->string('q').'%';
            $query->where(function ($subQuery) use ($term): void {
                $subQuery
                    ->where('first_name', 'like', $term)
                    ->orWhere('last_name', 'like', $term)
                    ->orWhere('email', 'like', $term)
                    ->orWhere('phone', 'like', $term);
            });
        }

        $applications = $query->latest()->paginate(15)->withQueryString();

        return view('admin.applications.index', [
            'applications' => $applications,
            'statuses' => ApplicationStatus::cases(),
        ]);
    }

    public function show(MembershipApplication $membershipApplication): View
    {
        return view('admin.applications.show', [
            'application' => $membershipApplication,
            'statuses' => ApplicationStatus::cases(),
        ]);
    }

    public function update(Request $request, MembershipApplication $membershipApplication)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:new,reviewing,approved,rejected'],
            'admin_notes' => ['nullable', 'string'],
        ]);

        $membershipApplication->update($validated);

        return back()->with('status', 'Basvuru guncellendi.');
    }
}
