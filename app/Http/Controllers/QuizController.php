<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quiz;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class QuizController extends Controller
{
    //Redirect to new quiz page
    public function redirectToNewQuiz()
    {
        return view('newquiz');

    }

    public function addNewQuiz(Request $request)
    {
        $rules = array(
            'quiz_name'=>'required',
        );
        $messages = array(
            'quiz_name'=>'Quiz name is missing ',

        );
        $validator = Validator::make(input::all(), $rules , $messages);
        if(!$validator ->fails()) {
            $quiz = new quiz();
            $quiz->quiz_name = $request->input('quiz_name');
            $quiz->save();

            $newQuizID = $quiz->id; //I retrieved the last ID
            $published = $quiz->published;
            return view('newquestion', ['quizid' => $newQuizID, 'published' => $published]);
        }
        else{
            return Redirect::back()->withErrors($validator);

        }

    }


    //Save Quiz and return back home
    public function saveQuiz(Request $request)
    {
        $quizid=$request->input('quizid');

        $quiz = quiz::findOrFail($quizid);
        $quiz ->published=0;
        $quiz->save();


        return view('welcome');
    }

    //Publish Quiz

    public function publishQuiz(Request $request)
    {
        $quizid=$request->input('quizid');

        $quiz = quiz::findOrFail($quizid);
        $quiz ->published=1;
        $quiz->save();


        return view('welcome');
    }

    //Show published quizzes
    public function showPublished()
    {
        $quizzes = quiz::all()->where('published','=',1);
        return view('published_quizzes' , array('quizzes' =>$quizzes));

    }

    //Show saved quizzes

    public function showSaved()
    {
        $quizzes = quiz::where('published','=',0)->get();
        return view('saved_quizzes' , array('quizzes' =>$quizzes));

    }

}
