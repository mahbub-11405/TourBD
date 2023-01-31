<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('/')}}public/frontend/css/my.css">
  <link rel="stylesheet" href="{{asset('/')}}public/frontend/css/responsive.css">
  <meta charset="UTF-8">
  <title>TourBD</title>
</head>
<body>
  <div class="mainbody">
@include('Frontend.includes.header')
@include('Frontend.includes.banner')
    <div class="body">
      <div class="container">
      <div class="row">
@yield('mainbody')
       </div>
      </div>
    </div>
    @include('Frontend.includes.footer')
  </div>
  <script src="{{asset('/')}}js/jquery-2.2.2.min.js"></script>
  <script src="{{asset('/')}}js/bootstrap.min.js"></script>
  <script src="{{asset('/')}}js/parallax.min.js"></script>
</body>
</html>
