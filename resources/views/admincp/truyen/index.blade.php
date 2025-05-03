@extends('layouts.app')

@section('content')
@include('layouts.nav')

<style>
    .card-header-custom {
        background: linear-gradient(135deg, #4e54c8, #8f94fb);
        color: white;
        font-weight: 600;
        font-size: 1.25rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .img-thumb-custom {
        width: 350px;
        height: 160px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #dee2e6;
    }

    .btn-action {
        margin-bottom: 4px;
        width: 100%;
    }

    .table td, .table th {
        vertical-align: middle;
    }

    .table thead {
        background-color: #f8f9fc;
    }

    .badge-success, .badge-danger {
        font-size: 0.9rem;
    }

    .pagination .page-link {
        color: #4e54c8;
        border-radius: 6px;
        margin: 0 3px;
    }

    .pagination .page-item.active .page-link {
        background-color: #4e54c8;
        border-color: #4e54c8;
    }

    .pagination .page-link:hover {
        background-color: #8f94fb;
        color: #fff;
    }
</style>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-custom">
                    <i class="bi bi-journal-bookmark-fill"></i> Danh sách truyện
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Tên truyện</th>
                                    <th>Hình ảnh</th>
                                    <th>Slug</th>
                                    <th>Tóm tắt</th>
                                    <th>Danh mục</th>
                                    <th>Thể loại</th>
                                    <th>Kích hoạt</th>
                                    <th>Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list_truyen as $key => $truyen)
                                    <tr>
                                        <td>{{ $list_truyen->firstItem() + $key }}</td>
                                        <td class="text-start">{{ $truyen->tentruyen }}</td>
                                        <td>
                                            <img src="{{ asset('public/uploads/truyen/'.$truyen->hinhanh) }}"
                                                 alt="{{ $truyen->tentruyen }}"
                                                 class="img-thumb-custom">
                                        </td>
                                        <td>{{ $truyen->slug_truyen }}</td>
                                        <td class="text-start" style="max-width: 250px;">
                                            {{ Str::limit($truyen->tomtat, 100) }}
                                        </td>
                                        <td>{{ $truyen->danhmuctruyen->tendanhmuc }}</td>
                                        <td>{{ $truyen->theloai->tentheloai }}</td>
                                        <td>
                                            @if($truyen->kichhoat == 0)
                                                <span class="badge bg-success">Kích hoạt</span>
                                            @else
                                                <span class="badge bg-danger">Không kích hoạt</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('truyen.edit', [$truyen->id]) }}"
                                               class="btn btn-warning btn-sm btn-action">
                                                <i class="bi bi-pencil-square"></i> Sửa
                                            </a>
                                            <form action="{{ route('truyen.destroy', [$truyen->id]) }}" method="POST"
                                                  onsubmit="return confirm('Bạn có chắc chắn muốn xóa truyện này không?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-action">
                                                    <i class="bi bi-trash3-fill"></i> Xóa
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-4">
                        {{ $list_truyen->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
