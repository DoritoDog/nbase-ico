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
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$title = 'nBase | a Strategy Game With a Profitable Virtual Economy';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $title ?></title>

  <link rel="stylesheet" href="css/style.css">

  <link rel="icon" href="img/Icon.png">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap-grid.css">
  <link rel="stylesheet" href="css/bootstrap-reboot.css">
  <link rel="stylesheet" href="css/bootstrap.css">

  <!-- Animate.css -->
  <link rel="stylesheet" href="css/animate.css">

  <script src="js/Counter.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/particles.js"></script>
  <script src="js/JavaScript.js"></script>
  <script src="js/jquery.js"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
</head>
<body>
  <header id="top">
    <div class="navigation-bar animated fadeInUp">
      <ul>
        <li><button class="navbar-toggle" onclick="toggleNavbar();"><span class="fa fa-navicon"></span></button></li>
        <li class="navbar-link"><a href="index.html#top">nBase</a></li>
        <li class="navbar-link"><a href="index.html#trading">Trading</a></li>
        <li class="navbar-link"><a href="index.html#bank">Central Bank</a></li>
        <li class="navbar-link"><a href="index.html#gameplay">Gameplay</a></li>
        <li class="navbar-link"><a href="index.html#developer">Developer</a></li>
        <li class="navbar-link"><a href="index.html#ico">ICO</a></li>
        <li class="navbar-link"><a href="index.html#faq">FAQ</a></li>
        <li><?php
            $url = ['controller' => 'Users', 'action' => 'add'];
            echo $this->Html->link('Sign up', $url, ['class' => 'navbar-link navbar-cta']);
        ?></li>
        <li><?php
            $url = ['controller' => 'Users', 'action' => 'login'];
            echo $this->Html->link('Login', $url, ['class' => 'navbar-link navbar-cta']);
        ?></li>
      </ul>
    </div>
    
    <div class="header-content">
      <div class="header-text">
        <h3 class="ml-5 text-center animated fadeInDown">nBase <br> <small>A real-time strategy game with the most advanced virtual economy in mobile gaming</small></h3>
      </div>
  
      <div id="ico-countdown" class="animated fadeInDown">
        
      </div>
    </div>
  </header>

  <section id="economy" style="height: 100vh;">
    <h2 class="text-center pt-5 large-title grey animated" id="trading-1">You know how exciting it is to make profit from trading</h2>
    <h3 class="text-center dark-grey ubuntu animated" id="trading-2">Guess where that would be an amazing new concept...</h3>
    <p class="w-50 mx-auto mt-5 dark-grey animated" id="trading-3">nBase is an <b>Android-based</b> real-time strategy game with a virtual economy that has been designed to empower players to trade and make profit. Players will not only feel a sense of reward through victories from playing the game, but also from smart trading and making money. The gameplay is inspired by games such as StarCraft and I believe that this style is lacking in the app stores.</p>

    <div class="w-100 h-100 centered-x">
      <iframe class="trading-video mx-auto animated" width="50%" height="50%" allowfullscreen="allowfullscreen" src="https://www.youtube.com/embed/Ife-OhUrN9Q">
      </iframe>
    </div>

    <!-- <div class="w-100">
      <img class="mx-auto" src="img/Available-on-Google-Play.png" height="50" alt="Available on Google Play" onclick="location.href = 'https://play.google.com/store/apps/details?id=com.warbase.android&hl=en_US'">
    </div> -->
  </section>

  <section id="sales" style="display: none;">
    <h2 class="text-center large-title grey pb-5">Latest Sales</h2>

    <div class="sales inline w-75 mx-auto" id="sales-parent">

    </div>
  </section>

  <section id="bank">
    <h2 class="text-center large-title grey mb-2 animated">What drives the economy?</h2>
    
    <p class="mx-auto grey py-3 text-center bank-desc animated">For a new trader that is just getting started, it can be difficult to make profit without any initial capital. That is why I have added a central bank to nBase that loans CryptoGold to users. This functionality is hardcoded on the smart contract to ensure that the server may only take a loan back after it is due.</p>

    <div class="split">
      <div class="float-left animated">
        <img src="img/loans.png" width="100%" alt="Loans">
      </div>
      
      <div class="bank-info">
        <h2 class="dark-grey ubuntu mt-3 animated">Meet The Central Bank of nBase</h2>
        <ul class="bank-ul">
          <li>
            <div class="tab gold animated" id="tab-1">
              <span class="fa fa-bank"></span> <h4>Interest-free loans</h4>
            </div>
            <div class="tab-description w-50">
              <p><q>The most hated sort, and with the greatest reason, is usury, which makes a gain out of money itself, and not from the natural object of it. For money was intended to be used in exchange, but not to increase at interest.</q> <br> - <b>Aristotle on interest</b></p>
            </div>
          </li>
          <li>
            <div class="tab gold animated" id="tab-2">
              <span class="fa fa-money"></span> <h4>Smart controls prevent inflation</h4>
            </div>
            <div class="tab-description w-50">
              <p>Inflation only happens when money is printed out of thin air. The server simply transfers its NCG from a fixed supply. In addition, loans must be repaid which ensures that NCG retains its value.</p>
            </div>
          </li>
          <li>
            <div class="tab gold animated" id="tab-3">
              <span class="fa fa-users"></span> <h4>Giving users startup capital boosts the economy</h4>
            </div>
            <div class="tab-description w-50">
              <p>The goal of nBase’s central bank was to allow new players to easily begin trading, which boosts the economy. Currently, players can borrow up to 10 CryptoGold for a period of 10 days. With that players may do whatever they want — trade for items, invest, send it, etc.</p>
            </div>
          </li>
        </ul>

        
      </div>
    </div>
  </section>

  <section class="py-5" id="gameplay">
    <h2 class="text-center large-title grey animated">Anyone remember the <span class="gold">golden</span> age of strategy games?</h2>
    <h5 class="text-center dark-grey mt-3 animated">I'm talking about the classic titles, where you had to actually use your brain to play. And I can't seem to find that on mobile today...</h5>

    <div class="container">
      <div class="row">
        <div class="col-lg-4 centered-content">
            <?= $this->Html->image('StarCraftLogo.png', ['alt' => 'StarCraft', 'width' => 300, 'class' => 'mx-auto animated']) ?>
        </div>
        <div class="col-lg-4 centered-content">
            <?= $this->Html->image('Age_of_Empires_II.png', ['alt' => 'StarCraft', 'width' => 300, 'class' => 'mx-auto animated']) ?>
        </div>
        <div class="col-lg-4 centered-content">
            <?= $this->Html->image('CommandAndConquerLogo.png', ['alt' => 'StarCraft', 'width' => 300, 'class' => 'mx-auto animated']) ?>
        </div>
      </div>
    </div>

    <p class="grey w-75 mx-auto mt-5 text-center animated">"The current state of mobile gaming is such that most RTS games are exact copies of each other, just in a different theme. Their business model is based on making players wait hours or even days for buildings to be completed/upgraded unless they pay a fee to have it done instantly. <u>I built nBase with fast-paced and dynamic gameplay where buildings are constructed during matches.</u>"</p>
  </section>

  <section id="ico">
    <div class="container grey">
      <div class="row" id="ico-details-row">
        <div class="col-lg-6 centered-content">
          <div class="animated" id="ico-details">
            <h2 class="ml-4">Initial Coin Offering</h2>
            <ul style="font-size: 20px;">
                <li>Token name - nBase CryptoGold (NCG)</li>
                <li><a class="site-link" href="#">Contract</a></li>
                <li>Start - June 7, 2019 (9:00AM GMT)</li>
                <li>End - July 7, 2019 (11:00AM GMT)</li>
                <li>Accepted currency - Ethereum</li>
                <li>Total amount of tokens - 500 million</li>
                <li>Softcap - $3,000,000</li>
                <li>Hardcap - $5,000,000</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 inline centered-content animated" id="ico-stats">
          <img src="img/side-stats.png" alt="ICO Icons">
          <div id="side-stats-text" class="ml-3">
            <h4 class="text-center py-5">ICO Participants <br> <small>0</small></h4>
            <h4 class="text-center py-5">Market Price <br> <small>0.00 BTC</small></h4>
            <h4 class="text-center py-5">Whitepaper <br> <small><a class="site-link" href="Whitepaper.pdf">PDF</a></small></h4>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="developer">
    <div class="dev-info">
      <h2 class="animated">About the Developer</h2>
      <h3 class="animated"><small>Kareem Belgharbi <a class="site-link" href="https://kareem.belgharbi.com/">(kareem.belgharbi.com)</a></small></h3>
      <p class=" dev-desc animated">My name is Kareem, I'm a full-stack web, Ethereum, and mobile game developer. I was born in the United States but I currently live in Slovakia. I developed the game nBase, including the graphics, server-side programming, smart contract, and gameplay. I am currently also working on another project, which is an augumented reality game that is currently in beta. If you have any questions or would like to get in contact with me, please don't hesitate to check me out on social media, email, or any other contact!</p>

      <p class="mt-5 email animated"><span class="fa fa-envelope"></span> kareembelgharbi@gmail.com</p>
  </section>

  <section class="clouds-bg grey py-5" id="faq">
    <h2 class="text-center large-title grey mb-5 animated">Frequently Asked Questions</h2>

    <div class="container">
      <div class="row animated" id="faq-1">
        <div class="col-lg-6">
          <h3>Is nBase a game or crypto exchange?</h3>
          <p>It is a game, where you can also trade items for cryptocurrencies. The game was designed to fun and profitable for the player, with the ability to trade and invest in items for profit.</p>
        </div>
        <div class="col-lg-6">
          <h3>What is CryptoGold?</h3>
          <p>nBase CryptoGold (NCG) is the currency that players use to trade in the game. It is not to be confused with gold, which is another currency in nBase that is only used to buy items from the store and is awarded after every match.</p>
        </div>
      </div>
      <div class="row animated" id="faq-2">
        <div class="col-lg-6">
          <h3>Was this game made by a team?</h3>
          <p>No, it was developed by me without a team apart from user testing. I believe that there is space in the gaming world for one-man projects with a clear vision and working product. However, I am considering creating a team.</p>
        </div>
        <div class="col-lg-6">
          <h3>Does it already work? Can I try it?</h3>
          <p>Yes, the game is working and can be found on <a class="site-link" href="https://play.google.com/store/apps/details?id=com.warbase.android&hl=en_US.">here</a> on Google Play. There are still improvements that I would like to make, especially based on community feedback. The main areas I would like to improve are the graphics, adding more units, more item effects/variations, and security updates.</p>
        </div>
      </div>
      <div class="row mt-5 animated" id="faq-3">
        <div class="col-lg-12">
          <h3>Is it completely decentralized?</h3>
          <p>CryptoGold is a decentralized ERC-20 token on the Ethereum blockchain. However, game items are not decentralized or stored on the blockchain - they are stored in a standard database architecture.  Decentralizing player's inventories and items would be very impractical as it would be slow, require many transactions, and very difficult to update without bringing any real benefit.</p>
        </div>
      </div>
    </div>
  </section>

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

