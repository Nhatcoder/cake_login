<?php

declare(strict_types=1);

namespace App\Controller;

use Authentication\Authenticator\Result;

/**
 * Users Controller
 *
 */
class UsersController extends AppController
{
    /**
     * Initialize controller
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Authentication.Authentication');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        // Cho phép truy cập vào login & register mà không cần xác thực
        $this->Authentication->allowUnauthenticated(['login']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($this->request->is('post')) {
            if ($result->isValid()) {
                // Đăng nhập thành công
                $this->Flash->success('Login successful');
                $redirect = $this->request->getQuery('redirect', '/');
                return $this->redirect($redirect);
            } else {
                // Đăng nhập thất bại
                $this->Flash->error('Invalid email or password');
            }
        }
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
}
