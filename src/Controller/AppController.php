<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    /*
     * Enable the following components for recommended CakePHP security settings.
     * see https://book.cakephp.org/3.0/en/controllers/components/security.html
     */
    public function initialize()
    {
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'storage' => 'Session'
        ]);
    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['display']);
    }

    public function setGlobalVars()
    {
        $tokenName = Configure::read('token_name');
        $tokenAbbreviation = Configure::read('token_abbreviation');
        $tokenAddress = Configure::read('token_address');
        $icoAddress = Configure::read('ico_address');
        $icoStart = Configure::read('ico_start');
        $icoEnd = Configure::read('ico_end');
        $totalSupply = Configure::read('total_supply');
        $softCap = Configure::read('soft_cap');
        $hardCap = Configure::read('hard_cap');

        $this->set('tokenName', $tokenName);
        $this->set('tokenAbbreviation', $tokenAbbreviation);
        $this->set('tokenAddress', $tokenAddress);
        $this->set('icoAddress', $icoAddress);
        $this->set('icoStart', $icoStart);
        $this->set('icoEnd', $icoEnd);
        $this->set('totalSupply', $totalSupply);
        $this->set('softCap', $softCap);
        $this->set('hardCap', $hardCap);
    }
}
