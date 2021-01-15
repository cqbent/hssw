<article @php post_class('row') @endphp>
  <div class="column image col-sm-3">
    {!! get_the_post_thumbnail() !!}
  </div>
  <div class="column content col-sm-9">
    <header>
      <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
      @include('partials/entry-meta')
    </header>
    <div class="entry-summary">
      @php the_excerpt() @endphp
    </div>
  </div>
</article>
