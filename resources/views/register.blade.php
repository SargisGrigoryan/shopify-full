@extends('layouts')

@section('content')

    <!-- Register -->
    <section id="register" class="padding_center_2">

        <!-- Headline -->
        <div class="headline padding_bottom_1">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="font_size_3">Sign up</div>
                        <div class="font_size_11">If you already have an account You can <a href="/login">sign in</a> now</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Headline end -->

        <!-- Content -->
        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <form>
                            <div class="mb-3">
                              <label for="Input1" class="form-label">First name</label>
                              <input type="text" class="form-control" id="Input1">
                            </div>
                            <div class="mb-3">
                              <label for="Input2" class="form-label">Last name</label>
                              <input type="text" class="form-control" id="Input2">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Email address</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword2">
                            </div>
                            <button type="submit" class="bttn bttn-dark">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content end -->
    </section>
    <!-- Register end -->
    
@endsection