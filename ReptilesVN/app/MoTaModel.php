<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoTaModel extends Model
{
    protected $table = 'mota';
    protected $guarded = [];
    protected $primaryKey   = 'mt_id';
}
