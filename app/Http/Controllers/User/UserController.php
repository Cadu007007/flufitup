<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\UserAddress;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Twilio\Rest\Client;

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

    public function changePassword(UpdatePasswordRequest $request)
    {

        if (Hash::check($request->old_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
            return redirect()->back()->with('message', 'Password Updated Successfully');
            // return response()->json(['success' => true, 'message' => 'Password Updated Successfully']);
        }
        return redirect()->back()->withErrors(['Old Password Not Correct Please Try Again']);
        // return response()->json(['success' => false, 'message' => 'Old Password Not Correct Please Try Again']);
    }
    public function update(UpdateProfileRequest $request)
    {
        // dd($request);
        // getting user from auth session

        $user = auth()->user();

        //email
        $user->email = ($request->email) ? $request->email : $user->email;
        //date of birth
        $user->birth_date = Carbon::parse($request->birthday);
        //set avatar to new image if has sent
        if ($request->avatar) {
            if ($user->avatar) {
                Storage::disk('public')->delete(($user->avatar));
            }
            $user->avatar = $request->file('avatar')->store('users', ['disk' => 'public']);
        }
        //addresses pick up one and drop also
        foreach ($request->address as $address) {
            $user->addresses()->delete();
            UserAddress::create($address);
        }
        $user->save();
        //phone with set is verified to 0 and logout the user should be at the end
        if ($request->phone && ($request->phone != $user->phone)) {
            $user->phone = $request->phone;
            $user->isVerified = 0;
            $token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_sid = getenv("TWILIO_SID");
            $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
            $twilio = new Client($twilio_sid, $token);
            $twilio->verify->v2->services($twilio_verify_sid)
                ->verifications
                ->create('+201009595059', "sms");
            $user->save();
            Auth::logout();
            return redirect()->route('verify_phone')->with(['phone_number' => $request->phone]);

        }
        return back()->with('message', 'Successful Update');
        //returning is here
    }

}
