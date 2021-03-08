export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    var author_path = 'author-of-week';
    if ($('.single-tribe_events').length) {
      //console.log('single event');
      $('.menu-primary .blog').removeClass('current_page_parent');
      var event_cat = $('.tribe-events-event-categories-label a').attr('href');
      if (author_path.indexOf(event_cat)) {
        $('.menu-primary .author-of-week').addClass('current_page_parent');
      }
      else {
        $('.menu-primary .events').addClass('current_page_parent');
      }
    }
    else if($('.single-post').length) {
      if ($('.post.category-author-of-the-week').length) {
        $('.menu-primary .blog').removeClass('current_page_parent');
        $('.menu-primary .author-of-week').addClass('current_page_parent');
      }
      else if ($('.post.category-events-workshops').length) {
        $('.menu-primary .blog').removeClass('current_page_parent');
        $('.menu-primary .events').addClass('current_page_parent');
      }
    }
  },
};
