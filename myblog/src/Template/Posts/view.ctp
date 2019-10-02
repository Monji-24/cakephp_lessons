<?php
$this->assign('title', 'Blog Detail');
?>

<h1>
  <?= $this->Html->link('Back', ['action'=>'index'],['class'=>['pull-right', 'fs12']]); ?>
  <?= h($post->title); ?>
</h1>

<p><?= nl2br(h($post->body)); ?></p>

<ul>
 <?php foreach ($posts as $post) :?>
  <li><!-- <?= $this->Html->link($post->title, ['controller'=>'Posts', 'action'=>'view', $post->id]); ?> -->
      <!-- <?= $this->Html->link($post->title, ['action'=>'view', $post->id]); ?> -->
      <a href="<?= $this->Url->build(['action'=>'view', $post->id]); ?>">
        <?= h($post->title); ?></li>
 <?php endforeach ;?>

</ul>
