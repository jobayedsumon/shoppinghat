@extends('frontend.layouts.app')

@section('content')
    <section class="gry-bg py-5">
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 mx-auto">
                         <div class="py-3">
                                <h1 class="h4 fw-600">
                                    Welcome to ShoppingHat! Please login
                                </h1>
                                
                            </div>
                        <div class="card px-3 py-4">
                            
                            
                            
                           
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <form class="form-default" id="myform" role="form" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        @if (addon_is_activated('otp_system') && env("DEMO_MODE") != "On")
                                            <div class="form-group phone-form-group mb-1">
                                                Phone Number or Email*
                                                <input type="tel"  class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" placeholder="Enter your Phone Number or email" name="phone" autocomplete="off">
                                            </div>

                                            <input type="hidden" name="country_code" value="">

                                            <div class="form-group email-form-group mb-1 d-none">
                                                Phone Number or Email*
                                                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email" id="email" autocomplete="off">
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group text-right">
                                                <button class="btn btn-link p-0 opacity-50 text-reset" type="button" onclick="toggleEmailPhone(this)">{{ translate('Login With Email') }}</button>
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email" id="email" autocomplete="off">
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            Password*
                                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ translate('Password')}}" name="password" id="password">
                                            <span class="fs-20" style="float: right; margin-top: -45px; padding: 10px;" onclick="myFunction()"><i class="fa fa-eye-slash" id="npass"></i></span>

                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <label class="aiz-checkbox">
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <span class=opacity-60>{{  translate('Remember Me') }}</span>
                                                    <span class="aiz-square-check"></span>
                                                </label>
                                            </div>
                                            <div class="col-6 text-right">
                                                <a href="{{ route('password.request') }}" class=" opacity-60 fs-12" style="color: #1a9cb7;">{{ translate('Forgot password?')}}</a>
                                            </div>
                                        </div>

                                        
                                    </form>
                                    
                                </div>
                                <div class="col-md-6">
                                       <div class="pt-3">
                                    

                                        <div class="mb-3">
                                            <button type="submit" form="myform" class="btn btn-primary btn-block fw-600">{{  translate('Login') }}</button>
                                        </div>

                                    @if(get_setting('google_login') == 1 || get_setting('facebook_login') == 1 || get_setting('twitter_login') == 1)
                                        <div class="separator mb-3">
                                            <span class="bg-white px-3 opacity-60">{{ translate('Or Login With')}}</span>
                                        </div>
                                        
                                            @if (get_setting('facebook_login') == 1)
                                                
                                                    <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="btn  btn-block fw-600 facebook text-white" style="background: #3b5998;>
                                                      <span class="text-white fs-18">   <i class="lab la-facebook-f"></i> Facebook</span>  
                                                    </a>
                                                
                                            @endif
                                            @if(get_setting('google_login') == 1)
                                                
                                                    <a href="{{ route('social.login', ['provider' => 'google']) }}" class="btn btn-block fw-600 text-white" style="background: #d34836;">
                                                     <span class="text-white fs-18"><i class="lab la-google px-3"></i>Google </span>   
                                                    </a>
                                                
                                            @endif
                                            @if (get_setting('twitter_login') == 1)
                                                <button class="btn btn-primary btn-block fw-600">
                                                    <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="twitter">
                                                        <i class="lab la-twitter"></i>
                                                    </a>
                                                </button>
                                            @endif
                                        
                                    @endif
                                </div>
                                <div class="text-center">
                                    <p class="text-muted mb-0">{{ translate('Dont have an account?')}}</p>
                                    <a href="{{ route('user.registration') }}">{{ translate('Register Now')}}</a>
                                </div>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
    function myFunction() {
  var x = document.getElementById("password");
  var ico = document.getElementById("npass");
  if (x.type === "password") {
    x.type = "text";
    ico.classList.remove("fa-eye-slash");
    ico.classList.add("fa-eye");
    
  } else {
    x.type = "password";
    ico.classList.remove("fa-eye");
    ico.classList.add("fa-eye-slash");
  }
}

        var isPhoneShown = true,
            countryData = window.intlTelInputGlobals.getCountryData(),
            input = document.querySelector("#phone-code");

        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            if(country.iso2 == 'bd'){
                country.dialCode = '88';
            }
        }

        var iti = intlTelInput(input, {
            separateDialCode: true,
            utilsScript: "{{ static_asset('assets/js/intlTelutils.js') }}?1590403638580",
            onlyCountries: @php echo json_encode(\App\Models\Country::where('status', 1)->pluck('code')->toArray()) @endphp,
            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                if(selectedCountryData.iso2 == 'bd'){
                    return "01xxxxxxxxx";
                }
                return selectedCountryPlaceholder;
            }
        });

        var country = iti.getSelectedCountryData();
        $('input[name=country_code]').val(country.dialCode);

        input.addEventListener("countrychange", function(e) {
            // var currentMask = e.currentTarget.placeholder;

            var country = iti.getSelectedCountryData();
            $('input[name=country_code]').val(country.dialCode);

        });

        function toggleEmailPhone(el){
            if(isPhoneShown){
                $('.phone-form-group').addClass('d-none');
                $('.email-form-group').removeClass('d-none');
                $('input[name=phone]').val(null);
                isPhoneShown = false;
                $(el).html('{{ translate('Login With Phone') }}');
            }
            else{
                $('.phone-form-group').removeClass('d-none');
                $('.email-form-group').addClass('d-none');
                $('input[name=email]').val(null);
                isPhoneShown = true;
                $(el).html('{{ translate('Login With Email') }}');
            }
        }



        function autoFillSeller(){
            $('#email').val('seller@example.com');
            $('#password').val('123456');
        }
        function autoFillCustomer(){
            $('#email').val('customer@example.com');
            $('#password').val('123456');
        }
        function autoFillDeliveryBoy(){
            $('#email').val('deliveryboy@example.com');
            $('#password').val('123456');
        }
    </script>
@endsection
