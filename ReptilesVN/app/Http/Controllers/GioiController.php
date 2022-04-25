<?php

namespace App\Http\Controllers;
use app\GioiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GioiController extends Controller
{
    function index(){
        return DB::table('gioi')->get();
    }

    function create(Request $request){
        DB::table('gioi')
        ->insert([
            'g_gioi'=>$request->get('g_gioi')
        ]);
        return "Tạo mới thành công";
    }

    function edit($id){
        return DB::table('gioi')
        ->where('g_id',$id)
        ->get();
    }

    function update(Request $request,$id){
        DB::table('gioi')
        ->where('g_id',$id)
        ->update([
            'g_gioi'=>$request->get('g_gioi')
        ]);
        return "Cập nhật thành công";
    }

    function delete($id){
        DB::table('gioi')
        ->where('g_id',$id)
        ->delete();
        return "Đã thực hiện xóa";
    }
}
