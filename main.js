var currentIndex = 0;
var numArticles = 4;
var $ = jQuery.noConflict();
$(document).ready(function () {
	var images = $('.front-carousel-image').not($('.front-carousel-image').eq(currentIndex));
	images.css('opacity', 0);
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
});

function cycleGallery(index) {
	if (index === undefined) {
		index =  currentIndex;
	}
	var images = $('.front-carousel-image');
	var items = $('.front-carousel-item');

	items.eq(currentIndex).removeClass('active');
	images.eq(currentIndex).css('opacity', '0').css('visibility', 'hidden');
	if (index == currentIndex) {
		index = (index + 1) % numArticles;
	}
	currentIndex = index;
	items.eq(index).addClass('active');
	images.eq(index).css('opacity', '1').css('visibility', 'visible');
}