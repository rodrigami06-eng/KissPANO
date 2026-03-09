<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;

/**
 * Ventas Controller
 *
 * @property \App\Model\Table\VentasTable $Ventas
 */
class VentasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Ventas->find();
        $ventas = $this->paginate($query);

        
        $this->add();

        $this->set(compact('ventas'));
    }

    /**
     * View method
     *
     * @param string|null $id Venta id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $venta = $this->Ventas->get($id, contain: []);
        $this->set(compact('venta'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //Llamamos a la tabla de Provedores y productos en la base de Datos
        $provedor = $this->fetchTable('Provedores')->find('list')->all();
        $productoT = $this->fetchTable('Productos')->find()->all();
        $prodL = $this->fetchTable('Productos')->find('list')->all();

        $venta = $this->Ventas->newEmptyEntity();
        if ($this->request->is('post')) {
            $venta->Fecha = FrozenTime::now();

            $venta = $this->Ventas->patchEntity($venta, $this->request->getData(), ['associated' => ['ProdVent']]);

            if ($this->Ventas->save($venta)) {
                $this->Flash->success(__('La venta fue guardada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La Venta no pudo ser guardada, intente de nuevo'));
        }

        $this->set(compact('venta', 'productoT', 'provedor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Venta id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $venta = $this->Ventas->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venta = $this->Ventas->patchEntity($venta, $this->request->getData());
            if ($this->Ventas->save($venta)) {
                $this->Flash->success(__('The venta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venta could not be saved. Please, try again.'));
        }
        $this->set(compact('venta'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Venta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venta = $this->Ventas->get($id);
        if ($this->Ventas->delete($venta)) {
            $this->Flash->success(__('The venta has been deleted.'));
        } else {
            $this->Flash->error(__('The venta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function realizarVent(){
        //Llamamos las tablas de las bases de datos
        $Productos = $this->fetchTable('Productos');
        $Provedores = $this->fetchTable('Provedores');

        $producto = $Productos->find()->toArray();
        $provL = $Provedores->find('list')->toArray();

        $data = ['producto' => $producto, 'provedor' => $provL];
        
        $venta = $this->Ventas->newEmptyEntity();
        if ($this->request->is('post')) {
            $listaVP = $this->request->getData('VentProd');

            $prod = $Productos->find('list', [
                'keyField' => 'IdProducto',       // La llave del arreglo
                'valueField' => 'Costo'   // El valor del arreglo
            ])->toArray();

            $indice = 0;
            $total = 0.0;

            foreach($listaVP as $vp){
                $vp['Subtotal'] = toFloat($vp['Cantidad']) * $prod[$vp['IdProducto']];
                $listaVP1[$indice] = $vp;

                $total += $vp['Subtotal'];

                $indice ++;
            }

            $venta->ProdVent = $listaVP1;
            $venta->Total = $total;
            $venta->Fecha = FrozenTime::now();

            $venta = $this->Ventas->patchEntity($venta, $this->request->getData(), ['associated' => ['ProdVent']]);

            if ($this->Ventas->save($venta)) {
                $this->Flash->success(__('La venta fue guardada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La Venta no pudo ser guardada, intente de nuevo'));
        }
    }
}
