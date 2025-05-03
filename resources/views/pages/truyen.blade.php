@extends('../layout')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="{{ url('danh-muc/' . $truyen->danhmuctruyen->slug_danhmuc) }}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$truyen->tentruyen}}</li>
  </ol>
</nav>

<div class="row">
    <!-- Thông tin truyện -->
    <div class="col-md-9">
        <div class="row">
            <!-- Ảnh truyện -->
            <div class="col-md-4">
                <img class="img-fluid rounded shadow" src="{{ asset('public/uploads/truyen/' . $truyen->hinhanh) }}" alt="{{ $truyen->tentruyen }}">
            </div>

            <!-- Thông tin truyện -->
            <div class="col-md-8">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Tên:</strong> {{ $truyen->tentruyen }}</li>
                    <li class="list-group-item"><strong>Tác giả:</strong> {{ $truyen->tacgia }}</li>
                    <li class="list-group-item"><strong>Danh mục:</strong> <a href="{{ url('danh-muc/' . $truyen->danhmuctruyen->slug_danhmuc) }}">{{ $truyen->danhmuctruyen->tendanhmuc }}</a></li>
                    <li class="list-group-item"><strong>Thể loại:</strong> <a href="{{ url('the-loai/' . $truyen->theloai->slug_theloai) }}">{{ $truyen->theloai->tentheloai }}</a></li>
                    <li class="list-group-item"><strong>Số chapter:</strong> 2000</li>
                    <li class="list-group-item"><strong>Số lượt xem:</strong> 2000</li>
                    <li class="list-group-item"><a href="#">Xem mục lục</a></li>
                    @if($chapter_dau)
                        <li class="list-group-item">
                            <a href="{{ url('xem-chapter/' . $chapter_dau->slug_chapter) }}" class="btn btn-primary btn-block">Đọc Online</a>
                        </li>
                    @else
                        <li class="list-group-item">
                            <a class="btn btn-danger btn-block">Hiện tại chưa có chương để đọc</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        <!-- Tóm tắt truyện -->
        <div class="col-md-12 mt-4">
            <h5>Tóm tắt truyện:</h5>
            <p>{!! $truyen->tomtat !!}</p>
        </div>

        <hr>

        <!-- Từ khóa tìm kiếm -->
        <div class="col-md-12">
            <h5>Từ khóa tìm kiếm:</h5>
            @php
                $tukhoa = explode(",", $truyen->tukhoa);
            @endphp
            <div class="tagcloud05">
                <ul class="list-inline">
                    @foreach($tukhoa as $tu)
                        <li class="list-inline-item">
                            <a href="{{ url('tag/' . \Str::slug($tu)) }}" class="badge badge-primary">{{ $tu }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Mục lục -->
        <div class="col-md-12 mt-4">
            <h4>Mục lục</h4>
            <ul class="list-group">
                @php
                    $mucluc = count($chapter);
                @endphp
                @if($mucluc > 0)
                    @foreach($chapter as $chap)
                        <li class="list-group-item"><a href="{{ url('xem-chapter/' . $chap->slug_chapter) }}">{{ $chap->tieude }}</a></li>
                    @endforeach
                @else
                    <li class="list-group-item">Đang cập nhật....</li>
                @endif
            </ul>
        </div>

        <!-- Sách cùng danh mục -->
        <div class="col-md-12 mt-4">
            <h4>Sách cùng danh mục</h4>
            <div class="row">
                @foreach($cungdanhmuc as $value)
                    <div class="col-md-3">
                        <div class="card shadow-sm mb-3">
                            <img class="card-img-top" src="{{ asset('public/uploads/truyen/' . $value->hinhanh) }}" alt="{{ $value->tentruyen }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $value->tentruyen }}</h5>
                                <p class="card-text text-muted">{{ $value->tomtat }}</p>
                                <a href="{{ url('xem-truyen/' . $value->slug_truyen) }}" class="btn btn-outline-secondary btn-sm">Xem truyện</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Sidebar: Truyện hay xem nhiều -->
    <div class="col-md-3">
        <h4>Sách hay xem nhiều</h4>
        <div class="card mb-3 shadow-sm">
            <a href="#">
                <img class="card-img-top" src="{{ asset('public/uploads/truyen/ali-baba59.jpg') }}" alt="Card image">
                <div class="card-body">
                    <h5 class="card-title">Card 1 Title</h5>
                    <p class="card-text">Some supporting text for card 1.</p>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection

<!-- CSS -->
<style>
    .tagcloud05 ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .tagcloud05 ul li {
        display: inline-block;
        margin: 0 10px 5px 0;
    }
    .tagcloud05 ul li a {
        background-color: #3498db;
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }
    .tagcloud05 ul li a:hover {
        background-color: #2980b9;
    }

    .card img {
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .card:hover img {
        transform: scale(1.05);
    }  
</style>
