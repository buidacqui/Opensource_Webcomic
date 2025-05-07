@extends('layouts.app')

@section('content')
@include('layouts.nav')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header text-white text-center fw-bold fs-5"
                     style="background: linear-gradient(135deg, #4e54c8, #8f94fb);">
                    Cập nhật sách
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mx-3 mt-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body bg-light-subtle px-4 py-4">
                    @if (session('status'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('sach.update',[$sach->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="slug" name="tensach"
                                   value="{{$sach->tensach}}" onkeyup="ChangeToSlug();" placeholder="Tên sách">
                            <label for="slug">Tên Sách</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="views"
                                   value="{{ $sach->views }}" placeholder="Lượt xem">
                            <label for="slug">Lượt xem</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="tukhoa"
                                   value="{{$sach->tukhoa }}" placeholder="Từ khóa">
                            <label for="tukhoa">Từ khóa</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="convert_slug" name="slug_sach"
                                   value="{{ $sach->slug_sach}}" placeholder="Slug sách" readonly>
                            <label for="convert_slug">Slug sách</label>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tóm tắt sách</label>
                            <textarea name="tomtat" class="form-control" rows="5" style="resize: none"
                                      placeholder="Nhập nội dung tóm tắt">{{ $sach->tomtat }}</textarea>
                        </div>

                                            <div class="mb-3">
                        <label class="form-label fw-semibold">Nội dung sách</label>
                        <textarea name="noidung" id="noidung" class="form-control" rows="5" style="resize: none"
                                placeholder="Nhập nội dung ">{{ $sach->noidung }}</textarea>
                    </div>


                        <div class="mb-3">
                            <label class="form-label fw-semibold">Hình ảnh sách</label>
                            <input type="file" class="form-control" name="hinhanh">
                            <img src="{{ asset('public/uploads/sach/'.$sach->hinhanh) }}"
                                 alt="Ảnh sách" height="300" width="180" class="border rounded mt-2">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kích hoạt</label>
                            <select name="kichhoat" class="form-select">
                                <option value="0" {{ $sach->kichhoat == 0 ? 'selected' : '' }}>Kích hoạt</option>
                                <option value="1" {{ $sach->kichhoat == 1 ? 'selected' : '' }}>Không kích hoạt</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="capnhatsach" class="btn btn-success px-4 py-2 fw-bold shadow-sm">
                                <i class="bi bi-plus-circle me-1"></i> Cập nhật sách
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
    <script>
        // Khởi tạo CKEditor cho nội dung sách
        document.addEventListener("DOMContentLoaded", function () {
            if (document.getElementById('noidung')) {
                CKEDITOR.replace('noidung');
            }
        });

        // Hàm chuyển đổi tên sách thành slug
        function ChangeToSlug() {
            var title = document.getElementById("slug").value;
            var slug = title.toLowerCase().trim()
                            .replace(/[^a-z0-9]+/g, '-')
                            .replace(/^-+|-+$/g, '');
            document.getElementById("convert_slug").value = slug;
        }
    </script>
@endpush
@endsection
