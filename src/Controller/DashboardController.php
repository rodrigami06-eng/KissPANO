<?php
declare(strict_types=1);

namespace App\Controller;
/**
 * Dashboard Controller
 *
 */
class DashboardController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        //$this->Authorization->skipAuthorization();

        $ventaT =   $this->fetchTable('Ventas')->find()->All();
        $productoT = $this->fetchTable('Productos')->find()->all();
        $this->viewBuilder()->setLayout('dashboard');

        $vhoy = $ventaT->sumOf('Total');

        $this->set('titulo', 'Panel de Control');
        $this->set(compact('productoT'));
    }
}
