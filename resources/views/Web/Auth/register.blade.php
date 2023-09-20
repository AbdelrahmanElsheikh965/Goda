@include('Helpers_Views.auth_header')

<!-- Start Contact Us  -->
<div class="contact-box-main">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-sm-12">
                <div class="contact-form-right">
                    <h2> Register a new account | Fill in your personal data </h2> <br>
                    <form method="post">
                        @csrf
                        @include('Helpers_Views.errors')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="first_name" placeholder="Your first name" value="{{old('first_name')}}">
{{--                                           required data-error="Please enter your first name">--}}
{{--                                    <div class="help-block with-errors"></div>--}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="last_name" placeholder="Your last name" value="{{old('last_name')}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" placeholder="Your email address" id="email" class="form-control" name="email" value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" value="{{old('password')}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Confirm your password" value="{{old('password_confirmation')}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="radio-inline">
                                        <i> Gender </i> &nbsp;
                                        <input type="radio" value="male" name="gender"> Male
                                    </label> &nbsp;
                                    <label class="radio-inline">
                                        <input type="radio" value="female" name="gender"> Female
                                    </label>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <b>Already have an account? </b> <a href="{{url('/login')}}"> <u> Login now </u> </a>
                                </div>
                                <div class="submit-button text-center">
                                    <button class="btn hvr-hover" formmethod="post" formaction="{{url('/store')}}" id="submit" type="submit"> Save </button>
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
