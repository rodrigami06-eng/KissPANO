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
        $this->viewBuilder()->setLayout('dashboard');

        $this->set('titulo', 'Panel de Control');
    }
}
