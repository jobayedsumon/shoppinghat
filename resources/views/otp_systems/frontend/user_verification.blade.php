@extends('frontend.layouts.app')

@section('content')
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-5 mx-auto">
                    <div class="card">
                        <div class="text-center pt-5">
                            <h1 class="h2 fw-600">
                                {{translate('OTP Verification')}}
                            </h1>
                            <p>Verification code has been sent. Please wait a few minutes.</p>
                       </div>
                        <div class="px-5">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg">
                                    <form class="form-default" role="form" action="{{ route('verification.submit') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group input-group--style-1">
                                                <input style="border-color: #f57224" type="text" class="form-control" name="verification_code">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">{{ translate('Verify') }}</button>
                                    </form>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center pb-5 pt-2">
                                <span>Didn't receive the code? &nbsp;</span>
                                <span id="timer">Wait <span style="color: #f57224" id="time">60</span> seconds</span>
                                <a style="text-decoration: none; " id="resendButton" href="{{ route('verification.phone.resend') }}" class="btn btn-link">{{translate('Resend Code')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $('#resendButton').hide();
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                seconds = seconds < 10 ? "0" + seconds : seconds;
                seconds = seconds == "00" ? "60" : seconds;

                display.textContent =  seconds;

                if (--timer < 0) {
                    timer = duration;
                }
                if(timer == 0) {
                    $('#timer').hide();
                    $('#resendButton').show();
                }
            }, 1000);
        }

        window.onload = function () {

            var oneminute = 60 * 1,
                display = document.querySelector('#time');
            startTimer(oneminute, display);
        };
    </script>
@endsection
