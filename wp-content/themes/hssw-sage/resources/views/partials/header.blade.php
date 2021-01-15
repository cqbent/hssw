<header class="banner">
  <div class="container">
    <div class="logo">
      <a class="brand" href="{{ home_url('/') }}">
        <img src="{{ get_stylesheet_directory_uri() }}/assets/images/hssw_logo.png" alt="{{ get_bloginfo('name', 'display') }}" class="logo" />
        <span></span>
      </a>
    </div>
    <nav class="nav-secondary">
      @if (has_nav_menu('secondary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <i class="fas fa-times"></i>
        </button>
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'container_id' => 'navbar', 'container_class' => 'menu-primary collapse fade']) !!}
      @endif
    </nav>
  </div>
</header>
