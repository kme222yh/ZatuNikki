<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;



    public function type()
    {
        return $this->belongsTo(AnnouncementType::class, 'announcement_type_id');
    }
}
