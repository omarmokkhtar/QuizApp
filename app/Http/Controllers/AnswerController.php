<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\answer;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class AnswerController extends Controller
{
    //Return Add answer page
    public function returnAnswerPage($id)
    {
        $questionid = $id;

        return view('add_answers', array('questionid' => $questionid));
    }



    //Insert Answers for questions
    public function insert(Request $request)
    {
        $questionid = $request->input('questionid');

        if ($request->ajax()) {

            $rules = array(
                'answer.*' => 'required',
                'checked.*' => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error' => $error->errors()->all()
                ]);
            }

            $answer = $request->answer;
            $right_answer = $request->checked;
            $question_id = $questionid;
            $flag = 0;

            for ($count = 0; $count < count($answer); $count++) {
                $data = array(
                    'question_id' => $question_id,
                    'answer' => $answer[$count],
                    'right_answer' => $right_answer[$count],
                );
                $insert_data[] = $data;


                if ($right_answer[$count] != null && $right_answer[$count] != 0) {
                    $flag++;
                }

            }
            if ($flag == 1) {
                answer::insert($insert_data);
                return response()->json([
                    'success' => 'Data Added successfully.'
                ]);

            } elseif ($flag ==0 || $flag>1 || $flag==2) {
                return response()->json([
                    'error' => 'Please review right answer checkbox.'
                ]);
            }


        }
    }



}

