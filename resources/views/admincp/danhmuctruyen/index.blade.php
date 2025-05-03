@extends('layouts.app')

@section('content')

@include('layouts.nav')

<style>
    .card-header {
        background: linear-gradient(135deg, #4e54c8, #8f94fb);
        color: white;
        font-weight: bold;
        font-size: 1.25rem;
    }

    .table thead {
        background-color: #f0f2f5;
    }

    .table-hover tbody tr:hover {
        background-color: #f9f9ff;
    }

    .btn-primary {
        background-color: #4e54c8;
        border: none;
    }

    .btn-primary:hover {
        background-color: #3f45b0;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .custom-card {
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .status-active {
        color: #198754;
        font-weight: 600;
    }

    .status-inactive {
        color: #dc3545;
        font-weight: 600;
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

    /* Căn giữa phân trang */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    /* Chắc chắn căn giữa nội dung */
    .pagination {
        justify-content: center;
        text-align: center;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card custom-card">
                <div class="card-header">📚 Danh sách danh mục truyện</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped table-hover align-middle text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên danh mục</th>
                            <th>Slug danh mục</th>
                            <th>Mô tả</th>
                            <th>Kích hoạt</th>
                            <th>Quản lý</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($danhmuctruyen as $key => $danhmuc)
                            <tr>
                                <th>{{ $danhmuctruyen->firstItem() + $key }}</th>
                                <td>{{ $danhmuc->tendanhmuc }}</td>
                                <td>{{ $danhmuc->slug_danhmuc }}</td>
                                <td>{{ $danhmuc->mota }}</td>
                                <td>
                                    @if($danhmuc->kichhoat == 0)
                                        <span class="status-active">Kích hoạt</span>
                                    @else
                                        <span class="status-inactive">Không kích hoạt</span>
                                    @endif
                                </td>
                                <td class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('danhmuc.edit', [$danhmuc->id]) }}" class="btn btn-primary btn-sm">Sửa</a>
                                    <form action="{{ route('danhmuc.destroy', [$danhmuc->id]) }}" method="POST" onsubmit="return confirm('Bạn có muốn xóa danh mục truyện này không?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Hiển thị phân trang và căn giữa -->
                    <div class="pagination-wrapper mt-3">
                        <div class="pagination">
                            {!! $danhmuctruyen->links() !!}
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
