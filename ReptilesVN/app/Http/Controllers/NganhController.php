<?php

namespace App\Http\Controllers;
use app\NganhModel;
use app\GioiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NganhController extends Controller
{
    function index(){
        return DB::table('nganh')
        ->join('gioi','nganh.g_id','=','gioi.g_id')
        ->get();
    }

    function create(Request $request){
        DB::table('nganh')
        ->insert([
            'ng_nganh'=>$request->get('ng_nganh'),
            'g_id'=>$request->get('g_id')
        ]);
        return "Tạo mới thành công";
    }

    function edit($id){
        return DB::table('nganh')
        ->where('ng_id',$id)
        ->get();
    }

    function update(Request $request,$id){
        DB::table('nganh')
        ->where('ng_id',$id)
        ->update([
            'ng_nganh'=>$request->get('ng_nganh'),
            'g_id'=>$request->get('g_id')
        ]);
        return "Cập nhật thành công";
    }

    function delete($id){
        DB::table('nganh')
        ->where('ng_id',$id)
        ->delete();
        return "Đã thực hiện xóa";
    }
}
