@extends('../layout')
{{-- @section('slide')
@include('pages.slide')
@endsection --}}

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12">
    <h4>{{$chapter->truyen->tentruyen}}</h4>
    <p>Chương hiện tại: {{$chapter->tieude}}</p>

    <div class="col-md-5">
      <div class="form-group">
                                    <label for="exampleInputEmail1">Chọn chương</label>
                                   <p><a class="btn btn-primary" href="">Tập trước</a></p> 

                                    <select name="select-chapter"  class="custom-select select-chapter" >
                                                @foreach($all_chapter as $key =>$chap)
                                            <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                                            @endforeach
                                    </select>
                                 <p class="mt-2">  <a class="btn btn-primary" href="">Tập sau</a></p> 

      </div>
    </div>

    <div class="noidungchuong">
       {!! $chapter->noidung !!}
       

    </div>
    <div class="col-md-5">
      <div class="form-group">
                    <label for="exampleInputEmail1">Chọn chương</label>
                    <select name="select-chapter"  class="custom-select select-chapter" >
                                @foreach($all_chapter as $key =>$chap)
                            <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                            @endforeach
                    </select>
      </div>
    <h3>Lưu và chia sẻ truyện:</h3>
       <a><i class="fab fa-facebook-f"></i></a>
       <a><i class="fab fa-twitter"></i></a>
  </div>
</div>
@endsection
