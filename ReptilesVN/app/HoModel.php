<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoModel extends Model
{
    protected $table = 'ho';
    protected $guarded = [];
    protected $primaryKey   = 'h_id';
}
