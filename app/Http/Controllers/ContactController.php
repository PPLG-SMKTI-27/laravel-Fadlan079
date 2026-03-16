<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validatedData = $request->validate([
            'type'    => 'required|string|in:project,collab,inquiry,feedback',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|min:10',
            'sender'  => ['required', 'email', 'max:255'],
        ], [
            'sender.email'     => 'Harap masukkan alamat email yang valid.',
            'sender.required'  => 'Harap masukkan alamat email Anda.',
        ]);

        \App\Models\Contact::create($validatedData);

        $siteUser = \App\Models\User::first();

        $mailData = $validatedData;
        $mailData['email'] = $validatedData['sender'];

        $destinationEmail = $siteUser?->email ?? 'fadlanfirdaus220@gmail.com';

        Mail::to($destinationEmail)
            ->send(new ContactMail($mailData, current_theme()));

        return back()->with('success', 'Pesan berhasil dikirim! Saya akan membalas sesegera mungkin.');
    }
}
