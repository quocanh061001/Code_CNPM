@extends('admin.main')


@section('content')
<form action="" method="POST">
  <div class="card-body">
    <div class="form-group">
      <label for="thuonghieu">Tên thương hiệu</label>
      <input type="text" name="thuonghieu" class="form-control" id="thuonghieu" placeholder="Nhập tên thương hiệu">
    </div>
  
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Thêm thương hiệu</button>
  </div>
  @csrf
</form>
@endsection