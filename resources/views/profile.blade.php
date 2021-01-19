@extends('layouts')

@section('content')

    <!-- My profile -->
    <section id="my-profile" class="padding_center_1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="profile-img">
                        <img src="{{ $userData->img }}" alt="Profile image">
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="font_size_4">{{ $userData->first_name }} {{ $userData->last_name }}</div>
                    <div class="font_size_7">{{ $userData->email }}</div>
                    <div class="font_size_10 mt-2"><i class="fas fa-shopping-cart"></i> Happy customer - 65</div>
                    <div class="font_size_10 mt-2"><i class="fas fa-money-check-alt"></i> Spent money - $4800</div>
                    <ul>
                        <li><a href="#">Cart (4)</a></li>
                        <li><a href="#">Orders (3)</a></li>
                        <li><a href="#">Wishlist (5)</a></li>
                    </ul>
                    <a href="/userSettings" class="bttn bttn-dark">Settings</a>
                </div>
            </div>
        </div>
    </section>
    <!-- My profile end -->
    
@endsection