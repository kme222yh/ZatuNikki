<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;



    public function getOmittedTitle($limit = 20){
        $text = $this->title;
        if(mb_strlen($text) > $limit) {
            $text = mb_substr($text,0,$limit);
            $text.= '･･･' ;
        }
        return $text;
    }



    public function type()
    {
        return $this->belongsTo(AnnouncementType::class, 'announcement_type_id');
    }
}
