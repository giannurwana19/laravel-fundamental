<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link href="{{ asset('assets') }}/css/select2.min.css" rel="stylesheet" />

  @stack('css')
</head>

<body>
  @include('includes.navigation')

  <div class="py-4">
    <div class="container">
      @include('comp.alert-session')
      @yield('content')
    </div>
  </div>

  <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
  <script src="{{ asset('assets') }}/js/popper.min.js"></script>
  <script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
  <script src="{{ asset('assets') }}/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
    $('.select2').select2({
      placeholder: "Choose some tags"
    });
    });
  </script>
  @stack('scripts')
</body>

</html>