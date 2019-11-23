<?php

 namespace App\Model\Table;

 use Cake\ORM\Table;
 use Cake\Validation\Validator;

 class PostsTagsTable extends Table{
   public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');
    $this->belongsTo('Posts');
  }

  public function validationDefault(Validator $validator)
  {
    $validator;

    return $validator;
  }
 }
 ?>
