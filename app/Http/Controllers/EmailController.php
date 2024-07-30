<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationEmail;
use App\Models\Registration;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat_lengkap' => 'required|string|max:5000',
            'email' => 'required|email|max:100',
            'phone' => 'required|numeric',
            'program_category' => 'required|string',
            'nama_program' => 'required|string',
            'message' => 'required|string|max:5000',
            'registration_date' => 'required|date',
        ]);

        try {
            Registration::create($validatedData);

            Mail::to('info@starprof.co.id')->send(new RegistrationEmail($validatedData));

            Log::info('Email sent successfully to info@starprof.co.id');
            return response()->json(['success' => 'Your message has been sent.']);
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
            return response()->json(['error' => 'There was an error sending your message: ' . $e->getMessage()], 500);
        }
    }
}
