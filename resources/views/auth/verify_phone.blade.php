@include('components.landing.header')
<div class="verify-phone-container">
    <div class="left">
        <img class="icon" src="{{ asset('images/login-vector.svg') }}" alt="">
    </div>
    <div class="right">
        <p class="title">
            Enter Verification Code
        </p>
        
        <p class="subtitle">
            Enter your mobile verification code to verify phone number
        </p>
        <div class="form-container">

            <form action="/login" method="POST">
                <div class="input-container">
               
                    <input name="digit1" maxlength="1"  type="text" class="digit-input" placeholder=""/>
                    <input name="digit2" maxlength="1"  type="text" class="digit-input" placeholder=""/>
                    <input name="digit3" maxlength="1"  type="text" class="digit-input" placeholder=""/>
                    <input name="digit4" maxlength="1"  type="text" class="digit-input" placeholder=""/>
                    <input name="digit5" maxlength="1"  type="text" class="digit-input" placeholder=""/>
                    <input name="digit6" maxlength="1"  type="text" class="digit-input" placeholder=""/>
               
                </div>

                <div class="button-container">
                    <button type="submit" class="login-button">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('components.landing.footer')

