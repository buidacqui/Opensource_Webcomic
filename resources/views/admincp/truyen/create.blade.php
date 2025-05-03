@extends('layouts.app')

@section('content')

@include('layouts.nav')
<!-- Bootstrap CSS -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm truyện</div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('truyen.store')}}" enctype='multipart/form-data'>
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên truyện </label>
                                <input type="text" class="form-control" value="{{old('tentruyen')}}" onkeyup="ChangeToSlug();" name="tentruyen" id="slug" aria-describedby="emailHelp" placeholder="Tên truyện....">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tác giả </label>
                                <input type="text" class="form-control" value="{{old('tacgia')}}"  name="tacgia"  aria-describedby="emailHelp" placeholder="Tác giả">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Từ khóa </label>
                                <input type="text" class="form-control" value="{{old('tukhoa')}}"  name="tukhoa" id="slug" aria-describedby="emailHelp" placeholder="Từ khóa">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug truyện </label>
                                <input type="text" class="form-control" value="{{old('slug_truyen')}}" name="slug_truyen" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug truyện....">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt truyện </label>
                                <textarea name="tomtat" class="form-control" rows="5" style="resize:none"></textarea>
                            </div>
                            <div class="form-group">

                            <label for="exampleInputEmail1">Danh mục truyện </label>

                            <select name="danhmuc" class="customer-select">
                                @foreach($danhmuc as $key => $muc)
                                <option value="{{$muc->id}}">{{$muc->tendanhmuc}}</option>
                                @endforeach 
                            </select>
                            </div>
                            <div class="form-group">
    <label for="theloai">Thể loại truyện</label>
    <select name="theloai" class="customer-select">
        @foreach($theloai as $key => $the)
            <option value="{{ $the->id }}">{{ $the->tentheloai }}</option>
        @endforeach
    </select>
</div>



                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh truyện </label>
                                <input type="file" class="form-control-file"  name="hinhanh">
                            </div>
                            <div class="form-group">

                            <label for="exampleInputEmail1">Kích hoạt </label>

                            <select name="kichhoat" class="customer-select">
                                
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>

                            </select>
                            </div>

                            <button type="submit" name="themtruyen" class="btn btn-primary">Thêm</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
