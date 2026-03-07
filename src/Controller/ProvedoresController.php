<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Provedores Controller
 *
 * @property \App\Model\Table\ProvedoresTable $Provedores
 */
class ProvedoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Provedores->find();
        $provedores = $this->paginate($query);

        //$contacto = $this->fetchTable('Contactos');
        
        $provedore = $this->Provedores->newEmptyEntity();
            
        if ($this->request->is('post')) {
            $provedore = $this->Provedores->patchEntity($provedore, $this->request->getData(), ['associated' => ['Contactos']]);
            $provedore->Estado = 1;

            if ($this->Provedores->save($provedore)) {
                $this->Flash->success(__('proveedor Registrado.'));

                return $this->redirect(['action' => 'index']);
            }
            debug($provedore->getErrors());
            $this->Flash->error(__('Proveedor no pudo registrarse, intente de nuevo.'));
        }
        $this->set(compact('provedore',));

        $this->set(compact('provedores'));
    }

    /**
     * View method
     *
     * @param string|null $id Provedore id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $provedore = $this->Provedores->get($id, contain: []);
        $this->set(compact('provedore'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contacto = $this->fetchTable('Contactos');
        
        $provedore = $this->Provedores->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $provedore->Estado = 1;
            $provedore = $this->Provedores->patchEntity($provedore, $this->request->getData(), ['associated' => ['Contactos']]);
            if ($this->Provedores->save($provedore)) {
                $this->Flash->success(__('The provedore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provedore could not be saved. Please, try again.'));
        }
        $this->set(compact('provedore', 'contacto'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Provedore id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $provedore = $this->Provedores->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $provedore = $this->Provedores->patchEntity($provedore, $this->request->getData());
            if ($this->Provedores->save($provedore)) {
                $this->Flash->success(__('The provedore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provedore could not be saved. Please, try again.'));
        }
        $this->set(compact('provedore'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Provedore id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $provedore = $this->Provedores->get($id);
        if ($this->Provedores->delete($provedore)) {
            $this->Flash->success(__('The provedore has been deleted.'));
        } else {
            $this->Flash->error(__('The provedore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
