<?php

namespace App\Http\Controllers;
use app\NganhModel;
use app\LopModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LopController extends Controller
{
    function index(){
        return DB::table('lop')
        ->join('nganh','nganh.ng_id','=','lop.ng_id')
        ->get();
    }

    function create(Request $request){
        DB::table('lop')
        ->insert([
            'l_lop'=>$request->get('l_lop'),
            'ng_id'=>$request->get('ng_id')
        ]);
        return "Tạo mới thành công";
    }

    function edit($id){
        return DB::table('lop')
        ->where('l_id',$id)
        ->get();
    }

    function update(Request $request,$id){
        DB::table('lop')
        ->where('l_id',$id)
        ->update([
            'l_lop'=>$request->get('l_lop'),
            'ng_id'=>$request->get('ng_id')
        ]);
        return "Cập nhật thành công";
    }

    function delete($id){
        DB::table('lop')
        ->where('l_id',$id)
        ->delete();
        return "Đã thực hiện xóa";
    }
}
