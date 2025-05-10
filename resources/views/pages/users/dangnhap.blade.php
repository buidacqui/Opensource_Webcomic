@extends('../layoutdangnhap')

@section('content')
<style>
  * {
    font-family: -apple-system, BlinkMacSystemFont, "San Francisco", Helvetica, Arial, sans-serif;
    margin: 0;
    box-sizing: border-box;
  }

  body, html {
    height: 100vh;
    background: #f3f2f2;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .session {
    display: flex;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    overflow: hidden;
    width: 700px;
    max-width: 95%;
  }

  .left {
    background-color: #b69de6;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50%;
    padding: 40px;
  }

  .left svg {
    width: 100%;
    height: auto;
    max-width: 200px;
  }

  form {
    padding: 40px 30px;
    width: 50%;
    display: flex;
    flex-direction: column;
  }

  h4 {
    font-size: 24px;
    margin-bottom: 10px;
    font-weight: 600;
    color: #333;
  }

  label {
    margin-top: 15px;
    font-size: 13px;
    color: #555;
  }

  input[type="text"],
  input[type="password"] {
    border: none;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    padding: 12px 8px;
    font-size: 16px;
    background: transparent;
    outline: none;
    transition: border-color 0.3s;
  }

  input:focus {
    border-color: #b69de6;
  }

  .form-check {
    margin-top: 15px;
  }

  button {
    margin-top: 25px;
    padding: 12px;
    background-color: #b69de6;
    color: white;
    border: none;
    border-radius: 24px;
    font-weight: 500;
    cursor: pointer;
    transition: 0.3s ease;
  }

  button:hover {
    transform: translateY(-2px);
    box-shadow: 0 3px 6px rgba(182, 157, 230, 0.4);
  }

  .alert {
    margin-top: 10px;
  }
</style>

<div class="session">
  <div class="left">
    <svg enable-background="new 0 0 300 302.5" viewBox="0 0 300 302.5" xmlns="http://www.w3.org/2000/svg">
      <style>.st01{fill:#fff;}</style>
      <path class="st01" d="m126 302.2c-2.3 0.7-5.7 0.2-7.7-1.2l-105-71.6c-2-1.3-3.7-4.4-3.9-6.7l-9.4-126.7c-0.2-2.4 1.1-5.6 2.8-7.2l93.2-86.4c1.7-1.6 5.1-2.6 7.4-2.3l125.6 18.9c2.3 0.4 5.2 2.3 6.4 4.4l63.5 110.1c1.2 2 1.4 5.5 0.6 7.7l-46.4 118.3c-0.9 2.2-3.4 4.6-5.7 5.3l-121.4 37.4z"/>
    </svg>
  </div>

  <form method="POST" action="{{ route('login-publisher') }}">
    @csrf
    <h4>Đăng nhập</h4>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
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

    <label for="username">Tên đăng nhập</label>
    <input type="text" name="username" id="username" placeholder="Nhập tên đăng nhập" required>

    <label for="password">Mật khẩu</label>
    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" required>

    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="remember" name="remember">
      <label class="form-check-label" for="remember">Nhớ mật khẩu</label>
    </div>

    <button type="submit">Đăng nhập</button>
  </form>
</div>
@endsection
