<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Reportes Controller
 *
 * @property \App\Model\Table\ReportesTable $Reportes
 */
class ReportesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        //$this->Authorization->skipAuthorization();
        $query = $this->Reportes->find();
        $reportes = $this->paginate($query);
        $venta = $this->fetchtable('Ventas')->find();
        $ventaQ = $this->paginate($venta);
        $usuarioL = $this->fetchTable('Usuarios')->find('list')->toArray();

        $this->set(compact('reportes', 'ventaQs'), 'usuarioL');
    }

    /**
     * View method
     *
     * @param string|null $id Reporte id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reporte = $this->Reportes->get($id, contain: []);
        $this->set(compact('reporte'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reporte = $this->Reportes->newEmptyEntity();
        if ($this->request->is('post')) {
            $reporte = $this->Reportes->patchEntity($reporte, $this->request->getData());
            if ($this->Reportes->save($reporte)) {
                $this->Flash->success(__('The reporte has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reporte could not be saved. Please, try again.'));
        }
        $this->set(compact('reporte'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reporte id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reporte = $this->Reportes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reporte = $this->Reportes->patchEntity($reporte, $this->request->getData());
            if ($this->Reportes->save($reporte)) {
                $this->Flash->success(__('The reporte has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reporte could not be saved. Please, try again.'));
        }
        $this->set(compact('reporte'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reporte id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reporte = $this->Reportes->get($id);
        if ($this->Reportes->delete($reporte)) {
            $this->Flash->success(__('The reporte has been deleted.'));
        } else {
            $this->Flash->error(__('The reporte could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
