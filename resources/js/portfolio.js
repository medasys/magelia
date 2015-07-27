jQuery(document).ready(function($) {
  //Portfolio Filter Jquery
	var $container = $('.pf-box-3col');
  
  $container.imagesLoaded(function() {
  	$container.isotope({
  		filter: '*',
  		animationOptions: {
  			duration: 750,
  			easing: 'linear',
  			queue: false,
  		}
    });
	});
	$('#pf-filter a').click(function(){
		var selector = $(this).attr('data-filter');
		$container.isotope({
			filter: selector,
			animationOptions: {
				duration: 750,
				easing: 'linear',
				queue: false,
			}
		});
	  return false;
	});

	var $optionSets = $('#pf-filter'),
     $optionLinks = $optionSets.find('a');

     $optionLinks.click(function(){
        var $this = $(this);
    // don't proceed if already selected
    if ( $this.hasClass('selected') ) {
        return false;
    }
   var $optionSet = $this.parents('#pf-filter');
   $optionSet.find('.selected').removeClass('selected');
   $this.addClass('selected'); 
  });
  
});