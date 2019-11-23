<?php

 namespace App\Model\Table;

 use Cake\ORM\Table;
 use Cake\Validation\Validator;

 class TagsTable extends Table{
   public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');
    $this->belongsToMany('Posts',[
        'joinTable'=> 'posts_tags']);
  }

  public function validationDefault(Validator $validator)
  {
    $validator
     ->notEmpty('body')
     ->requirePresence('body');
    return $validator;
  }
 }
 ?>
