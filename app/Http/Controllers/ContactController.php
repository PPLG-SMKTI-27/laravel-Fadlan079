<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'type'    => 'required|string|in:project,collab,inquiry',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|min:10',
        ]);

        Mail::to('fadlanfirdaus220@gmail.com')
            ->send(new ContactMail($data));

        return back()->with('success', 'Pesan berhasil dikirim! Saya akan membalas sesegera mungkin.');
    }
}
