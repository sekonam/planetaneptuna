/* © 2013 Планета Нептуна. Все права защищены. 
 * Запрещено использование материалов сайта без 
 * согласия его авторов и обратной ссылки. */

jQuery(document).ready(function($) {

// SOCIAL
	$('.hover').hover(
	  function(){
	    $(this).find('div').show();
	  },
	  function(){
	    $(this).find('div').hide();
	  }
	);

// DIV BG HREF
	function HrefChangeBGColorOur(sel){
		$(sel).hover(
			 function(){
			    	$(this).css("background-color", "#dd2d1d");
			    	color_p_source = $(this).find("p").css("color"); 
			    	$(this).find("p").css("color", "#f2f2c0");
			 },
			 function(){
			    	$(this).css("background", "none");
			    	$(this).find("p").css("color", color_p_source);
			 }
		);
	}
	HrefChangeBGColorOur('#main_contac');

// MENU
	function HrefChangeBGColor(sel){
		$(sel).hover(
			 function(){
			 	if (!$(this).hasClass("menu_item_active")){
			    	$(this).css("background-color", "#dd2d1d");
			   }
			 },
			 function(){
			 	if (!$(this).hasClass("menu_item_active")){
			    	$(this).css("background", "none");
			   }
			 }
		);
	}
	HrefChangeBGColor('.menu_item');
	HrefChangeBGColor('.lang_item');
	
	if ($("#main").length){
		$("#main").animate({opacity:1}, 1000);
	}
	
// IS MENU 1
	if ($('#frontpage_column1').length){
		$('#item1').addClass('menu_item_active');
	}
// IS MENU 2
	if ($('#design_active').length){
		$('#item2').addClass('menu_item_active');
	}
// IS MENU 3
	if ($('#construction_active').length){
		$('#item3').addClass('menu_item_active');
	}
// IS MENU 4
	if ($('#service_active').length){
		$('#item4').addClass('menu_item_active');
	}
// IS MENU 5
	if ($('#works_active').length){
		$('#item5').addClass('menu_item_active');
	}
// IS MENU 6
	if ($('#contacts_active').length){
		$('#item6').addClass('menu_item_active');
	}

// READ MORE
	function HrefChangeColor(sel, obj){
		$(sel).hover(
			 function(){
			   $(this).find(obj).css("color", "#dd2d1d");
			 },
			 function(){
			   $(this).find(obj).css("color", "#f2f2c0");
			 }
		);
	}
	HrefChangeColor('.fp_post_more a', 'p');
	HrefChangeColor('#frontpage_news_more a', 'p');
	
// TEXT COLOR INVERT

	$("#main_contac").hover(
		 function(){
		   $(this).find('.hover_contact div').show();
		 },
		 function(){
		   $(this).find('.hover_contact div').hide();
		 }
	);

// POST IMAGE HOVER
	function AnimatePostSlide(sel, obj){
			animationType = 'easeInOutExpo';
			animationSpeed = 500;
			$(sel).hover(
				 function(){
				 	if (($(this).find('.banner_state').text()) != ''){
				 		img_height = $(this).find(obj+'1').css("height");
				   		$(this).find(obj+'1').stop().animate({"margin-top":"-"+img_height}, animationSpeed, animationType);
				    }
				 },
				 function(){
				 	if (($(this).find('.banner_state').text()) != ''){
				    	$(this).find(obj+'1').stop().animate({"margin-top":"0px"}, animationSpeed, animationType);
				    }
				 }
			);			
	}
	AnimatePostSlide(".fp_post_large", ".img_large_");
	AnimatePostSlide(".fp_post_small", ".img_small_");
	AnimatePostSlide(".cat_post_container", ".cat_img_");
	
//SORT POSTS
	function SortPostInCat(where_sel){
		if ($(where_sel).length){
		    var mylist = $(where_sel);
		    var listitems = mylist.children('.cat_post_container').get();
		    listitems.sort(function(a, b) {
	    	
		        var compA = parseFloat($(a).attr('id').substr(8,1));
		        var compB = parseFloat($(b).attr('id').substr(8,1));
		        return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
		    });        
		    $.each(listitems, function(idx, itm) {
		        mylist.append(itm);
		    });
		}
	}
	if ( $("#column1").length || $("#column2").length || $("#column3").length ){
		SortPostInCat("#column1");
		SortPostInCat("#column2");
		SortPostInCat("#column3");
	}

//ADD TO IMAGES LIGHTBOX
	function AddLightbox(sel){
		if ($(sel).length){

			$(sel).find('a > img').each(function(){	
			
				var link_class_state = false;
				if ($(this).parent('a').hasClass("anchor")){
					link_class_state = true;
				}else{
					link_class_state = false;
				}
				
				
				var link_msg_state = false;
				if ($(this).parent('a').hasClass("post_msg")){
					link_msg_state = true;
				}else{
					link_msg_state = false;
				}
				
				var just_link_state = false;
				if ($(this).hasClass("just_link")){
					just_link_state = true;
				}else{
					just_link_state = false;
				}

						
				if ((link_class_state == false) && (link_msg_state == false) && (just_link_state == false) ){
				//if (link_class_state == false){

					$(this).parent('a').attr('data-lightbox','on');
			
					var img_width = $(this).attr('width'); 
						var img_width_int = parseInt(img_width);
						
					var img_height = $(this).attr('height');
						var img_height_int = parseInt(img_height);
						
					var margin_div_int = parseInt(img_height);
					
					// GET IMAGE PARAMS
					var img_src	= $(this).attr('src');
					
					var img_title = $(this).attr('title'); if (img_title == undefined){ img_title = ''; }
					
					var img_alt = $(this).attr('alt'); 
						if (img_alt != ''){
							img_alt = 'alt="'+img_alt+'"';	
						} else {
							if (img_title != ''){
								img_alt = 'alt="'+img_title+'"';
							} else { img_alt = ''; }
						} 
					
					// REPLACE MARGIN IMAGES 
					var replace_margin_top = $(this).css("margin-top");
					var replace_margin_right = $(this).css("margin-right");
					var replace_margin_bottom = $(this).css("margin-bottom");
					var replace_margin_left = $(this).css("margin-left");
					$(this).parent('a').css("margin", replace_margin_top+' '+replace_margin_right+' '+replace_margin_bottom+' '+replace_margin_left);
	
					if (img_title != ''){
						var title_div = '<div class="post_img_title" style="width: '+img_width_int+'px;"><p>'+img_title+'</p></div>';
					} else { title_div = '' };
					
					// REPLACE CLASS IMAGES
					if ($(this).hasClass('alignright') || $(this).hasClass('alignleft') || $(this).hasClass('aligncenter')) {
						if ($(this).hasClass('alignright')){
							$(this).parent('a').addClass("alignright");
						}
						if ($(this).hasClass('alignleft')){
							$(this).parent('a').addClass("alignleft");
						}
						if ($(this).hasClass('aligncenter')){
							$(this).parent('a').addClass("aligncenter");
						}
					} else {
						$(this).parent('a').css('display', 'inline-block');
					}
				
					var zoom_icon = '<div class="post_img_zoom" style="margin: '+(Math.floor((img_height_int/2)-15))+'px 0 0 '+(Math.floor((img_width_int/2)-15))+'px;"></div>';
	
					var HTML_IMG_OUT;
					
					HTML_IMG_OUT = '<img src="'+img_src+'" '+img_alt+' style="width: '+img_width_int+'px; height: '+img_height_int+'px;" />'+
								   '<div class="post_image_title" style="width: '+img_width_int+'px; height: '+img_height_int+'px; margin: -'+margin_div_int+'px 0 0 0;">'+title_div+zoom_icon+'</div>';	
					
					$(this).parent('a').html(HTML_IMG_OUT);
				}
        	}
        	);	

		}
	}
	
	AddLightbox(".simple_post");
	AddLightbox(".single_post");

	function HoverTitleImg(sel){
		$(sel).hover(
		  function(){
		    $(this).parent('a').find('.post_img_title').css({"background-color": "#121212", "opacity": "0.6"});
		    $(this).parent('a').find('.post_img_zoom').show();
		  },
		  function(){
		    $(this).parent('a').find('.post_img_title').css({"background-color": "transparent", "opacity": "1"});
		    $(this).parent('a').find('.post_img_zoom').hide();
		  }
		);
	}
	
	if (($(".simple_post").length) || ($(".single_post").length)){
		HoverTitleImg('a .post_image_title');
	}

	$(".totop_block a").click(function (){
			$("html, body").animate({
				scrollTop:0
			}, 800);
	});

	$(".met_item").hover(
		 function(){
		    	$(this).animate({opacity:1}, 200);
		 },
		 function(){
		    	$(this).animate({opacity:0.3}, 200);
		 }
	);
	
	// POST HEADER HOVER
	$('#link_posts').hover(
		 function(){
		 	$(this).find('.news_text p').css('color', '#f2f2c0');
		 },
		 function(){
		 	$(this).find('.news_text p').css('color', '#e32215');
		 }
	);
	
	$("a.anchor").click(function () { 
      elementClick = $(this).attr("href");
      destination = $(elementClick).offset().top;
      $("html, body").animate( { scrollTop: destination }, 1100 );
      return false;
    });
	
});