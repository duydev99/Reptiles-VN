<?php

namespace App\Http\Controllers;
use app\NguoiDungModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class NguoiDungController extends Controller
{
    function submitLogin(Request $request){
        $username = $request->get('txtUsername');
        $password = $request->get('txtPassword');
        $rsUsername = DB::table('nguoidung')->where('nd_tai_khoan',$username)->count();
        if($rsUsername>0){
            $rsPassword = DB::table('nguoidung')->where('nd_tai_khoan',$username)->where('nd_mat_khau',md5($password))->count();
            if($rsPassword>0){
                $rsID = DB::table('nguoidung')->where('nd_tai_khoan',$username)->where('nd_mat_khau',md5($password))->value('nd_id');
                $rsType = DB::table('nguoidung')->where('nd_id',$rsID)->value('nd_loai');
                $rsName = DB::table('nguoidung')->where('nd_id',$rsID)->value('nd_ho_ten');
                $infor = array(
                    'id'=>$rsID,
                    'name'=>$rsName,
                    'type'=>$rsType
                );
                if($rsType == 1){
                    Session::put('user',$infor);
                }else{
                    Session::put('user',$infor);
                }
                return redirect(route('master'));
            }else{
                Session::put('error', "Mật khẩu không chính xác");
                return redirect(route('login'));
            }
        }else{
            Session::put('error', "Người dùng không tồn tại");
            return redirect(route('login'));
        }
    }
    
    function index(){
        return DB::table('nguoidung')->get();
    }

    function create(Request $request){

        $rsUsername = DB::table('nguoidung')->where('nd_tai_khoan',$request->get('nd_tai_khoan'))->count();
        if($rsUsername>0){
            return "Người dùng đã tồn tại";
        }else{
            DB::table('nguoidung')
            ->insert([
                'nd_ho_ten'=>$request->get('nd_ho_ten'),
                'nd_tai_khoan'=>$request->get('nd_tai_khoan'),
                'nd_mat_khau'=>md5($request->get('nd_mat_khau')),
                'nd_loai'=>$request->get('nd_loai')
            ]);
            return "Tạo mới thành công";
        }
    }

    function edit($id){
        return DB::table('nguoidung')
        ->where('nd_id',$id)
        ->get();
    }

    function update(Request $request,$id){
        $rsUsername = DB::table('nguoidung')->where('nd_id',$id)->value('nd_tai_khoan');
        if($rsUsername == $request->get('nd_tai_khoan')){
            if($request->get('nd_mat_khau') == "" || $request->get('nd_mat_khau') == null){
                DB::table('nguoidung')
                ->where('nd_id',$id)
                ->update([
                    'nd_ho_ten'=>$request->get('nd_ho_ten'),
                    'nd_loai'=>$request->get('nd_loai')
                ]);
            }else{
                DB::table('nguoidung')
                ->where('nd_id',$id)
                ->update([
                    'nd_ho_ten'=>$request->get('nd_ho_ten'),
                    'nd_mat_khau'=>md5($request->get('nd_mat_khau')),
                    'nd_loai'=>$request->get('nd_loai')
                ]);
            }
            return "Cập nhật thành công";
        }else{
            $existUsername = DB::table('nguoidung')->where('nd_tai_khoan',$request->get('nd_tai_khoan'))->count();
            if($existUsername > 0){
                return "Tài khoản đã tồn tại";
            }else{
                if($request->get('nd_mat_khau') == "" || $request->get('nd_mat_khau') == null){
                    DB::table('nguoidung')
                    ->where('nd_id',$id)
                    ->update([
                        'nd_tai_khoan'=>$request->get('nd_tai_khoan'),
                        'nd_ho_ten'=>$request->get('nd_ho_ten'),
                        'nd_loai'=>$request->get('nd_loai')
                    ]);
                }else{
                    DB::table('nguoidung')
                    ->where('nd_id',$id)
                    ->update([
                        'nd_tai_khoan'=>$request->get('nd_tai_khoan'),
                        'nd_ho_ten'=>$request->get('nd_ho_ten'),
                        'nd_mat_khau'=>md5($request->get('nd_mat_khau')),
                        'nd_loai'=>$request->get('nd_loai')
                    ]);
                }
                return "Cập nhật thành công";
            }
        }
    }

    function delete($id){
        DB::table('nguoidung')
        ->where('nd_id',$id)
        ->delete();
        return "Đã thực hiện xóa";
    }
}
