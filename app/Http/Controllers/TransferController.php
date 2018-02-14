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

    // update status transfer dengan ajax
    public function updateStatus(Request $request, $id, $stat){
      $transfer = Transfer::findOrFail($id);
      $status = 1;
      if($stat == "aprove")
          $status = 0;
          $transfer -> update([
            'status' => $status
          ]);

          return redirect('kelola/transfer')->with('msg', 'Data Berhasil Diedit');
    }

    //update seluruh data transfer_uang
    public function update(Request $request, $id){
      $transfer = Transfer::findOrFail($id);

      $nominal = $request -> nominal;
      $nominal = str_replace('.','',$nominal);
      $this -> validate($request, [
              'nominal' => 'required|min:3|max:12',
              'bank' => 'required',
              'keterangan' => 'required|min:3'
            ]);
      $transfer -> update([
        'nominal' => $nominal,
        'bank' => $request -> bank,
        'keterangan' => $request -> keterangan
      ]);

      return redirect('kelola/transfer')->with('msg', 'Data Berhasil Diedit');

    }

    public function showTable(){
      $transfersUnaprove = Transfer::where('status', '0')
            -> get();
      $transfersAprove = Transfer::where('status', '1')
            -> paginate(10);
      return view('super_admin.transfer.kelola_transfer', compact('transfersUnaprove', 'transfersAprove'));
    }

    public function destroy($id){
      $comment = Transfer::findOrFail($id);
          $comment -> delete();
        return redirect('kelola/transfer')->with('msg', 'Data transfer berhasil di hapus');
    }


}
