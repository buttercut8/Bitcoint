<?php
namespace App\Http\Controllers\Fontend;
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
    public function Login(){
        return view('Backend.Users.login');
    }

    public function Dashboard(){
        return view('Backend.Users.dashboard');
    }




}
