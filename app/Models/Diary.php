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
            return $this->date->format('Y年m月d日の日記');
        }
    }


    public function getOmittedTitle($limit = 20){
        $text = $this->getTitle();
        if(mb_strlen($text) > $limit) {
            $text = mb_substr($text,0,$limit);
            $text.= '･･･' ;
        }
        return $text;
    }


    public function getOmittedContents($limit = 130){
        $text = $this->contents;
        $text = str_replace(PHP_EOL, ' ', $text);
        if(mb_strlen($text) > $limit) {
            $text = mb_substr($text,0,$limit);
            // $text.= '･･･' ;
        }
        return $text;
    }


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
