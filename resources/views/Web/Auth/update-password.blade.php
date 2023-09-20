@include('Helpers_Views.auth_header')

<!-- Start Contact Us  -->
<div class="contact-box-main">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-sm-12">
                <div class="contact-form-right">
                    <h2> Update your password! </h2> <br>
                    <form method="post">
                        @csrf
                        @include('Helpers_Views.errors')
                        {{ \Session::get('error') }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <b> Type and Re-Type the new password. </b>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Your password">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Retype Your password">
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="submit-button text-center">
                                    <button class="btn hvr-hover" id="submit" formmethod="post" formaction="{{url('/update-password')}}" type="submit"> Update </button>
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
