<?php
use App\Transfer;
use App\Http\Controllers\Controller;

  function rupiah($angka){
    $hasil_rupiah = number_format($angka,0,',','.');
    return $hasil_rupiah;
  }

  function hasTransfer($id){
    $user = Transfer::where('user_id',$id)->get();
    if($user ->first())
      return 1;
    return 0;
  }

 ?>
