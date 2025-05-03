@extends('../layout')

@section('slide')

@section('content')
<h3 class="text-center text-primary my-4">{{$tentheloai}}</h3>
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            @php
                $count = count($truyen);
            @endphp

            @if($count == 0)
                <div class="col-md-12">
                    <div class="card mb-12 box-shadow text-center">
                        <div class="card-body">
                            <p>Truyện đang cập nhật</p>
                        </div>
                    </div>
                </div>
            @else
                @foreach ($truyen as $key => $value)
                    <!-- Card 1 -->
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="card shadow-sm border-light rounded h-100">
                            <a href="{{ url('xem-truyen/'.$value->slug_truyen) }}">
                                <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" alt="Card image" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title text-truncate">{{$value->tentruyen}}</h5>
                                    <p class="card-text">{{ Str::limit($value->tomtat, 100) }}</p>
                                </div>
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ url('xem-truyen/'.$value->slug_truyen) }}" class="btn btn-sm btn-outline-primary">
                                            Đọc ngay
                                        </a>
                                        <a class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-eye"></i> 12345
                                        </a>
                                    </div>
                                    <small class="text-muted">9 phút trước</small>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        {{-- Phân trang --}}
        <div class="row mt-4">
            <div class="col-12 text-center">
                {{ $truyen->links() }}
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    .card-body {
        padding: 1.25rem;
    }

    .card-footer {
        background-color: #f8f9fc;
        border-top: 1px solid #e1e1e1;
    }

    .card-footer .btn-group .btn {
        font-size: 0.875rem;
    }

    .card-title {
        font-size: 1.125rem;
        font-weight: 600;
    }

    .card-img-top {
        border-bottom: 2px solid #e1e1e1;
    }

    .text-truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Custom pagination styling */
    .pagination {
        justify-content: center;
    }

    .pagination li a {
        color: #6c757d;
        border-radius: 50%;
        padding: 0.5rem 0.75rem;
    }

    .pagination .active a {
        background-color: #4e54c8;
        color: white;
    }

    .pagination li {
        margin: 0 2px;
    }
</style>
@endpush
