<?php

namespace App\Http\Controllers;

use App\Models\MembershipBenefit;

class HomeController extends Controller
{
    public function index()
    {
        $benefits = MembershipBenefit::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->limit(3)
            ->get();

        return view('site.home', compact('benefits'));
    }
}
