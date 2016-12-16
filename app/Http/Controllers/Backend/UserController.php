<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use App\Http\Requests;
use Validator;
use Session;
use App\User;
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
            $remember = $request->input('remember');
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
            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');
            $last_name_initial = $request->input('last_name_initial');
            $city = $request->input('city');
            $state = $request->input('state');
            $zip_code = $request->input('zip_code');
            $country = $request->input('country');
            $username = $request->input('username');
            $pass_register = $request->input('pass_register');
            $email_register = $request->input('email_register');
            $token = $request->input('token');
            $user = new User();
            $user->first_name = $first_name;
            $user->last_name = $last_name;
            $user->last_name_initial = $last_name_initial;
            $user->city = $city;
            $user->state = $state;
            $user->zip_code = $zip_code;
            $user->country = $country;
            $user->username = $username;
            $user->pass_register = bcrypt($pass_register);
            $user->email_register = $email_register;
            $user->remember_token = $token;
            // $user->save();
            return response()->json(['success'=>'Congratulation ,register member successful !'],200);
        }
    }


}
