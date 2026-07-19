<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MembershipBenefit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MembershipBenefitController extends Controller
{
    public function index()
    {
        $benefits = MembershipBenefit::with('createdBy')->orderBy('sort_order')->orderBy('id')->paginate(15);

        return view('admin.benefits.index', compact('benefits'));
    }

    public function create()
    {
        return view('admin.benefits.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:191',
            'discount_text' => 'nullable|string|max:191',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $benefit = new MembershipBenefit();
        $benefit->title = $validated['title'];
        $benefit->discount_text = $validated['discount_text'] ?? null;
        $benefit->description = $validated['description'] ?? null;
        $benefit->sort_order = $validated['sort_order'] ?? 0;
        $benefit->is_active = $request->has('is_active');

        if ($request->hasFile('logo')) {
            $benefit->logo_path = $request->file('logo')->store('benefits', 'public');
        }

        $benefit->created_by = session('admin_id');
        $benefit->updated_by = session('admin_id');
        $benefit->save();

        return redirect()->route('admin.benefits.index')->with('success', 'Fayda başarıyla eklendi.');
    }

    public function edit(MembershipBenefit $benefit)
    {
        return view('admin.benefits.edit', compact('benefit'));
    }

    public function update(Request $request, MembershipBenefit $benefit)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:191',
            'discount_text' => 'nullable|string|max:191',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $benefit->title = $validated['title'];
        $benefit->discount_text = $validated['discount_text'] ?? null;
        $benefit->description = $validated['description'] ?? null;
        $benefit->sort_order = $validated['sort_order'] ?? 0;
        $benefit->is_active = $request->has('is_active');

        if ($request->hasFile('logo')) {
            if ($benefit->logo_path) {
                Storage::disk('public')->delete($benefit->logo_path);
            }
            $benefit->logo_path = $request->file('logo')->store('benefits', 'public');
        } elseif ($request->has('remove_logo')) {
            if ($benefit->logo_path) {
                Storage::disk('public')->delete($benefit->logo_path);
                $benefit->logo_path = null;
            }
        }

        $benefit->updated_by = session('admin_id');
        $benefit->save();

        return redirect()->route('admin.benefits.index')->with('success', 'Fayda güncellendi.');
    }

    public function destroy(MembershipBenefit $benefit)
    {
        if ($benefit->logo_path) {
            Storage::disk('public')->delete($benefit->logo_path);
        }
        $benefit->delete();

        return redirect()->route('admin.benefits.index')->with('success', 'Fayda silindi.');
    }
}
