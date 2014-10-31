/* © 2013 Планета Нептуна. Все права защищены. 
 * Запрещено использование материалов сайта без 
 * согласия его авторов и обратной ссылки. */

jQuery(document).ready(function($) {

	sendCalcRectangularDataPrice = function(el){
		$.ajax({
		        url: url_calc,
		        global: false,
		        type: "POST",
		        data: ({
		        	aq_type: "rectangular_price"
					side_faceW: $("#aq_rectangular_side_faceW").text();
					side_faceH: $("#aq_rectangular_side_faceH").text();
					side_sideW: $("#aq_rectangular_side_sideW").text();
					side_sideH: $("#aq_rectangular_side_sideH").text();
					side_bottomW: $("#aq_rectangular_side_bottomW").text();
					side_bottomH: $("#aq_rectangular_side_bottomH").text();
		           }),
		        dataType: "json",
				success: function(result_aq_rectangular_price){
							
					$("#aq_rectangular_price_results").fadeIn(400);
	
					//LoadAQList();
				
					// Реальные размеры
					//$("#******").html(result_aq_rectangular_price.*****);
	
			 
		        }
		}
	)};
	
	sendCalcMaterialInfo = function(el){

		//material_selected = this.options[this.selectedIndex].value;
		
		$.ajax({
		        url: url_calc,
		        global: false,
		        type: "POST",
		        data: ({
		        	aq_type: "material_info"
		            //list_current: this.options[this.selectedIndex].value
		           }),
		        dataType: "json",
				success: function(result_material_info){
					
					//alert(material_selected);		
					//$("#aq_rectangular_price_results").fadeIn(400);
	
					//LoadAQList();
				
					// Реальные размеры
					//$("#******").html(result_aq_rectangular_price.*****);
					
		 
	        	}
	     }
	)};
	
	$("#add_rectangular_list").click(function(){
		$("#aq_rectangular_select_init").clone().appendTo("#aq_rectangular_list_container");
	});
 
});