@extends('master')

@section('main')
<div class="container">
   <div class="row">
    <div class="col-md-12 ">
        <a href="{{ url('barang') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
    </div>
    <div class="col-md-12 mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('barang') }}">Barang</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
        </ol>
    </nav>
    </div>
    <div id="popUpModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

      <!-- Modal content-->
        <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title"></h5>
              </div>
                <div class="modal-body">
                  <div class="frm-edit">
                  {{Form::open(['url' => 'updatess', 'files' => 'true'])}}
                      <div class="form-group" style="padding-bottom: 20px !important;">
                      <div class="form-group">
                            <h5>Status</h5>
                            <input type="hidden" name="ids" class="idx">
                            {{Form::text('status',null,['class' => 'form-control status'])}}
                          </div>
                      </div>
            <div class="form-group" style="padding-bottom: 20px !important;">
            <div class="row justify-content-around">
            <div class="col-6">
                <button type="submit" class="btn btn-success btn-sm btn-block">Save</button>
              </div>
              {{Form::close()}}
              <div class="col-6">
                <button type="button" class="btn btn-danger btn-sm btn-block" data-dismiss="modal">Cancel</button>
              </div>
            </div>
            </div>
          </div>
                   <div class="modal-footer">
                   </div>
                </div>
              </div>
             </div>
          </div>
        </div>
    </div>
  </div>
</div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <h3><i class="fa fa-history"> Laporan Pesanan User</i></h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Handphone</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Jumlah Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($pesanan as $pesanan)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $pesanan->name}}</td>
                        <td>{{ $pesanan->alamat}}</td>
                        <td>{{ $pesanan->nohp}}</td>
                        <td>{{ $pesanan->tanggal }}</td>
                        <td>
                            @if($pesanan->status == 1)
                            Sudah Pesan & Belum Dibayar
                            @else
                            Sudah Dibayar & Barang Segera Dikirim
                            @endif
                        </td>
                        <td>Rp. {{ number_format($pesanan->jumlah_harga + $pesanan->kode) }}</td>
                        <td>
                            <a href="{{ url('history') }}/{{ $pesanan->id }}" class="btn btn-primary"><i class="fa fa-info"></i> Detail</a>
                            <button class="btn btn-success far fa-edit btn-sm btn-ubah" status="{{$pesanan->status}}"  idx="{{$pesanan->id}}"></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
   </div>
</div>
</div>
@endsection

@section('script')
<script type="text/javascript" > 
    $('.btn-ubah').on('click', function(){
    $('#popUpModal').modal('show');
    $('.status').val($(this).attr('status'));
    $('.idx').val($(this).attr('idx'));
    $('.frm-edit').show();
    $('.frm-hapus').hide();
  })
</script>
@yield('script')
@endsection