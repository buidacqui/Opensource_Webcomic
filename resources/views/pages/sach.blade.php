@extends('../layout')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&family=Pacifico&display=swap" rel="stylesheet">

<h3 class="custom-heading text-center mb-4">📚 SÁCH MỚI CẬP NHẬT</h3>

<style>
  .custom-heading {
    font-family: 'Orbitron', sans-serif;
    color: #3b82f6;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    letter-spacing: 1px;
    font-size: 2rem;
    animation: pulse-text 2s infinite;
  }
  @keyframes pulse-text {
    0% { transform: scale(1); color: #3b82f6; }
    50% { transform: scale(1.05); color: #2563eb; }
    100% { transform: scale(1); color: #3b82f6; }
  }
</style>

<div class="album py-5 bg-light">
  <div class="container">
    <div class="row" id="book-list">
      @foreach ($sach as $key => $value)
      <div class="col-6 col-md-4 col-lg-3 d-flex align-items-stretch mb-4">
        <div class="card h-100 shadow-sm position-relative" style="transition: all 0.3s ease; border-radius: 10px; overflow: hidden;">
          @if($key < 3)
            <span class="badge bg-danger position-absolute" style="top:10px; left:10px;">Mới</span>
          @endif

          <a href="{{ url('xem-truyen/'.$value->slug_truyen) }}">
            <img class="card-img-top" loading="lazy" src="{{ asset('public/uploads/sach/'.$value->hinhanh) }}" alt="{{ $value->tensach }}" style="height: 250px; object-fit: cover; border-radius: 10px;">
          </a>

          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-truncate" title="{{ $value->tensach }}">{{ $value->tensach }}</h5>
            <p class="card-text text-muted" style="flex-grow: 1; max-height: 60px; overflow: hidden;">{{ $value->tomtat }}</p>
          </div>

          <div class="card-footer d-flex justify-content-between align-items-center" style="background-color: #f8f9fa;">
            <div class="btn-group">
                <form>
                    @csrf
                    <button type="button" id="{{$value->id}}"class="btn btn-primary btn-xemnhanh"
                            data-title="{{ $value->tensach }}"
                            data-summary="{{ $value->tomtat }}"
                            data-img="{{ asset('public/uploads/sach/'.$value->hinhanh) }}"
                            data-content="{{ ($value->noidung) }}"

                            data-toggle="modal"
                            data-target="#quickViewModal">

                        Xem nhanh sách
                    </button>
                </form>
                <button class="btn btn-sm btn-outline-secondary" disabled>
                    <i class="fas fa-eye"></i> {{ $value->views }}
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

    <!-- Nút đóng -->
    <div class="text-center mt-4" id="close-btn-container" style="display: none;">
      <a href="javascript:void(0);" id="close-btn" class="btn btn-secondary mt-3">Đóng</a>
    </div>
  </div>
</div>

<!-- Modal dùng chung -->
<div class="modal fade" id="quickViewModal" tabindex="-1" role="dialog" aria-labelledby="quickViewTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="quickViewTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex flex-wrap">
        <img id="quickViewImg" src="" alt="" style="max-width: 200px; height: auto; margin-right: 15px; border-radius: 10px;">
        <p id="quickViewSummary" class="text-muted" style="flex:1;"></p>
        <p id="quickViewContent" class="mt-3" style="flex:1;"></p> <!-- Nội dung sách -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

{{-- CSS & Hiệu ứng --}}
<style>
  .card { transition: transform 0.3s ease, box-shadow 0.3s ease; border-radius: 10px; }
  .card:hover { transform: translateY(-5px) scale(1.05); box-shadow: 0 8px 24px rgba(0,0,0,0.2); }
  .badge { font-size: 0.75rem; padding: 0.5em; }
  .book-item:hover { transform: scale(1.02); }
  .btn-group a, .btn-group button { font-size: 0.85rem; }
</style>

{{-- Scripts --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
  // Hiển thị modal xem nhanh
  $(document).on('click', '.btn-xemnhanh', function () {
    let title = $(this).data('title');
    let summary = $(this).data('summary');
    let img = $(this).data('img');
    let content = $(this).data('content');  // Thêm dòng này để lấy nội dung sách

    $('#quickViewTitle').text(title);
    $('#quickViewSummary').text(summary);
    $('#quickViewImg').attr('src', img);
    $('#quickViewContent').html(content);  // để hỗ trợ nội dung HTML, không dùng .text()

  });

  // AJAX nút "Xem tất cả"
  $('#view-all-btn').click(function() {
    $.ajax({
      url: '{{ route("ajax.all.truyen") }}',
      method: 'GET',
      success: function(response) {
        $('#book-list').empty();
        response.forEach(function(book) {
          let html = `
          <div class="col-6 col-md-4 col-lg-3 mb-4 book-item">
            <div class="card shadow-sm h-100" style="border-radius: 10px; overflow: hidden;">
              <img src="{{ asset('public/uploads/truyen/') }}/${book.hinhanh}" alt="${book.tentruyen}" class="card-img-top" style="height: 250px; object-fit: cover;">
              <div class="card-body">
                <h5 class="card-title text-truncate">${book.tentruyen}</h5>
                <p class="card-text text-muted" style="max-height: 60px; overflow: hidden;">${book.tomtat}</p>
              </div>
              <div class="card-footer d-flex justify-content-between align-items-center" style="background-color: #f8f9fa;">
                <a href="{{ url('xem-truyen') }}/${book.slug_truyen}" class="btn btn-sm btn-outline-primary">Đọc ngay</a>
                <button class="btn btn-sm btn-outline-secondary" disabled>
                  <i class="fas fa-eye"></i> 12345
                </button>
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

  // Reload lại trang khi nhấn nút đóng
  $('#close-btn').click(function() {
    location.reload();
  });
});
</script>
@endsection
