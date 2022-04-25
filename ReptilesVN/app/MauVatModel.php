<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MauVatModel extends Model
{
    protected $table = 'mauvat';
    protected $guarded = [];
    protected $primaryKey   = 'mv_d';
}
