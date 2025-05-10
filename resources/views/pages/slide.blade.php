<!-- Nhúng Google Font độc lạ (Orbitron + Pacifico) -->
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&family=Pacifico&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Exo:wght@100&display=swap" rel="stylesheet">

<style>
    /* Thêm font chữ Exo mảnh hơn vào */
    @import url('https://fonts.googleapis.com/css2?family=Exo:wght@100&display=swap');

    .highlight-heading {
        font-family: 'Exo', sans-serif; /* Đảm bảo dùng font Exo */
        font-weight: 600; /* Font chữ mảnh */
        font-size: 32px; /* Tùy chỉnh kích thước chữ nếu cần */
        letter-spacing: 1px; /* Tùy chỉnh khoảng cách chữ */
        color: #333; /* Tùy chỉnh màu chữ */
        margin-top: 25px; /* Giảm khoảng cách dưới tiêu đề */
    }

    .custom-heading {
        font-family: 'Orbitron', sans-serif;
        color: #3b82f6; /* Tailwind màu xanh primary */
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        letter-spacing: 1px;
        font-size: 2rem;
        position: relative;
        display: inline-block;
        animation: pulse-text 2s infinite;
    }

    @keyframes pulse-text {
        0% { transform: scale(1); color: #3b82f6; }
        50% { transform: scale(1.05); color: #2563eb; }
        100% { transform: scale(1); color: #3b82f6; }
    }

    /* Thêm chữ "Mới" lên trên góc bên trái của div chứa truyện */
    .new-label {
        position: absolute;
        top: 10px;
        left: 10px;
        padding: 5px 10px;
        background-color: red; /* Đổi màu nền thành đỏ */
        color: #fff;
        font-weight: bold;
        font-size: 16px;
        border-radius: 5px;
        text-transform: uppercase;
        letter-spacing: 1px;
        z-index: 10; /* Đảm bảo chữ "Mới" luôn hiển thị trên ảnh */
    }

    .owl-carousel .item {
        padding: 0 10px;
        position: relative; /* Để căn chỉnh chữ "Mới" bên ngoài thẻ card */
    }

    .card {
    position: relative; /* Để các badge như "Mới" nằm bên trong */
    border-radius: 12px;
    overflow: hidden;
    background-color: #fff;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid rgb(20, 9, 46);
}

    .card:hover img {
        transform: scale(1.05);
    }

    .card-body {
        padding: 15px;
    }

    .btn-warning:hover {
        background-color: #f39c12;
    }
</style>

<h3 class="highlight-heading text-center mb-4">TRUYỆN NỔI BẬT</h3>

<div class="owl-carousel owl-theme mt-4">
    @foreach ($truyen as $truyen)
        <div class="item px-3">
            <div class="card h-100 shadow-sm position-relative">
                <span class="badge bg-danger position-absolute" style="top:10px; left:10px; z-index: 10;">HOT</span>

                <img loading="lazy" src="{{ asset('public/uploads/truyen/' . $truyen->hinhanh) }}" 
                     class="card-img-top" alt="{{ $truyen->tentruyen }}" 
                     style="height: 200px; object-fit: cover; transition: transform 0.3s;">
                     
                <div class="card-body text-center">
                <h5 class="card-title text-truncate" style="font-size: 1.1rem; font-family: 'Exo', sans-serif;">{{ $truyen->tentruyen }}</h5>
                <a class="btn btn-warning btn-sm" href="{{ url('xem-truyen/' . $truyen->slug_truyen) }}">Đọc ngay</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

