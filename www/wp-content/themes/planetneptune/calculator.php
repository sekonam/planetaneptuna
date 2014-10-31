<div id="calculator">
	<div id="forms_cheker">
		<div class="form_cheker_item" id="calc_tab_one"><p>Прямоугольный аквариум</p></div>
		<div class="form_cheker_item" id="calc_tab_two"><p>Цилиндрический аквариум</p></div>
	</div>
	<div id="calc_container">

		<div class="calc_form" id="aq_rectangular">
			<form id="aq_rectangular_form" action="calculator_db.php" method="post">
				<div class="aq_form">
					<div class="aq_form_item">
						<p class="aq_form_item_title aq_list_item_text">Высота емкости <b>[Н]</b> (реальный столб воды) </p><input type="number" id="aq_rectangular_height" class="aq_form_field" value="700"><p class="aq_list_item_text">(мм)</p>
					</div>
					<div class="aq_form_item">
						<p class="aq_form_item_title aq_list_item_text">Длинна емкости <b>[L]</b></p><input type="number" id="aq_rectangular_length" class="aq_form_field" value="1000"><p class="aq_list_item_text">(мм)</p>
					</div>
					<div class="aq_form_item">
						<p class="aq_form_item_title aq_list_item_text">Ширина емкости <b>[W]</b></p><input type="number" id="aq_rectangular_width" class="aq_form_field" value="500"><p class="aq_list_item_text">(мм)</p>
					</div>
					<!--
					<div class="aq_form_item">
						<p class="aq_form_item_title">Использовать отбортовки и стяжки?</p>
						<div class="aq_checkgroup_style"><p>Да</p><input class="aq_checkbox" type="radio" value="Yes" checked name="ag_rect_condition"></div>
						<div><p>Нет</p><input class="aq_checkbox" type="radio" value="No" name="ag_rect_condition"></div>
					</div>
					-->
				</div>
				<div class="aq_scheme" id="aq_rectangular_image">
					<!--<canvas id="aq_rectangular_canvas" width="603" height="500">Вы видите это сообщение, потому что Ваш браузер не поддерживает canvas.</canvas>-->
				</div>
				<input class="aq_calculate_btn" type="submit" onClick="sendCalcRectangularData(); return false;" value="Расчитать">
			</form>
			<div class="aq_results" id="aq_rectangular_results">
				<div class="aq_condition">
					<div class="arrows_sprite" id="arrow_rectangular_H"></div>
					<p>&nbsp;=&nbsp;<span class="aq_value_condition" id="aq_rectangular_HEIGHT"></span>&nbsp;мм</p>
					<div class="arrows_sprite" id="arrow_rectangular_L"></div>
					<p>&nbsp;=&nbsp;<span class="aq_value_condition" id="aq_rectangular_LENGTH"></span>&nbsp;мм</p>
					<div class="arrows_sprite" id="arrow_rectangular_W"></div>
					<p>&nbsp;=&nbsp;<span class="aq_value_condition" id="aq_rectangular_WIDTH"></span>&nbsp;мм</p>
				</div>
				<div class="aq_results_column1">
					<p class="aq_result_title">Параметры аквариума:</p>
					<ul class="aq_results_margin">
						<li class="aq_result_item">Максимальное давление воды:&nbsp;<span class="aq_value" id="aq_rectangular_MDV"></span>&nbsp;(кг/м&sup2;)</li>
						<li class="aq_result_item">Соотношение сторон L/H:&nbsp;<span class="aq_value" id="aq_rectangular_SS"></span></li>
						<li class="aq_result_item">Толщина акриловой плиты (вычесленная):&nbsp;<span class="aq_value" id="aq_rectangular_THICKNESS"></span>&nbsp;(мм)</li>
						<li class="aq_result_item">Толщина акриловой плиты (рекомендуемая):&nbsp;<span class="aq_value" id="aq_rectangular_THICKNESS_REAL"></span>&nbsp;(мм)</li>
						<li class="aq_result_item">Объем емкости:&nbsp;<span class="aq_value" id="aq_rectangular_OE"></span>&nbsp;(л)</li>
						<li class="aq_result_item">Площадь остекления:&nbsp;<span class="aq_value" id="aq_rectangular_PO"></span>&nbsp;(м&sup2;)</li>
						<li class="aq_result_item">Вес емкости без учета воды:&nbsp;<span class="aq_value" id="aq_rectangular_VEBYV"></span>&nbsp;(кг)</li>
					</ul>
					<p class="aq_result_title">Размеры сторон аквариума:</p>
					<ul class="aq_results_margin">
						<li class="aq_result_item">Лицевая\задняя (2шт):&nbsp;<span class="aq_value" id="aq_rectangular_side_faceW"></span>x<span class="aq_value" id="aq_rectangular_side_faceH"></span>&nbsp;(мм)</li>
						<li class="aq_result_item">Боковые (2шт):&nbsp;<span class="aq_value" id="aq_rectangular_side_sideW"></span>x<span class="aq_value" id="aq_rectangular_side_sideH"></span>&nbsp;(мм)</li>
						<li class="aq_result_item">Дно (1шт):&nbsp;<span class="aq_value" id="aq_rectangular_side_bottomW"></span>x<span class="aq_value" id="aq_rectangular_side_bottomH"></span>&nbsp;(мм)</li>
					</ul>
				</div>

				<?php if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : 	?>
				<div class="aq_results_column2">
					
					<!--
					<p class="aq_result_title">Расчет стоимости:</p>
					<form action="calculator_db.php" method="post">
							<p class="aq_form_item_title">Выбор листа\блока </p>
							<div id="aq_rectangular_select_array">
								<div class="aq_form_item aq_price_form_item"><p>#1 -&nbsp;</p><span id="aq_rectangular_select_init"></span><p>(мм)</p><div class="del_list_array"><p>DEL</p></div></div>
							</div>
							<div class="aq_form_item aq_price_form_item">
								<input class="aq_calculate_btn reset_pos" type="submit" onClick="sendCalcRectangularDataPrice(); return false;" value="Расчитать">
							</div>
					</form>
					-->
					
					
					<p class="aq_result_title">Расчет стоимости:</p>
					
					<form action="calculator_db.php" method="post">
						
						<p class="aq_form_item_title">Выбор листа\блока </p>

						<div class="aq_form_item aq_price_form_item">
							<div class="calc_btn_style add_dell_list_btn" id="add_rectangular_list"><p class="calc_btn_style_text">Добавить лист</p></div>
							<div class="calc_btn_style add_dell_list_btn" id="del_rectangular_list"><p class="calc_btn_style_text">Удалить лист</p></div>
						</div>		
						
						<div id="aq_rectangular_list_container">
							<div class="aq_form_item aq_price_form_item" id="aq_rectangular_select_init">
								<div class="aq_list_item">
									<p class="number_list aq_list_item_text">Лист:&nbsp;</p>
									<div class="list_array"></div>
									<p class="aq_list_item_text">--INFO--</p>
								</div>
							</div>
						</div>


							
						<div class="aq_form_item aq_price_form_item">
							<input class="aq_calculate_btn reset_pos" type="submit" onClick="sendCalcRectangularDataPrice(); return false;" value="Расчитать">
						</div>
						
					</form>
					
					<div id="aq_rectangular_price_results"></div>
				</div>
				<?php endif; ?>
				
			<!--
				<p class="aq_result_title">Раскройка:</p>
				<div id="rectangular_scheme">
					<div class="A4-Web">
						<div id="rectangular_acrylic_blank">
							
							<div id="rectangular_face" class="rectangular_side">
								<div class="figure_content">
									<p class="figure_name">Передняя</p>
									<p class="figure_dimensions"></p>
								</div>
							</div>
							
							<div id="rectangular_back" class="rectangular_side">
								<div class="figure_content">
									<p class="figure_name">Задняя</p>
									<p class="figure_dimensions"></p>
								</div>
							</div>
							
							<div id="rectangular_right" class="rectangular_side">
								<div class="figure_content">
									<p class="figure_name">Правая</p>
									<p class="figure_dimensions"></p>
								</div>
							</div>
							
							<div id="rectangular_left" class="rectangular_side">
								<div class="figure_content">
									<p class="figure_name">Левая</p>
									<p class="figure_dimensions"></p>
								</div>
							</div>
							
							<div id="rectangular_bottom" class="rectangular_side">
								<div class="figure_content">
									<p class="figure_name">Нижняя</p>
									<p class="figure_dimensions"></p>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			-->
			</div>
		</div>
		

		
		<div class="calc_form" id="aq_cylindrical">
			<form id="aq_cylindrical_form" action="calculator_db.php" method="post">
				<div class="aq_form">
					<div class="aq_form_item">
						<p class="aq_form_item_title">Диаметр емкости <b>[D]</b></p><input type="number" id="aq_cylindrical_diameter" class="aq_form_field" value="2030"><p>(мм)</p>
					</div>
					<div class="aq_form_item">
						<p class="aq_form_item_title">Высота емкости <b>[H]</b></p><input type="number" id="aq_cylindrical_height" class="aq_form_field" value="1500"><p>(мм)</p>
					</div>
					<!--
					<div class="aq_form_item">
						<p class="aq_form_item_title">Использовать отбортовки и стяжки?</p>
						<div class="aq_checkgroup_style"><p>Да</p><input class="aq_checkbox" type="radio" value="Yes" checked name="ag_rect_condition"></div>
						<div><p>Нет</p><input class="aq_checkbox" type="radio" value="No" name="ag_rect_condition"></div>
					</div>
					-->
				</div>
				<div class="aq_scheme" id="aq_cylindrical_image">
					<!--<canvas id="aq_cylindrical_canvas" width="603" height="500">Вы видите это сообщение, потому что Ваш браузер не поддерживает canvas.</canvas>-->
				</div>
				<input class="aq_calculate_btn" type="submit" onClick="sendCalcCylindricalData(); return false;" value="Расчитать">
			</form>
			<div class="aq_results" id="aq_cylindrical_results">
				<div class="aq_condition">
					<div class="arrows_sprite" id="arrow_cylindrical_D"></div>
					<p>&nbsp;=&nbsp;<span class="aq_value_condition" id="aq_cylindrical_DIAMETER"></span>&nbsp;мм</p>
					<div class="arrows_sprite" id="arrow_cylindrical_H"></div>
					<p>&nbsp;=&nbsp;<span class="aq_value_condition" id="aq_cylindrical_HEIGHT"></span>&nbsp;мм</p>
				</div>
				<p class="aq_result_title">Параметры аквариума:</p>
				<ul class="aq_results_margin">
					<li class="aq_result_item">Максимальное давление воды:&nbsp;<span class="aq_value" id="aq_cylindrical_MDV"></span>&nbsp;(кг/м&sup2;)</li>
					<li class="aq_result_item">Рекомендуемая толщина акриловой плиты:&nbsp;<span class="aq_value" id="aq_cylindrical_THICKNESS"></span>&nbsp;(мм)</li>
					<li class="aq_result_item">Доступная толщина акриловой плиты:&nbsp;<span class="aq_value" id="aq_cylindrical_THICKNESS_REAL"></span>&nbsp;(мм)</li>
					<li class="aq_result_item">Объем емкости:&nbsp;<span class="aq_value" id="aq_cylindrical_OE"></span>&nbsp;(л)</li>
					<li class="aq_result_item">Площадь остекления:&nbsp;<span class="aq_value" id="aq_cylindrical_PO"></span>&nbsp;(м&sup2;)</li>
					<li class="aq_result_item">Вес емкости без учета воды:&nbsp;<span class="aq_value" id="aq_cylindrical_VEBYV"></span>&nbsp;(кг)</li>
				</ul>
				<p class="aq_result_title">Размеры сторон аквариума:</p>
				<ul class="aq_results_margin">
					<li class="aq_result_item">Лист для цилиндра:&nbsp;<span class="aq_value" id="aq_cylindrical_side_faceW"></span>x<span class="aq_value" id="aq_cylindrical_side_faceH"></span>&nbsp;(мм)</li>
					<li class="aq_result_item">Дно: диаметр -&nbsp;<span class="aq_value" id="aq_cylindrical_side_bottomD"></span>,&nbsp;толщина -&nbsp;<span class="aq_value" id="aq_cylindrical_side_bottomH"></span>&nbsp;(мм)</li>
				</ul>
			</div>
		</div>
	
	
	
	</div>
</div>