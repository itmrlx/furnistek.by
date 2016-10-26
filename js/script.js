// fonts
WebFontConfig = {
	google: { families: [ 'PT+Sans+Narrow:400,700:latin,cyrillic' ] }
};
(function() {
	var wf = document.createElement('script');
	wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
		'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
	wf.type = 'text/javascript';
	wf.async = 'true';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(wf, s);
})();
WebFontConfig = {
	google: { families: [ 'PT+Sans:400,700:latin,cyrillic' ] }
};
(function() {
	var wf = document.createElement('script');
	wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
		'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
	wf.type = 'text/javascript';
	wf.async = 'true';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(wf, s);
})();
WebFontConfig = {
  google: { families: [ 'Roboto:400,700:latin,cyrillic' ] }
};
(function() {
  var wf = document.createElement('script');
  wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
  wf.type = 'text/javascript';
  wf.async = 'true';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(wf, s);
})();

// fancybox
$( document ).ready(function() {
	// create & show titles
	jQuery.fn.getTitle = function() { // Copy the title of every IMG tag and add it to its parent A so that fancybox can show titles
		var arr = jQuery("a.fancybox");
		jQuery.each(arr, function() {
			var title = jQuery(this).children("img").attr("title");
			jQuery(this).attr('title',title);
		})
	}

	// Find a>img and create fancybox image gallery
	var thumbnails = jQuery("a:has(img)").not(".nolightbox").filter( function() { return /\.(jpe?g|png|gif|bmp)$/i.test(jQuery(this).attr('href')) });

	//find post>a>img
	var posts = jQuery(".post"); 
	posts.each(function() {
		jQuery(this).find(thumbnails).addClass("fancybox").attr("rel","fancybox"+posts.index(this)).getTitle()
	});

	// fancybox on
	jQuery("a.fancybox").fancybox({
		helpers : {
			overlay : {
				locked : false // try changing to true and scrolling around the page
			}
		}
	});
}); //end document ready

// slider main
$('.slider-container').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  dots: false,
  arrows: false,
  autoplay: true,
  autoplaySpeed: 5000,
});

// menu
$(".pro-vmenu .menu-item-has-children>a").removeAttr("href");
$(".pro-vmenu .menu-item-has-children>a").click(function () {
	$(this).next('.sub-menu').stop(true,true).slideToggle();
	$(this).parent('li').toggleClass('open');
});