/* © 2013 Планета Нептуна. Все права защищены. 
 * Запрещено использование материалов сайта без 
 * согласия его авторов и обратной ссылки. */

jQuery(document).ready(function($) {
	
	function ShoweEdit(sel,obj){
		$(sel).hover(
		  function(){
		    $(this).find(obj).stop().animate({opacity:1}, 175);
		  },
		  function(){
		    $(this).find(obj).stop().animate({opacity:0}, 200);
		  }
		);	
	}

	ShoweEdit('.edit_icon','div');
	ShoweEdit('.fp_post_large_img','.fp_edit');
	ShoweEdit('.fp_post_small_img','.fp_edit');
	ShoweEdit('#frontpage_column2','.fp_edit');
	ShoweEdit('.fp_news','.fp_edit');
	ShoweEdit('#footer','.footer_edit');
	ShoweEdit('#dscr_text1','.header_edit1');
	ShoweEdit('#dscr_text2','.header_edit2');
	ShoweEdit('#contacts','.header_edit3');
	ShoweEdit('.cat_header','.fp_edit');
	ShoweEdit('.cat_post_container','.fp_edit');
	ShoweEdit('.works_content','.fp_edit');
	ShoweEdit('.single_post','.fp_edit');
	ShoweEdit('.simple_post','.fp_edit');
	ShoweEdit('.news_content_title','.fp_edit');
	
	/*
	var img = $(".post_msg>img")[0];
	$("<img/>")
		.attr("src", $(img).attr("src"))
	    .load(function() {
	        $(".post_msg").css("height", (parseInt($(".msg_mail_small_width").height())+this.height)+"px");
    });	
	*/

	//var calc_user_state_val = $("#calculator").hasClass('admin_vXTe3GHgP9');
	
});