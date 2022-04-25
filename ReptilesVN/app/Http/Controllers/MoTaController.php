<?php

namespace App\Http\Controllers;
use app\MoTaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MoTaController extends Controller
{
    function index(){
        return DB::table('mota')->get();
    }

    function create(Request $request){
        DB::table('mota')
        ->insert([
            'mt_mota'=>$request->get('mt_mota')
        ]);
        return "Tạo mới thành công";
    }

    function edit($id){
        return DB::table('mota')
        ->where('mt_id',$id)
        ->get();
    }

    function update(Request $request,$id){
        DB::table('mota')
        ->where('mt_id',$id)
        ->update([
            'mt_mota'=>$request->get('mt_mota')
        ]);
        return "Cập nhật thành công";
    }

    function delete($id){
        DB::table('mota')
        ->where('mt_id',$id)
        ->delete();
        return "Đã thực hiện xóa";
    }
}
