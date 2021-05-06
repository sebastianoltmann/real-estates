<?php

namespace App\Services\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{

    /**
     * Send a new email verification notification.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->user()->hasVerifiedEmail() && $request->user()->hasChangedPassword()) {
            return $request->wantsJson()
                ? new JsonResponse('', 204)
                : redirect()->intended(config('fortify.home'));
        }

        $request->user()->sendEmailVerificationNotification();

        return $request->wantsJson()
            ? new JsonResponse('', 202)
            : back()->with('status', 'verification-link-sent');
    }
}
