@extends('layouts.app')

@section('content')
@include('nav')
<div class="login_container">
    <div class="left_login_block login-block">
      <div class="left_inner_login_block">
        <div class="inner_login_left_box">
          <a href="#"><img src="media/logo.png" alt="Logo"></a>
          <p>Finally, all my pages <br> in one place!</p>
        </div>
      </div>
      <div class="inner_login_links">
        <ul>
          <li><a href="#">Terms & Condition</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Help & Contact</a></li>
        </ul>
      </div>
    </div>
    <div class="right_login_block login-block">
      <div class="login_form_container">
        <div class="login_form_inner_container">
          <div class="login_ragistration_block registration_block action_form">
            @if (session()->has('message'))
            <div class="alert alert-{{ session()->get('type') }} alert-dismissable">
                {{ session()->get('message') }}
            </div>
        @endif 
            <form method="Post" action="{{ route('register') }}">
                @csrf
              <div class="custom_fild">
                <input  id="name" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="User Name" onkeypress="return AvoidSpace(event)">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="custom_fild">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="custom_fild">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="custom_fild">
                <input  id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
              </div>
              <div class="custom_fild">
                <input type="submit" name="submit" value="Signup">
              </div>
            </form>
          </div>
          <div class="login_ragistration_block login_block" >
            <form method="Post">
              <div class="custom_fild">
                <input type="email" name="email" placeholder="E-mail">
              </div>
              <div class="custom_fild">
                <input type="password" name="password" value="Password">
              </div>
              <div class="custom_fild">
                <input type="submit" name="submit" value="Login">
              </div>
            </form>
          </div>
          
          <div class="brack_point_line"><span class="form_brack">Or</span></div>
          <div class="social_media_ragistration">
            <div class="social_rag"><a class="twitter_block" href="#"><span class="social_media_rag_icon"><i class="fab fa-twitter"></i></span><span class="social_media_rag_text">Sign in with Twitter</span></a></div>
          <div class="social_rag"><a class="facebook_block" href="{{url('login/facebook')}}"><span class="social_media_rag_icon"><i class="fab fa-facebook"></i></span><span class="social_media_rag_text">Continue with Facebook</span></a></div>
            <div class="social_rag"><a class="google_block" href="#"><span class="social_media_rag_icon"><i class="fab fa-google"></i></span><span class="social_media_rag_text">Sign in with Google</span></a></div>
            <div class="social_rag"><a class="instagram_block" href="#"><span class="social_media_rag_icon"><i class="fab fa-instagram"></i></span><span class="social_media_rag_text">Sign in with Instagram</span></a></div>
          </div>
          <div class="extra_account_option">
          <h4 class="action_form" id="registration_block" onclick="login_function(this.id)"><a href="{{ route('login') }}">Already have an account?</a></h4>
            <h4 id="login_block" onclick="login_function(this.id)"><a href="{{ route('register') }}">Create a new account?</a></h4>
            <p>Log in to All My pages.com</p>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  
  <script type="text/javascript">
  $('#login_block').click(function(){
    $('.login_block').removeClass('action_form');
    $('#login_block').removeClass('action_form');
  
    $('.registration_block').addClass('action_form');
    $('#registration_block').addClass('action_form');
  });
  $('#registration_block').click(function(){
    $('.registration_block').removeClass('action_form');
    $('#registration_block').removeClass('action_form');
  
    $('.login_block').addClass('action_form');
    $('#login_block').addClass('action_form');
  });
  
    // function login_function(tab_id){
    //   var demo_ids = tab_id;
    //   if ($('.'+demo_ids).hasClass('action_form')) {
    //     $('.registration_block').removeClass('action_form');
    //     $('.'+demo_ids).addClass('action_form');
    //   }else{
    //     $('.login_block').removeClass('action_form');
    //     $('.'+demo_ids).addClass('action_form');
    //   }
      
    // };
  
  
            // $('#registration_block').on('click',function(){
            //   $('#login_block').addClass('action_form');
            //   $('#registration_block').removeClass('action_form');
            // });
            // $('#login_block').on('click',function(){
            //   $('#registration_block').addClass('action_form');
            //   $('#login_block').removeClass('action_form');
            // });
  
          </script>
  
  <!-- mid section  -->
  <div class="midd_section">
    <div class="fix_container">
      <div class="midd_title">
        <h4>Never change your bio link again!</h4>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="left_midd_section">
            <div class="left_midd">
              <div class="left_midd_mobile_frame">
                <img src="media/phone@2x.png" alt="">
                <div class="twitte_frame_inncet">
                  <img src="media/screen@2x.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="right_midd_section">
            <div class="right_midd">
              <div class="right_midd_content">
                <p>Link your Instagram, Twitter, Snapchat, Youtube or any other website!</p>
                <p>Create your AllMyLinks profile in seconds, 100% free!</p>
                <p>You are in complete control, there are NEVER any ads on your profile!</p>
                <div class="action_btn">
                  <a href="#">Sign up free</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- footer section -->
  <div class="login_footer">
    <div class="fix_container">
      <div class="row">
        <div class="col-md-6">
          <div class="footer_block_one">
            <img src="media/ocon_one.png" alt="" />
            <div class="footer_block_one_content">
              <h4>One Stop</h4>
              <p>Keep your followers up to date with all your current social accounts</p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="footer_block_one">
            <img src="media/ocon_one.png" alt="" />
            <div class="footer_block_one_content">
              <h4>One Stop</h4>
              <p>Keep your followers up to date with all your current social accounts</p>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="footer_action_btn">
            <div class="action_btn">
              <a href="#">Count me in</a>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="footer_wrapp">
            <ul>
              <li><a href="#">Terms</a></li>
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Help & Contact</a></li>
              <li><a href="#">AllMyLinks</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
