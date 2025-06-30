<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Listeners\SendWelcomeEmail;
use App\Mail\UserRegistered;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //      In je registerform zou je geen authenticated user nodig moeten hebben...
        $user = Auth::user();
        return view('auth.register', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //      Doe je validatie in een RegisterRequest bestand.
        $attributes = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        //      Je hebt hier $registerUser & $user en dan later ook nog eens $request->user().
        //      Zijn alle 3 hetzelfde, gebruik 1 van de 3!
        $registerUser = User::create($attributes);
        $userLogin = Auth::login($registerUser); //         Haal '$userLogin = ' weg, want die variabele gebruik je nergens voor.
        $user = Auth::user();

        //      Je maakt hier 2 keer een mail aan, eerst om te loggen, dan nogmaals om te sturen. De log om te testen?
        //      Gebruik voor testen bijv. mailtrap.io of stuur het naar log door toevoegen van 'MAIL_MAILER=log' in je .env
        $mail = new UserRegistered($registerUser);

        Log::info('Sending email to: ' . $request->user()->email);
        Log::info('Subject: ' . $mail->subject);
        Log::info('Mail content: ' . print_r($mail->render(), true));

        Mail::to($request->user())->send(new UserRegistered($registerUser));

        return redirect()->route('account.index', compact('user'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
