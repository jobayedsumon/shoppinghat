@extends('frontend.layouts.app')

@section('content')
    <section class="gry-bg py-4">
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-10 mx-auto">
                        <div class="row py-3">
                            <div class="col-md-8">
                               <h3> Create your Shoppinghat Account</h3>
                            </div>
                            <div class="col-md-4">
                                <div class="text-right">
                                {{ translate('Already member??')}}
                                <a href="{{ route('user.login') }}">{{ translate('Log In')}}</a> Here
                            </div>
                            </div>
                        </div>
                        <div class="card">
                            
                            
                            <div class="px-4 py-3 py-lg-4">
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-6">
                                              <form id="reg-form" class="form-default" role="form" action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            Full name*
                                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="{{  translate('Full Name') }}" name="name">
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        @if (addon_is_activated('otp_system'))
                                            <div class="form-group phone-form-group mb-1">
                                                Phone Number*
                                                <input type="tel" id="phone-code" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" placeholder="" name="phone" autocomplete="off">
                                            </div>

                                            <input type="hidden" name="country_code" value="">

                                            <div class="form-group email-form-group mb-1 d-none">
                                                Email*
                                                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email"  autocomplete="off">
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            
                                        @else
                                            <div class="form-group">
                                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email">
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            Password
                                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{  translate('Password') }}" name="password" id="myInput">
                                           <span class="fs-20" style="float: right; margin-top: -45px; padding: 10px;" onclick="myFunction()"><i class="fa fa-eye-slash" id="npass"></i></span>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            Confirm Password
                                            <input type="password" class="form-control" placeholder="{{  translate('Confirm Password') }}" name="password_confirmation" id="myInput1">
                                            <span class="fs-20" style="float: right; margin-top: -45px; padding: 10px;" onclick="myFunction1()"><i class="fa fa-eye-slash" id="cpass"></i></span>
                                        </div>

                                        @if(get_setting('google_recaptcha') == 1)
                                            <div class="form-group">
                                                <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                                            </div>
                                        @endif

                                        <div class="mb-3">
                                            <label class="aiz-checkbox">
                                                <input type="checkbox" name="checkbox_example_1" required>
                                                <span class=opacity-60>{{ translate('By signing up you agree to our terms and conditions.')}}</span>
                                                <span class="aiz-square-check"></span>
                                            </label>
                                        </div>

                                        
                                    </form>
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="py-3 px-3">
                                        <div class="mb-2">
                                            <button type="submit" form="reg-form" class="btn btn-primary btn-block fw-600">{{  translate('SIGN UP') }}</button>
                                        </div>
                                        <div class="mb-3">
                                           By clicking “SIGN UP”, I agree to Shoppinghat's Terms of Use and Privacy Policy
                                        </div>
                                        <div class="mt-2">
                                           Or, sign up with
                                        </div>
                                            
                                                <button class="btn btn-block opacity-100" style="border: 1px solid #d34836;" type="button" onclick="toggleEmailPhone(this)">{{ translate('Sign Up With Email') }}</button>
                                            
                                             @if(get_setting('google_login') == 1 || get_setting('facebook_login') == 1 || get_setting('twitter_login') == 1)
                                        <div class="separator mb-3">
                                            <span class="bg-white px-3 opacity-60">{{ translate('Or Join With')}}</span>
                                        </div>
                                       <div class="row">
                                           <div class="col-sm-6">
                                                @if (get_setting('facebook_login') == 1)
                                                
                                                    <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="btn fw-600 facebook text-white" style="background: #3b5998;>
                                                      <span class="text-white fs-18">   <i class="lab la-facebook-f"></i> Facebook</span>  
                                                </a>
                                               
                                            @endif
                                           
                                           </div>
                                           <div class="col-sm-6">
                                                @if(get_setting('google_login') == 1)
                                                
                                                    <a href="{{ route('social.login', ['provider' => 'google']) }}" class="btn btn-block fw-600 text-white" style="background: #d34836;>
                                                     <span class="text-white fs-18"><i class="lab la-google px-3"></i>Google </span>   
                                                    </a>
                                                
                                            @endif
                                           </div>
                                       </div>
                                    @endif
                                        </div>
                                        </div>
                                    </div>
                                    
                                    
                               
                                  
                                   
                                </div>
                                <div class="text-center">
                                    
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
    @if(get_setting('google_recaptcha') == 1)
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif

    <script type="text/javascript">
    
function myFunction() {
  var x = document.getElementById("myInput");
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

function myFunction1() {
  var x = document.getElementById("myInput1");
  var ico = document.getElementById("cpass");
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
        @if(get_setting('google_recaptcha') == 1)
        // making the CAPTCHA  a required field for form submission
        $(document).ready(function(){
            // alert('helloman');
            $("#reg-form").on("submit", function(evt)
            {
                var response = grecaptcha.getResponse();
                if(response.length == 0)
                {
                //reCaptcha not verified
                    alert("please verify you are humann!");
                    evt.preventDefault();
                    return false;
                }
                //captcha verified
                //do the rest of your validations here
                $("#reg-form").submit();
            });
        });
        @endif
        
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
            onlyCountries: @php echo json_encode(\App\Models\Country::where('status', 1)->orderBy('id', 'ASC')->pluck('code')->toArray()) @endphp,
            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
               
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
                isPhoneShown = false;
                $(el).html('{{ translate('Sign Up with Mobile') }}');
            }
            else{
                $('.phone-form-group').removeClass('d-none');
                $('.email-form-group').addClass('d-none');
                isPhoneShown = true;
                $(el).html('{{ translate('Sign Up with Email') }}');
            }
        }
    </script>
@endsection
