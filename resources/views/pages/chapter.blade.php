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
<link href="https://fonts.googleapis.com/css2?family=Exo&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bad+Script&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Baloo+Da&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bitter&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Chivo&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Changa&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Courier+Prime&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Domine&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Droid+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Gloock&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Hind&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Kalam&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Metal+Mania&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Signika+Negative&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Zilla+Slab&display=swap" rel="stylesheet">

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
          <a class="btn btn-outline-primary {{ $chapter->id == $min_id->id ? 'isDisabled' : '' }} "
             href="{{ url('xem-chapter/' . $previous_chapter) }}">Tập trước</a>

          <select name="select-chapter" class="form-select w-50 select-chapter">
            @foreach($all_chapter as $chap)
              <option value="{{ url('xem-chapter/' . $chap->slug_chapter) }}">{{ $chap->tieude }}</option>
            @endforeach
          </select>

          <a class="btn btn-outline-primary {{ $chapter->id == $max_id->id ? 'isDisabled' : '' }} "
             href="{{ url('xem-chapter/' . $next_chapter) }}">Tập sau</a>
        </div>

        <!-- Tùy chỉnh font chữ và kích thước -->
        <div class="d-flex mb-4">
          <!-- Tùy chỉnh kích thước chữ -->
          <div class="me-3">
            <label for="font-size" class="form-label">Kích thước chữ:</label>
            <select id="font-size" class="form-select w-auto" onchange="changeFontSize()">
              <option value="1.1rem">Mặc định</option>
              <option value="1.2rem">Lớn</option>
              <option value="1.3rem">Rất lớn</option>
            </select>
          </div>

          <!-- Tùy chỉnh font chữ -->
          <div>
            <label for="font-family" class="form-label">Chọn font chữ:</label>
            <select id="font-family" class="form-select w-auto" onchange="changeFontFamily()">
            <option value="Arial, sans-serif">Mặc định (Arial)</option>
            <option value="'Times New Roman', serif">Times New Roman</option> 

<option value="'Exo', sans-serif">Exo</option>
<option value="'Orbitron', sans-serif">Orbitron</option>
<option value="'Pacifico', sans-serif">Pacifico</option>
<option value="'Roboto', sans-serif">Roboto</option>
<option value="'Lobster', cursive">Lobster</option>
<option value="'Montserrat', sans-serif">Montserrat</option>
<option value="'Open Sans', sans-serif">Open Sans</option>
<option value="'Playfair Display', serif">Playfair Display</option>
<option value="'Cinzel', serif">Cinzel</option>
<option value="'Slabo 27px', serif">Slabo 27px</option>
<option value="'Abril Fatface', cursive">Abril Fatface</option>
<option value="'Alfa Slab One', cursive">Alfa Slab One</option>
<option value="'Amatic SC', cursive">Amatic SC</option>
<option value="'Anton', sans-serif">Anton</option>
<option value="'Architects Daughter', cursive">Architects Daughter</option>
<option value="'Bad Script', cursive">Bad Script</option>
<option value="'Baloo Da', cursive">Baloo Da</option>
<option value="'Barlow Condensed', sans-serif">Barlow Condensed</option>
<option value="'Be Vietnam', sans-serif">Be Vietnam</option>
<option value="'Bitter', serif">Bitter</option>
<option value="'Black Ops One', sans-serif">Black Ops One</option>
<option value="'Cabin', sans-serif">Cabin</option>
<option value="'Chivo', sans-serif">Chivo</option>
<option value="'Changa', sans-serif">Changa</option>
<option value="'Comfortaa', cursive">Comfortaa</option>
<option value="'Courier Prime', monospace">Courier Prime</option>
<option value="'Dancing Script', cursive">Dancing Script</option>
<option value="'Delius', cursive">Delius</option>
<option value="'Domine', serif">Domine</option>
<option value="'Droid Sans', sans-serif">Droid Sans</option>
<option value="'Fira Sans', sans-serif">Fira Sans</option>
<option value="'Fredericka the Great', cursive">Fredericka the Great</option>
<option value="'Gloock', sans-serif">Gloock</option>
<option value="'Great Vibes', cursive">Great Vibes</option>
<option value="'Hind', sans-serif">Hind</option>
<option value="'Josefin Sans', sans-serif">Josefin Sans</option>
<option value="'Julius Sans One', sans-serif">Julius Sans One</option>
<option value="'Kalam', cursive">Kalam</option>
<option value="'Karla', sans-serif">Karla</option>
<option value="'Lora', serif">Lora</option>
<option value="'Luckiest Guy', cursive">Luckiest Guy</option>
<option value="'Metal Mania', cursive">Metal Mania</option>
<option value="'Nunito', sans-serif">Nunito</option>
<option value="'PT Serif', serif">PT Serif</option>
<option value="'Quicksand', sans-serif">Quicksand</option>
<option value="'Raleway', sans-serif">Raleway</option>
<option value="'Sacramento', cursive">Sacramento</option>
<option value="'Signika Negative', sans-serif">Signika Negative</option>
<option value="'Source Serif Pro', serif">Source Serif Pro</option>
<option value="'Zilla Slab', serif">Zilla Slab</option>
            </select>
          </div>
        </div>

        <!-- Nội dung chương -->
        <div id="noidung" class="noidungchuong bg-light p-4 rounded" style="line-height: 1.8; font-size: 1.1rem; font-family: 'Arial', sans-serif;">
          {!! $chapter->noidung !!}
        </div>

      </div>
    </div>

    <!-- Chia sẻ và bình luận -->
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="mb-3"> Lưu và chia sẻ truyện</h5>
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
  .form-label {
    color: #4CAF50; /* Màu xanh lá */
    font-weight: bold; /* Làm đậm chữ */
  }

  .isDisabled {
    pointer-events: none;
    opacity: 0.5;
    text-decoration: none;
    cursor: not-allowed;
  }

  .noidungchuong {
    word-wrap: break-word;
  }
</style>

<!-- JS để thay đổi kích thước font chữ và font gia đình -->
<script>
  function changeFontSize() {
    var fontSize = document.getElementById('font-size').value;
    document.getElementById('noidung').style.fontSize = fontSize;
  }

  function changeFontFamily() {
    var fontFamily = document.getElementById('font-family').value;
    document.getElementById('noidung').style.fontFamily = fontFamily;
  }
</script>

@endsection
