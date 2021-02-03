<?php

// Use controllers
use App\Http\Controllers\UserController;

// Check user cookies(remember user)
if(Cookie::get('remember_user')){
  $id = Cookie::get('remember_user');
  UserController::rememberUser($id);
}

?>

<!doctype html>
<html lang="en">
  <head>

    {{-- Include head of website --}}
    @include('layouts/head')

  </head>
  <body>

    {{-- Include header --}}
    @include('layouts/header')

    {{-- Include notifications --}}
    @include('layouts/notifications')

    {{-- Include content --}}
    @yield('content')

    {{-- Include footer --}}
    @include('layouts/footer')

    {{-- Include scripts --}}
    @include('layouts/scripts')

  </body>
</html>