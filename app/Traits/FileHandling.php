<?php

namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait FileHandling {

    public static function storeFile( $file, $directory = 'unknown' ) {

        if( $file ) {
            //return $request->file($fieldname)->store('images/' . $directory, 'public');

            $destinationPath = 'public/images/' . $directory . '/';
            $fileName = $file->getClientOriginalName();
            $filenameCover = time() . "post";
            // $file->move(public_path() . $destinationPath, $filenameCover);
            // Storage::disk('local')->put($filenameCover, $destinationPath);
            Storage::putFileAs($destinationPath,$file, $filenameCover);
            $url = Storage::url($destinationPath.$filenameCover);
            // return $destinationPath . $filenameCover;
            return $url;
        }

        return null;

    }

}
