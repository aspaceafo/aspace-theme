jQuery(document).ready(function(){
   jQuery('#pictures').css("visibility","visible");
   //	jQuery('#directors p').hide();
   
$(".info").each(function(){ //all paragraphs that are children of .member
        $(this).css("height", $(this).height()+"px"); 
        $(this).hide();
		console.log(this);
});   



   function randomMargin(){       
       $('.thumbnail').each(function(){
           randomizeObject(this);
           jQuery(this).parent().find('.description').hide();
       });
   }
 
    
function randomizeObject(el){
    var randomnumber1=Math.floor(Math.random()*285);
//    console.log(randomnumber1);
    var randomnumber2=Math.floor(Math.random()*65);
//    console.log(randomnumber2);
    var randomnumber3=Math.floor(Math.random()*65);
//    console.log(randomnumber3);
    var randomnumber4=Math.floor(Math.random()*65);
//    console.log(randomnumber3);
   // $(".description p").css({"margin-left": randomnumber2+"px"});
    $(el).css({"width": randomnumber1+"px", "margin-left": randomnumber2+"px", "margin-right": randomnumber3+"px", "margin-top": randomnumber4+"px"});
    
   
}
randomMargin()

//toggle -- attempt removing img selector

$('.toggle').click(function() {
    $(this).next('.description').toggle();
    $(this).toggle();
    return false;
   });

$('.toggle2').click(function() {
    $(this).parent().prev('img.toggle').toggle();
    $(this).parent('.description').toggle();
    return false;
   });

$('.description p').click(function() {
    $(this).parent().prev('.toggle').toggle();
    //$(this).parent().prev('img.toggle').toggle();

    $(this).parent('.description').toggle();
    return false;
   });


/*
setupBoardMembers = function() {
    $('.member').click(function() {
        $(this).next('p').slideToggle();
        $(this).toggleClass('redtext');
        return false;
    });
};*/


///////////////////
// Board Members //
///////////////////

setupBoardMembers = function() {
	$('.member').toggle(function () {
	    $(this).addClass("active");
		console.log('add active');
	}, function () {
	    $(this).removeClass("active");
		console.log('removed active')
	});
	$('.member').click(function() {  
		$(this).next('p').slideToggle();
		console.log('done');
		return false;
	});
};



//////////////////
//    Cursor    //
//////////////////


setupCursor = function() { 
	    var curi = 1;
	    var cursor = jQuery('#cursor');
	    var cleartime;
    
	    cursorAni = function() {
	      curi = curi < 22 ? curi + 1 : 1;
	      cursor.css('background-position', '0 ' + curi * 198 + 'px');
	    };

	    jQuery("html").mousemove(function(e) {
	        cursor.css({
	            top: (e.pageY+3),
	            left: (e.pageX - (262 / 2))
	        });
	    });

	    jQuery("a, img").hover(function() {
	        cursorAni();
	    },
	    
	    	function() {
	        	cursorAni();
	    });
    
};

///////////////////
//   BOOKSTORE   //
///////////////////

	$("#bookstore-list a").each(function(){
 		var bookstoreContent = $("#column_2");
 		
 		$(this).unbind('click').click(function(e) {

 			$("#bookstore-list a").removeClass("current_link");
 			$(this).addClass("current_link");
 		 	$("#column_2").load(this.href);
			e.preventDefault();
            
			
			var getid = "#" + this.id;
			window.location = getid;
			//this.hash;

		});

 	});           
       

    //on windowload  
	//read hashtag           
	
/*	$(document).ready(function() {                            
	  
	  var i = 0;
	  i + 1; 
	  if (i < 2){
      
	  	console.log(location.hash);
	  
	  	jQuery(location.hash).click();
      
	  };    
	  
		     
	  //jQuery(location.hash).show();
	  //var locstr3= location.hash;
	  //var locstr3=locstr3.replace("#",".");
	  //jQuery(locstr3).addClass('selected');

	  //scroll to top?
	  //$(window).scrollTop(0);

	});
*/

	
	//select link - load link
    

//////////////////
// AUCTION LOAD //
//////////////////

	$("#auction-list a").each(function(){
 		var bookstoreContent = $("#column_2");
 			
 		$(this).unbind('click').click(function(e) {
 			$("#auction-list a").removeClass("current_link");
 			$(this).addClass("current_link");
 		 	$("#column_2").load(this.href);
			e.preventDefault();
		});
 	});
	
});


