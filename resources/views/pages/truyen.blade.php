@extends('../layout')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- Facebook SDK -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" 
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0">
</script>

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light px-3 py-2 rounded">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
        <li class="breadcrumb-item">
        @foreach($truyen->thuocnhieudanhmuctruyen as $thuocdanh)
                        <a href="{{url('danh-muc/'.$thuocdanh->slug_danhmuc)}}"><span >{{$thuocdanh->tendanhmuc}}</span></a>
                        @endforeach
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{ $truyen->tentruyen }}</li>
    </ol>
</nav>

<div class="row">
    <!-- Chi tiết truyện -->
    <div class="col-md-9">
        <div class="row g-3">
            <!-- Hình ảnh -->
            <div class="col-md-4">
                <img class="img-fluid rounded shadow-sm w-100" 
                     src="{{ asset('public/uploads/truyen/' . $truyen->hinhanh) }}" 
                     alt="{{ $truyen->tentruyen }}">
            </div>

            <!-- Thông tin truyện -->
            <div class="col-md-8">
                <ul class="list-group shadow-sm">
                    <!-- Nút chia sẻ Facebook -->
                    <div class="fb-share-button mb-2" data-href="{{ \URL::current() }}" 
                         data-layout="button_count" data-size="large">
                        <a target="_blank" href="{{ \URL::current() }}" class="fb-xfbml-parse-ignore">
                            Chia sẻ
                        </a>
                    </div>

                    <!-- Hidden cho wishlist -->
                    <input type="hidden" class="wish_title" value="{{ $truyen->tentruyen }}">
                    <input type="hidden" class="wishlist_url" value="{{ \URL::current() }}">
                    <input type="hidden" class="wish_list_id" value="{{ $truyen->id }}">

                    <li class="list-group-item"><strong>Tên:</strong> {{ $truyen->tentruyen }}</li>
                    <li class="list-group-item">
                        <strong>Ngày đăng:</strong> 
                        {{ $truyen->created_at ? $truyen->created_at->diffForHumans() : 'Không xác định' }}
                    </li>
                    <li class="list-group-item"><strong>Tác giả:</strong> {{ $truyen->tacgia }}</li>
                    <li class="list-group-item">
                    Danh mục truyện: 
                        @foreach($truyen->thuocnhieudanhmuctruyen as $thuocdanh)
                        <a href="{{url('danh-muc/'.$thuocdanh->slug_danhmuc)}}"><span class="badge badge-dark">{{$thuocdanh->tendanhmuc}}</span></a>
                        @endforeach
                    </li>
                    <li class="list-group-item">
                        Thể loại truyện: 
                        @foreach($truyen->thuocnhieutheloaitruyen as $thuocloai)
                        <a href="{{url('the-loai/'.$thuocloai->slug_theloai)}}"><span class="badge badge-info">{{$thuocloai->tentheloai}}</span></a>
                        @endforeach
                    </li>
                    <li class="list-group-item"><strong>Số chapter:</strong>   {{ $truyen->ds_chapter->count() }}</li>
                    <li class="list-group-item"><strong>Lượt xem:</strong> {{ $truyen->luotxem }}</li>
                    <li class="list-group-item">
                        <a href="#mucluc" class="text-decoration-none">Xem mục lục</a>
                    </li>

                    <li class="list-group-item">
                        @if($chapter_dau)
                            <a href="{{ url('xem-chapter/' . $chapter_dau->slug_chapter) }}" 
                               class="btn btn-primary w-100">Đọc truyện</a>
                            <a href="{{ url('xem-chapter/' . $chapter_moinhat->slug_chapter) }}" 
                               class="btn btn-success w-100 mt-2">Chương mới nhất</a>
                               <form>
                                @csrf
                            <button type="button"
                                onclick="return themyeuthich()" 
                                data-fa_publisher_id="{{ Session::get('publisher_id') }}"
                                data-fa_title="{{ $truyen->tentruyen }}"
                                data-fa_image="{{ $truyen->hinhanh }}"
                                class="btn btn-danger btn-yeuthichtruyen w-100 mt-2"
                            >
                                <i class="fa fa-heart me-1"></i>Yêu thích
                            </button>
                            </form>
                        @else
                            <button class="btn btn-secondary w-100" disabled>Chưa có chương</button>
                        @endif
                    </li>
                </ul>
            </div>
        </div>

        <!-- Tóm tắt -->
        <div class="mt-4">
            <h5 class="fw-bold">Tóm tắt truyện:</h5>
            <p class="text-muted">{!! $truyen->tomtat !!}</p>
        </div>

        <!-- Từ khóa -->
        <div class="mt-4">
            <h5 class="fw-bold">Từ khóa tìm kiếm:</h5>
            @php $tukhoa = explode(",", $truyen->tukhoa); @endphp
            <div class="d-flex flex-wrap gap-2">
                @foreach($tukhoa as $tu)
                    <a href="{{ url('tag/' . \Str::slug($tu)) }}" class="badge bg-primary text-white px-3 py-2">
                        {{ $tu }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Mục lục -->
        <div id="mucluc" class="mt-5">
            <h4 class="fw-bold mb-3">Mục lục</h4>
            <ul class="list-group shadow-sm">
                @forelse($chapter as $chap)
                    <li class="list-group-item">
                        <a href="{{ url('xem-chapter/' . $chap->slug_chapter) }}">
                            {{ $chap->tieude }}
                        </a>
                    </li>
                @empty
                    <li class="list-group-item text-muted">Đang cập nhật...</li>
                @endforelse
            </ul>
        </div>

        <!-- Facebook Comment -->
        <div class="fb-comments mt-4" data-href="{{ \URL::current() }}" data-width="100%" data-numposts="10"></div>

        <!-- Sách cùng danh mục -->
        <div class="mt-5">
            <h4 class="fw-bold mb-3">Sách cùng danh mục</h4>
            <div class="row g-3">
                @foreach($cungdanhmuc as $value)
                    <div class="col-md-3 d-flex">
                        <div class="card flex-fill shadow-sm h-100 hover-scale">
                            <img src="{{ asset('public/uploads/truyen/' . $value->hinhanh) }}" 
                                 class="card-img-top" 
                                 alt="{{ $value->tentruyen }}" 
                                 style="height: 180px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title mb-1">{{ $value->tentruyen }}</h6>
                                <p class="card-text small text-muted flex-grow-1" style="overflow: hidden; 
                                    text-overflow: ellipsis; display: -webkit-box; 
                                    -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                    {{ $value->tomtat }}
                                </p>
                                <a href="{{ url('xem-truyen/' . $value->slug_truyen) }}" 
                                   class="btn btn-outline-primary btn-sm mt-auto">Xem truyện</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="col-md-3">
        <!-- Truyện nổi bật -->
        <h3 class="card-header">Truyện nổi bật</h3>
        @foreach($truyennoibat as $noibat)
            <div class="row mt-2">
                <div class="col-5">
                    <img class="img-fluid" src="{{ asset('public/uploads/truyen/'.$noibat->hinhanh) }}" 
                         alt="{{ $noibat->tentruyen }}">
                </div>
                <div class="col-7">
                    <a href="{{ url('xem-truyen/'.$noibat->slug_truyen) }}">
                        <p>{{ $noibat->tentruyen }}</p>
                    </a>
                </div>
            </div>
        @endforeach

        <!-- Truyện xem nhiều -->
        <h3 class="card-header mt-4">Truyện xem nhiều</h3>
        @foreach($truyenxemnhieu as $xemnhieu)
            <div class="row mt-2">
                <div class="col-5">
                    <img class="img-fluid" src="{{ asset('public/uploads/truyen/'.$xemnhieu->hinhanh) }}" 
                         alt="{{ $xemnhieu->tentruyen }}">
                </div>
                <div class="col-7">
                    <a href="{{ url('xem-truyen/'.$xemnhieu->slug_truyen) }}">
                        <p>{{ $xemnhieu->tentruyen }}</p>
                    </a>
                </div>
            </div>
        @endforeach

        <!-- Truyện yêu thích -->
        <h4 class="fw-bold mt-4">Truyện yêu thích</h4>
        <div id="yeuthich" class="row g-3">
            <!-- Danh sách thêm bằng JS -->
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    .hover-scale {
        transition: transform 0.3s ease;
    }
    .hover-scale:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    .card-title {
        font-size: 1rem;
        font-weight: 600;
    }
    .card-text.text-truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
@endpush
