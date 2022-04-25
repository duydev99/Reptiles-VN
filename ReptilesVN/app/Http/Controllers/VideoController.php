<?php

namespace App\Http\Controllers;
use app\VideoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    function load($id){
        return response([
            'videoList'=>DB::table('video')->where('mv_id',$id)->get(),
            'id'=>$id
        ],200);
    }

    function upload(Request $request, $id){
        if($request->hasFile('video')){
            $dirImg = __DIR__."\..\..\..\public\Video\\";
            $file = $request->file('video');
            
            $fileGoc = $file->getClientOriginalName();
    
            $desFile = $id."_".$fileGoc;
            $file->move($dirImg,$desFile);
            $source = DB::table('video')->where('video_source',$desFile)->count();
            if($source ==0){
                DB::table('video')->insert(
                    [
                        'video_source'=>$desFile,
                        'mv_id'=>$id
                    ]
                );
            }

            return $fileGoc;
        }
    }

    function delete($id){
        $source = DB::table('video')->where('video_id',$id)->value('video_source');
        $dirImg = __DIR__."\..\..\..\public\Video\\";
        unlink($dirImg.$source);
        
        DB::table('video')->where('video_id',$id)->delete();
    }
}
