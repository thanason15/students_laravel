<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
// {
//     //
//     public function index(){
//         return 'this is a controller';
//     }
// }

{
    //
    // public function __invoke(){
    //     return view('index', ['name'=>'Thanason']);
    // }

     public function index(){
        return view('index', ['name'=>'Thanason']);
    }

}
