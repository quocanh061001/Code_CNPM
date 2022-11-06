@extends('admin.main')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection

@section('content')
<form action="{{ url('admin/products/add') }}" enctype="multipart/form-data" method="POST">
  @csrf
  <div class="card-body">
    <div class="form-group">
      <label for="name">Tên sản phẩm</label>
      <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm">
    </div>
    
    <div class="form-group">
      <label for="giaban">Giá sản phẩm</label>
      <input type="text" name="giaban" class="form-control" placeholder="Nhập giá sản phẩm">
    </div>

    <div class="form-group">
      <label for="image_path">Ảnh đại diện</label>
      <input type="file" name="image_path" class="form-control-file" placeholder="Nhập giá">
    </div>

    <div class="form-group">
      <label for="image_path">Chi tiết ảnh</label>
      <input type="file" multiple name="image_detail[]" class="form-control-file" placeholder="Nhập giá">
    </div>

    <div class="form-group">
      <label>Thương hiệu</label>
      <br>
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="mathuonghieu">
        <option value="0">chọn thương hiệu cha</option>
        {!! $htmlOption !!}
      </select>
    </div>

    <div class="form-group">
      <label>Nhập mô tả</label>
      <textarea name="contents" class="form-control" rows="5"></textarea>
    </div>

    <div class="form-group">
      <label>Chi tiết sản phẩm</label>
      <textarea name="chitietsp" class="form-control" rows="5"></textarea>
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
  </div>

</form>
@endsection