@extends('../layout')
@section('slide')
@include('pages.slide')
@endsection
@section('content')
<h3>SACH  MOI CAP NHAT</h3>
<div class="album py-5 bg-light">
        <div class="container">

        <div class="row">
        @foreach ($truyen as $key => $value)
    <!-- Card 1 -->
    <div class="col-md-3 mb-4">
      <div class="card h-100 box-shadow">
        <a href="">
        <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" alt="Card image">
        <div class="card-body">
          <h5 class="card-title">{{$value->tentruyen}}</h5>
          <p class="card-text">{{$value->tomtat}}</p>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
            <a class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i> 12345</a>
          </div>
          <small class="text-muted">9 mins ago</small>
        </div>
      </div>
      </a>
    </div>
    @endforeach
    </div>
    <a class="btn btn-success"  href="">Xem tất cả</a>

  </div>

</div>
@endsection