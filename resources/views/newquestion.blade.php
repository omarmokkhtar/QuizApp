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
        div.static {
            position: static;
        }

    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">

        <div class="title">
            <form method="POST"  action="/newquestion" role="form">
                @csrf
                <div class="form-group">
                    <label for="question">Question Name</label>
                    <input type="text" class="form-control" id="question" name="question" placeholder="">
                    <input type="hidden" name="quizid" id="quizid'" value="{{$quizid}}">

                </div>


                <button  id="question" type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
        <div>

            <form method="POST"  action="/publishquiz" role="form">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="quizid" id="quizid'" value="{{$quizid}}">
                </div>


                <button  id="question" type="submit" class="btn btn-primary">Publish Quiz</button>
            </form>
            <form method="POST"  action="/savequiz" role="form">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="quizid" id="quizid'" value="{{$quizid}}">
                </div>


                <button  id="question" type="submit" class="btn btn-primary">Save Quiz</button>
            </form>
        </div>

    @if(empty($questions))
            @else
            <div class="m-b-md">
                <table class="table table-hover table-sm ">
                    <thead>
                    <tr>
                        <th scope="col">Question</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $question)

                        <tr>
                            <td>{{$question->question}}</td>
                            <td><a onclick="change_action({{$question->id}})" id="addAnswers" href="{{URL::to('newanswer/'.$question->id)}}"><button class="btn btn-block btn-success btn-sm">Add Answers</button></a></td>
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

        document.getElementById("addAnswers").action += '/' + id;
    }
</script>