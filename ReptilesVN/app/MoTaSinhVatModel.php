<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoTaSinhVatModel extends Model
{
    protected $table = 'mota_sinhvat';
    protected $guarded = [];
    protected $primaryKey   = 'mtsv_id';
}
