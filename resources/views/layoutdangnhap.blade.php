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
                          body {
                            background: url('{{ asset('images/ok.jpg') }}');
                            background-size: cover;
              min-height: 100vh;
            }

            .card {
              background-color: rgba(255, 255, 255, 0.95); /* nền trắng mờ cho form đăng nhập */
            }
             </style>
    </head>
    <body>
        <div class="container">
    


<!----------------slide---------------------------->
@yield('slide')
<!----------------sach hay moi cap nhat---------------------------->
@yield('content')
<div class="sharethis-inline-share-buttons my-4"></div>




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
   
    </body>
</html>
