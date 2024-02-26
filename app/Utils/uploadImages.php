<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadImages
{

   public static function uploadImage($image, $path, $imgName = null)
   {
      if (!$imgName) {
         $imgName = Str::uuid() . '.' . $image->getClientOriginalExtension();
      }
      Storage::disk('images')->putFileAs($path, $image, $imgName);
      return $imgName;
   }
}
