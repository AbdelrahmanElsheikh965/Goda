@include('Helpers_Views.auth_header')

<!-- Start Contact Us  -->
<div class="contact-box-main">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-sm-12">
                <div class="contact-form-right">
                    <h2> O0ps you forgot your password! </h2> <br>
                    <form method="post">
                        @csrf
                        @include('Helpers_Views.errors')
                        {{ \Session::get('error') }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <b> Forgot your password? No problem.
                                        Just let us know your email address and we will email you a password reset link that will allow you to choose a new one. </b>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="name" name="email" placeholder="Your email">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="submit-button text-center">
                                    <button class="btn hvr-hover" id="submit" formmethod="post" formaction="{{url('/reset-password')}}" type="submit"> Send Me Reset Link </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->

@include('Helpers_Views.footer')
