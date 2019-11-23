<?php
$this->assign('title', 'Tag Detail');
?>

<h1>
  <?= $this->Html->link('Back', ['controller' => 'Posts' , 'action'=>'index'],['class'=>['pull-right', 'fs12']]); ?>
 Tag
</h1>

<p><?= h($tag->name); ?></p>


<?php if (count($tag->posts)) :?>
<h2>Posts<span class = "fs12">(<?= count($tag->posts); ?>)</span></h2>
<ul>
    <?php foreach($tag->posts as $post) : ?>
        <li>
            <?= $this->Html->link($post->title , ['controller' => 'Posts' , 'action' => 'view' , $post->id]); ?>
        </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>



