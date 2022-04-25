<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoModel extends Model
{
    protected $table = 'video';
    protected $guarded = [];
    protected $primaryKey   = 'video_id';
}
