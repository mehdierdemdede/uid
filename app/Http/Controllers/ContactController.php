<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('site.pages.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:100',
            'email' => 'required|email:rfc',
            'note'  => 'required|string|max:2000',
        ]);

        ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'note' => $validated['note'],
            'submitted_ip' => $request->ip(),
            'user_agent' => (string) $request->userAgent(),
        ]);

        return redirect(t_route('contact'))->with('success', __('Mesajınız başarıyla gönderildi. En kısa sürede size döneceğiz.'));
    }
}
