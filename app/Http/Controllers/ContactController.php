<?php

namespace App\Http\Controllers;

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

        // Mail gönderimi buraya eklenebilir
        // Mail::to('info@u-id.org')->send(new ContactMail($validated));

        return redirect()->route('contact')->with('success', 'Mesajınız başarıyla gönderildi. En kısa sürede size döneceğiz.');
    }
}
