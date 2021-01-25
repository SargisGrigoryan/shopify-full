@extends('layouts')

@section('content')

    <!-- Register -->
    <section id="register" class="padding_center_2">

        <!-- Headline -->
        <div class="headline padding_bottom_1">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="font_size_3">Settings</div>
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
                        <form action="/saveUserDatas" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                              <label for="Input1" class="form-label">First name</label>
                              <input type="text" class="form-control" id="Input1" name="first_name" value="{{ $userData->first_name }}">
                            </div>
                            <div class="mb-3">
                              <label for="Input2" class="form-label">Last name</label>
                              <input type="text" class="form-control" id="Input2" name="last_name" value="{{ $userData->last_name }}">
                            </div>
                            <div class="mb-3">
                                <label for="Input3" class="form-label">User image</label>
                                <div><a href="/removeUserImg">Remove user image</a></div>
                                <img src="{{ $userData->img }}" class="img-fluid" alt="user_image">
                                <input type="file" class="form-control" id="Input3" name="img">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Email address</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ $userData->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Current password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="current_password">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">New password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" name="new_password">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword2" class="form-label">Confirm new password</label>
                              <input type="password" class="form-control" id="exampleInputPassword2" name="confirm_password">
                            </div>
                            <button type="submit" class="bttn bttn-dark">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content end -->
    </section>
    <!-- Register end -->
    
@endsection