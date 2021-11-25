<?php
namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PassengerStat;

class PassengerStatPostController extends Controller
{
    public $successStatus = 200;


    public function getAllPosts(Request $request)
    {
        $token = $request['t']; //t = token
        $userid = $request['u'];// u-userid


        $lists = DB::table('passengerstats')
        ->leftJoin('users','passengerstats.id', '=','users.id')
        ->select('passengerstats.id','passengerstats.name','passengerstats.lastname','passengerstats.address','passengerstats.age','passengerstats.number','users.name','passengerstats.created_at','passengerstats.updated_at')
        ->get();
        return response()->json($lists,$this->successStatus);

    }


    public function getPost(Request $request)
    {

        $id = $request['pid']; //old post id

        $token = $request['t']; //t = token
        $userid = $request['u'];// u-userid

        $user = User::where('id',$userid)->where('remember_token',$token)->first();


        if($user != null){

            $lists = PassengerStat::where('id',$id)->first();
            if($user != null){
                return response()->json($lists,$this->successStatus);
            }else{
                return response()->json(['response'=>'Posts not found'],404);
            }

        }else{
            return response()->json(['response'=>'Bad call'],501);
        }
    }


    public function searchPost(Request $request)
    {

        $params = $request['p']; //p = params

        $token = $request['t']; //t = token
        $userid = $request['u'];// u-userid

        $user = User::where('id',$userid)->where('remember_token',$token)->first();


        if($user != null){

            $lists = PassengerStat::where('name','LIKE','%' .$params . '%')->GET();
            if($user != null){
                return response()->json($lists,$this->successStatus);
            }else{
                return response()->json(['response'=>'Posts not found'],404);
            }

        }else{
            return response()->json(['response'=>'Bad call'],501);
        }
    }
}
