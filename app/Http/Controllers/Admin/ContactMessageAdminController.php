<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\View\View;

class ContactMessageAdminController extends Controller
{
    public function index(): View
    {
        $messages = ContactMessage::query()->latest()->paginate(15);

        return view('admin.messages.index', [
            'messages' => $messages,
        ]);
    }

    public function show(ContactMessage $message): View
    {
        if (! $message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.messages.show', [
            'message' => $message,
        ]);
    }
}