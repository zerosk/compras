<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Vista principal de admin
     * 
     */

     public function show()
     {
         return view('theme.backoffice.pages.admin.show');
     }
}
