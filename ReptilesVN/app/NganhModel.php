<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NganhModel extends Model
{
    protected $table = 'nganh';
    protected $guarded = [];
    protected $primaryKey   = 'ng_id';
}
