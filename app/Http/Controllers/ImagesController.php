<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;

class ImagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function processImage() {
        Image::configure(array('driver' => 'gd'));

        $image = Image::make(Input::file('image')->getRealPath())->pixelate(12)->text('Superhero Cheesecake', 0, 0, function($font) {
            $font->file('JosefinSans-Bold.ttf');
            $font->size(50);
            $font->color('#ff0000');
            $font->align('center');
            $font->valign('center');
            $font->angle(90);
        });;

        $image->save();

        return $image->response('png');
    }
}
