<?php

namespace App\Http\Controllers;

use app\SinhVatModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SinhVatController extends Controller
{
    function create(Request $request){
        DB::table('sinhvat')
        ->insert([
            'sv_ten_khoahoc'=>$request->get('sv_ten_khoahoc'),
            'sv_ten_tiengviet'=>$request->get('sv_ten_tiengviet'),
            'sv_ten_dia_phuong'=>$request->get('sv_ten_dia_phuong'),
            'sv_giatri'=>$request->get('sv_giatri'),
            'h_id'=>$request->get('h_id')
        ]);

        return DB::table('sinhvat')->max('sv_id');
    }

    function edit(Request $request,$id){
        DB::table('sinhvat')
        ->where('sv_id',$id)
        ->update([
            'sv_ten_khoahoc'=>$request->get('sv_ten_khoahoc'),
            'sv_ten_tiengviet'=>$request->get('sv_ten_tiengviet'),
            'sv_ten_dia_phuong'=>$request->get('sv_ten_dia_phuong'),
            'sv_giatri'=>$request->get('sv_giatri'),
            'h_id'=>$request->get('h_id')
        ]);

        // return DB::table('sinhvat')->max('sv_id');
    }
}
