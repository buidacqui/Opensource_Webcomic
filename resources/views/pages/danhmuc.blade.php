@extends('../layout')

@section('slide')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="bg-white rounded px-3 py-2 shadow-sm">
  <ol class="breadcrumb mb-0">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$tendanhmuc}}</li>
  </ol>
</nav>

<h3 class="text-center text-primary my-4" style="font-family: 'Exo', sans-serif;">{{$tendanhmuc}}</h3>

<div class="album py-5 bg-light" style="font-family: 'Exo', sans-serif;">
    <div class="container">
        <div class="row">
            @php $count = count($truyen); @endphp
            @if($count == 0)
                <div class="col-md-12">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body text-center">
                            <p class="lead">Truyện đang cập nhật</p>
                        </div>
                    </div>
                </div>
            @else
                @foreach ($truyen as $key => $value)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 transition-transform hover-zoom">
                        <a href="{{ url('xem-truyen/'.$value->slug_truyen) }}" class="text-decoration-none text-dark">
                            <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" alt="{{ $value->tentruyen }}" style="height: 250px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title text-truncate" title="{{ $value->tentruyen }}">{{ $value->tentruyen }}</h5>
                                <p class="card-text small text-muted">{{ Str::limit($value->tomtat, 120) }}</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center bg-light">
                                <div class="btn-group">
                                    <a href="{{ url('xem-truyen/'.$value->slug_truyen) }}" class="btn btn-sm btn-outline-primary">Đọc ngay</a>
                                    <a class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i> 12345</a>
                                </div>
                                <small class="text-muted">{{ $value->updated_at->diffForHumans() }}</small>
                                </div>
                        </a>
                    </div>
                </div>
                @endforeach
            @endif
        </div>

        {{-- Pagination --}}
        <div class="row mt-4">
            <div class="col-12 text-center">
                {{ $truyen->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Exo:wght@400;600&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Exo', sans-serif;
    }

    .card-body {
        padding: 1rem;
    }

    .card-footer {
        border-top: 1px solid #e9ecef;
    }

    .card-title {
        font-size: 1rem;
        font-weight: 600;
    }

    .card:hover {
        transform: translateY(-5px);
        transition: transform 0.2s ease-in-out;
    }

    .hover-zoom:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .breadcrumb {
        background-color: #f8f9fa;
        font-size: 0.95rem;
    }

    .breadcrumb-item a {
        color: #4e54c8;
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: #6c757d;
    }

    .pagination {
        justify-content: center;
    }

    .pagination li a {
        color: #4e54c8;
        border: 1px solid #dee2e6;
        border-radius: 50%;
        padding: 0.5rem 0.75rem;
        margin: 0 0.2rem;
        transition: background-color 0.2s;
    }

    .pagination .active span,
    .pagination .active a {
        background-color: #4e54c8;
        color: white !important;
        border: none;
    }

    .pagination li a:hover {
        background-color: #4e54c8;
        color: white;
    }
</style>
@endpush
