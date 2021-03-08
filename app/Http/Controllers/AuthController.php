<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;

class AuthController extends Controller
{
    protected function create(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        // dd($data);
        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($data['phone'], "sms");
        // $this->verification($data['phone']);
        User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect()->route('verify_phone')->with(['phone_number' => $data['phone']]);
    }
    protected function verify(Request $request)
    {
        $code = str_replace(',', '', implode(',', $request->digit));
        $request->request->add(['verification_code' => $code]);
        // dd($request);
        $data = $request->validate([
            'verification_code' => ['required'],
            'phone_number' => ['required', 'string'],
        ]);
        // dd($data);
        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($data['verification_code'], array('to' => $data['phone_number']));
        if ($verification->valid) {
            $user = tap(User::where('phone', $data['phone_number']))->update(['isVerified' => true]);
            /* Authenticate user */
            Auth::login($user->first());
            return redirect()->route('home')->with(['message' => 'Phone number verified']);
        }
        return back()->with(['phone_number' => $data['phone_number'], 'error' => 'Invalid verification code entered!']);
    }

    public function verifyPhone(Request $request)
    {
        // dd($request);
        // dd(Session::get('forget'));
        $user = User::where('phone', $request->phone_number)->first();
        if (!$user->isVerified || Session::get('forget') == true) {
            return view('auth.verify_phone', ['active' => 'logout', 'phone_number' => $request->phone_number ?? null]);
        }
        abort(403, 'You Trying To Verify Phone Number Already Verified');

    }
    protected function resend(Request $request)
    {
        if ($request->ajax()) {
            // $this->verification($request->phone);
            $token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_sid = getenv("TWILIO_SID");
            $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
            $twilio = new Client($twilio_sid, $token);
            $twilio->verify->v2->services($twilio_verify_sid)
                ->verifications
                ->create($request->phone, "sms");
            return response(['success' => 'success']);
        } else {

            // dd($request);
            if (User::where('phone', $request->phone)->exists()) {
                // dd('d');
                $token = getenv("TWILIO_AUTH_TOKEN");
                $twilio_sid = getenv("TWILIO_SID");
                $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
                $twilio = new Client($twilio_sid, $token);
                $twilio->verify->v2->services($twilio_verify_sid)
                    ->verifications
                    ->create($request->phone, "sms");
                // $this->verification($request->phone);
                Session::put('forget', true);
                return redirect()->route('verify_phone', ['phone_number' => $request->phone])->with(['phone_number' => $request->phone]);
            } else {
                return back()->withErrors(['phone' => 'Invalid phone number']);
            }
        }
    }

    protected function changePassword(Request $request)
    {
        // first will check if code is correct if done
        $code = str_replace(',', '', implode(',', $request->digit));
        $request->request->add(['verification_code' => $code]);
        $data = $request->validate([
            'verification_code' => ['required'],
            'phone_number' => ['required', 'string'],
        ]);
        // dd($data);
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($data['verification_code'], array('to' => $data['phone_number']));

        if ($verification->valid) {
            // session('phone_number', $data['phone_number']);
            Session::put('phone_number', $data['phone_number']);
            return view('auth.reset_password')->with(['phone_number' => $data['phone_number']]);
            // return redirect()->route('reset_password')->with(['phone_number' => $data['phone_number']]);
        }
        // move to update password with phone number session
    }

    protected function updatePassword(Request $request)
    {

        $validated = Validator::make($request->all(), [
            'password' => ['required', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'exists:users,phone'],
        ]);
        if ($validated->fails()) {
            dd($validated->errors());
            return back()->withErrors($validated->errors())->withInput(['phone_number' => $request->phone_number]);
        }

        User::where('phone', $request->phone_number)->first()->update(['password', Hash::make($request->password)]);
        return redirect()->route('user.login');
        //after validation will update password

        // if validation fails return back with phone number and errors
    }

    protected function verification($phone)
    {
        // dd($phone);
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        return $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($phone, "sms");
    }
}
