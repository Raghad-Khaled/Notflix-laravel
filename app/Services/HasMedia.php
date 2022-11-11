<?php

namespace App\Services;

class HasMedia
{
    public static function upload($image,$path)
    {
        $imageName=$image->hashName();
        $image->move($path,$imageName);
        
        return $imageName;
    }

    public static function delete($path)
    {
        if(file_exists($path)){ //delete old image
            unlink($path);
            return true;
        }

        return false;
    }
    
}
