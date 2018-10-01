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

        html,
        body {
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
            min-height: 200px;
            text-align: left;
        }

        .text-block ul li {
            padding: 5px 10px;

        }

        .text-block ul :hover {
            background-color: lightcoral;
            color: whitesmoke;
        }

        .task-list {
            max-height: 250px;
            overflow-y: scroll;
        }

        .rollover-date {
            font-weight: 300;
            position: fixed;
            top: 470px;
            color: rgb(53, 56, 56);
            width: 300px;
            max-height: 150px;
            overflow-y: hidden;
        }

        .rollover-body {
            position: fixed;
            top: 500px;
            color: #3E4E50;
            width: 300px;
            max-height: 150px;
            overflow-y: hidden;
        }

        .links>a {
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
                <a href="/">Database <span style="font-size:20px">calls</span></a>
            </div>

            <!-- blade (laravel) method using @ -->
            <div class="text-block task-list">
                <ul>
                    @foreach ($tasks as $index => $task)

                    <li class="task-item" style="">
                        <a href="/database/{{$task->id}}">{{ $task->title }}</a>
                        <p class="rollover-date">{{$task->created_at}}</p>
                        <p class="rollover-body">{{$task->description}}</p>
                    </li>

                    @endforeach
                </ul>
            </div>


            <div class="text-block">
                {{-- wth i can't pass things from html into php --}}
                <h4>detail:</h4>
                <script>
                    $(function () {
                        $('.task-item .rollover-body').fadeOut(0);
                        $('.task-item .rollover-date').fadeOut(0);

                        var clicked = false;

                        $('.task-item').hover(function () {

                            // Code to execute whenever the <a> is hovered over

                            // Example: Whenever THIS <a> tag is hovered over, display
                            //          the hidden image that has a class of .rollover

                            $(' .rollover-body', this).fadeIn(300);
                            $(' .rollover-date', this).fadeIn(300);

                        }, function () {

                            // Execute this code when the mouse exits the hover area
                            // Example (inline with above example)

                            $(' .rollover-body', this).fadeOut(0);
                            $(' .rollover-date', this).fadeOut(0);

                        });


                    });
                </script>
            </div>
            <br />


            <div>
                <h3>from "<span style="color:lightcoral">
                        <?= $db; ?></span>" database</h3>
            </div>
        </div>
    </div>

</body>

</html>