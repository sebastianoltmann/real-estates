<?php

namespace App\Services\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Users\Http\Requests\VerifyEmailRequest;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Auth\PasswordBroker;

class VerifyEmailController extends Controller
{

    public function __construct(
        private PasswordBroker $passwordBroker,
        private StatefulGuard $guard
    )
    {
    }

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param \Laravel\Fortify\Http\Requests\VerifyEmailRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(VerifyEmailRequest $request, User $user, string $hash): RedirectResponse
    {
        if($user->hasVerifiedEmail() && $user->hasChangedPassword()) {
            return redirect()->intended(config('fortify.home') . '?verified=1');
        }

        $this->guard->logout();

        $token = $this->passwordBroker->createToken($user);

        return redirect()->route('password.reset', [
            'token' => $token,
            'email' => $user->getEmailForPasswordReset(),
        ]);
    }
}
