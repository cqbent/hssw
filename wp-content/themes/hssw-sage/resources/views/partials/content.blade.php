<article @php post_class('row') @endphp>
  <div class="column image col-sm-3">
    {!! hssw_thumbnail_image() !!}
  </div>
  <div class="column content col-sm-9">
    <header>
      <h3 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h3>
      @include('partials/entry-meta')
    </header>
    <div class="entry-summary">
      @php the_excerpt() @endphp
    </div>
  </div>
</article>
