<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\UserAddress;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Twilio\Http\Client;

class UserController extends Controller
{
    public function profile()
    {

        return view('user.profile.index', ['active' => 'profile']);
    }

    public function edit()
    {
        return view('user.profile.edit', ['active' => 'profile', 'user' => auth()->user()]);
    }
    public function update(UpdateProfileRequest $request)
    {
        // getting user from auth session
        UserAddress::insert($request->address);
        dd($request);
        $user = auth()->user();

        //email
        $user->email = $request->email;
        //date of birth
        $user->birth_date = Carbon::parse($request->birth_date);
        //set avatar to new image if has sent
        if ($request->avatar) {
            if ($user->avatar) {
                Storage::disk('public')->delete(($user->avatar));
            }
            $user->avatar = $request->file('avatar')->store('users', ['disk' => 'public']);
        }
        //addresses pick up one and drop also
        $address = $request->except('email', 'phone', 'avatar', 'birth_date');
        $address['user_id'] = $user->id;
        $userAddress = UserAddress::create($address);
        //phone with set is verified to 0 and logout the user should be at the end
        if ($request->phone != $user->phone) {
            $user->phone = $request->phone;
            $user->isVerified = 0;
            $token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_sid = getenv("TWILIO_SID");
            $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
            $twilio = new Client($twilio_sid, $token);
            $twilio->verify->v2->services($twilio_verify_sid)
                ->verifications
                ->create($user->phone, "sms");
            $user->save();
            Auth::logout();
            return redirect()->route('verify')->with(['phone_number' => $request->phone]);

        }

        //returning is here
    }

}