jQuery(document).ready(function() {
	setupCursor();
	console.log('cursor setup');	
});
/*
jQuery(window).load(function(){
	jQuery('.page-template-page-auction-php #auction-list #post-8206 p a').click();

});
*/

jQuery(window).load(function(){
	jQuery('.page-id-735 img').removeClass('imagefield-field_pictures');
	jQuery('.page-id-798 #content_pictures div:first-child img').removeClass('imagefield-field_pictures');
	jQuery('.page-id-798 #content_pictures div:first-child img').click(function(){
		window.location = "http://artistsspace.org/2010-annual-edition-portfolio-2/";
	});

	setupBoardMembers();
//	setupCursor();
	
///////////////////////////
// datelink setup       //
// previous exhibitions //
//////////////////////////

	jQuery('.datelink').live('click', function(event) {
		event.preventDefault();
		window.location = this.hash;
		console.log('datelink');
		
		jQuery('.datebox').hide(); //hide datebox?
		
		//jQuery('.selected').removeClass('selected');
		//jQuery(this).addClass('selected');
		jQuery(this.hash).show();
		
		//console.log(location.hash);
	});

//on hashchange do above get location.hash and and add .selected  
	$(window).bind('hashchange', function() {
	  jQuery('.datebox').hide(); //hide datebox?
	  jQuery(location.hash).show();
	
	  console.log('hashchange'+location.hash);  
	
	  jQuery('.selected').removeClass('selected');
		
	  var locstr= location.hash;
	  var locstr=locstr.replace("#",".");
		
	  jQuery(locstr).addClass('selected');
	
	  //console.log(locstr);

	});
	
//get local hash from url and highlight / show it
	$(document).ready(function() {                            
   	 if (location.hash){
	    
	     //event.preventDefault();
	 
	     jQuery(location.hash).show();
		  console.log(location.hash);
		  var locstr2=location.hash;
		  var locstr2=locstr2.replace("#",".");
		  jQuery(locstr2).addClass('selected');

		  //scroll to top?
		  $('*').scrollTop(0);  
		  //$(window).scrollTop();
		  console.log('scrolltop?');
     };

	});
/*
    $(document).ready(function() {
		if (location.hash) {               // do the test straight away
	        window.scrollTo(0, 0);         // execute it straight away
	        setTimeout(function() {
	            window.scrollTo(0, 0);     // run it a bit later also for browser compatibility
	        }, 1); 
		};
    });         
*/      

////////

/*
    jQuery('.datelink').live('click', function(event) {
	event.preventDefault();
	jQuery('.datebox').hide();
	jQuery('.selected').removeClass('selected');
	jQuery(this).addClass('selected');
	jQuery(this.hash).show();
	//window.location = this.hash;
	console.log(location.hash);
});
*/


////	
	jQuery('.page-template-page-contentbookshop-php #column_2 div').hide();
	
	jQuery('#menu-item-590 a').click(function(event){
		event.preventDefault();
		jQuery('#login').insertAfter('#menu-item-562 ul');
		jQuery('#login').show();
	});
	jQuery('#close').click(function(event){
		jQuery('#login').hide();
	})
    
	jQuery('.page-template-page-contentbookshop-php #main_content p a').live('click', function(event) {
		event.preventDefault();
		jQuery('.page-template-page-contentbookshop-php #column_2 div').hide();
		jQuery('.selected').removeClass('selected');
		jQuery(this).addClass('selected');
		jQuery(this.hash).show();
	});
    
    var random = Math.round(Math.random()*16)
    jQuery('.page-template-page-contentbookshop-php #main_content p a').eq(random).click();
    
	//jQuery('.page-template-exhibitions-past-php #datebox h4:first-child a').click();
    jQuery('.page-template-exhibitions-future-php #datebox h4:first-child a').click();
	//jQuery('.page-template-programs-past-php #datebox h4:first-child a').click();
    jQuery('.page-template-programs-future-php #datebox h4:first-child a').click();

	//clickthrough to first auction

/*	var numval=0;	
	for (numval; numval < 1; numval++){
*/	



	/*	}

	numval=5; */	
	});