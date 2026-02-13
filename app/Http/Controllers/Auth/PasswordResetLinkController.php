<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }

    /**
     * Display the password reset link request view for mobile.
     */
    public function createMobile(): View
    {
        return view('auth.forgot-password-mobile');
    }

    /**
     * Handle an incoming password reset link request for mobile.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeMobile(Request $request): RedirectResponse
    {
        $request->validate([
            'phone' => ['required', 'string'],
        ]);
        $user = User::where('phone', $request->phone)->first();
        if (!$user) {
            return back()->withErrors(['phone' => 'No user found with that mobile number.']);
        }
        // Use the user's email to send the reset link
        $status = \Illuminate\Support\Facades\Password::sendResetLink([
            'email' => $user->email
        ]);
        return $status == \Illuminate\Support\Facades\Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('phone'))
                ->withErrors(['phone' => __($status)]);
    }

    public function verifyMobile(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string'],
        ]);
        $user = User::where('phone', $request->phone)->first();
        if (!$user) {
            return back()->withErrors(['phone' => 'No user found with that mobile number.']);
        }
        // Show password reset form for this phone
        return view('auth.reset-password-mobile', ['phone' => $user->phone]);
    }

    public function updateMobile(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string'],
            'password' => ['required', 'confirmed', \Illuminate\Validation\Rules\Password::defaults()],
        ]);
        $user = User::where('phone', $request->phone)->first();
        if (!$user) {
            return back()->withErrors(['phone' => 'No user found with that mobile number.']);
        }
        $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        $user->save();
        return redirect()->route('login')->with('status', 'Password updated successfully!');
    }
}
