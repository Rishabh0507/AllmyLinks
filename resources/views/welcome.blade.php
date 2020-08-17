@extends('layouts.app')

@section('content')
@include('nav')
<!-- header section -->
<!-- page container -->
<div class="page_container">
  <div class="pricing_container">
    <div class="page_title">
      <h3>Pricing</h3>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      <p> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="price_block">
          <div class="figure_block price_color_one">
            <h4>Free</h4>
            <p>Forever</p>
          </div>
          <div class="figure_list">
            <ul>
              <li><a href="#">Linkkle Profile</a></li>
              <li><a href="#">Linkkle Analytics</a></li>
              <li><a href="#">Unlimited Links</a></li>
              <li><a href="#">Ad Supported</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="price_block">
          <div class="figure_block price_color_two">
            <h4>Free</h4>
            <p>One off fee</p>
          </div>
          <div class="figure_list">
            <ul>
              <li><a href="#">Linkkle Profile</a></li>
              <li><a href="#">Linkkle Analytics</a></li>
              <li><a href="#">Unlimited Links</a></li>
              <li><a href="#">Ad Supported</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="price_block">
          <div class="figure_block price_color_three">
            <h4>Free</h4>
            <p>One off fee</p>
          </div>
          <div class="figure_list">
            <ul>
              <li><a href="#">Linkkle Profile</a></li>
              <li><a href="#">Linkkle Analytics</a></li>
              <li><a href="#">Unlimited Links</a></li>
              <li><a href="#">Ad Supported</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="page_footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page_footer_logo">
          <div class="page_footer_wrapper">
            <a href="index.html"><img src="media/logo_2.png" /></a>
          </div>
        </div>
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
</footer>
@endsection