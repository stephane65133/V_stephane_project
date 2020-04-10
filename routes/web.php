<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/about', function () {
   /* $data = [
        'name'=>'stephane tamafo',
        'lastname'=>'tamafo'
    ]; 
    ====================================================================
    =                    la fonction compact                           =
    ====================================================================*/

    $name = 'stephane tamafo';
    $lastname = 'tamafo';

    



    //premiere methode

    /*$view= view('pages.about'); 
    $view->name='stephane';
    return $view;*/

    /*==================================================================================================
      =                                    Deuxieme methode                                            =
      ==================================================================================================
      
       $name ='stephane';
    $lastname ='tamafo';

    return view('pages/about',[
        'name'=>$name,
        'lastname'=>$lastname
    ]);
      */

   /* 
      ===================================================================================================
      =                                      Troisieme methode                                          =
      ===================================================================================================
      */

   //   return view('pages/about',$data);
  // return view('pages/about',compact('name','lastname'));
  $jour = date('N')>5;
  //dd($jour);
  return view('pages/about')->withName('stephane')->withDate($jour);
});

Route::get('/help', function () {
    return view('pages.help');
});


Route::get('/event', function () {
    $tab=[
        'Make php',
        'php conference',
        'Stephane',
        'Laravel',
    ];
    return view('event.index',compact('tab'));
});



