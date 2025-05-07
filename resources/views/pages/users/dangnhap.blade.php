@extends('../layout')

@section('slide')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Đăng nhập khách hàng</li></li>
  </ol>
</nav>
<div class="addthis_inline_share_toolbox"></div>
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Tên đăng nhập</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password"class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Dont forget</label>
  </div>
  <button type="submit" class="btn btn-primary">Đăng nhập</button>
</form>


@endsection

