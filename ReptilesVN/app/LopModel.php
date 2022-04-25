<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LopModel extends Model
{
    protected $table = 'lop';
    protected $guarded = [];
    protected $primaryKey   = 'l_id';
}
