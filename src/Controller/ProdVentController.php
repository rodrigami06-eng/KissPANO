<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProdVent Controller
 *
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 */
class ProdVentController extends AppController
{
    /**
     * Initialize controller
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Authorization.Authorization');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ProdVent->find();
        $query = $this->Authorization->applyScope($query);
        $prodVent = $this->paginate($query);

        $this->set(compact('prodVent'));
    }

    /**
     * View method
     *
     * @param string|null $id Prod Vent id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prodVent = $this->ProdVent->get($id, contain: []);
        $this->Authorization->authorize($prodVent);
        $this->set(compact('prodVent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prodVent = $this->ProdVent->newEmptyEntity();
        $this->Authorization->authorize($prodVent);
        if ($this->request->is('post')) {
            $prodVent = $this->ProdVent->patchEntity($prodVent, $this->request->getData());
            if ($this->ProdVent->save($prodVent)) {
                $this->Flash->success(__('The prod vent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prod vent could not be saved. Please, try again.'));
        }
        $this->set(compact('prodVent'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Prod Vent id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prodVent = $this->ProdVent->get($id, contain: []);
        $this->Authorization->authorize($prodVent);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prodVent = $this->ProdVent->patchEntity($prodVent, $this->request->getData());
            if ($this->ProdVent->save($prodVent)) {
                $this->Flash->success(__('The prod vent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prod vent could not be saved. Please, try again.'));
        }
        $this->set(compact('prodVent'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Prod Vent id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prodVent = $this->ProdVent->get($id);
        $this->Authorization->authorize($prodVent);
        if ($this->ProdVent->delete($prodVent)) {
            $this->Flash->success(__('The prod vent has been deleted.'));
        } else {
            $this->Flash->error(__('The prod vent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
