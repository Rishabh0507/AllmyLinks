<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet"> 

    <!-- frameworks file links -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}"> 
    <!-- slider frame -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/all.min.css') }}">
  
    <!-- my custom stylesheets -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/page.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
  
</head>
<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>
<script type="text/javascript" src="{{  asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{  asset('js/all.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() { 
         $('.box_grid').click(function() { 
             $('.box_grid.box_grid_active').removeClass("box_grid_active"); 
             $(this).addClass("box_grid_active");
 
         }); 
     }); 
    $(document).ready(function() { 
         $('.box_grid').click(function() { 
       
       $('.list_view').removeClass('active_grid_block');
       $('.grid_view').addClass('active_grid_block');
       
     });
      $('.list_grid').click(function() { 
       $('.grid_view').removeClass('active_grid_block');
       $('.list_view').addClass('active_grid_block');
     });
     }); 
 </script>
 <script type="text/javascript">
 
 $('.slider_content').slick({
   dots: true,
   infinite: true,
   autoplay: true,
   arrows: false,
   appendDots: false,
   prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-angle-left"></i></button>',
   nextArrow: '<button type="button" class="slick-next"><i class="fas fa-angle-right"></i></button>',
   speed: 300,
   slidesToShow: 4,
   adaptiveHeight: true,
   responsive: [
     {
       breakpoint: 1200,
       settings: {
      arrows: false,
         slidesToShow: 3
       }
     },
     {
       breakpoint: 767,
       settings: {
      arrows: false,
         slidesToShow: 2
       }
     },
     {
       breakpoint: 380,
       settings: {
      arrows: false,
         slidesToShow: 1
       }
     }
   ]
 });
 
 function desktop_toggle() {
   var x = document.getElementById("navigation_options");
   if (x.style.display === "none") {
     x.style.display = "block";
   } else {
     x.style.display = "none";
   }
 }
 
 </script>
 
 <script type="text/javascript">
 var x, i, j, l, ll, selElmnt, a, b, c;
 /* Look for any elements with the class "custom-select": */
 x = document.getElementsByClassName("custom-select");
 l = x.length;
 for (i = 0; i < l; i++) {
   selElmnt = x[i].getElementsByTagName("select")[0];
   ll = selElmnt.length;
   /* For each element, create a new DIV that will act as the selected item: */
   a = document.createElement("DIV");
   a.setAttribute("class", "select-selected");
   a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
   x[i].appendChild(a);
   /* For each element, create a new DIV that will contain the option list: */
   b = document.createElement("DIV");
   b.setAttribute("class", "select-items select-hide");
   for (j = 1; j < ll; j++) {
     /* For each option in the original select element,
     create a new DIV that will act as an option item: */
     c = document.createElement("DIV");
     c.innerHTML = selElmnt.options[j].innerHTML;
     c.addEventListener("click", function(e) {
         /* When an item is clicked, update the original select box,
         and the selected item: */
         var y, i, k, s, h, sl, yl;
         s = this.parentNode.parentNode.getElementsByTagName("select")[0];
         sl = s.length;
         h = this.parentNode.previousSibling;
         for (i = 0; i < sl; i++) {
           if (s.options[i].innerHTML == this.innerHTML) {
             s.selectedIndex = i;
             h.innerHTML = this.innerHTML;
             y = this.parentNode.getElementsByClassName("same-as-selected");
             yl = y.length;
             for (k = 0; k < yl; k++) {
               y[k].removeAttribute("class");
             }
             this.setAttribute("class", "same-as-selected");
             break;
           }
         }
         h.click();
     });
     b.appendChild(c);
   }
   x[i].appendChild(b);
   a.addEventListener("click", function(e) {
     /* When the select box is clicked, close any other select boxes,
     and open/close the current select box: */
     e.stopPropagation();
     closeAllSelect(this);
     this.nextSibling.classList.toggle("select-hide");
     this.classList.toggle("select-arrow-active");
   });
 }
 
 function closeAllSelect(elmnt) {
   /* A function that will close all select boxes in the document,
   except the current select box: */
   var x, y, i, xl, yl, arrNo = [];
   x = document.getElementsByClassName("select-items");
   y = document.getElementsByClassName("select-selected");
   xl = x.length;
   yl = y.length;
   for (i = 0; i < yl; i++) {
     if (elmnt == y[i]) {
       arrNo.push(i)
     } else {
       y[i].classList.remove("select-arrow-active");
     }
   }
   for (i = 0; i < xl; i++) {
     if (arrNo.indexOf(i)) {
       x[i].classList.add("select-hide");
     }
   }
 }
 
 /* If the user clicks anywhere outside the select box,
 then close all select boxes: */
 document.addEventListener("click", closeAllSelect);   
 
 </script>

 <script>
    $(document).ready(function (e) {
            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $(".confirm_id").val(id);
            });
            $(document).on("click", '.editUserLinkbutton', function(e){
        
                var id = $(this).data('id'); 
                var urlTitle = $(this).data('title');
                var UrlBody = $(this).data('url');
                
                $(".update_link_id").val(id);
                $(".link_title_update").val(urlTitle);
                $(".link_url_update").val(UrlBody);
                
            })
        });

        function AvoidSpace(event) {
        var k = event ? event.which : window.event.keyCode;
        if (k == 32) return false;
      }
 </script>
</body>
</html>
