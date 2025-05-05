@extends('layouts.app')

@section('content')
@include('layouts.nav')

<style>
    .card-header-custom {
        background: linear-gradient(135deg, #4e54c8, #8f94fb);
        color: white;
        font-weight: bold;
        font-size: 1.25rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .img-thumb-custom {
        width: 100px;
        height: 70px;
        object-fit: cover;
        border-radius: 4px;
        border: 1px solid #dee2e6;
    }

    .table td, .table th {
        vertical-align: middle;
        font-size: 0.95rem;
    }

    .badge {
        font-size: 0.85rem;
        padding: 6px 10px;
        border-radius: 12px;
    }

    .btn-action {
        width: 100%;
        margin-bottom: 5px;
    }

    .pagination .page-link {
        color: #4e54c8;
        border-radius: 6px;
    }

    .pagination .page-item.active .page-link {
        background-color: #4e54c8;
        border-color: #4e54c8;
    }
</style>

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header card-header-custom">
                    <i class="bi bi-journal-bookmark-fill"></i> Danh sách sách
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
                                    <th>Tên sách</th>
                                    <th>Hình ảnh</th>
                                    <th>Slug sách</th>
                                    <th>Tóm tắt</th>
                               
                                    <th>Kích hoạt</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list_sach as $key => $sach)
                                    <tr>
                                        <td>{{ $list_sach->firstItem() + $key }}</td>
                                        <td class="text-start fw-semibold">{{ $sach->tensach }}</td>
                                        <td>
                                            <img src="{{ asset('public/uploads/sach/'.$sach->hinhanh) }}"
                                                 alt="{{ $sach->tensach }}" class="img-thumb-custom">
                                        </td>
                                        <td>{{ $sach->slug_sach }}</td>
                                        <td class="text-start" style="max-width: 250px;">
                                            {{ Str::limit($sach->tomtat, 100) }}
                                        </td>
                                     
                                        <td>
                                            <span class="badge {{ $sach->kichhoat == 0 ? 'bg-success' : 'bg-danger' }}">
                                                {{ $sach->kichhoat == 0 ? 'Hiển thị' : 'Ẩn' }}
                                            </span>
                                        </td>
                                        <td>
                                            {{ optional($sach->created_at)->format('d/m/Y H:i') }}
                                            <br>
                                            <small class="text-muted">{{ optional($sach->created_at)->diffForHumans() }}</small>
                                        </td>
                                        <td>
                                            {{ optional($sach->updated_at)->format('d/m/Y H:i') }}
                                            <br>
                                            <small class="text-muted">{{ optional($sach->updated_at)->diffForHumans() }}</small>
                                        </td>
                                       
                                        <td>
                                            <a href="{{ route('sach.edit', [$sach->id]) }}"
                                               class="btn btn-warning btn-sm btn-action">
                                                <i class="bi bi-pencil-square"></i> Sửa
                                            </a>
                                            <form action="{{ route('sach.destroy', [$sach->id]) }}" method="POST"
                                                  onsubmit="return confirm('Bạn có chắc chắn muốn xóa sách này không?');">
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

                    <div class="d-flex justify-content-center mt-3">
                        {{ $list_sach->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Thêm sự kiện thay đổi cho dropdown
    document.querySelectorAll('.noibat-form').forEach(form => {
        form.addEventListener('change', function () {
            const id = this.dataset.id;
            const select = this.querySelector('select');
            const value = select.value;

            fetch(`/truyen/update-noibat/${id}`, {
    method: 'PUT',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({ truyennoibat: value })
})

            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert('Đã cập nhật trạng thái truyện nổi bật!');
                } else {
                    alert('Có lỗi xảy ra!');
                }
            })
            .catch(err => {
                alert('Lỗi kết nối server!');
                console.error(err);
            });
        });
    });
});
</script>
@endpush

@endsection
