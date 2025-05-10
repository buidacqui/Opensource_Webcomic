<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Sách truyện</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
             <style type="text/css">
                h5{
                  font-weight: bold;
                  line-height: 25px;
                }
                .switch_color{
                  background:#181818;
                  color:#fff;
                }
                .switch_color_light{
                  background: #181818 !important;
                  color:#000;
                }
                .noidung_color{
                  color: #000 !important;

                }
                
             </style>
    </head>
    <body>
        <div class="container">
            <!------------Menu------------->
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4">
  <a class="navbar-brand font-weight-bold text-primary" href="#">Sách Truyện</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarMenu">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-home mr-1"></i>Trang chủ</a>
      </li>

      <!-- Danh mục truyện -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="menuDanhmuc" role="button" data-toggle="dropdown">
          <i class="fa fa-list mr-1"></i>Danh mục truyện
        </a>
        <div class="dropdown-menu">
          @foreach($danhmuc as $key => $danh)
            <a class="dropdown-item" href="{{ url('danh-muc/'.$danh->slug_danhmuc) }}">{{ $danh->tendanhmuc }}</a>
          @endforeach
        </div>
      </li>

      <!-- Thể loại -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="menuTheloai" role="button" data-toggle="dropdown">
          <i class="fa fa-tags mr-1"></i>Thể loại
        </a>
        <div class="dropdown-menu">
          @foreach($theloai as $key => $the)
            <a class="dropdown-item" href="{{ url('the-loai/'.$the->slug_theloai) }}">{{ $the->tentheloai }}</a>
          @endforeach
        </div>
      </li>

      <!-- Sách -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('doc-sach') }}"><i class="fa fa-book mr-1"></i>Sách</a>
      </li>

      <!-- Đăng nhập / Profile -->
      @if(!Session::get('login_publisher'))
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="menuLogin" role="button" data-toggle="dropdown">
          <i class="fa fa-user mr-1"></i>Đăng nhập
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('dang-ky') }}"><i class="fa fa-user-plus mr-1"></i>Đăng ký</a>
          <a class="dropdown-item" href="{{ route('dang-nhap') }}"><i class="fa fa-sign-in mr-1"></i>Đăng nhập</a>
        </div>
      </li>
      @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="menuProfile" role="button" data-toggle="dropdown">
          <i class="fa fa-user-circle mr-1"></i>Chào, {{ Session::get('username') }}
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('yeu-thich')}}"><i class="fa fa-heart"></i>Yêu thích</a>
          <a class="dropdown-item" href="{{ route('lichsu.history') }}"><i class="fa fa-heart"></i>Lịch sử đọc</a>
          <a class="dropdown-item" href="{{route('thong-tin')}}"><i class="fa fa-id-card mr-1"></i>Thông tin cơ bản</a>
          <a class="dropdown-item" href="{{ route('dang-xuat') }}"><i class="fa fa-sign-out mr-1"></i>Đăng xuất</a>
        </div>
      </li>
      @endif

    </ul>
  </div>
</nav>

<form autocomplete="off" action="{{ url('tim-kiem') }}" method="GET" class="form-inline justify-content-center p-3 bg-light rounded shadow-sm">
  <div class="input-group w-50">
    <input 
      type="search" 
      id="keywords" 
      name="tukhoa" 
      class="form-control border-right-0" 
      placeholder="Tìm kiếm tác giả, truyện..." 
      aria-label="Search"
    >
    <div class="input-group-append">
      <button class="btn btn-success" type="submit">🔍 Tìm kiếm</button>
    </div>
  </div>

  <div class="ml-3">
    <select class="custom-select" id="switch_color">
      <option value="xam">🌤 Giao diện sáng</option>
      <option value="den">🌙 Giao diện tối</option>
    </select>
  </div>

  <div id="search_ajax" class="w-100 mt-2"></div>
</form>

<!----------------slide---------------------------->
@yield('slide')
<!----------------sach hay moi cap nhat---------------------------->
@yield('content')
<div class="sharethis-inline-share-buttons my-4"></div>

