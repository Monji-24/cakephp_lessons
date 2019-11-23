<?php
namespace App\Controller;

class PostsTagsController extends AppController
{

    public function add()
    {



        if ($this->request->is('post')){

            $this->PostsTags->deleteAll(['post_id' => $this->request->getData('post_id')]);

            $tagids = $this->request->getData('tag_id');
            foreach ($tagids as $tagid){
                $posttag = $this->PostsTags->newEntity();
                $posttag = $this->PostsTags->patchEntity($posttag, ["tag_id" => $tagid, "post_id" => $this->request->getData('post_id')]);
                $this->PostsTags->save($posttag);
            };
            return $this->redirect([ 'controller' => 'Posts', 'action' => 'index']);

//            $posttag = $this->PostsTags->patchEntity($posttag, ["tag_id" => 3, "post_id" => 2]);
//            $posttag = $this->PostsTags->patchEntity($posttag, $this->request->getData());
//            $this->PostsTags->save($posttag);


//            if ($this->PostsTags->save($posttag)) {
//                $this->Flash->success('Tag Add Success!');
//                return $this->redirect([ 'controller' => 'Posts', 'action' => 'index']);
//            } else {
//                $this->Flash->error('Tag Add Error!');
//            }
        }
    }

}
?>
