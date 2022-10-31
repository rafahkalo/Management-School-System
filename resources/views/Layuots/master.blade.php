<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/main.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .content {

            width: 1100px;
            min-height: 500px;
            margin: 60px 0 0 210px
        }

    </style>

</head>

<body>
    <div>
        @include('Layuots.head')
        @include('Layuots.sidbar')
    </div>
    <div class="content">
        @yield('cont')
    </div>
</body>

</html>
