<?php
class Template extends AppModel{
	public $name = 'Template';

	public function funtion_making($data){
		$templates = $this->find('all');
			foreach ($data['associate1'] as $a1_key => $a1_value) {
				foreach ($data['associate2'] as $a2_key => $a2_value) {
					foreach ($templates as $tmp_key => $tmp_value) {
						$question = $tmp_value['Template']['question'];
						if(strstr($question,'O')){ //object1を挿入
							$question = str_replace("[O]",$a1_value['Objective']['object'],$question);
						}
						if(strstr($question,'OO')){ //object1を挿入
							$question = str_replace("[OO]",$a2_value['Object2id']['object'],$question);
						}
						if(strstr($question,'1P')){ //object1を挿入
							$question = str_replace("[1P]",$a1_value['Property1st']['property1st'],$question);
						}
						if(strstr($question,'2P')){ //object1を挿入
							$question = str_replace("[2P]",$a2_value['Property2nd']['property2nd'],$question);
						}
						$answer = $tmp_value['Template']['answer'];
						if(strstr($answer,'O')){ //object1を挿入
							$answer = str_replace("[O]",$a1_value['Objective']['object'],$answer);
						}
						if(strstr($answer,'OO')){ //object1を挿入
							$answer = str_replace("[OO]",$a2_value['Object2id']['object'],$answer);
						}
						if(strstr($answer,'1P')){ //object1を挿入
							$answer = str_replace("[1P]",$a1_value['Property1st']['property1st'],$answer);
						}
						if(strstr($answer,'2P')){ //object1を挿入
							$answer = str_replace("[2P]",$a2_value['Property2nd']['property2nd'],$answer);
						}
						$questions['function_make_question'] = $question;
						$questions['function_make_answer'] = $answer;
						$questions['use_templates_id'] = $tmp_value['Template']['id'];
						$questions['use_templates_question'] = $tmp_value['Template']['question'];
						$questions['use_templates_answer'] = $tmp_value['Template']['answer'];
						// $test_box[] = $a1_value['Objective']['object'];
						$output_data[] = $questions;
					}
				}
			}
			// return $question_box;
			return $output_data;
	}


