<?php

namespace App\Http\Controllers;
use App\Barang;
use SweetAlert;
use Illuminate\Http\Request;

class barangcontroller extends Controller
{
    public function index() {
        $data = Barang::all();
        return view('admin.barang', compact('data'));
    } 

    public function delete(Request $id)
    {
        $delete = barang::where('id', $id->id);
        $delete->delete();
        return redirect('barang');
    }

         public function update(Request $r)
    {
      if ($r->hasFile('image')) {
        $destinationPath="uploads";
        $file = $r->image;
        $extension = $file->getClientOriginalExtension();
        $fileName = 'Provence-'.rand(11111,99999).'.'.$extension;
        $file->move($destinationPath,$fileName);
        if ($r->old_logo == '') {
        }else{
          unlink($destinationPath.'/'.$r->old_logo);
        }
        $oldgambar = $fileName;
      }else{
        $oldgambar = $r->old_logo;
      }

        $data = array(
        'nama_barang' => $r->nama_barang,
        'image' => $oldgambar,
        'stok' => $r->stok,
        'harga' => $r->harga,
        'keterangan' => $r->keterangan);
        barang::where('id',$r->ids)->update($data);
        return redirect('barang');
     }

     public function store(Request $r)
    {
      
        $data = new Barang();

      $destinationPath="uploads";
      $file = $r->image;
      $extension = $file->getClientOriginalExtension();
      $fileName = 'Provence-'.rand(11111,99999).'.'.$extension;
      $file->move($destinationPath,$fileName);

      $data->image = $fileName;
      $data->nama_barang = $r->nama_barang;
      $data->stok = $r->stok;
      $data->harga = $r->harga;
      $data->keterangan = $r->keterangan;
      $data->save();
      return redirect()->back();
    }

}
