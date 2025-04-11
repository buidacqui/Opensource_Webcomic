@extends('../layout')
{{--- @section('slide')
@include('pages.slide')
@endsection---}}
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-9">
    <div class="col-md-3">
    <img class="card-img-top" src="{{asset('public/uploads/truyen/ali-baba59.jpg')}}" alt="Card image">

    </div>
    <div class="col-md-9">
        <div class="row">
            <style type="text/css">
                .infotruyen{list-style:none;}
            </style>
        <ul class="infotruyen">
            <li>
                Tác giả : Yokoshima
            </li>
            <li>
                Thể loại : Cổ tích
            </li>
            <li>
            Số chapter:200
            </li>
            <li>
                Số lượt xem: 2000
            </li>
            <li>
                <a href="#">Xem mục lục</a>
            </li>
            <li>
                <a href="#" class="btn btn-primary">Đọc Online</a>
            </li>
        </ul>
    </div>
    </div>
    <div class="col-md-12">
        <p>"Alibaba và 40 tên cướp" là một câu chuyện cổ tích nổi tiếng nằm trong tập truyện "Nghìn lẻ một đêm". Câu chuyện kể về Alibaba, một tiều phu nghèo vô tình phát hiện ra hang động bí mật của 40 tên cướp chứa đầy vàng bạc châu báu. Với câu thần chú "Vừng ơi, mở ra!", anh có thể vào được hang động. Tuy nhiên, khi bí mật bị lộ, Alibaba phải đối mặt với sự trả thù tàn nhẫn từ bọn cướp. Nhờ vào sự thông minh và dũng cảm của cô hầu gái Morgiana, Alibaba thoát khỏi hiểm nguy và bảo vệ được kho báu.</p>
    </div>
    <hr>
    <h4>Mục lục</h4>
    <ul class="mucluctruyen">
            <li>
                <a href="">Phần thứ nhất - Chương một</a>
            </li>
            <li>
                <a href="">Phần thứ nhất - Chương một</a>
            </li>
            <li>
                <a href="">Phần thứ nhất - Chương một</a>
            </li>
            <li>
                <a href="">Phần thứ nhất - Chương một</a>
            </li>
            <li>
                <a href="">Phần thứ nhất - Chương một</a>
            </li>
            <li>
                <a href="">Phần thứ nhất - Chương một</a>
            </li>
            <li>
                <a href="">Phần thứ nhất - Chương một</a>
            </li>
            <li>
                <a href="">Phần thứ nhất - Chương một</a>
            </li>
            <li>
                <a href="">Phần thứ nhất - Chương một</a>
            </li>
        </ul>
        <h4>Sách cùng danh mục</h4>
        <div class="row">
        <div class="col-md-3">
      <div class="card mb-3 box-shadow">
        <a href="">
        <img class="card-img-top" src="{{asset('public/uploads/truyen/ali-baba59.jpg')}}" alt="Card image">
        <div class="card-body">
          <h5 class="card-title">Card 1 Title</h5>
          <p class="card-text">Some supporting text for card 1.</p>
        </div>
        
      </div>
      </a>
    </div>
    <div class="col-md-3">
      <div class="card mb-3 box-shadow">
        <a href="">
        <img class="card-img-top" src="{{asset('public/uploads/truyen/ali-baba59.jpg')}}" alt="Card image">
        <div class="card-body">
          <h5 class="card-title">Card 1 Title</h5>
          <p class="card-text">Some supporting text for card 1.</p>
        </div>
        
      </div>
      </a>
    </div> <div class="col-md-3">
      <div class="card mb-3 box-shadow">
        <a href="">
        <img class="card-img-top" src="{{asset('public/uploads/truyen/ali-baba59.jpg')}}" alt="Card image">
        <div class="card-body">
          <h5 class="card-title">Card 1 Title</h5>
          <p class="card-text">Some supporting text for card 1.</p>
        </div>
        
      </div>
      </a>
    </div> <div class="col-md-3">
      <div class="card mb-3 box-shadow">
        <a href="">
        <img class="card-img-top" src="{{asset('public/uploads/truyen/ali-baba59.jpg')}}" alt="Card image">
        <div class="card-body">
          <h5 class="card-title">Card 1 Title</h5>
          <p class="card-text">Some supporting text for card 1.</p>
        </div>
        
      </div>
      </a>
    </div>

        </div>
  </div>
  <div class="col-md-3">
    <h3>Sách hay xem nhiều</h3>
  </div>
</div>

@endsection