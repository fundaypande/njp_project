<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
  public function show(){
    $users = User::paginate(10);

    return view('super_admin.user.kelola_user', compact('users'));
  }
}
