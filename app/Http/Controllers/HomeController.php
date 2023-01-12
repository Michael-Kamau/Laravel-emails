<?php

namespace App\Http\Controllers;

use App\Mail\ReplyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function index()
    {

        return view('welcome');
    }

}
