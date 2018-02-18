<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Token;
use Auth;
use App\Transfer;
use Validator;

class UserController extends Controller
{
    public function show(){
      $users = User::paginate(10);
      $trans = Transfer::distinct()->groupBy('user_id')->get();

      return view('super_admin.user.kelola_user', compact('users', 'trans'));
    }

    public function showPass(){
      return view('auth.passwords.reset');
    }

    public function updatePass(Request $request){
      $id = Auth::User() -> id;
      $user = User::findOrFail($id);
      $token = Token::findOrFail('1');

      if($request -> njp == $token -> token){
        $user -> update([
          'password' => bcrypt($request -> password)
        ]);
        Auth::logout();
      }
      return redirect('/login')->with('msg','Password berhasil dirubah silahkan login kemabli');

    }

    public function profile($id = null){
      $idSum = null;
      if($id == null){
        $users = User::findOrFail(Auth::User() -> id);
        $idSum = Auth::User() -> id;
      } else {
        $users = User::findOrFail($id);
        $idSum = $id;
      }
      $total = Transfer::where([
                ['user_id', $idSum],
                ['status', '1'],
              ])->sum('nominal');

      return view('user.profile', compact('users', 'total'));
    }

    public function update(Request $request, $id){
      $user = User::findOrFail($id);

      $this -> validate($request, [
              'name' => 'required|min:3',
              'realemail' => 'required|min:3|email',
            ]);
      if(Auth::User() -> id == $user -> id){
        $user -> update([
          'name' => $request -> name,
          'realemail' => $request -> realemail,
        ]);
      } else abort(404);


      return redirect('profile')->with('msg', 'Data Profile Berhasil Diedit');

    }

    public function updatePic(Request $request, $id)
    {
      $this -> validate($request, [
              'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

      $user = User::findOrFail($id);

        $input = $request->gambar;
        $input = time().'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move('gambar/', $input);

        $oldPic = $user -> gambar;
        if($oldPic != null){
          $image_path = 'gambar/'.$oldPic;
          if(file_exists($image_path)){
              unlink($image_path);//unlink untuk menghapus foto lama pada saat proses create and store
          }
        }

        $user -> update([
          'gambar' => $input,
        ]);

      return redirect('profile')->with('msg', 'Berhasil ubah foto profile');
      //return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function destroy($id){
      $user = User::findOrFail($id);
          $user -> delete();
        return redirect('kelola/user')->with('msg', 'Data user berhasil di hapus');
    }
}
