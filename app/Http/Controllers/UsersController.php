<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller
{
    private $user;

    public function __construct(Users $userModel)
    {
        $this->user = $userModel;
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

      return $this->user->login($request);
    }

    public function newuser(Request $request)
    {
      $this->user->newuser($request);
    }
}