<script>
  
$(window).scroll(function() {

if ($(window).width() <= 549) {

  $('.animated').css('opacity', 1);

  } else if ($(window).width() > 549) {

    if ($(window).scrollTop() > 400) {
      $('#trading-1').addClass('fadeInDown');
      $('#trading-2').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 600) {
      $('#trading-3').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 700) {
      $('#economy iframe').addClass('fadeInDown');
    }

    if ($(window).scrollTop() > 1400) {
      $('#bank > h2').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 1500) {
      $('#bank p').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 1600) {
      $('.bank-info > h2').addClass('fadeInDown');
      $('#bank .float-left').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 1700) {
      $('#tab-1').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 1750) {
      $('#tab-2').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 1800) {
      $('#tab-3').addClass('fadeInDown');
    }

    if ($(window).scrollTop() > 2000) {
      $('#gameplay h2').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 2100) {
      $('#gameplay h5').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 2200) {
      $('#gameplay img').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 2300) {
      $('#gameplay p').addClass('fadeInDown');
    }

    if ($(window).scrollTop() > 2600) {
      $('#ico-details').addClass('fadeInDown');
      $('#ico-stats').addClass('fadeInDown');
    }

    if ($(window).scrollTop() > 3000) {
      $('#developer h2').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 3100) {
      $('#developer h3').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 3200) {
      $('.dev-desc').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 3300) {
      $('#developer .email').addClass('fadeInDown');
    }

    if ($(window).scrollTop() > 4200) {
      $('#faq h2').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 4000) {
      $('#faq-1').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 4200) {
      $('#faq-2').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 4400) {
      $('#faq-3').addClass('fadeInDown');
    }

  }
});

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
  let sales = JSON.parse(this.responseText);
  sales.forEach(soldItem => {
    console.log(soldItem);
    let parent = document.createElement('div');
    parent.classList.add('sold-item');

    let img = document.createElement('img');
    //img.src = "?= $images ?>" + soldItem.item_identifier + '.png';
    img.height = 200;
    parent.appendChild(img);

    let h4 = document.createElement('h4');
    h4.innerHTML = soldItem.item_identifier + ' <br> ' + `<small>${soldItem.address.substr(0, 12)}...</small>`;
    h4.classList.add('text-center');
    parent.appendChild(h4);

    document.getElementById('sales-parent').appendChild(parent);
  });
}
};
xhttp.open("POST", "https://api.nbase.belgharbi.com/lastSolds", true);
xhttp.send();
</script>