<?php

namespace App\Http\Controllers;
use app\ImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    function load($id){
        return response([
            'imgList'=>DB::table('image')->where('mv_id',$id)->get(),
            'id'=>$id
        ],200);
    }

    function upload(Request $request, $id){
        if($request->hasFile('img')){
            $dirImg = __DIR__."\..\..\..\public\img\\";
            $file = $request->file('img');
            
            $fileGoc = $file->getClientOriginalName();
    
            $desFile = $id."_".$fileGoc;
            $file->move($dirImg,$desFile);
            $source = DB::table('image')->where('img_source',$desFile)->count();
            if($source ==0){
                DB::table('image')->insert(
                    [
                        'img_source'=>$desFile,
                        'mv_id'=>$id
                    ]
                );
            }

            return $fileGoc;
        }
    }

    function delete($id){
        $dirImg = __DIR__."\..\..\..\public\img\\";
        $source = DB::table('image')->where('img_id',$id)->value('img_source');
        unlink($dirImg.$source);
        DB::table('image')->where('img_id',$id)->delete();
    }
}
