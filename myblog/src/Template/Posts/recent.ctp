<?php
$this->assign('title', 'Recent');
?>

<h1>
  <?= $this->Html->link('Back', ['action'=>'index'],['class'=>['pull-right', 'fs12']]); ?>
    最近チェックした記事
</h1>

<?php if (count($posts)) :?>
    <ul>
        <?php foreach($posts as $post) : ?>
            <li>
                <?= $this->Html->link($post->title , ['controller' => 'Posts' , 'action' => 'view' , $post->id]); ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
