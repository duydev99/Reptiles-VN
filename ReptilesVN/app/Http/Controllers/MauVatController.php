<?php

namespace App\Http\Controllers;
use app\MauVatModel;
use app\SinhVatModel;
use app\NguoiDungModel;
use app\MoTaSinhVatModel;
use app\VideoModel;
use app\ImageModel;
use app\HoModel;
use app\NganhModel;
use app\BoModel;
use app\LopModel;
use app\GioiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MauVatController extends Controller
{
    function index(){
        return DB::table('mauvat')
        ->join('sinhvat','mauvat.sv_id','=','sinhvat.sv_id')
        ->where('nd_id',Session::get('user')['id'])
        ->orderBy('mv_thoi_gian','DESC')
        ->get();
    }

    function content(){
        return DB::table('mauvat')
        ->where('mv_duyet',1)
        ->join('sinhvat','mauvat.sv_id','=','sinhvat.sv_id')
        ->join('image','mauvat.mv_id','=','image.mv_id')
        ->orderBy('mv_thoi_gian','DESC')
        ->get();
    }

    function confirm(){
        return DB::table('mauvat')
        ->join('sinhvat','mauvat.sv_id','=','sinhvat.sv_id')
        ->get();
    }

    function posts($id){
        $status = DB::table('mauvat')->where('mv_id',$id)->value('mv_duyet');
        if($status == 0){
            DB::table('mauvat')
            ->where('mv_id',$id)
            ->update([
                'mv_duyet'=>1
            ]);
        }else{
            DB::table('mauvat')
            ->where('mv_id',$id)
            ->update([
                'mv_duyet'=>0
            ]);
        }
    }



    function create(Request $request){
        DB::table('mauvat')
        ->insert([
            'mv_mat_do_phan_bo'=>$request->get('mv_mat_do_phan_bo'),
            'mv_sinh_canh'=>$request->get('mv_sinh_canh'),
            'mv_dia_diem'=>$request->get('mv_dia_diem'),
            'mv_toado_1'=>$request->get('mv_toado_1'),
            'mv_toado_2'=>$request->get('mv_toado_2'),
            'mv_toado_3'=>$request->get('mv_toado_3'),
            'mv_toado_4'=>$request->get('mv_toado_4'),
            'mv_toado_5'=>$request->get('mv_toado_5'),
            'mv_thoi_gian'=>now(),
            'mv_tinh_trang'=>$request->get('mv_tinh_trang'),
            'sv_id'=>$request->get('sv_id'),
            'nd_id'=>Session::get('user')['id']
        ]);
        return "Thành công. Hãy chờ được duyệt.";
    }


    function edit($id){
       
        $rsPost = DB::table('mauvat')
        ->where('mv_id',$id)
        ->join('sinhvat','sinhvat.sv_id','=','mauvat.sv_id')
        ->get();
        $Id = DB::table('mauvat')->where('mv_id',$id)->value('sv_id');
        $rsDes = DB::table('mota_sinhvat')->where('sv_id',$Id)->get();
        return response([
            'rsPost' => $rsPost,
            'rsDes'=>$rsDes
        ], 200);
    }
    function update(Request $request,$id){
        DB::table('mauvat')
        ->where('mv_id',$id)
        ->update([
            'mv_mat_do_phan_bo'=>$request->get('mv_mat_do_phan_bo'),
            'mv_sinh_canh'=>$request->get('mv_sinh_canh'),
            'mv_dia_diem'=>$request->get('mv_dia_diem'),
            'mv_toado_1'=>$request->get('mv_toado_1'),
            'mv_toado_2'=>$request->get('mv_toado_2'),
            'mv_toado_3'=>$request->get('mv_toado_3'),
            'mv_toado_4'=>$request->get('mv_toado_4'),
            'mv_toado_5'=>$request->get('mv_toado_5'),
            'mv_tinh_trang'=>$request->get('mv_tinh_trang')
        ]);
        return "Cập nhật thành công";
    }

    function delete($id){
        DB::table('image')->where('mv_id',$id)->delete();
        DB::table('video')->where('mv_id',$id)->delete();
        $idsv = DB::table('mauvat')->where('mv_id',$id)->value('sv_id');
        DB::table('mauvat')->where('mv_id',$id)->delete();
        DB::table('mota_sinhvat')->where('sv_id',$idsv)->delete();
        DB::table('sinhvat')->where('sv_id',$idsv)->delete();
    }
    
    function detail($id){
        $rsMauVat = DB::table('mauvat')
        ->where('mv_id',$id)
        ->join('sinhvat','mauvat.sv_id','=','sinhvat.sv_id')
        ->join('nguoidung','mauvat.nd_id','=','nguoidung.nd_id')
        ->get();

        $rsimg =DB::table('image')->where('mv_id',$id)->get();
        $rsVideo =DB::table('video')->where('mv_id',$id)->get();

        $idsv = DB::table('mauvat')->where('mv_id',$id)->value('sv_id');

        $rsMota = DB::table('mota_sinhvat')
        ->where('sv_id',$idsv)
        ->join('mota','mota_sinhvat.mt_id','=','mota.mt_id')
        ->get();
        
        $rsHo = DB::table('sinhvat')
        ->where('sv_id',$idsv)
        ->join('ho','sinhvat.h_id','=','ho.h_id')
        ->get();
        $idHo = DB::table('sinhvat')->where('sv_id',$idsv)->value('h_id');
        $rsBo = DB::table('ho')
        ->where('h_id',$idHo)
        ->join('bo','ho.b_id','=','bo.b_id')
        ->get();
        $idBo = DB::table('ho')->where('h_id',$idHo)->value('b_id');
        $rsLop = DB::table('bo')
        ->where('b_id',$idBo)
        ->join('lop','bo.l_id','=','lop.l_id')
        ->get();
        $idLop = DB::table('bo')->where('b_id',$idBo)->value('l_id');
        $rsNganh = DB::table('lop')
        ->where('l_id',$idLop)
        ->join('nganh','lop.ng_id','=','nganh.ng_id')
        ->get();
        $idNganh = DB::table('lop')->where('l_id',$idLop)->value('ng_id');
        $rsGioi = DB::table('nganh')
        ->where('ng_id',$idNganh)
        ->join('gioi','gioi.g_id','=','nganh.g_id')
        ->get();
        return response([
            'rsPost'=>$rsMauVat,
            'rsDes'=>$rsMota,
            'rsImg'=>$rsimg,
            'rsVideo'=>$rsVideo,
            'rsHo'=>$rsHo,
            'rsBo'=>$rsBo,
            'rsLop'=>$rsLop,
            'rsNganh'=>$rsNganh,
            'rsGioi'=>$rsGioi
        ],200);
    }


    function search($text){

        return DB::table('mauvat')
        ->where('mv_duyet','=',1)
        ->where('sinhvat.sv_ten_tiengviet','like','%'.$text.'%')
        ->join('sinhvat','mauvat.sv_id','=','sinhvat.sv_id')
        ->join('image','mauvat.mv_id','=','image.mv_id')
        ->get();
    }

    function find($key){

        return DB::table('mauvat')
        ->where('mv_duyet','=',1)
        ->where('sinhvat.sv_ten_khoahoc','like',$key.'%')
        ->join('sinhvat','mauvat.sv_id','=','sinhvat.sv_id')
        ->join('image','mauvat.mv_id','=','image.mv_id')
        ->get();
    }
}
