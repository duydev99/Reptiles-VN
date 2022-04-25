<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GioiModel extends Model
{
    protected $table = 'gioi';
    protected $guarded = [];
    protected $primaryKey   = 'g_id';
}
