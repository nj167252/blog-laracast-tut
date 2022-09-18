<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate([
            'subscriber_email' => ['required', 'email', 'max:150']
        ]);
    
        try {
            // $newsletter = new Newsletter();
    
            $newsletter->subscribe(request('subscriber_email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added.'
            ]);
            
        }
    
        return redirect()->back()->with('success', 'Congrats! Your are signed up for our news letter.');
    }
}