<footer class="text-muted bg-light py-4 border-top mt-5">
  <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
    <p class="mb-2 mb-md-0">
      📖 Cảm ơn bạn đã ghé thăm! Chúc bạn có những giây phút đọc sách truyện thật thú vị.
    </p>
    <a href="#" class="text-decoration-none">⬆️ Lên đầu trang</a>
  </div>
</footer>




    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    
   <script type="text/javascript">
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    dots:true,
   // nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
   </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
    show_wishlist();

    function show_wishlist() {
    if (localStorage.getItem('wishlist_truyen') != null) {
        var data = JSON.parse(localStorage.getItem('wishlist_truyen'));
        data.reverse();

        for (var i = 0; i < data.length; i++) {
            var title = data[i].title || 'Không có tên';
            var img = data[i].img || '/public/default.jpg'; // fallback nếu thiếu
            var url = data[i].url || '#';

            $('#yeuthich').append(`
                <div class="row mt-2">
                    <div class="col-md-5">
                        <img class="img img-responsive" width="100%" src="${img}" alt="${title}">
                    </div>
                    <div class="col-md-7 sidebar">
                        <a href="${url}">
                            <p>${title}</p>
                        </a>
                    </div>
                </div>
            `);
        }
    }
}
$('.btn-thich_truyen').click(function () {
    $('.fa.fa-heart').css('color', '#fac');

    const title = $(this).closest('ul').find('.wish_title').val();
    const id = $(this).closest('ul').find('.wish_list_id').val();
    const url = $(this).closest('ul').find('.wishlist_url').val();
    const img = $(this).closest('.row').find('img').attr('src');

    console.log("Thêm truyện:", title, id, url, img); // Debug

    const item = { id, title, img, url };

    if (localStorage.getItem('wishlist_truyen') == null) {
        localStorage.setItem('wishlist_truyen', '[]');
    }

    var old_data = JSON.parse(localStorage.getItem('wishlist_truyen'));
    var matches = $.grep(old_data, function (obj) {
        return obj.id == id;
    });

    if (matches.length) {
        alert('Truyện đã có trong danh sách yêu thích');
    } else {
        if (old_data.length <= 5) {
            old_data.push(item);
        } else {
            alert('Đã đạt tới giới hạn lưu truyện yêu thích.');
        }
        localStorage.setItem('wishlist_truyen', JSON.stringify(old_data));
        alert('Đã lưu vào danh sách truyện yêu thích.');
    }
});

</script>

   <script type="text/javascript">

$("#switch_color").change(function() {
    $(document.body).toggleClass('switch_color');
    $('.album').toggleClass('switch_color_light');
    $('.card-body').toggleClass('switch_color');
    $('.noidungchuong').addClass('noidung_color');
    $('ul.muctruyen > li > a').css('color', '#fff');
    $('.sidebar > a').css('color', '#fff');

    if ($(this).val() == 'den') {
        var item = {
            'class_1': 'switch_color',
            'class_2': 'switch_color_light'
        };
        localStorage.setItem('switch_color', JSON.stringify(item));
    } else if ($(this).val() == 'xam') {
        localStorage.removeItem('switch_color');
        $('ul.muctruyen > li > a').css('color', '#000');
    }
});


   </script>

    <script type="text/javascript">
$(document).ready(function(){
    $('.select-chapter').on('change', function() {
        var url = $(this).val();
        if(url){
            window.location = url;
        }
        return false;
    });

    current_chapter();

    function current_chapter(){
        var url = window.location.href;
        $('.select-chapter').find('option[value="'+url+'"]').attr("selected", true);
    }
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.tabs_danhmuc').click(function() {
      const danhmuc_id = $(this).data('danhmuc_id');
      var _token = $('input[name="_token"]').val();

      $.ajax(
        {
          url:'{{url('/tabs-danhmuc')}}',
          method:POST,
          data:{_token:_token,danhmuc_id:danhmuc_id},
          success:function(data){
            $('#tab_danhmuctruyen_'+danhmuc_id).html(data);
          }
        }
      )
    });
  });
