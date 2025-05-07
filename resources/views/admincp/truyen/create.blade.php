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
                    Thêm truyện mới
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

                    <form method="POST" action="{{ route('truyen.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="slug" name="tentruyen"
                                   value="{{ old('tentruyen') }}" onkeyup="ChangeToSlug();" placeholder="Tên truyện">
                            <label for="slug">Tên truyện</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="tacgia"
                                   value="{{ old('tacgia') }}" placeholder="Tác giả">
                            <label for="tacgia">Tác giả</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="tukhoa"
                                   value="{{ old('tukhoa') }}" placeholder="Từ khóa">
                            <label for="tukhoa">Từ khóa</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="convert_slug" name="slug_truyen"
                                   value="{{ old('slug_truyen') }}" placeholder="Slug truyện">
                            <label for="convert_slug">Slug truyện</label>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tóm tắt truyện</label>
                            <textarea name="tomtat" class="form-control" rows="5" style="resize: none"
                                      placeholder="Nhập nội dung tóm tắt">{{ old('tomtat') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Danh mục truyện</label><br>
                                @foreach ($danhmuc as $key => $muc)
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="danhmuc[]" id="danhmuc_{{$muc->id}}" value="{{$muc->id}}">
                                <label class="form-check-label" for="danhmuc_{{$muc->id}}">{{$muc->tendanhmuc}}</label>
                                </div>
                                @endforeach
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Thể loại truyện</label><br>
                                @foreach ($theloai as $key=> $the)
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="theloai[]" id="theloai_{{$the->id}}" value="{{$the->id}}">
                                <label class="form-check-label" for="theloai_{{$the->id}}">{{$the->tentheloai}}</label>
                                </div>
                                @endforeach
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Hình ảnh truyện</label>
                            <input type="file" class="form-control" name="hinhanh">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Kích hoạt</label>
                            <select name="kichhoat" class="form-select">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Truyện nổi bật/hot</label>
                            <select name="truyennoibat" class="form-select">
                                <option value="0">Truyện mới</option>
                                <option value="1">Truyện nổi bật</option>
                                <option value="2">Truyện xem nhiều</option>

                            </select>
                        </div>

                        <div class="text-center">
                        <button type="submit" name="themdanhmuc" class="btn btn-success px-4 py-2 fw-bold shadow-sm">
                                <i class="bi bi-plus-circle me-1"></i> Thêm truyện
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
