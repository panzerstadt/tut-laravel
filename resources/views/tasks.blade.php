<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            a {
                text-decoration: none;
                color: #636b6f;
            }
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .text-block {
                font-size: 16px;
                width: 400px;
                text-align: left;
            }

            .text-block ul li {
                padding: 10px;
            }

            .text-block ul :hover {
                background-color: lightcoral;
                color: whitesmoke;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Request::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <a href="/">Tasks...</a>
                </div>

                <!-- vannila php method
                <div class="text-block">
                    <ul>
                        <?php foreach ($tasks as $task): ?>

                        <li><?= $task; ?></li>

                        <?php endforeach; ?>
                    </ul>
                </div> -->

                <!-- blade (laravel) method -->
                <div class="text-block">
                    <ul>
                        @foreach ($tasks as $task)

                        <li>{{ $task }}</li>

                        @endforeach
                    </ul>
                </div>

                <br/>
                <br/>
                <br/>


                <div><h3>...for <?= $name; ?></h3></div>
            </div>
        </div>
    </body>
</html>
