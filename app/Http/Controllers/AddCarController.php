<?php

//namespace App\Http\Controllers;

//use Illuminate\Http\Request;

//class AddCarController extends Controller
//{
   // public function show(){

    //    return view("show data");
        
       //}
    //}
    
  
  
    
  
    namespace App\Http\Controllers;
      
    use Illuminate\Http\Request;
      
    class AddCarController extends Controller
    {
        /**
         * Write code on Method
         *
         * @return response()
         */
        public function index(Request $request)
        {
            $data = $request->all();
            
            if (isset($data["published"])) {
                $data["published"] = "published";
            } else {
                $data["published"] = "not published";
            }
            return view('showData', $data);
        }
    }