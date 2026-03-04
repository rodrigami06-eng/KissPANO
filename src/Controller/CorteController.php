<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Corte Controller
 *
 * @property \App\Model\Table\CorteTable $Corte
 */
class CorteController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Corte->find();
        $corte = $this->paginate($query);

        $this->set(compact('corte'));
    }

    /**
     * View method
     *
     * @param string|null $id Corte id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $corte = $this->Corte->get($id, contain: []);
        $this->set(compact('corte'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $corte = $this->Corte->newEmptyEntity();
        if ($this->request->is('post')) {
            $corte = $this->Corte->patchEntity($corte, $this->request->getData());
            if ($this->Corte->save($corte)) {
                $this->Flash->success(__('The corte has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The corte could not be saved. Please, try again.'));
        }
        $this->set(compact('corte'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Corte id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $corte = $this->Corte->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $corte = $this->Corte->patchEntity($corte, $this->request->getData());
            if ($this->Corte->save($corte)) {
                $this->Flash->success(__('The corte has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The corte could not be saved. Please, try again.'));
        }
        $this->set(compact('corte'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Corte id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $corte = $this->Corte->get($id);
        if ($this->Corte->delete($corte)) {
            $this->Flash->success(__('The corte has been deleted.'));
        } else {
            $this->Flash->error(__('The corte could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
