<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware("user-access");
    }


    //home user
    public function index() {

        return view("index");
    }
    //admin home
}