</script>
<script>
  function themyeuthich(){
    // alert('ok đã thích');
    var title = $('.btn-yeuthichtruyen').data('fa_title');
    var image = $('.btn-yeuthichtruyen').data('fa_image');
    var publisher_id = $('.btn-yeuthichtruyen').data('fa_publisher_id');
    var _token = $('input[name="_token"]').val(); 

    // alert(title);
    // alert(image);
    // alert(publisher_id);
    $.ajax({
      url: '{{ route('themyeuthich') }}',
      method: 'POST',
      data: { title:title,image:image,publisher_id:publisher_id,_token:_token },
      success: function (data) {
        if(data=='Fail'){
          alert('Truyện đã có trong yêu thích')
        } else
        {
          alert('thêm yêu thích thành công');

        }
      }
    });

  }
</script>
<script type="text/javascript">
  $(document).on('click', '.xemnhanh', function () {
    var sach_id = $(this).attr('id');
    var _token = $('input[name="_token"]').val();

    $.ajax({
      url: '{{ url("/xemsachnhanh") }}',
      method: 'POST',
      dataType: 'JSON',
      data: { sach_id: sach_id, _token: _token },
      success: function (data) {
        $('#tieude_sach').html(data.tieude_sach);
        $('#noidung_sach').html(data.noidung_sach);
      }
    });
  });
</script>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=681addedaa8d70001991d5df&product=inline-share-buttons&source=platform" async="async"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v22.0"></script>
    </body>
</html>
<style>
 .navbar {
    background-color: #fff !important;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 10px 0;
}

.navbar .navbar-brand {
    font-weight: bold;
    color: #007bff;
}

.navbar .navbar-nav .nav-link {
    font-weight: 500;
    color: #333;
    padding: 10px 15px;
}

.navbar .navbar-nav .nav-link:hover {
    color: #007bff;
    background-color: #f1f1f1;
    border-radius: 5px;
}

.navbar .navbar-nav .dropdown-menu {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.navbar .navbar-nav .dropdown-item {
    padding: 10px 15px;
    font-size: 16px;
    color: #333;
}

.navbar .navbar-nav .dropdown-item:hover {
    background-color: #007bff;
    color: #fff;
    border-radius: 5px;
}

.navbar-toggler-icon {
    background-color: #007bff;
}

/* Tìm kiếm */
.form-inline {
    margin-top: 10px;
    margin-bottom: 10px;
}

.form-inline .input-group {
    width: 100%;
}

.form-inline .custom-select {
    background-color: #fff;
    color: #007bff;
    border-radius: 5px;
    border: 1px solid #ddd;
    padding: 5px 15px;
    margin-left: 10px;
}

.form-inline .btn-success {
    background-color: #28a745;
    border-color: #28a745;
    border-radius: 5px;
    padding: 7px 15px;
}

.form-inline .btn-success:hover {
    background-color: #218838;
    border-color: #1e7e34;
}

/* Dropdown menu cho đăng nhập */
.navbar .dropdown-menu {
    min-width: 200px;
}

.navbar .dropdown-item i {
    margin-right: 10px;
}

/* Giao diện tối / sáng */
.switch_color {
    background-color: #181818 !important;
    color: #fff !important;
}

.switch_color_light {
    background-color: #fff !important;
    color: #000 !important;
}
.navbar .nav-item.dropdown.show .dropdown-menu {
    display: block;
    opacity: 1;
    visibility: visible;
    transition: all 0.3s ease-in-out;
}

/* Hiệu ứng di chuyển menu dropdown */
.navbar .navbar-nav .dropdown-menu li {
    position: relative;
}

.navbar .navbar-nav .dropdown-item i {
    margin-right: 10px;
    font-size: 18px; /* Kích thước biểu tượng */
}

/* Điều chỉnh mũi tên */
.navbar .navbar-nav .dropdown-menu a:hover::before {
    content: "\f105"; /* Mũi tên hướng lên */
    font-family: "Font Awesome 5 Free"; 
    font-weight: 900;
    margin-left: 5px;
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
}
</style>