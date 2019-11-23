<?php

 namespace App\Model\Table;

 use Cake\ORM\Table;
 use Cake\Validation\Validator;

 class CategoriesTable extends Table{
   public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');
    $this->hasMany('Posts',[
        'dependent'=> true]);
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
