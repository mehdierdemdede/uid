<?php

namespace App\Http\Controllers;

use App\Models\MembershipBenefit;

class MembershipBenefitController extends Controller
{
    public function index()
    {
        $benefits = MembershipBenefit::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('site.benefits.index', compact('benefits'));
    }
}
