@extends('layouts.app')

@section('content')
@include('layouts.nav')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header text-white text-center fw-bold fs-5"
                     style="background: linear-gradient(135deg, #4e54c8, #8f94fb);">
                    Thêm Chapter Truyện
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

                <div class="card-body px-4 py-4 bg-light-subtle">
                    @if (session('status'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('chapter.store') }}">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="slug" name="tieude"
                                   value="{{ old('tieude') }}" onkeyup="ChangeToSlug();" placeholder="Tên chapter">
                            <label for="slug">Tên chapter</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="convert_slug" name="slug_chapter"
                                   value="{{ old('slug_chapter') }}" placeholder="Slug chapter">
                            <label for="convert_slug">Slug chapter</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="tomtat"
                                   value="{{ old('tomtat') }}" placeholder="Tóm tắt chapter">
                            <label for="tomtat">Tóm tắt chapter</label>
                        </div>

                        <div class="mb-3">
                            <label for="noidung_chapter" class="form-label fw-semibold">Nội dung</label>
                            <textarea name="noidung" id="noidung_chapter" class="form-control" rows="6"
                                      style="resize: none;">{{ old('noidung') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Thuộc truyện</label>
                            <select name="truyen_id" class="form-select">
                                @foreach ($truyen as $value)
                                    <option value="{{ $value->id }}">{{ $value->tentruyen }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Kích hoạt</label>
                            <select name="kichhoat" class="form-select">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="themdanhmuc" class="btn btn-success px-4 py-2 fw-bold shadow-sm">
                                <i class="bi bi-plus-circle-fill me-1"></i> Thêm chapter
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
        document.addEventListener("DOMContentLoaded", function () {
            if (document.getElementById('noidung_chapter')) {
                CKEDITOR.replace('noidung_chapter');
            }
        });
    </script>
    
@endpush

@endsection
