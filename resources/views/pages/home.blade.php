@extends('../layout')

@section('slide')
  @include('pages.slide')
@endsection

@section('content')

<!-- Font Exo -->
<link href="https://fonts.googleapis.com/css2?family=Exo:wght@400;600&display=swap" rel="stylesheet">

<!-- DANH MỤC TABS -->
<div class="container mt-4">
  <h3 class="highlight-heading text-center mb-4"> DANH MỤC TRUYỆN</h3>
  <div class="d-flex flex-wrap justify-content-center gap-2">
    @foreach($danhmuc as $tab_danhmuc)
      <button type="button"
              class="btn btn-outline-primary tabs_danhmuc"
              data-danhmuc_id="{{ $tab_danhmuc->id }}"
              style="min-width: 120px; border-radius: 20px;">
        {{ $tab_danhmuc->tendanhmuc }}
      </button>
    @endforeach
  </div>

  <!-- AJAX hiển thị danh mục truyện -->
  <div class="row mt-4" id="tab_danhmuctruyen">
    {{-- Truyện từ danh mục sẽ được load vào đây --}}
  </div>
</div>

<!-- HEADING -->
<h3 class="highlight-heading text-center mb-4"> TRUYỆN MỚI</h3>

<!-- DANH SÁCH TRUYỆN -->
<div class="album py-4 bg-light">
  <div class="container">
    <div class="row" id="book-list">
      @foreach ($truyen as $key => $value)
        <div class="col-6 col-md-4 col-lg-3 d-flex align-items-stretch mb-4">
          <div class="card h-100 shadow-sm position-relative">
            @if($key < 3)
              <span class="badge bg-danger position-absolute" style="top:10px; left:10px; z-index: 10;">Mới</span>
            @endif
            <a href="{{ url('xem-truyen/'.$value->slug_truyen) }}">
              <img class="card-img-top" loading="lazy"
                   src="{{ asset('public/uploads/truyen/'.$value->hinhanh) }}"
                   alt="{{ $value->tentruyen }}"
                   style="height: 250px; object-fit: cover;">
            </a>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title text-truncate"
                  title="{{ $value->tentruyen }}"
                  style="font-family: 'Exo', sans-serif; font-size: 1.1rem;">
                {{ $value->tentruyen }}
              </h5>
              <p class="card-text text-muted"
                 style="flex-grow: 1; max-height: 60px; overflow: hidden;">
                {{ $value->tomtat }}
              </p>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
              <a href="{{ url('xem-truyen/'.$value->slug_truyen) }}" class="btn btn-sm btn-outline-primary">Đọc ngay</a>
              <small class="text-muted">{{ $value->updated_at->diffForHumans() }}</small>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <!-- TRUYỆN TỪ API NGOÀI (Otruyen) -->
    <div class="row mt-4" id="external-truyen">
      @foreach ($truyenOtruyen as $item)
        <div class="col-6 col-md-4 col-lg-3 d-flex align-items-stretch mb-4">
          <div class="card h-100 shadow-sm">
            @if (!empty($item['image']))
              <img src="{{ $item['image'] }}" alt="{{ $item['name'] ?? 'Truyện' }}"
                   class="card-img-top" style="height: 250px; object-fit: cover;">
            @else
              <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light text-muted" style="height: 250px;">
                Không có ảnh
              </div>
            @endif
            <div class="card-body d-flex flex-column">
              <h5 class="card-title text-truncate"
                  style="font-family: 'Exo', sans-serif; font-size: 1.1rem;">
                {{ $item['name'] ?? 'Không rõ tên' }}
              </h5>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <!-- NÚT "XEM TẤT CẢ" -->
    <div class="text-center mt-4" id="view-all-btn-container">
      <a href="javascript:void(0);" id="view-all-btn" class="btn btn-primary mt-3">Xem tất cả</a>
    </div>

    <!-- NÚT ĐÓNG -->
    <div class="text-center mt-4" id="close-btn-container" style="display: none;">
      <a href="javascript:void(0);" id="close-btn" class="btn btn-secondary mt-3">Đóng</a>
    </div>
  </div>
</div>

<!-- SCRIPT AJAX DANH MỤC -->
<script>
$(document).ready(function(){
  $('.tabs_danhmuc').click(function(e){
    e.preventDefault();
    var danhmuc_id = $(this).data('danhmuc_id');
    $.ajax({
      url: '{{ url("/tabs-danhmuc") }}',
      method: 'POST',
      data: {
        danhmuc_id: danhmuc_id,
        _token: '{{ csrf_token() }}'
      },
      success:function(data){
        $('#tab_danhmuctruyen').html(data);
      },
      error: function(jqXHR, textStatus, errorThrown){
        alert('Lỗi: ' + textStatus + ' - ' + errorThrown);
      }
    });
  });
});
</script>

<!-- SCRIPT AJAX XEM TẤT CẢ -->
<script>
$(document).ready(function() {
  $('#view-all-btn').click(function() {
    $.ajax({
      url: '{{ route("ajax.all.truyen") }}',
      method: 'GET',
      success: function(response) {
        $('#book-list').empty();
        response.forEach(function(book) {
          var html = `
            <div class="col-6 col-md-4 col-lg-3 d-flex align-items-stretch mb-4">
              <div class="card h-100 shadow-sm">
                <img src="{{ asset('public/uploads/truyen/') }}/${book.hinhanh}" alt="${book.tentruyen}"
                     class="card-img-top" style="height: 250px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title text-truncate"
                      style="font-family: 'Exo', sans-serif; font-size: 1.1rem;">
                    ${book.tentruyen}
                  </h5>
                  <p class="card-text text-muted"
                     style="flex-grow: 1; max-height: 60px; overflow: hidden;">
                    ${book.tomtat}
                  </p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                  <a href="{{ url('xem-truyen/') }}/${book.slug_truyen}" class="btn btn-sm btn-outline-primary">Đọc ngay</a>
                  <small class="text-muted">Vừa cập nhật</small>
                </div>
              </div>
            </div>
          `;
          $('#book-list').append(html);
        });
        $('#view-all-btn-container').hide();
        $('#close-btn-container').show();
      },
      error: function() {
        alert('Lỗi khi tải truyện');
      }
    });
  });

  $('#close-btn').click(function() {
    location.reload();
  });
});
</script>

<!-- CSS -->
<style>
  .highlight-heading {
    font-family: 'Exo', sans-serif;
    font-weight: 600;
    font-size: 32px;
    letter-spacing: 1px;
    color: #333;
    margin-top: 25px;
  }

  .card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 10px;
    overflow: hidden;
  }

  .card:hover {
    transform: translateY(-5px) scale(1.03);
    box-shadow: 0 8px 24px rgba(0,0,0,0.15);
  }

  .book-item:hover {
    transform: scale(1.02);
  }

  .btn-outline-primary {
    transition: all 0.2s ease-in-out;
  }

  .tabs_danhmuc:hover {
    background-color: #2563eb;
    color: #fff;
  }

  .card-body {
    padding: 1rem;
  }

  .card-footer {
    padding: 0.75rem 1rem;
    background-color: #f8f9fa;
  }
</style>

@endsection
