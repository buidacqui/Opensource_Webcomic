<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sách truyện</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
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
    <form class="form-inline my-2 my-lg-0" action ="{{url('tim-kiem')}}" method="GET">
      <input class="form-control mr-sm-2" type="search" name="tukhoa" placeholder="Tìm kiếm tác giả, truyện...." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
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

    </body>
</html>
