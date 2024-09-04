<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function uploadFile($file, $folder)
    {
        $extension  = $file->getClientOriginalExtension();
        $filename = rand(0, 999) . now()->timestamp . '.' . $extension;
        $file->move('upload/' . $folder, $filename);
        return 'upload/' . $folder . '/' . $filename;
    }
}
