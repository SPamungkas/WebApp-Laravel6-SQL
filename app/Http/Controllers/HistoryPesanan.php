<?php

namespace App\Http\Controllers;
use App\Barang;
use App\Pesanan;
use App\User;
use App\PesananDetail;
use Auth;
use Illuminate\Http\Request;

class HistoryPesanan extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pesanan = User::join('pesanans', 'users.id', '=', 'pesanans.user_id')
                    ->join('pesanan_details', 'pesanans.id', '=', 'pesanan_details.pesanan_id')
                    ->get();
        return view('admin.history', compact('pesanan'));

        $data = User::paginate(20);
        $data = pesanans::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();
        return view('admin.history',compact('data')); 
    }

    public function delete(Request $id)
    {
        $delete = User::where('id', $id->id);
        $delete->delete();
        return redirect('HistoryPesanan');
    }

        public function update(Request $r)
    {

        $data = array(
        'status' => $r->status);
        Pesanan::where('id',$r->ids)->update($data);
        return redirect('HistoryPesanan');
     }

     public function detail($id)
    {
        $data['pesanans'] = pesanan::where('id', $id)->first();
        $data['pesanan_details'] = pesanandetails::where('pesanan_id', $data['pesanans']->id)->get();

        return view('admin.detailadmin', $data);
    }
}
