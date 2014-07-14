<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    
    <!-- Use title if it's in the page YAML frontmatter -->
    <title>Pengajuan Lembur PT.TKPI Temanggung</title>
    
    <link href="{{ asset('stylesheets/normalize-6197e73d.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('stylesheets/all.css') }}" rel="stylesheet" type="text/css" />
  </head>
  
  <body class="index">
      <header>
      <img src="{{ asset('images/logo-55d73236.png') }}" />
      {{ link_to('logout', 'Logout', array('class' => 'btn right')) }}

      <span class="user-detail right">
        <i class="fa fa-user fa-fw"></i> {{ Auth::user()->nama }}
      </span>

     <!--  <div class="notification right">
        <i class="fa fa-bullhorn"></i>
        <label>100</label>
        <div class="notification-messages">
          jasldkfj;alskdjf;ljk
        </div>
      </div> -->
  		{{ Menu::renderMenu() }}      
    </header>

    <section class="container">
    @yield('content')
    </section>

    <script src="{{ asset('javascripts/all-7665c61b.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
    	@yield('script');
    </script>
</body>
</html>