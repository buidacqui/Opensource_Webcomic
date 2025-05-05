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
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Sach truyện</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">Trang chủ <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Danh mục truyện
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @foreach($danhmuc as $key => $danh)
          <a class="dropdown-item" href="{{url('danh-muc/'.$danh->slug_danhmuc)}}">{{$danh->tendanhmuc}}</a>
          @endforeach
        </div>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Thể loại
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @foreach($theloai as $key => $the)
          <a class="dropdown-item" href="{{url('the-loai/'.$the->slug_theloai)}}">{{$the->tentheloai}}</a>
          @endforeach          
        </div>
      </li>
      
    </ul>
    <form autocomplete="off" class="form-inline my-2 my-lg-0" action ="{{url('tim-kiem')}}" method="GET">
      <input class="form-control mr-sm-2" type="search" id="keywords" name="tukhoa" placeholder="Tìm kiếm tác giả, truyện...." aria-label="Search">
          <div id="search_ajax"></div>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
      <select class="custom-select mr-sm-2" id="switch_color">
        <option value="xam">Trắng</option>
        <option value="den">Đen</option>

      </select>
    </form>
  </div>
</nav>
<!----------------slide---------------------------->
@yield('slide')
<!----------------sach hay moi cap nhat---------------------------->
@yield('content')
            <footer class="text-muted">
                  <div class="container">
                    <p class="float-right">
                      <a href="#">Back to top</a>
                    </p>
                    <p>Album example is © Bootstrap, but please download and customize it for yourself!</p>
                    <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
                  </div>
                </footer>
            </div>



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

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v22.0"></script>
    </body>
</html>
