<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use App\Http\Requests;
use App\User;
use App\Demo;
use Validator;
use Session;
use Input;
class UserController extends Controller
{
    public function Login_Post(Request $request){
        if($request->ajax()){
            $message=[
                'email.required'=> 'Email Or Username Field Is Required.'
            ];
            $this->validate($request,[
                'email' => 'required',
                'password' => 'required|min:4',
            ],$message);
            $email = $request->input('email');
            $password = $request->input('password');
            if(!Auth::attempt(['email'=>$email,'password'=>$password],$request->has('remember'))){
                return response()->json(['error'=>'Email or password not true'],422);
            }
        }
    }

    public function Register(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                'first_name' => 'required',
                'last_name' => 'required',
                'last_name_initial' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zip_code' => 'required|numeric',
                'country' => 'required',
                'username' => 'required',
                'pass_register' => 'required|min:4',
                'email_register' => 'required|email',
            ]);

            $user = new User;
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->last_name_initial = $request->input('last_name_initial');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->zip_code = $request->input('zip_code');
            $user->country = $request->input('country');
            $user->username = $request->input('username');
            $user->password = bcrypt($request->input('pass_register'));
            $user->email = $request->input('email_register');
            $user->remember_token = $request->input('token');
            $user->upline_email_address = $request->input('upline_email_register');
            $user->bitcoin = $request->input('bitcoin');
            $user->ip_address = $request->input('ip_address');
            $user->save();
            return response()->json(['success'=>'Congratulation ,register member successful !'],200);
        }
    }


}
