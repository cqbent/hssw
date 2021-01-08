<header class="banner">
  <div class="container">
    <div class="logo">
      <a class="brand" href="{{ home_url('/') }}">
        <img src="{{ get_stylesheet_directory_uri() }}/assets/images/hssw_logo_typewriter.png" alt="{{ get_bloginfo('name', 'display') }}" class="logo" />
        <span>Harvard Square <br />Script Writers</span>
      </a>
    </div>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
  </div>
</header>
