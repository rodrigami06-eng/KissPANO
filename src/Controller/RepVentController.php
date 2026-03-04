<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * RepVent Controller
 *
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 */
class RepVentController extends AppController
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
        $query = $this->RepVent->find();
        $query = $this->Authorization->applyScope($query);
        $repVent = $this->paginate($query);

        $this->set(compact('repVent'));
    }

    /**
     * View method
     *
     * @param string|null $id Rep Vent id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $repVent = $this->RepVent->get($id, contain: []);
        $this->Authorization->authorize($repVent);
        $this->set(compact('repVent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $repVent = $this->RepVent->newEmptyEntity();
        $this->Authorization->authorize($repVent);
        if ($this->request->is('post')) {
            $repVent = $this->RepVent->patchEntity($repVent, $this->request->getData());
            if ($this->RepVent->save($repVent)) {
                $this->Flash->success(__('The rep vent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rep vent could not be saved. Please, try again.'));
        }
        $this->set(compact('repVent'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rep Vent id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $repVent = $this->RepVent->get($id, contain: []);
        $this->Authorization->authorize($repVent);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $repVent = $this->RepVent->patchEntity($repVent, $this->request->getData());
            if ($this->RepVent->save($repVent)) {
                $this->Flash->success(__('The rep vent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rep vent could not be saved. Please, try again.'));
        }
        $this->set(compact('repVent'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rep Vent id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $repVent = $this->RepVent->get($id);
        $this->Authorization->authorize($repVent);
        if ($this->RepVent->delete($repVent)) {
            $this->Flash->success(__('The rep vent has been deleted.'));
        } else {
            $this->Flash->error(__('The rep vent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
