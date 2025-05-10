@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);
<div class="body"></div>
<div class="grad"></div>

<div class="header">
    <div class="title">THÔNG TIN NGƯỜI DÙNG</div>
</div>
</div>

<div class="login">
    @if(Session::get('login_publisher'))
        <input type="text" value="👨‍💻 Tên người dùng: {{ Session::get('username') ?? 'Chưa có tên người dùng' }}" readonly>
        <input type="text" value="🧑‍💼 Họ và tên: {{ Session::get('fullname') ?? 'Chưa có họ và tên' }}" readonly>
        <input type="text" value="📞 Số điện thoại: {{ Session::get('sdt') ?? 'Chưa có số điện thoại' }}" readonly>
        <input type="text" value="📧 Email: {{ Session::get('email_publisher') ?? 'Chưa có email' }}" readonly>
        <input type="text" value="📅 Ngày đăng ký: {{ \Carbon\Carbon::parse(Session::get('date_created'))->format('d-m-Y') ?? 'Chưa có ngày đăng ký' }}" readonly>
        <a href="javascript:history.back()" class="btn-back">Quay lại</a>

    @else
        <input type="text" value="Chưa đăng nhập!" readonly>
    @endif
</div>

<style>
    html, body {
        margin: 0;
        padding: 0;
        background: #fff;
        color: #fff;
        font-family: Arial;
        font-size: 12px;
        overflow: hidden; /* ✅ Không cho cuộn trang */
        height: 100%;
    }

    .body {
        position: absolute;
        top: -20px;
        left: -20px;
        right: -40px;
        bottom: -40px;
        width: auto;
        height: auto;
        background-image: url('/images/abcs.jpg');
        background-size: cover;
        background-position: center;
        -webkit-filter: blur(5px);
        z-index: 0;
    }

    .grad {
        position: absolute;
        top: -20px;
        left: -20px;
        right: -40px;
        bottom: -40px;
        width: auto;
        height: auto;
        background: -webkit-gradient(linear, left top, left bottom,
            color-stop(0%, rgba(0, 0, 0, 0)),
            color-stop(100%, rgba(0, 0, 0, 0.65)));
        z-index: 1;
        opacity: 0.7;
    }

    .header {
        position: absolute;
        top: calc(50% - 220px);
        left: calc(50% - 255px);
        z-index: 2;
    }

    .header div {
        float: left;
        color: #fff;
        font-family: 'Exo', sans-serif;
        font-size: 35px;
        font-weight: 200;
    }

    .header div span {
        color: #5379fa !important;
    }

    .login {
        position: absolute;
        top: calc(50% - 100px);
        left: calc(50% - 175px);
        width: 350px;
        padding: 20px;
        z-index: 2;
    }

    .login input[type=text] {
        width: 100%;
        height: 35px;
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 4px;
        color: #fff;
        font-family: 'Exo', sans-serif;
        font-size: 15px;
        font-weight: 400;
        padding: 5px 10px;
        margin-top: 10px;
    }

    .login input[type=text]:focus {
        outline: none;
        border: 1px solid rgba(255, 255, 255, 0.9);
    }
    .title {
    text-align: center;
    font-size: 42px;
    font-weight: 700;
    font-family: 'Source Sans Pro', sans-serif;
    letter-spacing: 1.5px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    background: linear-gradient(to right, #e0fffc, #fff6d1, #ffd6fa); /* xanh băng - vàng nhạt - hồng nhạt */
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}


    ::-webkit-input-placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    ::-moz-input-placeholder {
        color: rgba(255, 255, 255, 0.6);
    }
    
    .btn-back {
    display: inline-block;
    padding: 10px 24px;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    border: none;
    border-radius: 5px;
    text-align: center;
    text-decoration: none;
    font-family: 'Exo', sans-serif; /* Giữ phông chữ giống các phần khác */
    letter-spacing: 1px; /* Thêm khoảng cách chữ để đẹp hơn */
    transition: all 0.3s ease;
    cursor: pointer;
    margin-top: 10px; /* Tăng khoảng cách giữa nút và các phần tử phía trên */
    border: 1px solid; /* Thêm viền màu xanh với độ dày 2px */

}

.btn-back:hover {
    background-color: #84b1ff;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.btn-back:active {
    background-color: #5379fa;
    transform: translateY(2px);
    box-shadow: none;
}

</style>
