/* © 2013 Планета Нептуна. Все права защищены. 
 * Запрещено использование материалов сайта без 
 * согласия его авторов и обратной ссылки. */

jQuery(document).ready(function($) {

	var calc_tab_state = true;
	$("#calc_tab_two").css("background-color", "#10363a");
	
	$(".form_cheker_item").click(function (){
		if ( ($(this).attr("id") == "calc_tab_two") && (calc_tab_state == true) ){
		   $(this).css("background-color", $("#calc_tab_one").css("background-color"));
		   $("#calc_tab_one").css("background-color", "#10363a");
		   calc_tab_state = false;
		   $("#aq_rectangular").hide();
		   $("#aq_cylindrical").show();
		}
		
		if ( ($(this).attr("id") == "calc_tab_one") && (calc_tab_state == false) ){
		   $(this).css("background-color", $("#calc_tab_two").css("background-color"));
		   $("#calc_tab_two").css("background-color", "#10363a");
		   calc_tab_state = true;
		   $("#aq_cylindrical").hide();
		   $("#aq_rectangular").show();
		}
		
	});
 
	url_calc = "http://www.planetaneptuna.ru/wp-content/themes/planetneptune/calculator_db.php";
	
	sendCalcRectangularData = function(el){
	$.ajax({
	        url: url_calc,
	        global: false,
	        type: "POST",
	        data: ({
	        	aq_type: "rectangular",
	            aq_rectangular_width: $("#aq_rectangular_width").val(), 
	            aq_rectangular_length: $("#aq_rectangular_length").val(),
	            aq_rectangular_height: $("#aq_rectangular_height").val()
	           }),
	        dataType: "json",
			success: function(result_aq_rectangular){
							
				$("#aq_rectangular_results").fadeIn(400);
				$("#aq_rectangular_LENGTH").html(result_aq_rectangular.LENGTH);
				$("#aq_rectangular_WIDTH").html(result_aq_rectangular.WIDTH);
				$("#aq_rectangular_HEIGHT").html(result_aq_rectangular.HEIGHT);
				$("#aq_rectangular_THICKNESS").html(result_aq_rectangular.THICKNESS);
				$("#aq_rectangular_THICKNESS_REAL").html(result_aq_rectangular.THICKNESS_REAL);
				$("#aq_rectangular_MDV").html(result_aq_rectangular.MDW);
				$("#aq_rectangular_OE").html(result_aq_rectangular.OE);
				$("#aq_rectangular_PO").html(result_aq_rectangular.PO);
				$("#aq_rectangular_SS").html(result_aq_rectangular.SS);
				$("#aq_rectangular_VEBYV").html(result_aq_rectangular.VEBYV);
				
				// Реальные размеры
				$("#aq_rectangular_side_faceW").html(result_aq_rectangular.side_faceW);
				$("#aq_rectangular_side_faceH").html(result_aq_rectangular.side_faceH);
				
				$("#aq_rectangular_side_sideW").html(result_aq_rectangular.side_sideW);
				$("#aq_rectangular_side_sideH").html(result_aq_rectangular.side_sideH);
				
				$("#aq_rectangular_side_bottomW").html(result_aq_rectangular.side_bottomW);
				$("#aq_rectangular_side_bottomH").html(result_aq_rectangular.side_bottomH);
				
				// Инициализация списка заготовок
				if ($('#aq_rectangular_select_init:visible').length>0){
					$("#aq_rectangular_select_init").find(".list_array").html(result_aq_rectangular.aq_rectangular_select_init);
				}

				// Размеры для чертежа
				/*
				$("#rectangular_acrylic_blank").css("width", result_aq_rectangular.BlankWidthScheme+"px");
				$("#rectangular_acrylic_blank").css("height", result_aq_rectangular.BlankHeightScheme+"px");

				$("#rectangular_face").css({"width": result_aq_rectangular.FaceBackWidth+"px",
											"height": result_aq_rectangular.FaceBackHeight+"px"});
											
				$("#rectangular_back").css({"width": result_aq_rectangular.FaceBackWidth+"px",
											"height": result_aq_rectangular.FaceBackHeight+"px"});
											
				$("#rectangular_right").css({"width": result_aq_rectangular.RightLeftWidth+"px",
											 "height": result_aq_rectangular.RightLeftHeight+"px"});
											 
				$("#rectangular_left").css({"width": result_aq_rectangular.RightLeftWidth+"px",
											 "height": result_aq_rectangular.RightLeftHeight+"px"});
											 
				$("#rectangular_bottom").css({"width": result_aq_rectangular.BottomWidth+"px",
											  "height": result_aq_rectangular.BottomHeight+"px"});
				*/							  
				// Размеры для чертежа в слоях
				/*
				$("#rectangular_face").find(".figure_dimensions").html("<b>"+result_aq_rectangular.side_faceW+"</b>x<b>"+result_aq_rectangular.side_faceH+"</b> (мм)");
				$("#rectangular_back").find(".figure_dimensions").html("<b>"+result_aq_rectangular.side_faceW+"</b>x<b>"+result_aq_rectangular.side_faceH+"</b> (мм)");
				$("#rectangular_right").find(".figure_dimensions").html("<b>"+result_aq_rectangular.side_sideW+"</b>x<b>"+result_aq_rectangular.side_sideH+"</b> (мм)");
				$("#rectangular_left").find(".figure_dimensions").html("<b>"+result_aq_rectangular.side_sideW+"</b>x<b>"+result_aq_rectangular.side_sideH+"</b> (мм)");
				$("#rectangular_bottom").find(".figure_dimensions").html("<b>"+result_aq_rectangular.side_bottomW+"</b>x<b>"+result_aq_rectangular.side_bottomH+"</b> (мм)");	
				*/
				// Border Style
				/*
				$("#rectangular_face").find(".figure_content").css({"width": (parseInt($("#rectangular_face").css("width"))-4)+"px",
																	"height": (parseInt($("#rectangular_face").css("height"))-4)+"px"});
				$("#rectangular_back").find(".figure_content").css({"width": (parseInt($("#rectangular_back").css("width"))-4)+"px",
																	"height": (parseInt($("#rectangular_back").css("height"))-4)+"px"});	
				$("#rectangular_right").find(".figure_content").css({"width": (parseInt($("#rectangular_right").css("width"))-4)+"px",
																	"height": (parseInt($("#rectangular_right").css("height"))-4)+"px"});	
				$("#rectangular_left").find(".figure_content").css({"width": (parseInt($("#rectangular_left").css("width"))-4)+"px",
																	"height": (parseInt($("#rectangular_left").css("height"))-4)+"px"});
				$("#rectangular_bottom").find(".figure_content").css({"width": (parseInt($("#rectangular_bottom").css("width"))-4)+"px",
																	"height": (parseInt($("#rectangular_bottom").css("height"))-4)+"px"});		
				*/			 
	        }
	     }
	)};
	
	sendCalcCylindricalData = function(el){
	$.ajax({
	        url: url_calc,
	        global: false,
	        type: "POST",
	        data: ({
	        	aq_type: "cylindrical",
	        	aq_cylindrical_diameter: $("#aq_cylindrical_diameter").val(),
	            aq_cylindrical_height: $("#aq_cylindrical_height").val()
	           }),
	        dataType: "json",
			success: function(result_aq_cylindrical){
				$("#aq_cylindrical_results").fadeIn(400);
				$("#aq_cylindrical_DIAMETER").html(result_aq_cylindrical.aq_cylindrical_DIAMETER);
				$("#aq_cylindrical_HEIGHT").html(result_aq_cylindrical.aq_cylindrical_HEIGHT);
				$("#aq_cylindrical_THICKNESS").html(result_aq_cylindrical.aq_cylindrical_THICKNESS);
				$("#aq_cylindrical_THICKNESS_REAL").html(result_aq_cylindrical.aq_cylindrical_THICKNESS_REAL);
				$("#aq_cylindrical_MDV").html(result_aq_cylindrical.aq_cylindrical_MDW);
				$("#aq_cylindrical_OE").html(result_aq_cylindrical.aq_cylindrical_OE);
				$("#aq_cylindrical_PO").html(result_aq_cylindrical.aq_cylindrical_PO);
				$("#aq_cylindrical_SS").html(result_aq_cylindrical.aq_cylindrical_SS);
				$("#aq_cylindrical_VEBYV").html(result_aq_cylindrical.aq_cylindrical_VEBYV);
				$("#aq_cylindrical_side_faceW").html(result_aq_cylindrical.aq_cylindrical_side_faceW);
				$("#aq_cylindrical_side_faceH").html(result_aq_cylindrical.aq_cylindrical_side_faceH);
				$("#aq_cylindrical_side_bottomD").html(result_aq_cylindrical.aq_cylindrical_side_bottomD);
				$("#aq_cylindrical_side_bottomH").html(result_aq_cylindrical.aq_cylindrical_side_bottomH);
	        }
	     }
	)};
 
});