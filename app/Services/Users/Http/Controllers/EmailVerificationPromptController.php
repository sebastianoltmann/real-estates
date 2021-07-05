<?php

namespace App\Services\Users\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laravel\Fortify\Contracts\VerifyEmailViewResponse;

class EmailVerificationPromptController extends Controller
{

    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\VerifyEmailViewResponse
     */
    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail() && $request->user()->hasChangedPassword()
            ? redirect()->intended(config('fortify.home'))
            : app(VerifyEmailViewResponse::class);
    }
}
