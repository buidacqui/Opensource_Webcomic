@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm rounded-3">
                <div class="card-header bg-primary text-white fw-bold">
                    Cập nhật truyện
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('truyen.update', [$truyen->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Tên truyện</label>
                            <input type="text" class="form-control" name="tentruyen" id="slug"
                                   onkeyup="ChangeToSlug();" value="{{ $truyen->tentruyen }}" placeholder="Nhập tên truyện">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tác giả</label>
                            <input type="text" class="form-control" name="tacgia"
                                   value="{{ $truyen->tacgia }}" placeholder="Nhập tên tác giả">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Từ khóa</label>
                            <input type="text" class="form-control" name="tukhoa"
                                   value="{{ old('tukhoa') }}" placeholder="Từ khóa liên quan">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Slug truyện</label>
                            <input type="text" class="form-control" name="slug_truyen"
                                   id="convert_slug" value="{{ $truyen->slug_truyen }}" placeholder="Slug tự động">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tóm tắt truyện</label>
                            <textarea name="tomtat" class="form-control" rows="4" style="resize: none;">{{ $truyen->tomtat }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Danh mục truyện</label>
                            <select name="danhmuc" class="form-select">
                                @foreach($danhmuc as $muc)
                                    <option value="{{ $muc->id }}" {{ $muc->id == $truyen->danhmuc_id ? 'selected' : '' }}>
                                        {{ $muc->tendanhmuc }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Thể loại truyện</label>
                            <select name="theloai" class="form-select">
                                @foreach($theloai as $the)
                                    <option value="{{ $the->id }}" {{ $the->id == $truyen->theloai_id ? 'selected' : '' }}>
                                        {{ $the->tentheloai }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Hình ảnh truyện</label>
                            <input type="file" class="form-control" name="hinhanh">
                            <div class="mt-2">
                                <img src="{{ asset('public/uploads/truyen/'.$truyen->hinhanh) }}"
                                     alt="Ảnh truyện" height="300" width="180" class="border rounded">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kích hoạt</label>
                            <select name="kichhoat" class="form-select">
                                <option value="0" {{ $truyen->kichhoat == 0 ? 'selected' : '' }}>Kích hoạt</option>
                                <option value="1" {{ $truyen->kichhoat == 1 ? 'selected' : '' }}>Không kích hoạt</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Trạng thái nổi bật</label>
                            <select name="truyennoibat" class="form-select">
                                <option value="0" {{ $truyen->truyennoibat == 0 ? 'selected' : '' }}>Truyện mới</option>
                                <option value="1" {{ $truyen->truyennoibat == 1 ? 'selected' : '' }}>Truyện nổi bật</option>
                                <option value="2" {{ $truyen->truyennoibat == 2 ? 'selected' : '' }}>Truyện xem nhiều</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success w-100 fw-bold">Cập nhật truyện</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function ChangeToSlug() {
        let name = document.getElementById('slug').value;
        let slug = name.toLowerCase()
            .normalize('NFD') // chuẩn hóa unicode
            .replace(/[\u0300-\u036f]/g, '') // xóa dấu
            .replace(/[^a-z0-9\s-]/g, '') // xóa ký tự đặc biệt
            .trim()
            .replace(/\s+/g, '-') // thay khoảng trắng bằng -
            .replace(/-+/g, '-'); // xóa dấu trừ liên tiếp

        document.getElementById('convert_slug').value = slug;
    }
</script>
@endsection
