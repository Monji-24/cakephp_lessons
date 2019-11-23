<?php
$this->assign('title', 'My Blog');
?>

<h1>
　<?= $this->Html->link('Add New', ['action'=>'add'], ['class'=>['pull-right', 'fs12']]); ?>
  Blog Posts
</h1>
<ul>
 <?php foreach ($posts as $post) :?>
  <li>
      <?= $this->Html->image($post->image); ?>
      <?= $this->Html->link($post->title, ['action'=>'view', $post->id]); ?>

      <?= $this->Html->link('[Edit]', ['action'=>'edit', $post->id], ['class'=> 'fs12']); ?>
      <?=
        $this->Form->postLink(
            '[x]',
            ['action'=>'delete', $post->id],
            ['confirm'=>'Are you sure?', 'class'=>'fs12']
        );
      ?>
  </li>
 <?php endforeach ;?>

</ul>


<h1>Category</h1>
<ul>
    <?php foreach ($categories as $category) :?>
    <li>
        <?= $this->Html->link($category->name , ['controller' => 'Categories' , 'action' => 'view' , $category->id]); ?>
    </li>
    <?php endforeach; ?>
</ul>

<h1>Tag</h1>
<ul>
    <?php foreach ($tags as $tag) :?>
        <li>
            <?= $this->Html->link($tag->name , ['controller' => 'Tags' , 'action' => 'view' , $tag->id]); ?>
        </li>
    <?php endforeach; ?>
</ul>



























