	public function generate($data){
		$templates = $this->find('all');
		// ダミー

			foreach ($data['associate1'] as $a1_key => $a1_value) {
				foreach ($data['associate2'] as $a2_key => $a2_value) {
					foreach ($templates as $tmp_key => $tmp_value) {
						$question = $tmp_value['Template']['question'];
						if(strstr($question,'O')){ //object1を挿入
							$question = str_replace("[O]",$a1_value['Objective']['object'],$question);
						}
						if(strstr($question,'OO')){ //object1を挿入
							$question = str_replace("[OO]",$a2_value['Object2id']['object'],$question);
						}
						if(strstr($question,'1P')){ //object1を挿入
							$question = str_replace("[1P]",$a1_value['Property1st']['property1st'],$question);
						}
						if(strstr($question,'2P')){ //object1を挿入
							$question = str_replace("[2P]",$a2_value['Property2nd']['property2nd'],$question);
						}
						$answer = $tmp_value['Template']['answer'];
						if(strstr($answer,'O')){ //object1を挿入
							$answer = str_replace("[O]",$a1_value['Objective']['object'],$answer);
						}
						if(strstr($answer,'OO')){ //object1を挿入
							$answer = str_replace("[OO]",$a2_value['Object2id']['object'],$answer);
						}
						if(strstr($answer,'1P')){ //object1を挿入
							$answer = str_replace("[1P]",$a1_value['Property1st']['property1st'],$answer);
						}
						if(strstr($answer,'2P')){ //object1を挿入
							$answer = str_replace("[2P]",$a2_value['Property2nd']['property2nd'],$answer);
						}
						$questions['question'] = $question;
						$questions['answer'] = $answer;

						// $test_box[] = $a1_value['Objective']['object'];
						$question_box[] = $questions;
					}
				}
			}

			$num= mt_rand(0,count($question_box)-1);
			$ar_num = range(0,count($question_box)-1);
			shuffle($ar_num);
			for($i=0; $i<10 ;$i++){
				$select_box[] = $question_box[$ar_num[$i]];
			}
			return $select_box;
	}
}



			// foreach ($data['templates'] as $temp_key => $temp_value) { //次々とテンプレートにぶち込む
			// 	// テンプレートに挿入
			// 	foreach ($ as $key => $value) {
			// 		# code...
			// 	}
			// 	if(strstr($temp_value['question'],'1O')){ //object1を挿入

			// 	}





			// 	if($key == "associate1"){ //associate1の知識を挿入するとき
			// 		foreach ($temp_value as $temp2_key => $temp2_value) {
			// 			$tmp1 = $temp_value['question'];
			// 			$tmp1 = str_replace("[1P]",$temp2_value['Property_1st']['property_1st'],$tmp1);
			// 			if($tmp1 != false)
			// 				$tmp2 = $tmp1;
			// 			$tmp2 = str_replace("[1O]",$temp2_value['Objective']['object'],$tmp2);
			// 			if($tmp2 != false)
			// 			$question = $tmp2;
			// 		}
			// 	}else if($key == "associate2"){　//associate2の知識を挿入するとき
			// 		foreach ($temp_value as $temp2_key => $temp2_value) {
			// 			$tmp1 = $temp_value['question'];
			// 			$tmp1 = str_replace("[2P]",$temp2_value['Property2nd']['property_2nd'],$tmp1);
			// 			if($tmp1 != false)
			// 				$tmp2 = $tmp1;
			// 			$tmp2 = str_replace("[20]",$temp2_value['Object2id']['object'],$tmp2);
			// 			if($tmp2 != false)
			// 				$tmp3 = $tmp2;
			// 		}
			// 	}


			// 	$data[$key]['question'][] = $question;

			// 	// 回答を挿入
			// 	$tmp1 = $temp_value['answer'];
			// 	$tmp1 = str_replace("[SUBJECT]",$value['Ontology']['subject'],$tmp1);
			// 	if($tmp1 != false)
			// 		$tmp2 = $tmp1;
			// 	$tmp2 = str_replace("[PREDICATE]",$value['Ontology']['predicate'],$tmp2);
			// 	if($tmp2 != false)
			// 		$tmp3 = $tmp2;
			// 	$tmp3 = str_replace("[OBJECT]",$value['Ontology']['object'],$tmp3);
			// 	if($tmp3 != false)
			// 		$tmp4 = $tmp3;
			// 	$tmp4 = str_replace("[ADDITIONAL]",$value['Ontology']['additional'],$tmp4);
			// 	if($tmp4 != false)
			// 		$answer = $tmp4;
			// 	$data[$key]['answer'][] = $answer;
			// }

		// foreach ($data as $key => $value){
		// 	foreach ($value['Template'] as $temp_key => $temp_value) {
		// 		// テンプレートに挿入
		// 		$tmp1 = $temp_value['template'];
		// 		$tmp1 = str_replace("[SUBJECT]",$value['Ontology']['subject'],$tmp1);
		// 		if($tmp1 != false)
		// 			$tmp2 = $tmp1;
		// 		$tmp2 = str_replace("[PREDICATE]",$value['Ontology']['predicate'],$tmp2);
		// 		if($tmp2 != false)
		// 			$tmp3 = $tmp2;
		// 		$tmp3 = str_replace("[OBJECT]",$value['Ontology']['object'],$tmp3);
		// 		if($tmp3 != false)
		// 			$tmp4 = $tmp3;
		// 		$tmp4 = str_replace("[ADDITIONAL]",$value['Ontology']['additional'],$tmp4);
		// 		if($tmp4 != false)
		// 			$question = $tmp4;

		// 		$data[$key]['question'][] = $question;

		// 		// 回答を挿入
		// 		$tmp1 = $temp_value['answer'];
		// 		$tmp1 = str_replace("[SUBJECT]",$value['Ontology']['subject'],$tmp1);
		// 		if($tmp1 != false)
		// 			$tmp2 = $tmp1;
		// 		$tmp2 = str_replace("[PREDICATE]",$value['Ontology']['predicate'],$tmp2);
		// 		if($tmp2 != false)
		// 			$tmp3 = $tmp2;
		// 		$tmp3 = str_replace("[OBJECT]",$value['Ontology']['object'],$tmp3);
		// 		if($tmp3 != false)
		// 			$tmp4 = $tmp3;
		// 		$tmp4 = str_replace("[ADDITIONAL]",$value['Ontology']['additional'],$tmp4);
		// 		if($tmp4 != false)
		// 			$answer = $tmp4;
		// 		$data[$key]['answer'][] = $answer;
		// 	}
		// }
?>
