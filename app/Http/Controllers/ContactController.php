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
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        Mail::to('fadlanfirdaus220@gmail.com')
            ->send(new ContactMail($data));

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}
