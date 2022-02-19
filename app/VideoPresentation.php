<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoPresentation extends Model
{
    protected $fillable = ['id','created_at','video_link','amount'];

}
