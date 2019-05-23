<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buraco extends BaseModel
{
    use SoftDeletes;
    
    public function cadastro($request)
    {
        if($request->photo){
            $img_name = date("HisdmY");
            $request->file('photo')->move('img/buracos', "$img_name.jpeg");
        } else {
            $img_name = 'semnome';
        }

        Buraco::create([
            'street' => $request->street,
            'photo' => $img_name . '.jpeg',
        ]);
    }
}
