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

        $image = Image::make(Input::file('image')->getRealPath())->blur(15)->colorize(-10, 0, 30)->text('Superhero Cheesecake', 220, 220, function($font) {
            $font->file('fonts/JosefinSans-Bold.ttf');
            $font->size(50);
            $font->color(array(139, 0, 0, 0.5));
            $font->align('center');
            $font->valign('center');
            $font->angle(45);
        });;

        $image->save();

        return $image->response('png');
    }
}
