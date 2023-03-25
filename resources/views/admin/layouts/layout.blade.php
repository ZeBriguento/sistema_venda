<!DOCTYPE html>
<html lang="pt-ao">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>
      @php
          use App\Models\System;
          $title = System::get()->first();
      @endphp
      @yield('title', $title->name)
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    {!! Html::style('css/main.css') !!}
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"> --}}
    @yield('styles')
    <!-- Font-icon css-->
    {{-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
  @include('admin.layouts._header', ['title' => $title->name])
  {{-- @section('system_title')
  Loja Virtual
  @endsection --}}
    <!-- Sidebar menu-->
  @include('admin.layouts._nav')
  <main class="app-content">
    @yield('content')
   
  </main>

    <!-- Essential javascripts for application to work-->
    {!! Html::script('js/jquery-3.3.1.min.js') !!}
    {{-- <script src="js/jquery-3.3.1.min.js"></script> --}}
    {!! Html::script('js/popper.min.js') !!}
    {{-- <script src="js/popper.min.js"></script> --}}
    {!! Html::script('js/bootstrap.min.js') !!}
    {!! Html::script('js/main.js') !!}
    <!-- The javascript plugin to display page loading on top-->
    {!! Html::script('js/plugins/pace.min.js') !!}
    <!-- Page specific javascripts-->
    {!! Html::script('js/fontawesome.js') !!}
    {!! Html::script('js/plugins/jquery.dataTables.min.js') !!}
    {!! Html::script('js/plugins/dataTables.bootstrap.min.js') !!}
     <!-- Data table plugin-->
     {{-- <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script> --}}
     {{-- <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script> --}}
    {{-- <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> --}}
    @yield('scripts')
   
  </body>
</html>