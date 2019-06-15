<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    protected $fillable = [
      'question_id' , 'answer', 'right_answer'
    ];

    public function question()
    {
        return $this->belongsTo('App\question');
    }
}
