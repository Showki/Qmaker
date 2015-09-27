<?php foreach ($keywords_list as $keyword): ?>
    <h4><?php echo $this->html->link($keyword,
        array(
            'controller'    => 'makes',
            'action'        => 'showGeneratedQuestions',
            $keyword
        ));
    ?></h4>
<?php endforeach; ?>
