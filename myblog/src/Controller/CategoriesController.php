<?php
namespace App\Controller;

class CategoriesController extends AppController
{

    public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => 'Posts'
        ]);
        $this->set(compact('category'));

    }



}
?>
