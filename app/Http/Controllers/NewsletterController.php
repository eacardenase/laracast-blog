<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Request $request, Newsletter $newsletter)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        try {
            $newsletter->subscribe($request->input('email'));
        } catch (\Exception) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our Newsletter list.',
            ]);
        }

        return redirect('/')
            ->with('success', 'You are now signed up for our Newsletter!');
    }
}
