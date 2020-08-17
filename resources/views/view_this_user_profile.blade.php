<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
  <!-- meta tags -->
@if($getProfileDetails->count() != 0)
  <title>{{$getProfileDetails[0]->name}}</title>
@else
  <title>User Profile</title>
@endif
	<!-- page title -->

	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">

	<!-- frameworks file links -->
<link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
	<!-- slider frame -->
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/all.min.css')}}">

	<!-- my custom stylesheets -->
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/page.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
<style type="text/css">
.user_read_container {
	max-width: 600px;
	margin: auto;
	padding: 0 15px;
}
.user_read_profile_pic > img {
	width: 100%;
	max-width: 170px;
	border-radius: 50%;
	border: 8px solid #e0dfdf;
	margin: auto;
	display: block;
}
.user_read_block {
	background-color: #8a368c;
	position: relative;
	margin-bottom: 10px;
}
.user_read_block .user_read_profile_pic > img {
	position: relative;
	bottom: 60px;
}
.user_read_title > h2 {
	font-size: 24px;
	color: white;
	font-weight: 500;
	text-align: center;
	padding: 8px 15px;
	margin-bottom: 0;
}
.user_read_title > p{
	font-size: 14px;
	text-align: center;
	color: white;
	padding-bottom: 10px; 
}
.user_read_logo_block > a > img{
	max-width: 150px;
	padding: 1rem 0; 
	width: 100%;
	display: block;
	margin: auto; 
}
.user_read {
	padding-top: 100px;
}
.user_read_profile_pic {
	margin-bottom: -50px;
}
</style>

@if($getProfileDetails->count() == 0)
    <div class="user_read">
      <div class="user_read_container">
        <div class="user_read_wrapper">
          <div class="user_read_block">
            <div class="user_read_profile_pic">
              <img src="{{asset('media/profile-pic.jpg')}}" alt="Website" />
            </div>
            <div class="user_read_title">
              <h2>Suraj Sharma</h2>
              <p>@shsharma</p>
            </div>
          </div>
          <div class="user_read_block">
            <div class="user_read_title">
              <h2>SurajSharma.com</h2>
            </div>
          </div>
          <div class="user_read_block">
            <div class="user_read_title">
              <h2>Youtube</h2>
            </div>
          </div>
          <div class="user_read_logo">
            <div class="user_read_logo_block">
              <a href="#"><img src="{{asset('media/logo_2.png')}}" alt="logo"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
@else
<div class="user_read">
	<div class="user_read_container">
		<div class="user_read_wrapper">
			<div class="user_read_block">
				<div class="user_read_profile_pic">
        <img src="../media/{{$getProfileDetails[0]->profile_image}}" alt="Website" />
				</div>
				<div class="user_read_title">
					<h2>{{$getProfileDetails[0]->name}}</h2>
          <p>{{"@".$getProfileDetails[0]->user_name}}</p>
          <p style="color: {{$getProfileDetails[0]->user_bio_color}}">{{$getProfileDetails[0]->bio}}</p>
        </div>
			</div>
			{{-- <div class="user_read_block">
				<div class="user_read_title">
        <h2>{{$getProfileDetails[0]->email}}</h2>
				</div>
      </div>  --}}
      @foreach ($getProfileDetails as $userlinks)
    <form action="{{route('go-to-the-url')}}" method="POST">
        @csrf
        <input type="hidden" name="link_id" class="form-control"  value="{{$userlinks->id}}" >
        <input type="hidden" name="link_title" class="form-control"  value="{{$userlinks->title}}" >
        <input type="hidden" name="countryName" class="form-control"  value="country" style="text-transform: uppercase;">
        <input type="hidden" name="flagName" class="form-control"  value="flag" >
        <button type="submit" class="btn btn-block btn-primary user_read_block">{{$userlinks->title}}</button>
      </form>
  
    {{-- <a onclick="getLocation()" href="/redirect/{{$userlinks->id}}/{{$userlinks->title}}" >
          <div class="user_read_block">
            <div class="user_read_title">
              <h2>{{$userlinks->title}}</h2>
            </div>
          </div>
        </a>    --}}
      @endforeach
			<div class="user_read_logo">
				<div class="user_read_logo_block">
                <a href="#"><img src="{{asset('media/logo_2.png')}}" alt="logo"></a>
				</div>
			</div>
		</div>
	</div>
</div>
@endif

<!-- javascript and jquiry file links  -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- <script type="text/javascript" src="assets/js/jquery.slim.min.js"></script> -->
<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/all.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('.hidden_toggle').click(function(){
    $('.inner_nav_wrapper').slideToggle();
  });
 });


jQuery(function($) {
 var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
 $('.inner_nav_wrapper li > a').each(function() {
  if (this.href === path) {
   $(this).addClass('active_nav');
  }
 });
});

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

$(document).ready(function() {

   if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
      alert("Geolocation is not supported by this browser.");
    } 
    
    
  function showPosition(position) {
     getCountry(position.coords.latitude,position.coords.longitude)
  }
  function getCountry(latitude,longitude)
  {
    $.ajax({
      type:"GET",
      url:"https://api.opencagedata.com/geocode/v1/json?q="+latitude+"%2C%20"+longitude+"&key=63f7a5fbd81d4ee5bccb6949260e926b&language=en&pretty=1",
      success: function(data) {
        getFlag(data.results[0].components.country, data.results[0].components.country_code )
        // console.log(data.results[0].components.country);
      }
    });
  }
  function getFlag(country , code)
  {
    $.ajax({
      type:"GET",
      url:"{{url('https://restcountries.eu/rest/v2/name/')}}" + country,
      success: function(data) {
        storeData(code,data[1].flag)
      }
    });
  }
  function storeData(code,flag)
  {
    $inVal = document.getElementsByName("countryName");
    $flgVal = document.getElementsByName("flagName");
    for (i = 0; i < $inVal.length; i++) {
      $inVal[i].value = code
    }
    for (j = 0; j < $flgVal.length; j++) {
      $flgVal[j].value = flag
    }
    
  }

});
  
  // var x = document.getElementById("demo");
  
  // function getLocation() {
  //   if (navigator.geolocation) {
  //     navigator.geolocation.getCurrentPosition(showPosition);
  //   } else { 
  //     alert("Geolocation is not supported by this browser.");
  //   }
  // }
  
  </script>
 
</body>
</html>
