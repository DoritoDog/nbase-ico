<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Mailer\MailerAwareTrait;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout', 'support']);
    }

    public function index()
    {
        $user = $this->Users->get($this->Auth->user('id'));

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $this->Users->save($user);
        }

        $this->set('user', $user);
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your account has been created successfully.'));
                
                $user = $this->Auth->identify();
                if ($user) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                }
            }
            $this->Flash->error(__('Unable to add the user.'));
        }

        $countries = TableRegistry::get('Countries')->find();

        $this->set('user', $user);
        $this->set('countries', $countries);
    }

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function forgotPassword() {
        if ($this->request->is('post')) {
            $user = $this->Users->findByEmail($this->request->data('email'))->first();
            if (is_null($user)) {
                $this->Flash->error('Email address does not exist. Please try again');
            } else {
                $resetCode = bin2hex(random_bytes(40));
                $url = Router::url(['controller' => 'Users', 'action' => 'reset', $resetCode, '_full' => true]);
                $timeout = time() + DAY;
                $passkey = ['passkey' => $resetCode, 'timeout' => $timeout];
                if ($this->Users->updateAll($passkey, ['id' => $user->id])) {

                    // Emails the user their reset URL.
                    $this->getMailer('User')->send('resetPassword', [$user, $url]);
                    $this->redirect(['action' => 'profile']);
                } else {
                    $this->Flash->error('An unexpected error occoured, Please try again later.');
                }
            }
        }
    }

    public function support() {
        $contactTable = TableRegistry::get('ContactMessages');
        $msg = $contactTable->newEntity();
        $this->set('msg', $msg);

        if ($this->request->is('post')) {
            $msg = $contactTable->patchEntity($msg, $this->request->getData());
            if ($contactTable->save($msg)) {
                $this->Flash->success(__('Thank you for getting in touch!'));
                return $this->redirect(['action' => 'support']);
            }
            $this->Flash->error(__('An error occoured while sending your message, please try again later.'));
        }
    }
}
