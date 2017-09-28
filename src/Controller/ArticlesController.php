<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Article[] paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
        $this->set('_serialize', ['articles']);
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);

        $this->set('article', $article);
        $this->set('_serialize', ['article']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $this->set('article', $article);

        $categories = $this->Articles->Categories->find('treeList');
        $this->set(compact(/*'article', */'categories'));
        // $this->set('_serialize', ['article', 'cagetories']);

        $category_names = [];
        foreach($this->Articles->Categories->find() as $category) {
            $category_names[$category['id']] = $category['description'];
        }
        $this->set('category_names', $category_names);
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id);
        if($this->request->is(['post', 'put'])) {
            // $data = array_map(function($k, $v) {
            //     debug("k: $k | v: $v");
            //     // $el['category_id'] = intval($el['category_id']);
            //     return $k;
            // }, $this->request->getData());
            // die;
            // debug($data); die;

            $data = $this->request->getData();
            $data['category_id'] = intval($data['category_id']);

            // debug($data);// die;

            $this->Articles->patchEntity($article, $data);
            if($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been updated.'));
                // debug($article); die;
                return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error(__('Unable to update your article'));
        }
        $this->set('article', $article);

        $categories = $this->Articles->Categories->find('treeList');
        $this->set('categories', $categories);

        $category_names = [];
        foreach($this->Articles->Categories->find() as $category) {
            $category_names[$category['id']] = $category['description'];
        }
        $this->set('category_names', $category_names);
        // debug($category_names);
        // die;
        // debug($categories); die;
        // $categories = $this->Articles->Categories->find('treeList');
        // $this->set(compact('article', 'categories'));
        // $this->set('_serialize', ['article', 'cagetories']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $article = $this->Articles->get($id);
        if($this->Articles->get($id)) {
            $this->Flash->success(__('The Article with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action'=>'index']);
        }
    }
}
