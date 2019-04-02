<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>CRUD demo</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
    <br>
    <div class="container">
            @yield('content')
    </div>
</body>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous">
  </script>
  <script type="text/javascript" src="{{asset('js/file.js')}}"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</html>
