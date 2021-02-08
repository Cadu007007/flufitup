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

            @if(Session::get('forget'))

            <form action="{{ route('forget.change.password') }}" method="POST">
                @else
            <form action="{{ route('verify.post') }}" method="POST">
                @endif
                @csrf
                <div class="input-container">
                    {{-- {{ $error }} --}}
                    <input type="hidden" id="phone_number" name="phone_number" value="{{old('phone_number',request()->get('phone_number'))  }}">
               
                    <input name="digit[0]" maxlength="1"  type="text" class="digit-input" placeholder=""/>
                    <input name="digit[1]" maxlength="1"  type="text" class="digit-input" placeholder=""/>
                    <input name="digit[2]" maxlength="1"  type="text" class="digit-input" placeholder=""/>
                    <input name="digit[3]" maxlength="1"  type="text" class="digit-input" placeholder=""/>
                    <input name="digit[4]" maxlength="1"  type="text" class="digit-input" placeholder=""/>
                    <input name="digit[5]" maxlength="1"  type="text" class="digit-input" placeholder=""/>
               
                </div>
                <div class="button-container">

                    <a href="#" onclick="resend()">Resend Code</a>
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
<script>
   function resend()
   {
       var phone = $('#phone_number').val();
       $.ajax({
        url:"{{ route('resend.code') }}",
        method:"GET",
        data:{
            phone:phone,
        },success:function(data){
            
            console.log(data);
        },
       });
   }
</script>

