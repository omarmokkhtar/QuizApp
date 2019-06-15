<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <style>
            div
            {
                display: block;
                text-align: center;
            }
            form
            {
                display: inline-block;
                margin-left: auto;
                margin-right: auto;
                text-align: left;
            }
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Quiz</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Styles -->
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <br>
                    <div class="align-middle position-ref full-height">
                        <form method="get"  action="/savedquizzes" role="form">
                            @csrf
                            <button  id="question" type="submit" class="btn btn-primary">Saved Quizzes</button>
                        </form>

                    </div>
                <br>
                    <div class="flex-center position-ref full-height">
                        <form method="get"  action="/home" role="form">
                            @csrf
                            <button  id="question" type="submit" class="btn btn-primary">New Quiz</button>
                        </form>

                    </div>
                <br>
                    <div class="align-middle  full-height">
                        <form method="get"  action="/publishedquizzes" role="form">
                            @csrf
                            <button  id="question" type="submit" class="btn btn-primary">Published Quizzes</button>
                        </form>

                    </div>


            </div>
        </div>
    </body>
</html>
