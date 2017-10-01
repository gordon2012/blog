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
        $article = $this->Articles->newEntity()->accessible('category_id', true);

        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            $article->user_id = $this->Auth->user('id');

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }

        $categories = $this->Articles->Categories->find('treeList');

        $category_names = [];
        foreach($this->Articles->Categories->find() as $category) {
            $category_names[$category['id']] = $category['description'];
        }

        $this->set(compact('article', 'categories', 'category_names'));
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
        $article = $this->Articles->get($id)->accessible('category_id', true);

        if($this->request->is(['post', 'put'])) {
            $data = $this->request->getData();
            $data['category_id'] = intval($data['category_id']);

            $this->Articles->patchEntity($article, $data);
            if($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been updated.'));
                return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error(__('Unable to update your article'));
        }

        $categories = $this->Articles->Categories->find('treeList');

        $category_names = [];
        foreach($this->Articles->Categories->find() as $category) {
            $category_names[$category['id']] = $category['description'];
        }

        $this->set(compact('article', 'categories', 'category_names'));
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

    public function isAuthorized($user) {
        if($this->request->getParam('action') === 'add') {
            return true;
        }

        if(in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            $articleId = (int)$this->request->getParam('pass.0');
            if($this->Articles->isOwnedBy($articleId, $user['id'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }
}
