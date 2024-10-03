<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Valider les champs du formulaire
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        // Les données à envoyer dans l'email
        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'subject' => $validated['subject'],
            'message_content' => $validated['message']
        ];

        // Envoyer l'email
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to('nourhanebndj@gmail.com', 'Admin')
                ->subject('Nouveau message de contact: ' . $data['subject']);
            $message->from($data['email'], $data['name']);
        });

        // Redirection avec un message de succès
        return back()->with('success', 'Votre message a été envoyé avec succès !');
    }
}