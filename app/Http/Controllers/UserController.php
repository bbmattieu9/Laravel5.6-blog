<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;

class UserController extends Controller
{

  public function __construct()
  {
    return $this->middleware('auth');
  }

    public function profile()
    {
      return view('user.profile');
    }

    public function updateUser(Request $request)
    {
      //Pass in Update Data
    }
}
