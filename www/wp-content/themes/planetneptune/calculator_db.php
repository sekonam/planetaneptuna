<?php
	
	function MaterialsDBConnect(){
		$db_materials = mysql_connect("db01.hostline.ru", "vh37047_mt_admin", "Wj1xAe8d");
		mysql_select_db("vh37047_materials", $db_materials);
		mysql_set_charset('utf8');
		return $db_materials;
	}
			
	// Вес акрилового стекла г/мм3
	$AQ_y = 0.119;
	
	$AQ_TYPE = $_POST["aq_type"];
	
	function SelectThickness($thickness_calc){
		// Список толщин
		$thickness_list = array(3,4,5,6,8,10,12,15,20,25,30,40,50,60,70,80,90,100,110,120,130,140,150,160,170,180,190,200,210,220,221,222,223,224,225);
		// Поиск ближайшей толщины стекла
		for ($x=0; $x<=34; $x++){
			if ($thickness_calc == $thickness_list[$x]){
				return $thickness_calc;	break;
			} elseif ( ($thickness_calc > $thickness_list[$x]) && ($thickness_calc < $thickness_list[$x+1]) ){
				return $thickness_list[$x+1]; break;
			}
		}
		return $thickness_list[34];
	}
	
	// Толщина стекла
	function AQ_cofB($AQ_SS){
		if (($AQ_SS <= 0.25) && ($AQ_SS > 0)){ return 0.037; break; }
		elseif (($AQ_SS <= 0.50) && ($AQ_SS > 0.25)){	return 0.120; break; }
		elseif (($AQ_SS <= 0.75) && ($AQ_SS > 0.50)){	return 0.212; break; }
		elseif (($AQ_SS <= 1) && ($AQ_SS > 0.75)){ return 0.321; break; }
		elseif (($AQ_SS <= 1.50) && ($AQ_SS > 1)){ return 0.523; break; }
		elseif (($AQ_SS <= 2) && ($AQ_SS > 1.50)){ return 0.677; break; }
		elseif (($AQ_SS <= 3) && ($AQ_SS > 2)){ return 0.866; break; } 
		elseif (($AQ_SS <= 4) && ($AQ_SS > 3)){ return 0.940; break; } 
	}
	
	//RECTANGLE
	if ($AQ_TYPE == "rectangular"){
		$AQ_RECTANGULAR_HEIGHT = $_POST["aq_rectangular_height"]; 
		$AQ_RECTANGULAR_LENGTH = $_POST["aq_rectangular_length"];
		$AQ_RECTANGULAR_WIDTH =  $_POST["aq_rectangular_width"];
		
		// Максимальное давление воды
		$AQ_RECTANGULAR_MDW = round(((($AQ_RECTANGULAR_HEIGHT-($AQ_RECTANGULAR_HEIGHT*0.05))/100000)*$AQ_RECTANGULAR_WIDTH),1);
		
		// Объем емкости
		$AQ_RECTANGULAR_OE = round((($AQ_RECTANGULAR_LENGTH*$AQ_RECTANGULAR_WIDTH*$AQ_RECTANGULAR_HEIGHT)/1000000),4);
		
		// Площадь остекления
		$AQ_RECTANGULAR_PO = (($AQ_RECTANGULAR_HEIGHT*$AQ_RECTANGULAR_LENGTH*2)/1000000)+(($AQ_RECTANGULAR_HEIGHT*$AQ_RECTANGULAR_WIDTH*2)/1000000)+(($AQ_RECTANGULAR_LENGTH*$AQ_RECTANGULAR_WIDTH)/1000000);
	
		// L/H - Соотношение сторон 
		$AQ_RECTANGULAR_SS_pointer = $AQ_RECTANGULAR_LENGTH/$AQ_RECTANGULAR_HEIGHT;
		$AQ_RECTANGULAR_SS = round($AQ_RECTANGULAR_SS_pointer, 2);
	
		// Толщина стекла
		$AQ_RECTANGULAR_THICKNESS = round((sqrt((AQ_cofB($AQ_RECTANGULAR_SS)*$AQ_RECTANGULAR_MDW*pow(($AQ_RECTANGULAR_HEIGHT-($AQ_RECTANGULAR_HEIGHT*0.05)),2))/(0.37*100)))/10,0);

		// Поиск ближайшей толщины стекла
		$AQ_RECTANGULAR_THICKNESS_REAL = SelectThickness($AQ_RECTANGULAR_THICKNESS);

		// Объем используемоно стекла
		$AQ_RECTANGULAR_OIS = (($AQ_RECTANGULAR_LENGTH*$AQ_RECTANGULAR_WIDTH*$AQ_RECTANGULAR_THICKNESS_REAL)+
					   (($AQ_RECTANGULAR_LENGTH*$AQ_RECTANGULAR_HEIGHT*$AQ_RECTANGULAR_THICKNESS_REAL)*2)+
					   (($AQ_RECTANGULAR_WIDTH*$AQ_RECTANGULAR_HEIGHT*$AQ_RECTANGULAR_THICKNESS_REAL)*2));

		// Вес емкости без учета воды
		$AQ_RECTANGULAR_VEBYV = round((($AQ_RECTANGULAR_OIS*$AQ_y)/100000),3);
	
		// Определение размеров листов для раскроя (метод наложения лицевых на боковые)
		$SIDE[0] = array("width" => $AQ_RECTANGULAR_LENGTH, "height" => ($AQ_RECTANGULAR_HEIGHT-$AQ_RECTANGULAR_THICKNESS_REAL));
		$SIDE[1] = array("width" => ($AQ_RECTANGULAR_WIDTH-($AQ_RECTANGULAR_THICKNESS_REAL*2)), "height" => ($AQ_RECTANGULAR_HEIGHT-$AQ_RECTANGULAR_THICKNESS_REAL));
		$SIDE[2] = array("width" => $AQ_RECTANGULAR_LENGTH, "height" => $AQ_RECTANGULAR_WIDTH);
		
		function GetAqList($THICKNESS, $db_materials){
			$db_connect = MaterialsDBConnect();
			$HTML = "<select class='aq_form_field aq_form_select' onChange='sendCalcMaterialInfo(); return false;'>";
				$select_glass_list = mysql_query("select * from MAIN WHERE THICKNESS = ".$THICKNESS.";", $db_connect);
				$i = 0;
				while ($glass_list = mysql_fetch_array($select_glass_list)){
					if ($i = 0){
						$HTML = $HTML."<option selected value=".$glass_list['ID'].">".$glass_list['WIDTH']."x".$glass_list['HEIGHT']."</option>";
					} else {
						$HTML = $HTML."<option value=".$glass_list['ID'].">".$glass_list['WIDTH']."x".$glass_list['HEIGHT']."</option>";
					}
					$i++;
				}
				mysql_close($db_connect);
			$HTML = $HTML."</select>";
			return $HTML; 
		}
		
		/*
		function GetAqCurrentInfo($ID){
			$db_materials = mysql_connect("db01.hostline.ru", "vh37047_mt_admin", "Wj1xAe8d");
			mysql_select_db("vh37047_materials", $db_materials);
			mysql_set_charset('utf8');
			$HTML = "<select class='aq_form_field aq_form_select'>";
				$select_glass_list = mysql_query("select * from MAIN WHERE THICKNESS = ".$THICKNESS.";", $db_materials);
				$i = 0;
				while ($glass_list = mysql_fetch_array($select_glass_list)){
					if ($i = 0){
						$HTML = $HTML."<option selected value=".$glass_list['ID'].">".$glass_list['WIDTH']."x".$glass_list['HEIGHT']."</option>";
					} else {
						$HTML = $HTML."<option value=".$glass_list['ID'].">".$glass_list['WIDTH']."x".$glass_list['HEIGHT']."</option>";
					}
					$i++;
				}
				mysql_close($db_materials);
			$HTML = $HTML."</select>";
			return $HTML; 
		}
		*/
	
		// Выборка размеров подходящей толщины
		/*
		$db_materials = mysql_connect("db01.hostline.ru", "vh37047_mt_admin", "Wj1xAe8d");
		mysql_select_db("vh37047_materials", $db_materials);
		mysql_set_charset('utf8');
		$select_glass_list = mysql_query("select * from MAIN WHERE THICKNESS = ".$AQ_RECTANGULAR_THICKNESS_REAL.";", $db_materials);
		
		while ($glass_list = mysql_fetch_array($select_glass_list)){
			
			$SOURCE_WIDTH = $glass_list['WIDTH'];
			$SOURCE_HEIGHT = $glass_list['HEIGHT'];
			
			$StartX = 0;
			$StartY = 0;
			
			$SOURCE_POINT[1] = array("x" => $StartX, "y" => $StartY);
			$SOURCE_POINT[2] = array("x" => $SOURCE_WIDTH, "y" => $StartY);
			$SOURCE_POINT[3] = array("x" => $SOURCE_HEIGHT, "y" => $StartX);
			$SOURCE_POINT[4] = array("x" => $SOURCE_WIDTH, "y" => $SOURCE_HEIGHT);
		
		}
		mysql_close($db_materials);
		*/
		
		// Размеры листа в (мм)
		$BlankDimensions[0] = array("width" => 3000, "height" => 2000);

		// Соотношение сторон
		$RealAspectRatio = $BlankDimensions[0]["width"]/$BlankDimensions[0]["height"];
		
		//Пропорциональное уменьшение заготовки для схемы
		$BlankWidthConst = 666;
		$BlankWidthScheme = $BlankWidthConst;
		$BlankHeightScheme = $BlankWidthScheme/$RealAspectRatio;
		
		// Множители для переконвертации для А4
		$CofArray[0] = array("cofWidth" => ($BlankDimensions[0]["width"]/$BlankWidthScheme), 
							 "cofHeight" => ($BlankDimensions[0]["height"]/$BlankHeightScheme));
		
		// Пропорциональное уменьшение деталей для схемы
		$rectangleFaceBackWidth = round(($SIDE[0]["width"] / $CofArray[0]["cofWidth"]),0);
		$rectangleFaceBackHeight = round(($SIDE[0]["height"] / $CofArray[0]["cofHeight"]),0);
				
		$rectangleRightLeftWidth = round(($SIDE[1]["width"] / $CofArray[0]["cofWidth"]),0);
		$rectangleRightLeftHeight = round(($SIDE[1]["height"] / $CofArray[0]["cofHeight"]),0);
		
		$rectangleBottomWidth = round(($SIDE[2]["width"] / $CofArray[0]["cofWidth"]),0);
		$rectangleBottomHeight = round(($SIDE[2]["height"] / $CofArray[0]["cofHeight"]),0);

		//if ( (current_user_can('editor')) || (current_user_can('administrator')) ):
			$HTML_INITLIST = GetAqList($AQ_RECTANGULAR_THICKNESS_REAL);
		//endif;

		$result_aq_rectangular = array(
						'LENGTH' => $AQ_RECTANGULAR_LENGTH,
						'WIDTH' => $AQ_RECTANGULAR_WIDTH,
						'HEIGHT' => $AQ_RECTANGULAR_HEIGHT,
						'THICKNESS' => $AQ_RECTANGULAR_THICKNESS,
						'THICKNESS_REAL' => $AQ_RECTANGULAR_THICKNESS_REAL,
						'MDW' => $AQ_RECTANGULAR_MDW,
						'OE' => $AQ_RECTANGULAR_OE,
						'PO' => $AQ_RECTANGULAR_PO,
						'SS' => $AQ_RECTANGULAR_SS,
						'VEBYV' => $AQ_RECTANGULAR_VEBYV,
						
						'side_faceW' => $SIDE[0]["width"],
						'side_faceH' => $SIDE[0]["height"],
						'side_sideW' => $SIDE[1]["width"],
						'side_sideH' => $SIDE[1]["height"],
						'side_bottomW' => $SIDE[2]["width"],
						'side_bottomH' => $SIDE[2]["height"],
						
						//Размеры для схемы
						'BlankWidthScheme' => $BlankWidthScheme-1,
						'BlankHeightScheme' => $BlankHeightScheme-1,

						'FaceBackWidth' => $rectangleFaceBackWidth-1,
						'FaceBackHeight' => $rectangleFaceBackHeight-1,
						
						'RightLeftWidth' => $rectangleRightLeftWidth-1,
						'RightLeftHeight' => $rectangleRightLeftHeight-1,
						
						'BottomWidth' => $rectangleBottomWidth-1,
						'BottomHeight' => $rectangleBottomHeight-1,
						
						'aq_rectangular_select_init' => $HTML_INITLIST
						
					   );
					   
		echo json_encode($result_aq_rectangular); die;
	}


	//CYLINDRICAL
	elseif ($AQ_TYPE == "cylindrical"){
		$AQ_CYLINDRICAL_DIAMETER = $_POST["aq_cylindrical_diameter"];
		$AQ_CYLINDRICAL_HEIGHT = $_POST["aq_cylindrical_height"]; 
		
		// Максимальное давление воды
		$AQ_CYLINDRICAL_MDW = round(((0.000001*9800*$AQ_CYLINDRICAL_HEIGHT)/1000000),10);

		// Толщина стекла
		$AQ_CYLINDRICAL_THICKNESS = round(((($AQ_CYLINDRICAL_MDW*1000000)*3.14*$AQ_CYLINDRICAL_DIAMETER)/(2.3*10*70-$AQ_CYLINDRICAL_MDW)),2);
		$AQ_CYLINDRICAL_THICKNESS_REAL = SelectThickness($AQ_CYLINDRICAL_THICKNESS);

		// Радиус дна
		$AQ_CYLINDRICAL_r = ($AQ_CYLINDRICAL_DIAMETER/2)-$AQ_CYLINDRICAL_THICKNESS;		
		
		// Объем емкости
		$AQ_CYLINDRICAL_OE = round(((3.14*pow(($AQ_CYLINDRICAL_DIAMETER/2),2)*$AQ_CYLINDRICAL_HEIGHT)/1000000),4);
		
		// Площадь остекления
		$AQ_CYLINDRICAL_PO = round(((3.14*$AQ_CYLINDRICAL_DIAMETER*$AQ_CYLINDRICAL_HEIGHT)/1000000)+((3.14*pow(($AQ_CYLINDRICAL_DIAMETER/2),2))/1000000),3);
		
		// Объем используемоно стекла
		$AQ_CYLINDRICAL_OIS = (($AQ_CYLINDRICAL_HEIGHT*3.14*$AQ_CYLINDRICAL_DIAMETER*$AQ_CYLINDRICAL_THICKNESS_REAL*2+((3.14*pow($AQ_CYLINDRICAL_DIAMETER,2))/4)*$AQ_CYLINDRICAL_THICKNESS_REAL)/1000);

		// Вес емкости без учета воды
		$AQ_CYLINDRICAL_VEBYV = round((($AQ_CYLINDRICAL_OIS*($AQ_y*10))/1000),3);
	
		// Определение размеров листов для раскроя (метод наложения лицевых на боковые)
		$SIDE[0] = array("width" => (3.14*$AQ_CYLINDRICAL_DIAMETER), "height" => ($AQ_CYLINDRICAL_HEIGHT-$AQ_CYLINDRICAL_THICKNESS_REAL));
			
		$result_aq_cylindrical = array(
						'aq_cylindrical_HEIGHT' => $AQ_CYLINDRICAL_HEIGHT,
						'aq_cylindrical_DIAMETER' => $AQ_CYLINDRICAL_DIAMETER,
						'aq_cylindrical_THICKNESS' => $AQ_CYLINDRICAL_THICKNESS,
						'aq_cylindrical_THICKNESS_REAL' => $AQ_CYLINDRICAL_THICKNESS_REAL,
						'aq_cylindrical_MDW' => $AQ_CYLINDRICAL_MDW,
						'aq_cylindrical_OE' => $AQ_CYLINDRICAL_OE,
						'aq_cylindrical_PO' => $AQ_CYLINDRICAL_PO,
						'aq_cylindrical_VEBYV' => $AQ_CYLINDRICAL_VEBYV,
						'aq_cylindrical_side_faceW' => $SIDE[0]["width"],
						'aq_cylindrical_side_faceH' => $SIDE[0]["height"],
						'aq_cylindrical_side_bottomD' => $AQ_CYLINDRICAL_DIAMETER,
						'aq_cylindrical_side_bottomH' => $AQ_CYLINDRICAL_THICKNESS_REAL
					   );
		echo json_encode($result_aq_cylindrical); die;
	}

	// Загрузка списка акриловых листов
	/*
	$AQ_RETURNED_THICKNESS = $_POST["aq_thickness"];
	function LoadAQList($thickness){

			$db_materials = mysql_connect("db01.hostline.ru", "vh37047_mt_admin", "Wj1xAe8d");
			mysql_select_db("vh37047_materials", $db_materials);
			mysql_set_charset('utf8');
			$select_glass_list = mysql_query("select * from MAIN WHERE THICKNESS = ".$thickness.";", $db_materials);
			
			$i = 0;
			while ($glass_list = mysql_fetch_array($select_glass_list)){
				$ARRAY_AQ_LIST[$i] = array("x" => $glass_list['WIDTH'], "y" => $glass_list['HEIGHT']);
				$i++;
			}
	
			mysql_close($db_materials);
			return $ARRAY_AQ_LIST;
	}
	*/

	//RECTANGLE PRICE
	/*
	if ($AQ_TYPE == "load_aq_list"){
		//$AQ_LIST_ARRAY = LoadAQList($AQ_RETURNED_THICKNESS);
		$aq_list_array = array(
			'AQ_LIST_ARRAY' => LoadAQList($AQ_RETURNED_THICKNESS),
		);
		echo json_encode($aq_list_array); die; 
	}
	*/

	//RECTANGLE PRICE
	if ($AQ_TYPE == "rectangular_price"){

		$side_out_faceW = $_POST["side_faceW"];
		$side_out_faceH = $_POST["side_faceH"];
		
		$side_out_sideW = $_POST["side_sideW"];
		$side_out_sideH = $_POST["side_sideH"];
		
		$side_out_bottomW = $_POST["side_bottomW"];
		$side_out_bottomH = $_POST["side_bottomH"];
		
		//$AQ_LIST_ARRAY = LoadAQList($AQ_RETURNED_THICKNESS);
		$aq_rectangular_price_results = array(
						//'AQ_LIST_ARRAY' => LoadAQList($AQ_RETURNED_THICKNESS),
					   );
		echo json_encode($aq_rectangular_price_results); die; 
	}

	// SELECT MATERIAL INFO
	function GetMaterialInfo($ID){
		$db_connect = MaterialsDBConnect();
		$query = mysql_query("select * from MAIN WHERE ID = ".$ID.";", $db_connect);
		list($MTInfo) = mysql_fetch_array($query);
		return $MTInfo;
		mysql_close($db_connect);
	}
	if ($AQ_TYPE == "material_info"){
		
		$CURRENT_LIST_ID = $_POST["list_current"];
		
		$material_info_results = array(
						//'AQ_LIST_ARRAY' => LoadAQList($AQ_RETURNED_THICKNESS),
						'MATEIAL_INFO_ARRAY' => GetMaterialInfo($CURRENT_LIST_ID)
					   );
		echo json_encode($material_info_results); die; 
	}


	
?>

