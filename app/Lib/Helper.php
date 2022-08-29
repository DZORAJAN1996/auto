<?php


namespace App\Lib;
use File;

class Helper
{
    public static function upload($file,$oldFile = null,$path = 'uploads'){
        $fileName = uniqid();
        $fileName = $fileName.'.'.$file->extension();
        $file->move(public_path($path), $fileName);
        if(!is_null($oldFile)){
            if (File::exists(public_path('uploads/'.$oldFile))) {
                File::delete(public_path('uploads/'.$oldFile));
            }
        }
        return $fileName;
    }
}
