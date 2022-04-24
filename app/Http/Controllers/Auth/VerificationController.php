<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Response;

class VerificationController extends Controller
{
    /**
     *
     * @param \Illuminate\Foundation\Auth\EmailVerificationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function verify(EmailVerificationRequest $request): Response
    {
        $request->fulfill();

        return response()->noContent();
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function resend(): Response
    {
        if (! auth()->user()->hasVerifiedEmail())
            auth()->user()->sendEmailVerificationNotification();

        return response()->noContent();
    }
}
