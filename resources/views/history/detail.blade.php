@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
    <div class="col-md-12 ">
        <a href="{{ url('history') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
    </div>
    <div class="col-md-12 mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('history') }}">Riwayat Pemesanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
        </ol>
    </nav>
    </div>
    <div class="col-md-12">
        <div class="card mt-2">
            <div class="card-body">
                <h3>Sukses Check Out</h3>
                <h5>Harap melakukan pembayaran. Silahkan transfer ke <strong>ATM BCA atas nama Satria Pamungkas.</strong></h5>
                <h6>* Provence Store hanya menggunakan ATM BCA untuk melakukan transaksi</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
            <h3><i class="fa fa-shopping-cart"> Detail Pemesanan</i></h3>
            @if(!empty($pesanan))
            <p align="right">Tanggal Pesan :{{ $pesanan->tanggal }}</p>
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; ?>
                @foreach($pesanan_details as $pesanan_detail)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                    <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->image }}" width="100" alt="...">
                    </td>
                    <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                    <td>{{ $pesanan_detail->jumlah }}</td>
                    <td align="left">Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                    <td align="left">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4" align="left"><strong>Total Harga :</strong></td>
                    <td><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4" align="left"><strong>Kode Unik :</strong></td>
                    <td><strong>Rp. {{ number_format($pesanan->kode) }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4" align="left"><strong>Total yang harus dibayar :</strong></td>
                    <td><strong>Rp. {{ number_format($pesanan->kode + $pesanan->jumlah_harga) }}</strong></td>
                </tr>
            </tbody>
        </table>
        @endif
        <br>
        <h6 align="center"><strong>Harap lakukan pembayaran & kirimkan bukti transfer melalui email atau whatsapp</strong></h6>
        <br>
        <h6 align="center"><i class="fa fa-envelope-square"> satriapamungkas280@gmail.com</i></h6>
        <div align="center">
            <a href="https://wa.me/6282195215162"><i class="fab fa-whatsapp">  082195215162</i></a>
        </div>
            </div>
        </div>
    </div>
   </div>
</div>
@endsection