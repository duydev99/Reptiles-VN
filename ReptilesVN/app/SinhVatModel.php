<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinhVatModel extends Model
{
    protected $table = 'sinhvat';
    protected $guarded = [];
    protected $primaryKey   = 'sv_id';
}
