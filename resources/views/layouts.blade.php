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


    {{-- Include content --}}
    @yield('content')

    {{-- Include footer --}}
    @include('layouts/footer')

    {{-- Include scripts --}}
    @include('layouts/scripts')

  </body>
</html>