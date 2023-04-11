<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\CurrantSurvey;
use App\Models\Sms;
use App\Models\Survey;
use App\Models\Transaction;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index(){




      $users=User::count();
      $clients=Client::count();
      $sms=Sms::count();
      $transactions=Transaction::count();



      return view("dashboard",compact('users','clients','transactions','sms'));

  }
}
