
<!DOCTYPE html>
<html lang="en">
  <head>

    <title>{{ config('app.name', 'Agri-Market') }}</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="favicon.ico">
    <script>
    @if (Auth::check())
    window.user = {!! Auth::user()->load('subscription') !!};
    @else
    window.user = {};
    @endif
    </script>
  </head>
  
  <body>

    <div id='root'></div>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>

  </body>
</html>
