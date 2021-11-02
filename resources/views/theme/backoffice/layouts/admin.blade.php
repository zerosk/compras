<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>@yield('title')</title>
    
    @include('theme.backoffice.layouts.includes.head')
  </head>
  <body>
   
    @include('theme.backoffice.layouts.includes.loader')
    <!-- START HEADER -->
    @include('theme.backoffice.layouts.includes.header')
    
    <!-- START MAIN -->
    <div id="main">
      <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        @include('theme.backoffice.layouts.includes.left-sidebar')

        <section id="content">

          @include('theme.backoffice.layouts.includes.breadcrumbs')

          <div class="container">@yield('content')</div>
 
        </section>

      </div>
    </div> 
    <!-- END MAIN -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START FOOTER -->
    @include('theme.backoffice.layouts.includes.footer')
    @include('theme.backoffice.layouts.includes.foot')
  </body>
</html>