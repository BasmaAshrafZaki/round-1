<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\mailsendController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MailController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// مذاكره
////Route::get('user/{username}',function($username){
//return 'username of user is' .$username;
//});

//Route::get('user/{username}/{age}',function($username,$age){
//return 'username is'. $username .'age is' .$age ;
//});

// Route::get('user/{username}/{age?}',function($username,$age=0){
// if($age==0){
//     return 'username of user is'.$username;
// }
// else{ return 'username is'.$username . 'age is'.$age ;}
// });

// Route::get('user/{username}/{age?}',function($username,$age=0){
//     $msg='the username is :'.$username;
//     if($age>0){
//     $msg.=' the age is :'.$age;
//     }
//     return $msg;
//     })->whereNumber('age'); 

    // Route::get('user/{username}/{age?}',function($username,$age=0){
    //     $msg='the username is :'.$username;
    //     if($age>0){
    //     $msg.=' the age is :'.$age;
    //     }
    //     return $msg;
    //     })->whereAlpha('username') ; 

    // Route::get('user/{username}/{age?}',function($username,$age=0){
    //     $msg='the username is :'.$username;
    //     if($age>0){
    //     $msg.=' the age is :'.$age;
    //     }
    //     return $msg;
    //     })->whereIn('username',['Basma','Ashraf']);
    
   
    // Route::get('user/{username}/{age?}',function($username,$age=0){
    //         $msg='the username is :'.$username;
    //         if($age>0){
    //         $msg.=' the age is :'.$age;
    //         }
    //         return $msg;
    //         })->where(['username'=>'[a-zA-Z]+','age'=>'[0-9]+']);

  
    // Route::get('user/{username}/{age?}',function($username,$age=0){
    //     $msg='the username is :'.$username;
    //     if($age>0){
    //     $msg.=' the age is :'.$age;
    //     }
    //     return $msg;
    //     })->where(['age'=>'[0-9]+']) ;







            

//Route::get('about', function () {
//    return 'About page';
//});
//
//Route::get('contact-us', function () {
//    return 'Contact US page';
//});
//
//Route::prefix('support')->group(function () {
//   Route::get('/', function () {
//       return 'Support Home page';
//   });
//
//   Route::get('chat', function () {
//      return 'Chat page';
//   });
//
//    Route::get('call', function () {
//        return 'Call page';
//    });
//
//    Route::get('ticket', function () {
//        return 'Ticket page';
//    });
//});
//
//Route::prefix('training')->group(function () {
//    Route::get('/', function () {
//        return 'Training Home page';
//    });
//
//    Route::get('ict', function () {
//        return 'ICT page';
//    });
//
//    Route::get('hr', function () {
//        return 'HR page';
//    });
//
//    Route::get('marketing', function () {
//        return 'Marketing page';
//    });
//
//    Route::get('logistics', function () {
//        return 'Logistics page';
//    });
//});

//Route::fallback(function () {
//   return redirect('/');
//});


Route::get('cv', function () {
   return view('cv');
});

Route::get('login', function () {
    return view('login');
});

Route::post('receive', function () {
    return "data received";
})->name('receive');

Route::get('test', [ExampleController::class, 'test']);

//Route::get('add-car', [CarController::class, 'add_car']);
//Route::post('car-added', [CarController::class, 'added'])->name('car-added');
//
//Route::get('car-added', fn() => redirect('add-car'));

Route::get('add-car', [CarsController::class, 'create']);
Route::post('car-added', [CarsController::class, 'store'])->name('car-added');
Route::get('car-index', [CarsController::class, 'index']);
Route::get('edit-car/{id}', [CarsController::class, 'edit']);
Route::put('update-car/{id}', [CarsController::class, 'update'])->name('update-car');

Route::get('create-news', [NewsController::class, 'create']);
Route::post('store-news', [NewsController::class, 'store'])->name('store-news');


Route::get('News', [NewsController::class, 'index']);
Route::get('edit-News/{News_id}',[NewsController::class,'edit']);

Route::put('update-News/{News_id}',[NewsController::class,'update'])->name('update-News');

Route::put('updateCar/{id}',[CarsController::class,'update'])->name('updateCar');

Route::get('delete-News/{News_id}',[NewsController::class,'destroy']);


//Route::get('Show-News/{News_id}',[NewsController::class,'Show']);
Route::get(' NewsDetails/{id}', [NewsController::class, 'show'])->name('Show');
Route::get('CarDetails/{id}', [CarsController::class, 'show'])->name('Show');

Route::get('Trashed',[NewsController::class,'Trashed']);
Route::get('Newsrestore/{id}',[NewsController::class,'restore']);
Route::get('forceDel/{id}',[NewsController::class,'forceDeleted']);

Route::get('delete-Cars/{id}',[CarsController::class,'destroy']);
Route::get('TrashedCars',[CarsController::class,'Trashed']);
Route::get('Carsrestore/{id}',[CarsController::class,'restore']);
Route::get('forceDelete/{id}',[CarsController::class,'forceDeleted']);

Route::get('ShowUpload',[ExampleController::class,'ShowUpload']);
Route::post('Upload',[ExampleController::class,'Upload'])->name('Upload');

Route::get('Place',[ExampleController::class,'Place']);

Route::get('blog',[ExampleController::class,'blog']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes(['verify'=>true]);


Route::post('sendmail',[mailsendController::class,'send'])->name('sendmail');
Route::get('ContactUs', [mailsendController::class, 'create']);

Route::get('car-index', [CarsController::class, 'index'])->middleware('verified');

Route::get('Session',[ExampleController::class,'mySession']);

// use App\Http\Middleware\Authenticate;
 
// Route::get('/profile', function () {
    
// })->middleware(Authenticate::class);

// Route::get('/', function () {
//     // ...
// })->middleware([First::class, Second::class]);

// Route::get('/profile', function () {
//     // ...
// })->middleware('auth');

// use App\Http\Middleware\EnsureTokenIsValid;
 
// Route::withoutMiddleware([EnsureTokenIsValid::class])->group(function () {
//     Route::get('/profile', function () {
//         // ...
//     });
// });

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        Route::get('ContactUs',[mailsendController::class,'create']);
        Route::post(' reciveContact', [NewsController::class, 'reciveContact'])->name('reciveContact');
        Route::get('add-car', [CarsController::class, 'create']);
        Route::post('car-added', [CarsController::class, 'store'])->name('car-added');
    
    });
