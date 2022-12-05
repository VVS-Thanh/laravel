<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';
    public $timestamps = false;
    protected $fillable = ['subjectid', 'name'];
    public function Question()
    {
        return $this->hasMany(Subject::class, "subjectid", "subjectid");
    }
}