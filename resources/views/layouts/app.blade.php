<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Auth')</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial,sans-serif;
        }

        body{
            background:#f5f5f5;
        }

        .container{
            display:flex;
        }

        .content{
            flex:1;
            padding:20px;
        }

        .alert-success{
            background:#d4edda;
            color:#155724;
            padding:10px;
            margin-bottom:15px;
            border-radius:5px;
        }

        .alert-error{
            background:#f8d7da;
            color:#721c24;
            padding:10px;
            margin-bottom:15px;
            border-radius:5px;
        }
    </style>
</head>
<body>

    @include('layouts.header')

    <div class="container">

        @auth
            @include('layouts.sidebar')
        @endauth

        <div class="content">

            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert-error">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')

        </div>

    </div>

    @include('layouts.footer')

</body>
</html>