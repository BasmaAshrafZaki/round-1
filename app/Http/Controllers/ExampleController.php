<?php

namespace App\Http\Controllers;
use App\Traits\Common;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    use Common;


    //
    // public function test() {
    //     return view('login');
    // }
public function ShowUpload() {
        return view('Upload');
}
public function blog() {
    return view('blog');
}      



public function artical() {
    return view('artical');
}   
        public function Upload(Request $request) {

            // $file_extension = $request->image->getClientOriginalExtension();
            // $file_name = time() . '.' . $file_extension;
            // $path = 'Assets/Images';
            // $request->image->move($path, $file_name);
            // return 'Uploaded';

            // return dd('$request->Images');
            $filename = $this->uploadFile($request->image ,'Assets/Images' );
            return $filename;
}
}
// database, view, routes
