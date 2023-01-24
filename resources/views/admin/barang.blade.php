@extends('master')
@section('main')
<div class="container">
<div class="container-fluid">
<div class="col-md-12">
        <div class="card mt-2">
            <div class="card-body mb-3">
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
                  {{Form::open(['url' => 'updates', 'files' => 'true'])}}
                      <div class="form-group" style="padding-bottom: 20px !important;">
                      <div class="form-group">
                        <h5>Nama Barang</h5>
                            <input type="hidden" name="ids" class="idx">
                              {{Form::text('nama_barang',null,['class' => 'form-control nama_barang'])}}
                      </div>
                        <h4>Image</h4>
                      <div class="form-group">
              
                <table>
                  <tr>
                    <td><img src="" id="img" class="image" style="height: 160px; width: 140px; background-color: #ccc; border: 2px solid gray;">
                      <input type="file" name="image" id="photo" style="display: none;">
                        <input type="hidden"  name="old_logo" class="image">
                    </td>
                  </tr>
                  <tr>
                    <td><input type="button" name="" value="Browse" id="klikfoto" class="btn-success form-control"></td>
                  </tr>
                </table>
              </div>
              <div class="form-group">
                            <h5>Stok</h5>
                            <input type="hidden" name="ids" class="idx">
                            {{Form::number('stok',null,['class' => 'form-control stok'])}}
                          </div>
                          <div class="form-group">
                            <h5>Harga(Rp)</h5>
                            <input type="hidden" name="ids" class="idx">
                            {{Form::number('harga',null,['class' => 'form-control harga'])}}
                      </div>
                      <div class="form-group">
                            <h5>Keterangan</h5>
                            <input type="hidden" name="ids" class="idx">
                            {{Form::textarea('keterangan',null,['class' => 'form-control keterangan'])}}
                          </div>
                      </div>
      <div class="form-group" style="padding-bottom: 20px !important;">
          <div class="row justify-content-around">
            <div class="col-6">
                <button type="submit" class="btn btn-success btn-sm btn-block">Simpan</button>
              </div>
              {{Form::close()}}
              <div class="col-6">
                <button type="button" class="btn btn-danger btn-sm btn-block" data-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
      </div>
          
        <div class="frm-hapus">
            <h5 align="center">Apakah anda yakin ingin menghapus data ini ?</h5>
            <br>
            <div class="form-group" style="padding-bottom: 20x !important;">
           
            <div class="row justify-content-around">
            <div class="col-6">
                {{Form::open(['url' => 'delete'])}}
                <input type="hidden" name="id" class="idnya">
                <button type="submit" class="btn btn-danger btn-sm btn-block">Konfirmasi</button>
                {{Form::close()}}
              </div>
              <div class="col-6">
                <button type="button" class="btn btn-success btn-sm btn-block" data-dismiss="modal">Batal</button>
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
<div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <form class="" action="{{ route('barang.store') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                          <label for="">Nama Barang</label>
                          <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan nama barang">
                        </div>  
                        <h4></h4>
                          <div class="form-group">
                            <table>
                                <tr>
                                    <td><img src="" id="img2" class="img2" style="height: 160px; width: 140px; background-color: #ccc; border: 2px solid gray;">
                                    <input type="file" name="image" id="photo2" style="display: none;">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="button" name="" value="Browse" id="klikfoto2" class="btn-success form-control"></td>
                                </tr>
                            </table>
                          </div>
                        <div class="form-group">
                          <label for="">Harga</label>
                          <input type="number" class="form-control" name="harga" placeholder="Masukan Harga barang">
                        </div>
                        <div class="form-group">
                          <label for="">stok</label>
                          <input type="number" class="form-control" name="stok" placeholder="Masukkan Stok Barang">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Keterangan</label>
                              <textarea class="form-control" name="keterangan" rows="3"></textarea>
                        </div>
                       <div class="form-group">
                         <input type="submit" value="save" class="btn btn-primary">
                      </div>
                  </form>
              </div>
          </div>
        </div>
     </div>
     </div>
     </div>
    </div>
<table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Gambar</th>
      <th scope="col">Harga</th>
      <th scope="col">Stok</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Edit</th>
      <th scope="col">Hapus</th>
    </tr>
  </thead>
  <tbody>
  @if (!empty($data))
  @foreach($data as $table)
    <tr>
      <th scope="row">{{$table->id}}</th>
      <td>{{$table->nama_barang}}</td>
      <td>{{$table->image}}</td>
      <td>{{$table->harga}}</td>
      <td>{{$table->stok}}</td>
      <td>{{$table->keterangan}}</td>
      <td><button class="btn btn-success far fa-edit btn-sm btn-ubah" nama_barang="{{$table->nama_barang}}" image="{{$table->image}}" stok="{{$table->stok}}" harga="{{$table->harga}}" keterangan="{{$table->keterangan}}" idx="{{$table->id}}"></button></td>
      <td><button class="btn btn-danger  fas fa-trash-alt btn-sm btn-apus" value="{{$table->id}}"></button></td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
@endsection
@section('script')
<script type="text/javascript">
  $('.btn-ubah').on('click', function(){
    var imagename = $(this).attr('image');
    var image = 'uploads/'+imagename;
    $('#popUpModal').modal('show');
    $('.stok').val($(this).attr('stok'));
    $('#img').attr('src', image);
    $('.image').val($(this).attr('image'));
    $('.nama_barang').val($(this).attr('nama_barang'));
    $('.harga').val($(this).attr('harga'));
    $('.keterangan').val($(this).attr('keterangan'));
    $('.idx').val($(this).attr('idx'));
    $('.frm-edit').show();
    $('.frm-hapus').hide();
  })
  $('.btn-apus').on('click',function(){
    $('#popUpModal').modal('show');
    $('.frm-hapus').show();
    $('.frm-edit').hide();
    $('.idnya').val($(this).val());
  })
  $('#klikfoto').on('click', function(e){
    $('#photo').click();
  })
  $('#photo').on('change', function(e){
    var fileInput = this;
    if (fileInput.files[0])
    {
       var reader = new FileReader();
       reader.onload=function(e)
       {
        $('#img').attr('src', e.target.result);
       }
       reader.readAsDataURL(fileInput.files[0]);

    }
  })
  $('#klikfoto2').on('click', function(e){
    $('#photo2').click();
  })
  $('#photo2').on('change', function(e){
    var fileInput = this;
    if (fileInput.files[0])
    {
       var reader = new FileReader();
       reader.onload=function(e)
       {
        $('#img2').attr('src', e.target.result);
       }
       reader.readAsDataURL(fileInput.files[0]);

    }
  })
</script>
@yield('script')

@endsection