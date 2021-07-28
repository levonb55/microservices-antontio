<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageUploadRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function upload(ImageUploadRequest $request)
    {
        $file = $request->file('image');
        $name = Str::random(10);
        $url = Storage::putFileAs('public/images', $file, $name . '.' . $file->extension());

        return [
            'url' => str_replace('public', '/storage', $url)
        ];
    }
}
