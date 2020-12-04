@include('components.landing.header')
<div class="renew-password-container">
    <div class="left">
        <img class="icon" src="{{ asset('images/login-vector.svg') }}" alt="">
    </div>
    <div class="right">
        <p class="title">
            Reset Password
        </p>
        <p class="subtitle">
            Enter your New Password
        </p>
        <div class="form-container">

            <form action="{{ route('forget.update.password') }}" method="POST">
                @csrf
                <div class="input-container">
                    <input type="hidden" name="phone_number" value="{{ old('phone_number',session('phone_number')) }}">
                    <label for="password" class="form-label">New Password</label>
                    <input name="password" type="password" class="form-input" placeholder="Enter Your New Password"/>
                </div>
                 <div class="input-container">
                    <label for="confirm_password" class="form-label">Re-enter New Password</label>
                    <input namer="confirm_password"  type="password" class="form-input" placeholder="Enter Your New Password"/>
                </div>

                
                <div class="button-container">

                    <button type="submit" class="login-button">
                        Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('components.landing.footer')

