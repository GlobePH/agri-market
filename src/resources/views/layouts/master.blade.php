
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{ config('app.name', 'Agri-Market') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  </head>
  
  <body>

    @include ('partials.nav')

    @yield ('content')

    @include ('partials.footer')

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>

  </body>
</html>
