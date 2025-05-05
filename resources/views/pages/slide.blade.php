<!-- Nhúng Google Font độc lạ (Orbitron + Pacifico) -->
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&family=Pacifico&display=swap" rel="stylesheet">

<h3 class="custom-heading text-center mb-4">📚 TRUYỆN HAY NÊN ĐỌC</h3>

<style>
  .custom-heading {
    font-family: 'Orbitron', sans-serif;
    color: #3b82f6; /* Tailwind màu xanh primary */
    text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
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
</style>

<div class="owl-carousel owl-theme mt-4">
    <div class="item px-3">
        <div class="card h-100 shadow-sm border-0">
            <img loading="lazy" src="{{asset('public/uploads/truyen/ali-baba59.jpg')}}" 
                 class="card-img-top" alt="Ali Baba và 40 tên cướp" 
                 style="height: 200px; object-fit: cover; transition: transform 0.3s;">
            <div class="card-body text-center">
                <h5 class="card-title text-truncate" style="font-size: 1.1rem;">Ali Baba và 40 tên cướp</h5>
                <p class="card-text text-muted mb-2"><i class="fas fa-eye"></i> 999K+ lượt xem</p>
                <a class="btn btn-warning btn-sm" href="#" style="transition: background-color 0.3s;">Đọc ngay</a>
            </div>
        </div>
    </div>

    <!-- Thêm nhiều item theo cấu trúc tương tự -->
    <div class="item px-3">
        <div class="card h-100 shadow-sm border-0">
            <img loading="lazy" src="{{asset('public/uploads/truyen/ali-baba59.jpg')}}" 
                 class="card-img-top" alt="Truyện huyền bí" 
                 style="height: 200px; object-fit: cover; transition: transform 0.3s;">
            <div class="card-body text-center">
                <h5 class="card-title text-truncate" style="font-size: 1.1rem;">Truyện huyền bí</h5>
                <p class="card-text text-muted mb-2"><i class="fas fa-eye"></i> 888K+ lượt xem</p>
                <a class="btn btn-warning btn-sm" href="#" style="transition: background-color 0.3s;">Đọc ngay</a>
            </div>
        </div>
    </div>

    <div class="item px-3">
        <div class="card h-100 shadow-sm border-0">
            <img loading="lazy" src="{{asset('public/uploads/truyen/ali-baba59.jpg')}}" 
                 class="card-img-top" alt="Truyện ma kinh dị" 
                 style="height: 200px; object-fit: cover; transition: transform 0.3s;">
            <div class="card-body text-center">
                <h5 class="card-title text-truncate" style="font-size: 1.1rem;">Truyện ma kinh dị</h5>
                <p class="card-text text-muted mb-2"><i class="fas fa-eye"></i> 750K+ lượt xem</p>
                <a class="btn btn-warning btn-sm" href="#" style="transition: background-color 0.3s;">Đọc ngay</a>
            </div>
        </div>
    </div>

    <!-- Thêm nhiều item khác nếu cần -->
</div>

<!-- CSS -->
<style>
    .owl-carousel .item {
        padding: 0 10px;
    }

    .card {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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
