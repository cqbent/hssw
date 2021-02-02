@extends('layouts.app')
@section('content_header')
  @php print features_carousel() @endphp
@endsection
@section('content')
  @while(have_posts()) @php the_post() @endphp
    <h2>Author of the Week</h2>
    @php print featured_authors() @endphp

    <h2>Events & Workshops</h2>
    @php print featured_other_events() @endphp

    <h2>Director's Blog</h2>
    @php print featured_blog_posts() @endphp

  @endwhile
@endsection
