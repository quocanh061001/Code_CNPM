@extends('admin.main')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Giá bán</th>
      <th scope="col">Ảnh</th>
      <th scope="col">thương hiệu</th>  
      <th scope="col">Action</th>
    
    </tr>
  </thead>
  <tbody>

    {{-- @foreach ($thuonghieu as $item)
    <tr>
      <th scope="row">{{ $item->id }}</th>
      <td>{{ $item->tenthuonghieu }}</td>
      <td>
        <a href="{{ url('admin/thuonghieu/edit/' . $item->id) }}" class="btn btn-default">Edit</a>
        <a href="{{ url('admin/thuonghieu/delete/' . $item->id) }}" class="btn btn-danger">Delete</a>
      </td>
    
    </tr>
    @endforeach --}}

 
  </tbody>
</table>

@endsection