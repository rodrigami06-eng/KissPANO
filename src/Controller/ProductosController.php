<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;
use Cake\View\Helper;

/**
 * Productos Controller
 *
 * @property \App\Model\Table\ProductosTable $Productos
 */
class ProductosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Productos->find();
        $productos = $this->paginate($query);

        $producto = $this->Productos->newEmptyEntity();
        if ($this->request->is('post')) {
            $producto = $this->Productos->patchEntity($producto, $this->request->getData());

            //Agregar Imagen del libro
            $imagen = $this->request->getData('Imagen');

            if ($imagen) {
                $tiempo = FrozenTime::now()->toUnixString();
                $nombreImagen = $tiempo.'_'.$imagen->getClientFileName();
                $destino = WWW_ROOT.'img/producto/'.$nombreImagen;

                $imagen->moveTo($destino);
                $producto->Imagen=$nombreImagen;
            }

            if ($this->Productos->save($producto)) {
                $this->Flash->success(__('El producto fue Registrado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El producto no fue guardado. Por favor intente denuevo.'));
        }
        $this->set('titulo', 'Inventario');
        $this->set(compact('productos', 'producto'));
    }

    /**
     * View method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $producto = $this->Productos->get($id, contain: []);
        $this->set(compact('producto'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $producto = $this->Productos->newEmptyEntity();
        if ($this->request->is('post')) {
            $producto = $this->Productos->patchEntity($producto, $this->request->getData());

            //Agregar Imagen del libro
            $imagen = $this->request->getData('Imagen');

            if ($imagen) {
                $tiempo = FrozenTime::now()->toUnixString();
                $nombreImagen = $tiempo.'_'.$imagen->getClientFileName();
                $destino = WWW_ROOT.'img/producto/'.$nombreImagen;

                $imagen->moveTo($destino);
                $producto->Imagen=$nombreImagen;
            }

            if ($this->Productos->save($producto)) {
                $this->Flash->success(__('El producto fue Registrado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El producto no fue guardado. Por favor intente denuevo.'));
        }
        $this->set(compact('producto'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $producto = $this->Productos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $nomImgAnt = $producto->Imagen;

            $producto = $this->Productos->patchEntity($producto, $this->request->getData());

            $producto->Imagen = $nomImgAnt;

            if ($this->Productos->save($producto)) {
                $this->Flash->success(__('The producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The producto could not be saved. Please, try again.'));
        }
        $this->set(compact('producto'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $producto = $this->Productos->get($id);

        if(file_exists(WWW_ROOT.'img/producto'.$producto['Imagen'])){
           unlink(WWW_ROOT.'img/producto'.$producto['Imagen']);// 
        }

        if ($this->Productos->delete($producto)) {
            $this->Flash->success(__('The producto has been deleted.'));
        } else {
            $this->Flash->error(__('The producto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
