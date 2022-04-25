<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguoiDungModel extends Model
{
    protected $table = 'nguoidung';
    protected $guarded = [];
    protected $primaryKey   = 'nd_id';
}
