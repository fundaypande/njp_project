<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarik;

class TarikController extends Controller
{
  public function showCreate(){
    return view('sidebar.tarik_uang');
  }

  public function show(){
    $tariks = Tarik::paginate(10);

    return view('super_admin.tarik.kelola_tarik', compact('tariks'));
  }

  public function store(Request $request){
    $nominal = $request -> nominal;
    $nominal = str_replace('.','',$nominal);
    $this -> validate($request, [
            'nominal' => 'required|min:3|max:12',
            'keterangan' => 'required'
          ]);
      $tarik = Tarik::create([
              'nominal' => $nominal,
              'keterangan' => $request -> keterangan,
              'tujuan' => $request -> tujuan
      ]);
      return redirect('/tarik')->with('msg', 'Berhasil menarik uang sebesar Rp.' . $nominal);
  }

  public function update(Request $request, $id){
    $tarik = Tarik::findOrFail($id);

    $nominal = $request -> nominal;
    $nominal = str_replace('.','',$nominal);
    $this -> validate($request, [
            'nominal' => 'required|min:3|max:12',
            'tujuan' => 'required|min:3',
            'keterangan' => 'required|min:3'
          ]);
    $tarik -> update([
      'nominal' => $nominal,
      'tujuan' => $request -> tujuan,
      'keterangan' => $request -> keterangan
    ]);

    return redirect('kelola/tarik')->with('msg', 'Data penarikan Berhasil Diedit');

  }

  public function destroy($id){
    $tarik = Tarik::findOrFail($id);
        $tarik -> delete();
      return redirect('kelola/tarik')->with('msg', 'Data penarikan berhasil di hapus');
  }
}
