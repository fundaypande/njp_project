<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transfer;
use App\User;
use Auth;

class TransferController extends Controller
{
    public function show(){
      return view('sidebar.transfer_uang');
    }

    public function store(Request $request){
      $nominal = $request -> nominal;
      $nominal = str_replace('.','',$nominal);
      $this -> validate($request, [
              'nominal' => 'required|min:3|max:12',
              'bank' => 'required',
              'keterangan' => 'required|min:3'
            ]);
        $quotes = Transfer::create([
                'nominal' => $nominal,
                'bank' => $request -> bank,
                'keterangan' => $request -> keterangan,
                'status' => '0',
                'user_id' => Auth::user()->id
        ]);
        return redirect('/transfer')->with('msg', 'Berhasil memasukkan data transfer harap lakukan konfirmasi ke super admin');

    }
}
