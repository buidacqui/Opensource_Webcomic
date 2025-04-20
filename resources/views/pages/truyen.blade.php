@extends('../layout')
<!-- {{--- @section('slide')
@include('pages.slide')
@endsection---}} -->
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="{{ url('danh-muc/' . $truyen->danhmuctruyen->slug_danhmuc) }}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$truyen->tentruyen}}</li>
  </ol>
</nav>
<div class="row">
    <div class="col-md-9">
        <div class="row">
            <!-- Ảnh truyện -->
            <div class="col-md-3">
                <img class="card-img-top" src="{{ asset('public/uploads/truyen/' . $truyen->hinhanh) }}" alt="{{ $truyen->tentruyen }}">
            </div>

            <!-- Thông tin truyện -->
            <div class="col-md-9">
                <style type="text/css">
                    .infotruyen {
                        list-style: none;
                    }
                </style>

                <ul class="infotruyen">
                    <li>Tên: {{ $truyen->tentruyen }}</li>
                    <li>Tác giả: {{ $truyen->tacgia }}</li>
                    <li>Danh mục truyện:
                        <a href="{{ url('danh-muc/' . $truyen->danhmuctruyen->slug_danhmuc) }}">
                            {{ $truyen->danhmuctruyen->tendanhmuc }}
                        </a>
                    </li>
                    <li>Thể loại truyện:
                        <a href="{{ url('the-loai/' . $truyen->theloai->slug_theloai) }}">
                            {{ $truyen->theloai->tentheloai }}
                        </a>
                    </li>
                    <li>Số chapter: 2000</li>
                    <li>Số lượt xem: 2000</li>
                    <li><a href="#">Xem mục lục</a></li>
                   @if($chapter_dau)
                    <li><a href="{{ url('xem-chapter/' . $chapter_dau->slug_chapter) }}" class="btn btn-primary">Đọc Online</a></li>
                      @else
                    <li><a class="btn btn-danger">Hiện tại chưa có chương để đọc</a></li>
                    @endif
                    </ul>
            </div>
        </div>

        <!-- Tóm tắt truyện -->
        <div class="col-md-12">
            <p>{!! $truyen->tomtat !!}</p>
        </div>

        <hr>

        <!-- Mục lục -->
        <h4>Mục lục</h4>
        <ul class="mucluctruyen">
      @php
      $mucluc = count($chapter);
      @endphp
      @if($mucluc>0)
              @foreach($chapter as $key => $chap)
                    <li><a href="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</a></li>
                  @endforeach
      @else
      <li>Đang cập nhật....</li>
      @endif
        </ul>
        <h4>Sách cùng danh mục</h4>
<div class="row">
    @foreach($cungdanhmuc as $key => $value)
        <div class="col-md-3">
            <div class="card mb-3 box-shadow">
                <img class="card-img-top" src="{{ asset('public/uploads/truyen/' . $value->hinhanh) }}" alt="{{ $value->tentruyen }}">
                <div class="card-body">
                    <h5>{{ $value->tentruyen }}</h5>
                    <p class="card-text">{{ $value->tomtat }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ url('xem-truyen/' . $value->slug_truyen) }}" class="btn btn-sm btn-outline-secondary">Xem truyện</a>
                            <a class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-eye"></i> 565893
                            </a>
                        </div>
                        <small class="text-muted">9 mins ago</small>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

  <div class="col-md-3">
    <h3>Sách hay xem nhiều</h3>
    <div class="card mb-3 box-shadow">
        <a href="">
        <img class="card-img-top" src="{{asset('public/uploads/truyen/ali-baba59.jpg')}}" alt="Card image">
        <div class="card-body">
          <h5 class="card-title">Card 1 Title</h5>
          <p class="card-text">Some supporting text for card 1.</p>
        </div>
  </div>
</div>


@endsection