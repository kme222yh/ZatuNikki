<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Diary extends Model
{
    use HasFactory;


    protected $dates = [
        "date",
    ];


    public function setDefault(){
        $this->date = Carbon::now();
        $this->title = '';
        $this->contents = '';
        $this->published = false;
    }


    public function getTitle(){
        if($this->title){
            return $this->title;
        } else {
            return (new Carbon($this->date))->format('Y年m月d日の日記');
        }
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
