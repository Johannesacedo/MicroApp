<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

 
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        return view('profile');
    }

    function updateInformation(Request $request){

        $validator=\Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            $query=User::find(Auth::user()->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);
            if(!$query){
                return response()->json(['status'=>0,'msg'=>'Something went wrong']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your profile is updated successfully !']);
            }
        }

    }
}
