@extends('layouts.app')

@section('content')
@include('layouts.nav')
<style>
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
            <div class="card shadow-lg rounded">
                <div class="card-header text-white fw-bold" style="background: linear-gradient(135deg, #4e54c8, #8f94fb);">
                    <i class="bi bi-journal-bookmark-fill"></i> Danh sách Chapter
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Tên chapter</th>
                                    <th>Slug</th>
                                    <th>Tóm tắt</th>
                                    <th>Thuộc truyện</th>
                                    <th>Kích hoạt</th>
                                    <th>Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($chapter as $key => $chap)
                                    <tr>
                                        <td class="text-center">{{ $chapter->firstItem() + $key }}</td>
                                        <td>{{ $chap->tieude }}</td>
                                        <td>{{ $chap->slug_chapter }}</td>
                                        <td style="max-width: 250px;">{{ Str::limit($chap->tomtat, 100) }}</td>
                                        <td>{{ $chap->truyen->tentruyen }}</td>
                                        <td class="text-center">
                                            @if($chap->kichhoat == 0)
                                                <span class="badge bg-success">Kích hoạt</span>
                                            @else
                                                <span class="badge bg-danger">Không kích hoạt</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('chapter.edit', [$chap->id]) }}" class="btn btn-sm btn-warning mb-1">
                                                <i class="bi bi-pencil-square"></i> Sửa
                                            </a>
                                            <form action="{{ route('chapter.destroy', [$chap->id]) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa chapter này không?');" style="display: inline-block;">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash3"></i> Xóa
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-3">
                    {{ $chapter->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
