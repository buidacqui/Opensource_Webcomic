@extends('../layout')

@section('slide')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Yêu thích</li></li>
  </ol>
</nav>
<div class="addthis_inline_share_toolbox"></div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên truyện</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Tên người dùng</th>
      <th scope="col">Quản lý</th>

    </tr>
  </thead>
  <tbody>
    @foreach($favourites as $key=> $favo)
    <tr>
      <th scope="row">{{$key}}</th>
      <td>{{$favo->title}}</td>
      <td><img class="card-img-top" width="40px"src="{{asset('public/uploads/truyen/'.$favo->image)}}"></td>
      <td>{{$favo->publisher->username}}</td>
    <td>
        <a href="{{route('xoayeuthich',[$favo->id])}}" class="btn btn-danger btn-small">Xóa</a>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection

