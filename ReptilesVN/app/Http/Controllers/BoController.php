<?php

namespace App\Http\Controllers;
use app\BoModel;
use app\LopModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoController extends Controller
{
    function index(){
        return DB::table('bo')
        ->join('lop','bo.l_id','=','lop.l_id')
        ->get();
    }

    function create(Request $request){
        DB::table('bo')
        ->insert([
            'b_bo'=>$request->get('b_bo'),
            'l_id'=>$request->get('l_id')
        ]);
        return "Tạo mới thành công";
    }

    function edit($id){
        return DB::table('bo')
        ->where('b_id',$id)
        ->get();
    }

    function update(Request $request,$id){
        DB::table('bo')
        ->where('b_id',$id)
        ->update([
            'b_bo'=>$request->get('b_bo'),
            'l_id'=>$request->get('l_id')
        ]);
        return "Cập nhật thành công";
    }

    function delete($id){
        DB::table('bo')
        ->where('b_id',$id)
        ->delete();
        return "Đã thực hiện xóa";
    }
}
