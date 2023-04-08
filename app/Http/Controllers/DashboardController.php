<?php

namespace App\Http\Controllers;

use App\Models\CurrantSurvey;
use App\Models\Survey;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index(){




      $users_count=User::count();




      return view("dashboard",compact('users_count'));

  }
}
