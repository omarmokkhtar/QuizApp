<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quiz</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Styles -->
    <style>
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

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
            position: absolute;
            top: 8px;
            left: 16px;
            font-size: 18px;
        }

    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">


        @if(empty($quizzes))
        @else
            <div class="m-b-md">
                <table class="table table-hover table-sm ">
                    <thead>
                    <tr>
                        <th scope="col">Quiz</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($quizzes as $quiz)


                        <tr>
                            <td>{{$quiz->quiz_name}}</td>
                            <td><a onclick="change_action({{$quiz->id}})" id="quiz" href="{{URL::to('allsavedquestions/'.$quiz->id)}}"><button class="btn btn-block btn-success btn-sm">Show Quiz</button></a></td>
                            @endforeach
                        </tr>

                    </tbody>
                </table>
            </div>


    </div>
    @endif


</div>

</body>
</html>
<script>
    function change_action(id){

        document.getElementById("quiz").action += '/' + id;
    }
</script>