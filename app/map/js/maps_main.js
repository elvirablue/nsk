jQuery(function($) {
	// Draggable
	$(window).on('resize', moveMap);
	// Balloons
	$('#map_big .map .mark').click(function(){
		var mark = $(this);
		var balloon = $(this).find('.balloon');
		
		if(!mark.hasClass('active')){
			mark.addClass('active');
				mark.siblings('.mark').removeClass('active');
				mark.siblings('.mark').find('.balloon').fadeOut();
			balloon.fadeIn();
		}
		else {
			mark.removeClass('active');
			balloon.fadeOut();
		}
	});

	var moveMap = function(){

		var map = $('#map_big .map');
		var edge_r = $(document).width() - 3646;
		var edge_b = 860 - 1800;
		var currentX = 0;
		var currentY = 0;

		map.addClass('draggable');

		map.on('movestart', function(e){
			if($(this).is(':animated')) return false;
			$(this).data({'beforeX': parseInt($(this).css('left')), 'beforeY': parseInt($(this).css('top'))});
			currentX = $(this).data('beforeX');
			currentY = $(this).data('beforeY');
		}).on('move', function(e){
			currentX += e.deltaX;
			currentY += e.deltaY;
			$(this).css({'left': currentX, 'top': currentY}).data({'afterX': currentX, 'afterY': currentY});
		}).on('moveend', function(e){
			var beforeX = $(this).data('beforeX'),
				beforeY = $(this).data('beforeY'),
				afterX 	= $(this).data('afterX'),
				afterY 	= $(this).data('afterY'),
				changeX = afterX - beforeX,
				changeY = afterY - beforeY;
			// to right
			if(changeX > 0 && afterX > 0){
				$(this).animate({'left': 0});
			}
			// to left
			if(changeX < 0 && afterX < edge_r){
				$(this).animate({'left': edge_r});
			}
			// to bottom
			if(changeY > 0 && afterY > 0){
				$(this).animate({'top': 0});
			}
			// to top
			if(changeY < 0 && afterY < edge_b){
				$(this).animate({'top': edge_b});
			}
		});
	};
	moveMap();
});