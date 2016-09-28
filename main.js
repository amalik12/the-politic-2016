var currentIndex = 0;
var numArticles = 4;
var $ = jQuery.noConflict();
$(document).ready(function () {
	// reading progress code
	if ($( "#post" ).length) {
		$('#progress').css('width', "0%");
		var winHeight = $(window).height(),
		docHeight = $('#post-end').offset().top;
		max = docHeight - winHeight;
		$('#progress').css('transition', 'all 0.1s linear 0s');
		$(document).on('scroll', function() {
			value = $(window).scrollTop();

			var position = value / max * 100;
			$('#progress').css('width', position + "%");
		});

		$(window).on('resize', function() {
			winHeight = $(window).height(),
			docHeight = $('#post-end').offset().top;

			max = docHeight - winHeight;
			value =  $(window).scrollTop();

			var position = value / max * 100;
			$('#progress').css('width', position + "%");
		});

		$('span[style]').removeAttr('style');
		$('#post a[style]').removeAttr('style');
		var introText = $('#post p').first().text().split(' ').slice(0,3).join(' ');
		$('#post p').first().text($('#post p').first().text().replace(introText, ""));
		$('#post p').first().prepend($.parseHTML("<span class='post-intro'>" + introText + " </span>"))
	}


	$('#latest-link').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 600);
	        return false;
	      }
	    }
  	});

  	//front page dropdown menus
  	$('#magazine-link').click(function() {
	    $('#carouselMenuSpacer').collapse('toggle');
  	});

  	$('#about-link').click(function() {
	    $('#carouselMenuSpacer1').collapse('toggle');
  	});

  	//ad rotation code
  	var adImages = ['http://thepolitic.org/wp-content/themes/the_politic_2016/ads/JDST-01.jpg', 'http://thepolitic.org/wp-content/themes/the_politic_2016/ads/JDST-02.jpg', 'http://thepolitic.org/wp-content/themes/the_politic_2016/ads/WGSS_250x550.jpg', 'http://thepolitic.org/wp-content/themes/the_politic_2016/ads/African Studies-01.jpg', 'http://thepolitic.org/wp-content/themes/the_politic_2016/ads/ISPS_Dahl Scholars-01.jpg'];
  	var adLinks = ['http://judaicstudies.yale.edu/', 'http://judaicstudies.yale.edu/', 'http://wgss.yale.edu/', 'http://african.macmillan.yale.edu/', 'http://isps.yale.edu/dahl-research-scholars'];

  	var ad1_id = Math.floor(Math.random() * adImages.length);
  	$('.ad-vertical-1').attr('src', adImages[ad1_id]);
  	$('.ad-vertical-1-link').attr('href', adLinks[ad1_id]);

  	var ad2_id = ad1_id;
  	while (ad2_id == ad1_id){
  		ad2_id = Math.floor(Math.random() * adImages.length);
  	}

  	$('.ad-vertical-2').attr('src', adImages[ad2_id]);
  	$('.ad-vertical-2-link').attr('href', adLinks[ad2_id]);

	//homepage carousel code
	var image = $('.front-carousel-image').eq(currentIndex);
	var item = $('.front-carousel-item').eq(currentIndex);
	item.addClass('active');
	image.addClass('active');
	$('.front-carousel-item-mobile .front-article-title').text(item.find('.front-article-title').text());
	$('.front-carousel-item-mobile').find('p').text(item.find('p').text());
	$('.mobile-carousel-item').attr('href', item.parent().attr('href'));

	var timer = setInterval(cycleGallery, 4500);

	$('.front-carousel-item').click(function(e) {
		var index = $('.front-carousel-item').index($(this));
		if (index == currentIndex) {
			return true;
		} else {
			e.preventDefault();
			clearInterval(timer);
			timer = setInterval(cycleGallery, 3000);
			cycleGallery(index);
		}
	})

	$('.front-carousel-item').hover(function(e) {
		var index = $('.front-carousel-item').index($(this));
		if (index == currentIndex) {
			return true;
		} else {
			e.preventDefault();
		}
	})

	//mobile layout tweaks
	if (window.innerWidth <= 767){
		$(".front-carousel").height(window.innerWidth * .7);
	}

	$(window).on('resize', function() {
		if (window.innerWidth <= 767){
			$(".front-carousel").height(window.innerWidth * .7);
		} else {
			$(".front-carousel").removeAttr('style');
		}
	});
});


function cycleGallery(index) {
	if (index === undefined) {
		index =  currentIndex;
	}
	var images = $('.front-carousel-image');
	var items = $('.front-carousel-item');

	items.eq(currentIndex).removeClass('active');
	images.eq(currentIndex).removeClass('active');
	if (index == currentIndex) {
		index = (index + 1) % numArticles;
	}
	currentIndex = index;
	items.eq(index).addClass('active');
	images.eq(index).addClass('active');
	$('.front-carousel-item-mobile .front-article-title').text(items.eq(index).find('.front-article-title').text());
	$('.front-carousel-item-mobile').find('p').text(items.eq(index).find('p').text());
	$('.mobile-carousel-item').attr('href', items.eq(index).parent().attr('href'));
}