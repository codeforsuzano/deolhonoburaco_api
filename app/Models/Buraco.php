<?php

namespace App\Models;

class Buraco extends BaseModel
{
    public function cadastro($request)
    {
        if($request->photo){

            $name = time() . '.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[0])[0];
            $namephoto = $name . 'png';
            \Image::make($request->photo)->save(public_path('img/buracos/').$name. 'png');

        } else {
            $namephoto = null;
        }
        Buraco::create([
            'street' => $request->street,
            'photo' => $namephoto,
        ]);
    }
}