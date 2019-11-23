<?php
$this->assign('title', 'Category Detail');
?>

<h1>
  <?= $this->Html->link('Back', ['controller' => 'Posts' , 'action'=>'index'],['class'=>['pull-right', 'fs12']]); ?>
 Category
</h1>

<p><?= h($category->name); ?></p>


<?php if (count($category->posts)) :?>
<h2>Posts<span class = "fs12">(<?= count($category->posts); ?>)</span></h2>
<ul>
    <?php foreach($category->posts as $post) : ?>
        <li>
            <?= $this->Html->link($post->title , ['controller' => 'Posts' , 'action' => 'view' , $post->id]); ?>
        </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>



