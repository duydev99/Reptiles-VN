<?php

namespace App\Http\Controllers;
use app\MoTaSinhVatModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MoTaSinhVatController extends Controller
{
    function create(Request $request){
        DB::table('mota_sinhvat')
        ->insert([
            'mt_id'=>$request->get('mt_id'),
            'sv_id'=>$request->get('sv_id'),
            'mota'=>$request->get('mota')
        ]);
    }
    function edit(Request $request){
        DB::table('mota_sinhvat')
        ->where('sv_id',$request->get('sv_id'))
        ->where('mt_id',$request->get('mt_id'))
        ->update([
            'mota'=>$request->get('mota')
        ]);
    }
}
