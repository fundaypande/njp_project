<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Total;
use App\Transfer;
use App\Tarik;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totals = Total::findOrFail('1');
        $transfer = Transfer::where('status','0')
                    -> sum('nominal');
        $totalDb = $totals -> nominal;
        $unAprove = $transfer;
        $realTotal = $totalDb - $unAprove;

        $tanggal = getDate();

        $allTransfer = Transfer::whereYear('created_at', $tanggal['year'])
                        -> where('status', '1')
                        ->paginate(7);

        $allTarik = Tarik::whereYear('created_at', $tanggal['year'])
                        ->paginate(7);
        $trans = Transfer::distinct()->get(['user_id']);
        $rank = Transfer::selectRaw('sum(nominal) as sum, user_id')
                       -> where('status','=', '1')
                       -> groupBy('user_id')
                       -> orderBy('sum', 'desc')
                       -> get();
        //dd($rank);

        return view('home', compact('realTotal', 'allTransfer', 'allTarik', 'trans', 'rank'));
    }

    public function pieData(){
      //$transfer = Transfer::select('SELECT sum(nominal), user_id FROM transfers WHERE status = 1 GROUP BY user_id');
      $transfer = Transfer::selectRaw('sum(nominal) as sum')
                     -> where('status','=', '1')
                     -> groupBy('user_id')
                     -> get();

                     //buka json
      $json  = '{"member": [';
      // bikin looping untuk data array yang di fetch
      foreach ($transfer as $key => $value) {
        $json .= $value -> sum.',';
      }

      // untuk menghilangkan koma diakhir array
      $json = substr($json,0,strlen($json)-1);

      //lengkapi penutup format JSON
      $json .= ']}';
    echo $json;
    }

}
