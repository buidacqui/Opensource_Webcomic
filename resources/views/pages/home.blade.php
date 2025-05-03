@extends('../layout')
@section('slide')
  @include('pages.slide')
@endsection

@section('content')
<h3 class="text-center text-success mb-4">TRUYỆN MỚI CẬP NHẬT</h3>
<div class="album py-5 bg-light">
  <div class="container">
    <div class="row" id="book-list">
      @foreach ($truyen as $key => $value)
      <div class="col-6 col-md-4 col-lg-3 d-flex align-items-stretch mb-4">
        <div class="card h-100 shadow-sm position-relative" style="transition: all 0.3s ease;">

          {{-- Badge mới --}}
          @if($key < 3)
            <span class="badge bg-danger position-absolute" style="top:10px; left:10px;">Mới</span>
          @endif

          <a href="{{url('xem-truyen/'.$value->slug_truyen)}}">
            <img class="card-img-top" loading="lazy" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" alt="{{$value->tentruyen}}" style="height: 200px; object-fit: cover;">
          </a>

          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-truncate" title="{{$value->tentruyen}}">{{$value->tentruyen}}</h5>
            <p class="card-text text-muted" style="flex-grow: 1; max-height: 60px; overflow: hidden;">{{$value->tomtat}}</p>
          </div>

          <div class="card-footer d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-sm btn-outline-primary">Đọc ngay</a>
              <button class="btn btn-sm btn-outline-secondary" disabled>
                <i class="fas fa-eye"></i> 12345
              </button>
            </div>
            <small class="text-muted">Cập nhật: 9 phút trước</small>
          </div>

        </div>
      </div>
      @endforeach
    </div>

    <!-- Nút "Xem tất cả" -->
    <div class="text-center mt-4" id="view-all-btn-container">
        <a href="javascript:void(0);" id="view-all-btn" class="btn btn-primary mt-3">Xem tất cả</a>
    </div>

    <!-- Nút thoát khi đã tải tất cả truyện -->
    <div class="text-center mt-4" id="close-btn-container" style="display: none;">
        <a href="javascript:void(0);" id="close-btn" class="btn btn-secondary mt-3">Đóng</a>
    </div>
</div>

<!-- Script AJAX -->
<script>
$(document).ready(function() {
    $('#view-all-btn').click(function() {
        // Gửi yêu cầu AJAX để lấy tất cả truyện
        $.ajax({
            url: '{{ route("ajax.all.truyen") }}',  // Sử dụng route cho AJAX
            method: 'GET',
            success: function(response) {
                // Xóa các truyện hiện tại và thêm tất cả truyện vào
                $('#book-list').empty();
                response.forEach(function(book) {
                    var bookHtml = `
                        <div class="col-6 col-md-4 col-lg-3 mb-4 book-item">
                            <div class="card shadow-sm h-100">
                                <img src="{{ asset('public/uploads/truyen/') }}/${book.hinhanh}" alt="${book.tentruyen}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title text-truncate">${book.tentruyen}</h5>
                                    <p class="card-text text-muted" style="max-height: 60px; overflow: hidden;">${book.tomtat}</p>
                                </div>
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <a href="{{url('xem-truyen/${book.slug_truyen}')}}" class="btn btn-sm btn-outline-primary">Đọc ngay</a>
                                    <button class="btn btn-sm btn-outline-secondary" disabled>
                                        <i class="fas fa-eye"></i> 12345
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                    $('#book-list').append(bookHtml);
                });
                // Ẩn nút "Xem tất cả" và hiển thị nút "Đóng"
                $('#view-all-btn-container').hide();
                $('#close-btn-container').show();
            },
            error: function() {
                alert('Lỗi khi tải truyện');
            }
        });
    });

    // Đóng tất cả truyện và quay lại trang ban đầu
    $('#close-btn').click(function() {
        location.reload(); // Reload lại trang để quay về trạng thái ban đầu
    });
});
</script>

{{-- CSS thêm cho hiệu ứng --}}
<style>
  .card {
    transition: transform 0.3s ease;
  }
  
  .card:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 8px 24px rgba(0,0,0,0.2);
  }

  .badge {
    font-size: 0.75rem;
    padding: 0.5em;
  }

  .book-item {
    transition: transform 0.3s ease;
  }

  .book-item:hover {
    transform: scale(1.02);
  }

  .card-body {
    padding: 15px;
  }

  .card-footer {
    padding: 10px 15px;
    font-size: 0.9rem;
  }

  /* Đảm bảo các nút không quá rộng */
  .btn-group a, .btn-group button {
    font-size: 0.85rem;
  }
</style>

@endsection
