<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Total;
use App\Transfer;

class IndexController extends Controller
{
  public function front(){
    $totals = Total::findOrFail('1');
    $transfer = Transfer::where('status','0')
                -> sum('nominal');
    $totalDb = $totals -> nominal;
    $unAprove = $transfer;
    $realTotal = $totalDb - $unAprove;
    $rank = Transfer::selectRaw('sum(nominal) as sum, user_id')
                   -> where('status','=', '1')
                   -> groupBy('user_id')
                   -> orderBy('sum', 'desc')
                   -> take(3)
                   -> get();

    return view('index', compact('realTotal', 'rank'));
  }
}
