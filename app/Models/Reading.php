<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    use HasFactory;

    public function getContentOnly5Rows($combine = false){
        $text = $this->contents;
        $texts = explode("\n", $text);
        $texts = array_slice($texts, 0, 5);
        if($combine){
            $text = implode("\n", $texts);
            return $text;
        } else {
            return $texts;
        }
    }

    public function book()
    {
        return $this->belongsTo(\App\Models\Book::class);
    }
}
