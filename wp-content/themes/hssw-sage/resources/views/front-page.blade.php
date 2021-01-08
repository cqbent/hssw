@extends('layouts.app')
@section('content_header')
  @php print features_carousel() @endphp
@endsection
@section('content')
  @while(have_posts()) @php the_post() @endphp
    <h2>Author of the Week</h2>
    @php print featured_authors() @endphp

    <h2>Featured Events</h2>
    @php print featured_other_events() @endphp

    <h2>Featured Blog Posts</h2>
    @php print featured_blog_posts() @endphp

  @endwhile
@endsection
