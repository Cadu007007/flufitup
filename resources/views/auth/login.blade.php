@include('components.landing.header')
<div class="login-container d-flex flex-wrap">
    <div class="left">
        <img class="icon" src="{{ asset('images/login-vector.svg') }}" alt="">
    </div>
    <div class="right">
        <p class="title">
            Login
        </p>
        <div class="form-container">

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-container">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input name="phone_number" type="text" class="form-input" placeholder="(XXX)-XXX-XXXX" value="{{ old('phone') }}"/>
                </div>
                 <div class="input-container">
                    <label for="password" class="form-label">Password</label>
                    <input name="password"  type="password" class="form-input" placeholder="Enter Your Password"/>
                </div>

                <div class="form-footer">

                    <div class="remember-me">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label remember-me-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>

                    </div>

                    <div class="forget-password">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link forget-password" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>

                </div>
                <div class="button-container">

                    <button type="submit" class="login-button">
                        Log In
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('components.landing.footer')

