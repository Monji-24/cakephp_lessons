

<?php
$this->assign('title', 'Edit Post');
?>

<h1>
  <?= $this->Html->link('Back', ['action'=>'index'],['class'=>['pull-right', 'fs12']]); ?>
  Edit Post
</h1>

<?= $this->Form->create($post); ?>
<?= $this->Form->input('title'); ?>
<?= $this->Form->input('body', ['rows' => '3']); ?>
<?= $this->Form->input('image'); ?>

<div class="input select">
    <label for="category_id">Category</label>
    <select name = "category_id">
        <?php foreach($categories as $category) :?>
         <?php if($post->category_id == $category->id) :?>
          <option value = '<?= $category->id; ?>' selected><?= $category->name; ?></option>
         <?php else :?>
          <option value = '<?= $category->id; ?>' ><?= $category->name; ?></option>

         <?php endif; ?>
        <?php endforeach ;?>
    </select>
</div>

<?= $this->Form->button('Update'); ?>
<?= $this->Form->end(); ?>

<h1>Item</h1>
<ul>
    <?php foreach ($post->items as $item) :?>
        <li><?= $item->content ;?></li>
    <?php endforeach;?>
</ul>





<p id = "<?= $post->id ;?>">
    <input id="content" type="text" name="content" placeholder="本文">
    <button type="button" class="add_item">保存</button>
</p>

<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous">
</script>

<script>
    $(document).on('click','.add_item', function() {
        var post_id = <?= $post->id ;?>;
        var content = $('#content').val();
        $.ajax(
            {
                type: "POST",
                url: "/items/add",
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-CSRF-Token', "<?= $this->request->getParam('_csrfToken') ?>");
                },
                data: {
                    "post_id": post_id,
                    "content": content
                },
                dataType: "text",
                success: function (dom)
                {


                    $(dom).appendTo('#<?= $post->id ;?>')

                    //保存完了
                    //ここで、返り値（dom）を描画する
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) //通信失敗
                {
                    alert('処理できませんでした');
                }
            });
    });
</script>









<?= $this->Form->create(null, ['url' => ['controller' => 'PostsTags', 'action' => 'add']]); ?>
<?= $this->Form->hidden('post_id', ['value'=>$post->id]); ?>
<div class="checkbox">
    <label>Tags</label>
    <br>


    <?php foreach ($tags as $tag) :?>

         <?php if(in_array($tag->id, $tag_id)) :?>
           <input type="checkbox" name='tag_id[]' value='<?= $tag->id ;?>' checked><?= $tag->name ;?><br>
         <?php else :?>
           <input type="checkbox" name='tag_id[]' value='<?= $tag->id ;?>' ><?= $tag->name ;?><br>
         <?php endif; ?>

    <?php endforeach ;?>


</div>
<?= $this->Form->button('Add'); ?>
<?= $this->Form->end(); ?>






