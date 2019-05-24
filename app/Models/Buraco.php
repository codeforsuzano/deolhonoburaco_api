<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buraco extends BaseModel
{
    use SoftDeletes;

    public function cadastro($request)
    {
        if($request->photo){
            // $img_name = date("HisdmY");
            // $request->file('photo')->move('img/buracos', "$img_name.jpeg");

            define('UPLOAD_DIR', 'img/buracos/');
            $image_parts = explode(";base64,", $request->photo);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file_name = UPLOAD_DIR . uniqid() . '.jpeg';
            file_put_contents($file_name, $image_base64);
        } else {
            $file_name = null;
        }

        Buraco::create([
            'street' => $request->street,
            'photo' => $file_name,
        ]);
    }
}
