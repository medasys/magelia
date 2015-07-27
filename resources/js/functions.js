  jQuery(document).ready(function($) {      
      // superFish
  		$("ul.sf-menu").superfish({ 
  			autoArrows: true,
  			animation:  {opacity:'show', height:'show'}
  		});
  		
      $('ul.sf-menu').mobileMenu({
        defaultText: 'Navigate to...',
        className: 'select-menu',
        subMenuDash: '&ndash;&ndash;'
      });
      
      //remove current menu class from drop-downs
  		$("ul.sf-menu ul li").removeClass("current_page_item");
      
     $(".tabs_container").each(function(){
  	   $("ul.tabs",this).tabs("div.panes > div", {tabs:'li',effect: 'fade', fadeOutSpeed: -400});
     });
     
      $(".mini_tabs_container").each(function(){
      	$("ul.mini_tabs",this).tabs("div.panes > div", {tabs:'li',effect: 'fade', fadeOutSpeed: -400});
      });
      $.tools.tabs.addEffect("slide", function(i, done) {
      	this.getPanes().slideUp();
      	this.getPanes().eq(i).slideDown(function()  {
      		done.call();
      	});
      });
      
      //$('.toggle_content:first').show();
      $(".toggle_title").toggle(
      	function(){
      		$(this).addClass('toggle_active');
      		$(this).siblings('.toggle_content').slideDown("fast");
      	},
      	function(){
      		$(this).removeClass('toggle_active');
      		$(this).siblings('.toggle_content').slideUp("fast");
      	}
      );
      
    $(".accordion").each(function(){
  		var $initialIndex = jQuery(this).attr('data-initialIndex');
  		if($initialIndex==undefined){
  			$initialIndex = 0;
  		}
  		jQuery(this).tabs("div.pane", {tabs: '.tab', effect: 'slide',initialIndex: $initialIndex});
  	})
    
    
    /* initialize prettyphoto */
    $("a[rel^='prettyPhoto']").prettyPhoto({
  		theme: 'light_square',
      social_tools: false
    });
    
    //Fade portfolio
  	$(".fade").fadeTo(1, 1);
  	$(".fade").hover(
    	function () {$(this).fadeTo("fast", 0.45);},
    	function () { $(this).fadeTo("slow", 1);}
    	);
      
      
    /* Contact Form Processing */  
    $('#buttonsend').click( function() {
  	
  		var name    = $('#name').val();
  		var subject = $('#subject').val();
  		var email   = $('#email').val();
  		var message = $('#message').val();
  		
  		$('.loading').fadeIn('fast');
  		
  		if (name != "" && subject != "" && email != "" && message != "")
  			{
  
  				$.ajax(
  					{
  						url: './sendemail.php',
  						type: 'POST',
  						data: "name=" + name + "&subject=" + subject + "&email=" + email + "&message=" + message,
  						success: function(result) 
  						{
  							$('.loading').fadeOut('fast');
  							if(result == "email_error") {
  								$('#email').css("border","1px solid #FFB8B8").next('.require').text(' !');
  							} else {
  								$('#name, #subject, #email, #message').css("border","1px solid #eaeaea").val("");
  								$('<div class="success-contact">Your message has been sent successfully. Thank you! </div>').insertBefore('#contactFormArea');
  								$('.success-contact').fadeOut(6000, function(){ $(this).remove(); });
  							}
  						}
  					}
  				);
  				return false;
  				
  			} 
  		else 
  			{
  				$('.loading').fadeOut('fast');
  				if(name == "") $('#name').css("border","1px solid #FFB8B8").next('.require').text(' !');
  				if(subject == "") $('#subject').css("border","1px solid #FFB8B8").next('.require').text(' !');
  				if(email == "" ) $('#email').css("border","1px solid #FFB8B8").next('.require').text(' !');
  				if(message == "") $('#message').css("border","1px solid #FFB8B8").next('.require').text(' !');
  				return false;
  			}
  	});
  	
  	$('#name, #subject, #email,#message').focus(function(){
  		$(this).css({"border":"1px solid #eaeaea"}).next('.require').text(' *');
  	});  
  	
  });