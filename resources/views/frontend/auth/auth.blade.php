@extends('frontend.layouts.master')
@section('content')
    <main>
        <section class="login_part  ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>Welcome Back ! <br>
                                    Please Sign in now</h3>
                                <form class="row contact_form" action="{{ route('login.submit') }}" method="post">
                                    @csrf
                                    <div class="col-md-12 form-group p_star">
                                        <input type="email" class="form-control" name="email" value="" required
                                            placeholder="Email" />
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" name="password" value="" required
                                            placeholder="Password" />
                                    </div>


                                    <div class="col-md-12 form-group">
                                        <button type="submit" value="submit" class="btn_3">
                                            log in
                                        </button>

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
                                <form class="row contact_form" action="{{ route('register.submit') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" name="full_name" value="" required
                                            placeholder="Fullname">
                                    </div>

                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" name="username" value="" required
                                            placeholder="username">
                                    </div>


                                    <div class="col-md-12 form-group p_star">
                                        <input type="email" class="form-control" name="email" value="" required
                                            placeholder="Email">
                                    </div>


                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" name="password" value="" required
                                            placeholder="Password">
                                    </div>

                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" name="password_confirmation" value=""
                                            required placeholder="Confirm Password">
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
