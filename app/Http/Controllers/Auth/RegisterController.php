<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    

    use RegistersUsers;

    
    protected $redirectTo = RouteServiceProvider::HOME;

    
    public function __construct()
    {
        $this->middleware('guest');
    }
   
    function register(Request $request){
        
        $request->validate([
            'name'=>['required','string','max:255'],
            'email'=>['required','string','email','max:255','unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);

         /** make avatar */
       $path ="users/images/";
       $fontPath = public_path('fonts/Oliciy.ttf');
       $char = strtoupper($request->name[0]);
       $newAvatarName = rand(12,34353).time().'_avatar.png';
       $dest = $path.$newAvatarName;

       $createAvatar = makeAvatar($fontPath,$dest,$char);
       $picture = $createAvatar ==true? $newAvatarName:'';


       $user = new user();
       $user->name=$request->name;
       $user->email=$request->email;
       $user->password=\Hash::make($request['password']);
       $user->picture=$picture;
       
       if($user->save()){
           return redirect()->back()->with('success','You are now successfully registered!');
       }else{
        return redirect()->back()->with('error','Failed to Register');
       }

    }
   
   
}
