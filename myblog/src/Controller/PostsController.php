<?php
namespace App\Controller;

use App\Model\Table\PostsTable;

class PostsController extends AppController
{

    public function index()
    {

        $posts = $this->Posts->find('all');
        // $this->set('posts', $posts);
        $this->set(compact('posts'));

        $this->loadModel('Categories');
        $categories = $this->Categories->find('all');
        $this->set(compact('categories'));

        $this->loadModel('Tags');
        $tags = $this->Tags->find('all');
        $this->set(compact('tags'));
    }

    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Comments', 'Items']
        ]);

//        itemsをcontainする
        $this->set(compact('post'));

        $this->loadModel('Categories');
        $category = $this->Categories->get($post->category_id,[
            'contain' => 'Posts'
        ]);
        $this->set(compact('category'));


        $this->loadModel('Tags');
        $tags = $this->Tags->find('all');
        $this->set(compact('tags'));


        $this->loadModel('PostsTags');
        $post_tags = $this->PostsTags->find('all', ['conditions' => ['post_id' => $post->id]]);
        foreach ($post_tags as $post_tag){
            $tag_ids[] =$post_tag->tag_id;
        }
        $this->set(compact('tag_ids'));


        $session = $this->request->getSession();
        if ($session->read('checked_articles')) {
            $post_id_array = $session->read('checked_articles');
        } else {
            $post_id_array = [];
        }
        array_push($post_id_array, $post->id);
        $post_id_array = array_unique($post_id_array);
        $post_id_array = array_values($post_id_array);

        $session->write('checked_articles',$post_id_array);



    }

    public function add()
    {
        $post = $this->Posts->newEntity();

        if ($this->request->is('get')) {
            $post = $this->Posts->patchEntity($post, ['title' => 'タイトル', 'body' => '本文を入力してください']);
            if ($this->Posts->save($post)){
                $id =$post->id;
                return $this->redirect(['action'=>'edit', $id]);
            }
        }
        $this->set(compact('post'));
    }


    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => 'Items',
        ]);
        $this->set(compact('post'));

        $this->loadModel('Categories');
        $categories = $this->Categories->find('all');
        $this->set(compact('categories'));

        if ($this->request->is(['post', 'patch', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)){
                $this->Flash->success('Edit Success!');
                return $this->redirect(['action'=>'index']);
            }else{
                $this->Flash->error('Edit Error!');
            }
        }



        $this->loadModel('Tags');
        $tags = $this->Tags->find('all');
        $this->set(compact('tags'));


        $this->loadModel('PostsTags');
        $post_tags = $this->PostsTags->find('all', ['conditions' => ['post_id' => $post->id]]);


        $tag_id[] = array();
        foreach ($post_tags as $post_tag){
            $tag_id[] =$post_tag->tag_id;
        }
        $this->set(compact('tag_id'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod('post', 'delete');
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)){
            $this->Flash->success('Delete Success!');
        }else{
            $this->Flash->error('Delete Error!');
        }
        return $this->redirect(['action'=>'index']);

    }


    public function recent()
    {
        $session = $this->request->getSession();
        $posts = $this->Posts->find('all', [
            'conditions' => ['Posts.id IN' => $session->read('checked_articles')]
        ]);
        $this->set(compact('posts'));

    }

}
?>
