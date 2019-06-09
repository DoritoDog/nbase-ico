<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    
    <link rel="icon" href="img/Icon.png">

    <!-- Bootstrap -->
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('bootstrap-reboot.css') ?>
    <?= $this->Html->css('bootstrap-grid.css') ?>

    <!-- Animate.css -->
    <?= $this->Html->css('animate.css') ?>

    <?= $this->Html->css('style.css') ?>

    <?= $this->Html->script('jquery') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="white text-center mt-3">
    <?= $this->Flash->render() ?>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark dark-navbar">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <?= $this->Html->link('Main', ['controller' => 'Pages', 'action' => 'index'], ['class' => 'site-link m-5']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link('Dashboard', ['controller' => 'Users', 'action' => 'index'], ['class' => 'site-link m-5']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link('nBase', 'https://play.google.com/store/apps/details?id=com.warbase.android&hl=en_US', ['class' => 'site-link m-5']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link('Support', ['controller' => 'Users', 'action' => 'support'], ['class' => 'site-link m-5']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'site-link m-5']) ?>
            </li>
        </div>
    </nav>

    <?= $this->fetch('content') ?>

    <footer class="footer-basic-centered">

        <p class="footer-company-motto">nBase 2019</p>

        <p class="footer-links">
        <?= $this->Html->link('nBase', ['controller' => 'Pages', 'action' => '#top']) ?>
        ·
        <?= $this->Html->link('Trading', ['controller' => 'Pages', 'action' => '#trading']) ?>
        ·
        <?= $this->Html->link('Central Bank', ['controller' => 'Pages', 'action' => '#bank']) ?>
        ·
        <?= $this->Html->link('Gameplay', ['controller' => 'Pages', 'action' => '#gameplay']) ?>
        ·
        <?= $this->Html->link('Developer', ['controller' => 'Pages', 'action' => '#developer']) ?>
        ·
        <?= $this->Html->link('ICO', ['controller' => 'Pages', 'action' => '#ico']) ?>
        ·
        <?= $this->Html->link('FAQ', ['controller' => 'Pages', 'action' => '#faq']) ?>
        ·
        <?= $this->Html->link('Sign Up', ['controller' => 'Users', 'action' => 'add']) ?>
        ·
        <?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']) ?>
        </p>

        <p class="footer-company-name">Kareem Belgharbi</p>

    </footer>
</body>
</html>
