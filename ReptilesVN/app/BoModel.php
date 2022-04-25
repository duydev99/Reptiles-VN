<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoModel extends Model
{
    protected $table = 'bo';
    protected $guarded = [];
    protected $primaryKey   = 'b_id';
}
