<?php
class Knowledge extends AppModel{
	public $name = 'Knowledge';
	// public $belongsTo = array(
	// 	'Category' => array(
	// 		'className' => 'Category',
	// 		'foreignKey' => 'category_id'
	// 		),
	//
	//
	public function remove_duplicate_list($keyword){
        // 入力されたキーワードで検索
        $keyword_in_searched_list = $this->find('list',array(
            'fields' => array('Knowledge.object'),
            'conditions' => array(
                'Knowledge.object like' => "%".$keyword."%",
                'Knowledge.level_flag' => 1)
        ));
        // 検索結果の重複を除去
        $removed_duplicate_list = $this->unique_index($keyword_in_searched_list);
        return $removed_duplicate_list;
	}

    public function unique_index($arr){
        foreach($arr as $key => $value ){
            $tmp[] = $value;
        }
        $result_arr = array_unique($tmp);
        return $result_arr;
    }
}
?>
