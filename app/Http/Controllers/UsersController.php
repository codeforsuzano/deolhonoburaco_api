<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Users;
use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        //  $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = Users::where('email', $request->input('email'))->first();
        if (Hash::check($request->input('password'), $user->password)) {
            $apikey = base64_encode(str_random(40));
            Users::where('email', $request->input('email'))->update(['api_key' => "$apikey"]);
            $users = User::select('id', 'name', 'email')->where('email',$request->input('email'))->get();
            return response()->json(
                [
                    'api_key' => $apikey,
                    'user' => $users
                ]
            );
        } else {
            return response()->json(['status' => 'fail'], 401);
        }
    }

    public function test()
    {
        return 'ovo';
    }
}
