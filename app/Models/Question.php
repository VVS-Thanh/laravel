<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\QuestionController;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    public $primarykey = 'questionid';
    public $timestamps = false;
    protected $fillable = ['questionid', 'content', 'answera', 'answerb', 'answerc', 'answerd', 'correctanswer', 'level', 'image', 'subjectid'];

    public function Subject()
    {
        return $this->belongsTo(Subject::class, "subjectid", "subjectid");
    }
}