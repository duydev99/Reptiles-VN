<?php

namespace App\Http\Controllers;
use app\HoModel;
use app\BoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HoController extends Controller
{
    function index(){
        return DB::table('ho')
        ->join('bo','bo.b_id','=','ho.b_id')
        ->get();
    }

    function create(Request $request){
        DB::table('ho')
        ->insert([
            'h_ho'=>$request->get('h_ho'),
            'b_id'=>$request->get('b_id')
        ]);
        return "Tạo mới thành công";
    }

    function edit($id){
        return DB::table('ho')
        ->where('h_id',$id)
        ->get();
    }

    function update(Request $request,$id){
        DB::table('ho')
        ->where('h_id',$id)
        ->update([
            'h_ho'=>$request->get('h_ho'),
            'b_id'=>$request->get('b_id')
        ]);
        return "Cập nhật thành công";
    }

    function delete($id){
        DB::table('ho')
        ->where('h_id',$id)
        ->delete();
        return "Đã thực hiện xóa";
    }
}
