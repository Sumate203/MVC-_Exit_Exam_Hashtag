<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account;
use App\Models\Hashtag;
use Illuminate\Support\Facades\DB;
class AppController extends Controller
{
   //Create Index
   public function index(){
    // $users = DB::table('accounts')
    //          ->select(DB::raw('id, messsage'))
    //          ->where('messsage')
    //          ->like('I_%')
    //          ->get();
    //$data['appView'] = account::orderBy('id','asc')->paginate(10);//ดึงข้อมูลจาก database

    $data['appView'] = DB::table('accounts')
    ->select(DB::raw('id, message'))
    ->where('message','like','%I%')
    ->orWhere('message','like','%O%')
    ->paginate(10);
    
    return view('appView.index',$data);
    }
    
    public function randomView(){
        return view('appView.random');
    }
    
    public function create(){
        return view('appView.create');
    }


    public function ran(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < 1; $i++)  {
            $account = new account;
            $randomString = '';
            for ($j = rand(30, 140); $j <= 140; $j++)  {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $hashtag = Hashtag::find(rand(1,5));
            $account->message = $randomString . $hashtag->hashtag ;
            $account->save();
        }
        return redirect()->route('appView.index')->with('success',"account has been create");;
    }

    

    public function createHashtag(Request $request){
        $request->validate([
            'hashtag' => 'required',
        ]);
        $hashtag = new Hashtag;
        $request->hashtag = strtoupper($request->hashtag);
        $hashtag->hashtag = $request->hashtag;
        $hashtag->save();
        return redirect()->route('appView.index')->with('success',"account has been create");;
    }
}
