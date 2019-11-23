<?php
namespace App\Controller;

class TagsController extends AppController
{

    public function view($id = null)
    {
        $tag = $this->Tags->get($id, [
            'contain' => 'Posts'
        ]);
        $this->set(compact('tag'));

    }



}
?>
