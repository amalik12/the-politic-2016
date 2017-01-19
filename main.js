var currentIndex = 0;
var numArticles = 4;

//ad rotation code
var adurl = 'http://thepolitic.org/wp-content/themes/the_politic_2016/ads/'
var Ad = function (src, url) {
	this.src = adurl + src;
	this.url = url;
};

var ads = [new Ad('African Studies-01.jpg', 'http://african.macmillan.yale.edu/'), new Ad("ISPS_Director's Fellowship.jpg", 'http://isps.yale.edu/programs/isps-directors-fellows'), new Ad("Humanities_What's College For.jpg", 'http://directedstudies.yale.edu/event/whats-college-perspectives-law-business-journalism-and-academics')]
var ad1_id = 0;
var ad2_id = 2 % ads.length


var $ = jQuery.noConflict();
$(document).ready(function () {
	// page loading code
	var offset = 12
	var pageNum = 1
	$('#main-articles')
	.append('<div class="load-post-placeholder"></div>')
	.append('<div class="text-center" id="load-post-button"><a class="load-post-button-inner no-select">Load More</a><img src="http://thepolitic.org/wp-content/themes/the_politic_2016/images/loading.png" class="load-post-loading"></div>');
	var $row = $("<div>", {"class":"row article-list"})
	var $left = $("<div>", {"class": "col-md-4 text-right"})
	var $mid = $("<div>", {"class": "col-md-4 text-center"})
	var $right = $("<div>", {"class": "col-md-4 text-left"})
	$('.load-post-placeholder').append($row)
	var articles = []
	$('#load-post-button a').click(function() {
		$('.load-post-button-inner').css('display', 'none')
		$('.load-post-loading').css('display', 'unset')
		articles = []
		$.ajax({
			type: "GET",
			url: '/wp-json/wp/v2/posts?per_page=15&offset=' + offset,
			dataType: "json",
			success: function(data) {
				for (var i = 0; i < 15; i++) {
					articles.push($("<div>", {"class":"article-link"}))
				}
				for (var i = 0; i < 6; i++) {
					(function (i) {
						$.ajax({
							type: "GET",
							url: data[i]._links.author[0].href,
							dataType: "json",
							success: function(result) {
								articles[i].append($("<a>", {"href":data[i].link}).append($("<h4>" + data[i].title.rendered + "</h4>")))
								.append($("<p class='article-desc'>" + $(data[i].excerpt.rendered).text() + "</p>"))
								var articleTime = data[i].date.split('T')[0].split('-')
								articles[i].append($("<span class='article-date'> | " + parseInt(articleTime[1]) + '.' + parseInt(articleTime[2]) + '.' + parseInt(articleTime[0]) + "</span>"))
								articles[i].find('.article-date').before($("<a href='" + result.link +"'><span class='article-author'>" + result.name + "</span></a>"))
							}
						})
					})(i)
				}
				for (i; i < 9; i++) {
					(function (i) {
						$.ajax({
							type: "GET",
							url: data[i]._links.author[0].href,
							dataType: "json",
							success: function(result) {
								articles[i].append($("<a>", {"href":data[i].link, "class":'article-image-link'}))
								articles[i].append($("<a>", {"href":data[i].link}).append($("<h4>" + data[i].title.rendered + "</h4>")))
								.append($("<p class='article-desc'>" + $(data[i].excerpt.rendered).text() + "</p>"))
								var articleTime = data[i].date.split('T')[0].split('-')
								articles[i].append($("<span class='article-date'> | " + parseInt(articleTime[1]) + '.' + parseInt(articleTime[2]) + '.' + parseInt(articleTime[0]) + "</span>"))
								articles[i].find('.article-date').before($("<a href='" + result.link +"'><span class='article-author'>" + result.name + "</span></a>"))
								$.ajax({
									type: "GET",
									url: data[i]._links['wp:featuredmedia'][0].href,
									dataType: "json",
									success: function(result) {
										articles[i].find('.article-image-link').append($("<img>", {"class":'article-image', "src":result.guid.rendered}))
										$('.load-post-placeholder .article-image').imagesLoaded().progress(function (instance, image) {
											
											var $item = $( image.img );
											$item.css("opacity", 1);
										});
									}
								});
							}
						});
						
					})(i)
				}
				for (i; i < 15; i++) {
					(function (i) {
						$.ajax({
							type: "GET",
							url: data[i]._links.author[0].href,
							dataType: "json",
							success: function(result) {
								articles[i].append($("<a>", {"href":data[i].link}).append($("<h4>" + data[i].title.rendered + "</h4>")))
								.append($("<p class='article-desc'>" + $(data[i].excerpt.rendered).text() + "</p>"))
								var articleTime = data[i].date.split('T')[0].split('-')
								articles[i].append($("<span class='article-date'> | " + parseInt(articleTime[1]) + '.' + parseInt(articleTime[2]) + '.' + parseInt(articleTime[0]) + "</span>"))
								articles[i].find('.article-date').before($("<a href='" + result.link +"'><span class='article-author'>" + result.name + "</span></a>"))
							}
						})
					})(i)
				}
				offset += 17
			},
			error: function(jqXHR, textStatus, errorThrown) {
			},
			complete: function() {
				$('.load-post-button-inner').css('display', 'unset')
				$('.load-post-loading').css('display', 'none')
				for (var i = 0; i < 6; i++) {
					$left.append(articles[i])
				}
				for (i; i < 9; i++) {
					$mid.append(articles[i])
				}
				for (i; i < 15; i++) {
					$right.append(articles[i])
				}
				$('.load-post-placeholder .article-list').append($left)
				$('.load-post-placeholder .article-list').append($mid)
				$('.load-post-placeholder .article-list').append($right)
			}
		});
	})

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

  	$('.ad-vertical-1').attr('src', ads[ad1_id].src);
  	$('.ad-vertical-1-link').attr('href', ads[ad1_id].url);
  	$('.ad-vertical-2').attr('src', ads[ad2_id].src);
  	$('.ad-vertical-2-link').attr('href', ads[ad2_id].url);

  	var adTimer = setInterval(cycleAds, 10000);

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

function cycleAds() {
	ad1_id = (ad1_id + 1) % ads.length;
	ad2_id = (ad2_id + 1) % ads.length;
	$('.ad-vertical-1').attr('src', ads[ad1_id].src);
	$('.ad-vertical-1-link').attr('href', ads[ad1_id].url);
	$('.ad-vertical-2').attr('src', ads[ad2_id].src);
	$('.ad-vertical-2-link').attr('href', ads[ad2_id].url);
}

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