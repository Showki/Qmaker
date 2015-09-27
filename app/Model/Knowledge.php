<?php
class Knowledge extends AppModel{
	public $name = 'Knowledge';

	public function fetchObject(){
		$object_list = $this->find('list',array(
            'fields' => array('Knowledge.object'),
            'conditions' => array(
                'Knowledge.level_flag' => 1)
        ));
        if (empty($object_list))
            return null;
        // 検索結果の重複を除去
        $removed_duplicate_list = $this->uniqueIndex($object_list);
        return $removed_duplicate_list;
	}

	public function fetchObjectByKeyword($keyword){
        // 入力されたキーワードで検索
        $keyword_in_searched_list = $this->find('list',array(
            'fields' => array('Knowledge.object'),
            'conditions' => array(
                'Knowledge.object like' => "%".$keyword."%",
                'Knowledge.level_flag' => 1)
        ));
        if (empty($keyword_in_searched_list))
            return null;
        if (empty($keyword))
            return null;
        // 検索結果の重複を除去
        $removed_duplicate_list = $this->uniqueIndex($keyword_in_searched_list);
        return $removed_duplicate_list;
	}

    public function fetchKnowledge($selected_keyword){
        $searched_knowledge = $this->find('all',array(
            'conditions' => array(
                'OR' => array(
                    'Knowledge.object' => $selected_keyword,
                    'Knowledge.target_knowledge' => $selected_keyword)
            )
        ));
        return $searched_knowledge;
    }

    public function uniqueIndex($arr){
        foreach($arr as $key => $value ){
            $tmp[] = $value;
        }
        $result_arr = array_unique($tmp);
        return $result_arr;
    }
}
?>
