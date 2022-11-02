@extends('admin.main')

@section('content')
<form action="{{ url('admin/thuonghieu/update/' . $thuonghieu->id) }}" method="POST">
 
  <div class="card-body">
    <div class="form-group">
      <label for="thuonghieu">Tên thương hiệu</label>
      <input type="text" name="thuonghieu" class="form-control" id="thuonghieu" placeholder="Nhập tên thương hiệu" value="{{ $thuonghieu['tenthuonghieu'] }}">
    </div>

    <div class="form-group">
      <label>Thương hiệu cha</label>
      <br>
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="parent_Id">
        <option value="0">chọn thương hiệu cha</option>
        {!! $htmlOption !!}
      </select>
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Chỉnh sửa thương hiệu</button>
  </div>
  @csrf
</form>
@endsection