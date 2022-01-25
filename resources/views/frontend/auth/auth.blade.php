@extends('frontend.layouts.master')
@section('content')
    <main>
        <!--================login_part Area =================-->
        <section class="login_part  ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>Welcome Back ! <br>
                                    Please Sign in now</h3>
                                <form class="row contact_form" action="#" method="post" >
                                    <div class="col-md-12 form-group p_star">
                                        <input type="email" class="form-control" id="name" name="name" value=""
                                            placeholder="Email">
                                    </div>

                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="password" name="password" value=""
                                            placeholder="Password">
                                    </div>


                                    <div class="col-md-12 form-group">
                                        <button type="submit" value="submit" class="btn_3">
                                            log in
                                        </button>
                                        {{-- <a class="lost_pass" href="#">forget password?</a> --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>Welcome Back ! <br>
                                    Please Register now</h3>
                                <form class="row contact_form" action="#" method="post" >
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="name" name="name" value=""
                                            placeholder="Full_name">
                                    </div>


                                    <div class="col-md-12 form-group p_star">
                                        <input type="email" class="form-control" id="name" name="name" value=""
                                            placeholder="Email">
                                    </div>


                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="password" name="password" value=""
                                            placeholder="Password">
                                    </div>

                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="password" name="confirm_password" value=""
                                            placeholder="Confirm Password">
                                    </div>


                                    <div class="col-md-12 form-group">
                                        <button type="submit" value="submit" class="btn_3">
                                            Register
                                        </button>
                                        {{-- <a class="lost_pass" href="#">forget password?</a> --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================login_part end =================-->
    </main>
@endsection
