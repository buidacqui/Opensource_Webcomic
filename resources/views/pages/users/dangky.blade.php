@extends('../layout')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Đăng ký khách hàng</li>
  </ol>
</nav>

<div class="addthis_inline_share_toolbox"></div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('status'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('status') }}
                        </div>  
                    @endif
<form method="POST" action="{{ route('register-publisher') }}">
  @csrf
  <div class="form-group">
    <label for="fullname">Họ và tên</label>
    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Nhập họ tên">
  </div>

  <div class="form-group">
    <label for="username">Tên đăng nhập</label>
    <input type="text" name="username" class="form-control" id="username" placeholder="Tên đăng nhập">
  </div>

  <div class="form-group">
    <label for="sdt">Số điện thoại</label>
    <input type="text" name="sdt" class="form-control" id="sdt" placeholder="Số điện thoại">
  </div>

  <div class="form-group">
    <label for="email_address">Email</label>
    <input type="email" name="email" class="form-control" id="email_address" placeholder="Email">
  </div>

  <div class="form-group">
    <label for="password">Mật khẩu</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Mật khẩu">
  </div>
  <div class="form-group">
    <label for="password">Xác nhận mật khẩu</label>
    <input type="password" name="password_confirmation" class="form-control" id="password" placeholder="Mật khẩu">
  </div>

  <div class="form-check mb-3">
    <input type="checkbox" class="form-check-input" id="remember">
    <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
  </div>

  <button type="submit" class="btn btn-primary">Đăng ký</button>
</form>

@endsection
