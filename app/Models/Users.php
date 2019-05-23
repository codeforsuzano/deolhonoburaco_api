<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Support\Facades\Hash;
use App\User;

class Users extends Model implements Authenticatable
{
    //
    use AuthenticableTrait;
    protected $fillable = ['username', 'email', 'password', 'userimage'];
    protected $hidden = [
        'password'
    ];
    /*
       * Get Todo of User
       *
       */
    public function todo()
    {
        return $this->hasMany('App\Todo', 'user_id');
    }

    public function login($request)
    {
      $user = Users::where('email', $request->input('email'))->first();
      if (Hash::check($request->input('password'), $user->password)) {
          $apikey = base64_encode(str_random(40));
          Users::where('email', $request->input('email'))->update(['token' => "$apikey"]);
          $users = User::select('id', 'name', 'email')->where('email',$request->input('email'))->get();
          return response()->json(
              [
                  'token' => $apikey,
                  'user' => $users
              ]
          );
      } else {
          return response()->json(['status' => 'fail'], 401);
      }
    }

    public function newuser($request)
    {
      return User::create([
          'name'     => $request->name,
          'email'    => $request->email,
          'password' => app('hash')->make($request->password),
          'token'  => base64_encode(str_random(40))
      ]);
    }
}
