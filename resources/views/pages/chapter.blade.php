@extends('../layout')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mt-3">
  <ol class="breadcrumb bg-light px-3 py-2 rounded shadow-sm">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="{{ url('the-loai/' . $truyen_breadcrumb->theloai->slug_theloai) }}">{{ $truyen_breadcrumb->theloai->tentheloai }}</a></li>
    <li class="breadcrumb-item"><a href="{{ url('danh-muc/' . $truyen_breadcrumb->danhmuctruyen->slug_danhmuc) }}">{{ $truyen_breadcrumb->danhmuctruyen->tendanhmuc }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $truyen_breadcrumb->tentruyen }}</li>
  </ol>
</nav>

<!-- Nội dung chương -->
<div class="row mt-4">
  <div class="col-md-12">
    <div class="card shadow-sm mb-4">
      <div class="card-body">
        <h4 class="mb-3 text-primary">{{ $chapter->truyen->tentruyen }}</h4>
        <h5 class="mb-4">Chương hiện tại: <strong>{{ $chapter->tieude }}</strong></h5>
        <div class="fb-share-button" data-href="{{\URL::current()}}" data-layout="button_count" data-size="large"><a target="_blank" href="{{\URL::current()}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>

        <!-- Navigation chương -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <a class="btn btn-outline-primary {{ $chapter->id == $min_id->id ? 'isDisabled' : '' }}"
             href="{{ url('xem-chapter/' . $previous_chapter) }}">Tập trước</a>

          <select name="select-chapter" class="form-select w-50 select-chapter">
            @foreach($all_chapter as $chap)
              <option value="{{ url('xem-chapter/' . $chap->slug_chapter) }}">{{ $chap->tieude }}</option>
            @endforeach
          </select>

          <a class="btn btn-outline-primary {{ $chapter->id == $max_id->id ? 'isDisabled' : '' }}"
             href="{{ url('xem-chapter/' . $next_chapter) }}">Tập sau</a>
        </div>

        <!-- Nội dung chương -->
        <div id="noidung" class="noidungchuong bg-light p-4 rounded" style="line-height: 1.8; font-size: 1.1rem;">
    {!! $chapter->noidung !!}
</div>

      </div>
    </div>

    <!-- Chia sẻ và bình luận -->
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="mb-3">📌 Lưu và chia sẻ truyện</h5>
        <div class="mb-3">
          <div class="fb-share-button"
               data-href="{{ $url_canonical }}"
               data-layout="button_count"
               data-size="large">
            <a target="_blank"
               href="https://www.facebook.com/sharer/sharer.php?u={{ $url_canonical }}"
               class="fb-xfbml-parse-ignore">
              Chia sẻ
            </a>
          </div>
        </div>

        <div class="fb-comments"
             data-href="{{ URL::current() }}"
             data-width="100%"
             data-numposts="10">
        </div>
      </div>
    </div>
  </div>
</div>

<!-- CSS cho nút bị disable -->
<style>
  .isDisabled {
    pointer-events: none;
    opacity: 0.5;
    text-decoration: none;
    cursor: not-allowed;
  }
</style>
@endsection
