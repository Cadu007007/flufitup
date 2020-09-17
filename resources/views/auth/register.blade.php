@include('components.landing.header')
<div class="register-container">
    <div class="left">
        <img class="signup-vector" src="{{ asset('images/login-vector.svg') }}" alt="">
    </div>
    <div class="right">
        <div class="title">
            Sign Up
        </div>
        <div class="form-container">

            <form action="/register" method="POST">
                <div class="double-input-container">

                    <div class="input-container">
                        <label for="first_name" class="form-label">First Name</label>
                        <input name="first_name" type="text" class="form-input" placeholder="Enter Your First Name" value="{{ old('first_name') }}"/>
                    </div>
                    
                    <div class="input-container">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input name="last_name" type="text" class="form-input" placeholder="Enter Your Last Name" value="{{ old('last_name') }}"/>
                    </div>
                </div>


                <div class="input-container">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input name="phone" type="text" class="form-input" placeholder="(XXX)-XXX-XXXX" value="{{ old('phone') }}"/>
                </div>
                 <div class="input-container no-bottom-margin">
                    <label for="password" class="form-label">Password</label>
                    <input name="password"  type="password" class="form-input" placeholder="Enter Your Password"/>
                </div>

                <div class="errors-container">

                    @error('phone')
                    <div class="error-container">
                        <img src="" alt="" class="icon">
                        <p class="error-message">{{$errors->first('phone')}}</p>
                    </div>
                    @enderror
                    
                    @error('password')
                    <div class="error-container">
                        <img src="" alt="" class="icon">
                        <p class="error-message">{{$errors->first('passsword')}}</p>
                    </div>
                    @enderror
                    
                </div>
                
                <div class="input-container">
                    <label for="re_password" class="form-label">Re-Enter Password</label>
                    <input name="re_password"  type="password" class="form-input" placeholder="Re-Enter Your Password"/>
                </div>

                <div class="button-container">

                    <button type="submit" class="register-button">
                        Sign Up
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('components.landing.footer')

