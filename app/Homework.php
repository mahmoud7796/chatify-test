<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $table = 'homeworks';
    protected $fillable = [
        'subject',
        'content',
        'file',
        'grade_id',
        'teacher_id'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
