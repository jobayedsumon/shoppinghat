@extends('frontend.layouts.app')

@section('content')


	<center>
		<div class="p-5 col-4">
			<form class="" action="{{ route('seller.phone.verify.store') }}" method="POST" enctype="multipart/form-data">
			    @csrf
			    <div class="card">
			        <div class="card-header">
			            <h4 class="mb-0 h6 ">OTP Verification</h4>
			        </div>
			        <div class="card-body">

		                <div class="row">

		                    <div class="col-12">
		                        <input style="border-color: #f57224" type="number" class="form-control mb-3" placeholder="Enter verification code" name="verification_code" required>
		                    </div>
		                </div>

			            <div class="text-center">
			                <button type="submit" class="btn btn-primary">{{ translate('Apply')}}</button>
			            </div>
			        </div>
                    <div >
                        <div class="text-center pb-3">
                            <span>Didn't receive the code? &nbsp;</span>
                            <br/>
                            <span id="timer">Wait <span style="color: #f57224" id="time">60</span> seconds</span>
                            <a style="text-decoration: none; " id="resendButton" href="{{ route('seller.verification.phone.resend') }}" class="btn btn-link">{{translate('Resend Code')}}</a>
                        </div>


                    </div>
			    </div>
			</form>
		</div>
	</center>

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
