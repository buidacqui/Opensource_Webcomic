@extends('layouts.app')

@section('content')
@include('layouts.nav')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- Bootstrap CSS -->
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header text-white text-center fw-bold fs-5" 
     style="background: linear-gradient(135deg, #4e54c8, #8f94fb);">
    Thêm danh mục truyện
</div>


                @if ($errors->any())
                    <div class="alert alert-danger mt-3 mx-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body bg-light-subtle">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('danhmuc.store') }}">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="slug" name="tendanhmuc"
                                   value="{{ old('tendanhmuc') }}" onkeyup="ChangeToSlug();" placeholder="Tên danh mục">
                            <label for="slug">Tên danh mục</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="convert_slug" name="slug_danhmuc"
                                   value="{{ old('slug') }}" placeholder="Slug danh mục">
                            <label for="convert_slug">Slug danh mục</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="mota" name="mota"
                                   value="{{ old('mota') }}" placeholder="Mô tả danh mục">
                            <label for="mota">Mô tả danh mục</label>
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
                                <i class="bi bi-plus-circle me-1"></i> Thêm danh mục
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
