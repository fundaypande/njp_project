<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tarik;
use App\Transfer;

class LaporanController extends Controller
{

  public function transfer(){
    $transfers = Transfer::where('status', '1')
          -> paginate(10);
    return view('show_transfer', compact('transfers'));
  }

  public function tarik(){
    $tariks = Tarik::paginate(10);

    return view('show_tarik', compact('tariks'));
  }

  public function rank(){
    $users = Transfer::selectRaw('sum(nominal) as sum, user_id')
                   -> where('status','=', '1')
                   -> groupBy('user_id')
                   -> orderBy('sum', 'desc')

                   -> paginate(10);

    return view('show_rank', compact('users'));
  }


}
