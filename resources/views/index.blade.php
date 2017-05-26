<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BM Table</title>

    <link rel="stylesheet" href="{{url('assets/app.css')}}">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.1/socket.io.js"></script>
    <script>
        window.appurl = '{{url('/')}}';
    </script>
    <script src="{{url('assets/app.js')}}"></script>

</head>
<body @role('Admin')class="admin"@endrole>

@role('Admin')
<header>
    <div class="action">
        <button id="reset">Reset</button>
    </div>
</header>
@endrole

<div id="content">
    Connecting to server...
</div>




</body>
</html>