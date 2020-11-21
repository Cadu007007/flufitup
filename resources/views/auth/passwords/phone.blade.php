@include('components.landing.header')
<div class="reset-password-container">
    <div class="left">
        <img class="icon" src="{{ asset('images/login-vector.svg') }}" alt="">
    </div>
    <div class="right">
        <p class="title">
            Forget Password
        </p>
        
        <p class="subtitle">
            Enter your Phone Number to send you a verification code to reset Password.
        </p>
        <div class="form-container">

            <form action="{{ route('send.code') }}" method="POST">
                @csrf
                
                <div class="input-container">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input name="phone" type="text" class="form-input" placeholder="(XXX)-XXX-XXXX" value="{{ old('phone') }}"/>
                </div>

                <div class="button-container">

                    <button type="submit" class="login-button">
                        Send
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('components.landing.footer')

