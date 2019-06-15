<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
use App\answer;
use App\quiz;

class QuestionController extends Controller
{

    public function addNewQuestion(Request $request)
    {
        $question = new question();
        $quizid=$request->input('quizid');
        $question->question = $request->input('question');
        $question->quiz_id=$quizid;
        $question->save();


        $questions = $question->all()->where('quiz_id','=',$quizid);
        $published = quiz::select('published')->where('published',0)->get();



        return view('newquestion', array('questions'=>$questions ,'quizid' => $quizid ,'published'=>$published));



    }

    //Show Published questions with the one to many query only
    public function publishedQuestions($id)
    {

       $questions =  question::where('quiz_id','=',$id)->with('answers')->get();
       return view('all_questions' , array('questions'=>$questions));

    }
    //Show Saved questions
    public function savedQuestions($id)
    {
        $questions = question::all()->where('quiz_id','=',$id);
        $published = quiz::select('published')->where('published',0)->get();
        return view('newquestion', array('questions'=>$questions ,'quizid' => $id ,'published'=>$published));


    }
}
