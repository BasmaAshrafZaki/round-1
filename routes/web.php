<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ExampleController;
use App\Http\Controllers\AddCarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// بحدد مسار للمستخدم

//Route::get('test', function () {
   // return 'welcome to my first route';
//});
// ببعت هنا parameter
//  المستخدم هيدخل على لينك اسمه يوزر وهيكتب حاجه مش عارف اي هى اعتبر اسمها نيم ف ابعتلى واطبع الكلمه +اللى هو كتبه

// Route::get('user/{name}', function ($name) {
//     return 'the username is' . $name;
// });

//Route::get('user/{name}/{ege}', function ($name,$ege) {
  //  return 'the username is :' . $name . 'and age is' . $ege ;
//});
// لو عايز العمر يكون اخيارى يعتى مش لازم يدخله

//Route::get('user/{name}/{age?}', function ($name,$age=0) {
    //if($age!==0)
   // {
    //    return 'the name is :' . $name . ' "<br>"and age is :' . $age ;

   // }else{
     //   return 'the username is :' . $name ;
   // }
   
//});
// لو عايز العمر يكون اخيارى يعتى مش لازم يدخله
// بطريقه كود اسهل واقصر وبيسمح انه يدخل العمر او لا بطريقه اسهل
//Route::get ('user/{name}/{age?}',function($name,$age=0){
   // $msg = 'the username is : ' . $name;
    //if($age > 0){
     //   $msg .= ' and age is: ' . $age ;
    //}
   // return $msg ;
//});
// لا تقبل العمر الا بقيمه رقميه
//Route::get ('user/{name}/{age?}',function($name,$age=0){
  //  $msg = 'the username is : ' . $name;
   // if($age > 0){
   //     $msg .= ' and age is: ' . $age ;
   // }
   // return $msg ;
//})->where(['age'=> '[0-9]+']);

//Route::get ('user/{name}/{age?}',function($name,$age=0){
  //  $msg = 'the username is : ' . $name;
  // if($age > 0){
    //   $msg .= ' and age is: ' . $age ;
   // }
  // return $msg ;
//})->whereNumber('age');

//Route::get ('user/{name}/{age?}',function($name,$age=0){
   // $msg = 'the username is : ' . $name;
  // if($age > 0){
    //   $msg .= ' and age is: ' . $age ;
    //}
  // return $msg ;
//})->whereAlpha('name');


//Route::get ('user/{name}/{age?}',function($name,$age=0){
  //  $msg = 'the username is : ' . $name;
   //if($age > 0){
   //    $msg .= ' and age is: ' . $age ;
   // }
  // return $msg ;
   // بيسمح ادخل الاسم به ارقام
//})->where(['age'=>'[0-9]+', 'name'=>'[a-zA-Z0-9]+']);
//->whereAlphaNumeric('name');

//Route::get ('user/{name}/{age?}',function($name,$age=0){
  //  $msg = 'the username is : ' . $name;
  // if($age > 0){
    //   $msg .= ' and age is: ' . $age ;
    //}
  // return $msg ;
//})->whereIn('name',['Basma', 'Ashraf']);


//Route::prefix('product')->group(function () {
    //Route::get('/', function(){

    //return 'product home page';
    //});
       // Route::get('laptop', function(){
        //return 'laptop page';
        //});
      //  Route::get('camera', function(){
          //  return 'camera page';
           // });
          //  Route::get('projector', function(){
            //    return 'projector page';
             //   });
            //});

            
//Route::prefix('Support')->group(function () {
   // Route::get('/', function(){

   // return 'Support home page';
   // });
      //  Route::get('Chat', function(){
       // return 'Chat page';
       // });
       // Route::get('Call ', function(){
          //  return 'Call page';
           // });
           // Route::get('Ticket', function(){
             //   return 'Ticket page';
               // });
          //  });

                        
//Route::prefix('Training')->group(function () {
 // Route::get('/', function(){

  //return 'Training home page';
  //});
    //  Route::get('HR', function(){
     // return 'HR page';
      //});
     // Route::get('ICT', function(){
      //    return 'ICT page';
       //   });
        //  Route::get('Marketing', function(){
          //    return 'Marketing page';
          //    });
           //   Route::get('Logistics', function(){
            //    return 'Logistics page';
            //    });


      //    });
        //  Route::get('About', function () {
          //  return 'welcome to About';
       // });

       // Route::get('Contact us', function () {
        //  return ' Contact us';
      //});

      //Route::fallback(function() {
       // return redirect('/');
      //  });

     // Route::get('cv', function(){
      //return view('cv');
        //});

        //Route::get('login', function(){
           // return view('login');
           // });

          // Route::post('receive', function() {
          //  return 'data received' ;
          //  })->name('receive');


            //Route::get('test1', [exampleController::class, 
            //'test1']);

           

      Route::get('AddCar', function(){
        return view('AddCar');
      });

        // Route::post('receive', function() {
        //    return 'ShowData' ;
        //    })->name('ShowData');

    
      
              // Route::post('receive', function() {
              //    return 'Show' ;
              //    });
      Route::post('show', [AddCarController::class, 'index'])->name('Show');