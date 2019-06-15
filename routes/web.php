<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcomePage');
Route::get('/home', function () {
    return view('newquiz');
});

Route::get('/question/{id}', function () {
    return view('newquestion');
});

//Quizzes Routes
Route::post('newquiz' , 'QuizController@addNewQuiz');
Route::post('savequiz' , 'QuizController@saveQuiz');
Route::post('publishquiz' , 'QuizController@publishQuiz');
Route::get('publishedquizzes' , 'QuizController@showPublished');
Route::get('savedquizzes' , 'QuizController@showSaved');



//Answers Routes
Route::get('newanswer/{id}' , 'AnswerController@returnAnswerPage');
Route::post('submitAnswer' , 'AnswerController@insert')->name('submitAnswer');

//Questions Routes
Route::post('newquestion' , 'QuestionController@addNewQuestion');
Route::get('all_questions/{id}' , 'QuestionController@publishedQuestions');
Route::get('allsavedquestions/{id}' , 'QuestionController@savedQuestions');






