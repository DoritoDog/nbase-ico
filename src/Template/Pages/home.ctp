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

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>nBase | a Strategy Game With an Advanced Virtual Economy</title>
  <meta name="description" content="nBase is a match-based RTS game with an advanced economy built for making profit through crypto trading and investing. It is available on Google Play and involves real-time, multiplayer matches between friends with fast paced gameplay (60 seconds is the max to build anything) and unique units. The graphics were designed with replicas of well-known vehicles such as the Nimitz class aircraft carrier and F-22 Raptor. The gameplay is inspired by games such as StarCraft and I believe that this style is lacking in the app stores.">
  <meta name="keywords" content="nBase, nBase ICO, nbase, nbase ico, rts, virtual economy, mobile virtual economy, android rts">

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
        <li class="navbar-link"><?= $this->Html->link('nBase', ['controller' => 'Pages', 'action' => 'display']) ?></li>
        <li class="navbar-link"><?= $this->Html->link('Contact', ['controller' => 'Users', 'action' => 'support']) ?></li>
        <li class="navbar-link"><?= $this->Html->link('Central Bank', ['controller' => 'Pages', 'action' => '#bank']) ?></li>
        <li class="navbar-link"><?= $this->Html->link('Gameplay', ['controller' => 'Pages', 'action' => '#gameplay']) ?></li>
        <li class="navbar-link"><?= $this->Html->link('Developer', ['controller' => 'Pages', 'action' => '#developer']) ?></li>
        <li class="navbar-link"><?= $this->Html->link('ICO', ['controller' => 'Pages', 'action' => '#ico']) ?></li>
        <li class="navbar-link"><?= $this->Html->link('FAQ', ['controller' => 'Pages', 'action' => '#faq']) ?></li>
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

      <div class="w-100 centered-content mb-5">
        <?= $this->Html->link('Join the ICO', ['controller' => 'Users', 'action' => 'add'], ['class' => 'cta mx-auto']) ?>
      </div>

      <div id="ico-countdown" class="animated fadeInDown">

      </div>
    </div>
  </header>

  <section id="economy" style="height: 100vh;" class="w-100 centered-x">
    <h2 class="text-center pt-5 large-title grey animated" id="trading-1">You know how exciting it is to make profit from trading</h2>
    <h2 class="text-center dark-grey ubuntu animated" id="trading-2">How about if someone made a game out of that?</h2>
    <p class="w-50 mx-auto mt-5 grey animated" id="trading-3">nBase is a real-time strategy game available on Android with a virtual economy that contains the same market dynamics that real traders are used to. Players can invest in items, speculate on prices, negotiate deals, and more. Here it's not just about winning matches, it's also about making profit and increasing the real value of your inventory similar to trading on Steam.</p>

    <iframe class="mx-auto animated trading-video" width="50%" height="50%" allowfullscreen="allowfullscreen" src="https://www.youtube.com/embed/Ife-OhUrN9Q">
    </iframe>
    <a class="site-link mx-auto mt-5" href="https://play.google.com/store/apps/details?id=com.warbase.android&hl=en_US">Check it out on Google Play</a>
  </section>

  <section id="sales" class="clouds-bg py-5">
    <div id="images-path" class="hidden"><?= 'https://' . env('SERVER_NAME') . '/img/items/' ?></div>
      <h2 class="text-center large-title grey pb-5">Latest Sales</h2>

      <div class="sales inline w-75 mx-auto" id="sales-parent">

      </div>
  </section>

  <section id="gameplay">
    <video autoplay loop muted src="img/Gameplay.mp4">
    </video>

    <div class="video-overlay text-center white pt-5">
      <h2 class="text-center large-title animated">But in order to have a powerful economy, the actual gameplay has to be fun</h2>
      <p class="text-center mt-3 w-50-resp mx-auto animated">If nBase was only about trading then players would get bored as they would have little use for the items that they are acquiring. nBase is a fully-featured strategy game based on classic titles such as StarCraft. It multiplayer matches between friends with fast paced gameplay (60 seconds is the max to build anything) and unique units. The graphics were designed with replicas of well-known vehicles such as the Nimitz class aircraft carrier and F-22 Raptor.</p>
    </div>
  </section>

  <section class="pb-5" id="rts">
    <h2 class="text-center large-title grey animated">Anyone remember the <span class="gold">golden</span> age of strategy games? Well, NBASE does...</h2>
    <h5 class="text-center dark-grey mt-3 animated">I'm talking about the classic titles, where you had to actually have a <i>strategy</i> to play. And I can't seem to find that on mobile today...</h5>

    <div class="container">
      <div class="row">
        <div class="col-lg-4 centered-content">
            <?= $this->Html->image('StarCraftLogo.png', ['alt' => 'StarCraft', 'width' => 300, 'class' => 'mx-auto animated']) ?>
        </div>
        <div class="col-lg-4 centered-content">
            <?= $this->Html->image('Age_of_Empires_II.png', ['alt' => 'Age of Empires', 'width' => 300, 'class' => 'mx-auto animated']) ?>
        </div>
        <div class="col-lg-4 centered-content">
            <?= $this->Html->image('CommandAndConquerLogo.png', ['alt' => 'Command and Conquer', 'width' => 300, 'class' => 'mx-auto animated']) ?>
        </div>
      </div>
    </div>

    <p class="grey w-75 mx-auto mt-5 text-center animated">"The current state of mobile gaming is such that most RTS games are exact copies of each other, just in a different theme. A common business model is making players have to wait hours or even days for buildings to be completed/upgraded unless they pay a fee. I bult nBase with <u>fast-paced and dynamic gameplay</u> where buildings are constructed during matches."</p>
  </section>

  <?php $formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT); ?>
  <section id="ico">
    <div class="container grey">
      <div class="row" id="ico-details-row">
        <div class="col-lg-6 centered-content">
          <div class="animated" id="ico-details">
            <h2 class="ml-4">Initial Coin Offering</h2>
            <ul>
                <li>Token name - <?= $tokenName ?></li>
                <li><a class="site-link" href="https://etherscan.io/address/<?= $tokenAddress ?>#contracts">Contract</a></li>
                <li>Start - <?= $icoStart ?></li>
                <li>End - <?= $icoEnd ?></li>
                <li>Accepted currency - Ethereum</li>
                <li class="capitalize">Total supply - <?= $formatter->format($totalSupply) ?></li>
                <li class="capitalize">Softcap - <?= $formatter->format($softCap) ?></li>
                <li class="capitalize">Hardcap - <?= $formatter->format($hardCap) ?></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 inline centered-content animated" id="ico-stats">
          <img src="img/side-stats.png" alt="ICO Icons">
          <div id="side-stats-text" class="ml-3">
            <h4 class="text-center py-5">ICO Participants <br> <small><?= $icoParticipants ?></small></h4>
            <h4 class="text-center py-5">Market Price <br> <small>0.00 USD</small></h4>
            <h4 class="text-center py-5">Whitepaper <br> <small><a class="site-link" href="Whitepaper.pdf">PDF</a></small></h4>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="developer">
    <div class="text-center">
      <h2 class="animated grey">About the Developer</h2>
      <h2 class="animated grey gold"><small>Kareem Belgharbi</a></small></h2>

      <h5 class="mt-5 email animated grey"><span class="fa fa-envelope"></span> admin@nbasemobile.io</h5>
  </section>

  <section class="clouds-bg grey py-5" id="faq">
    <h2 class="text-center large-title grey mb-5 animated">Frequently Asked Questions</h2>

    <div class="container">
      <div class="row animated" id="faq-1">
        <div class="col-lg-6">
          <h3>Is nBase a crypto exchange?</h3>
          <p>No, it is a game where you can also trade items for cryptocurrencies. It is in the RTS (real-time strategy) genre and currently has uses a crypto token (NCG) as it's currency for trading items.</p>
        </div>
        <div class="col-lg-6">
          <h3>What is CryptoGold?</h3>
          <p>nBase CryptoGold (NCG) is the currency that players use to trade in the game. It is not to be confused with gold, which is another currency in nBase that is only used to buy items from the store and is awarded after every match.</p>
        </div>
      </div>
      <div class="row animated" id="faq-2">
        <div class="col-lg-6">
          <h3>Does it already work? Can I try it?</h3>
          <p>Feel free! The game is available <a class="site-link" href="https://play.google.com/store/apps/details?id=com.warbase.android&hl=en_US.">here</a> on Google Play. There are still improvements that I would like to make, especially based on community feedback. The main areas I would like to improve are the graphics, adding more units, more item effects/variations, and security updates.</p>
        </div>
        <div class="col-lg-6">
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

<?= $this->Html->script('bignumber.js') ?>
<script>

var animateHTML = function() {
  var elems;
  var windowHeight;
  var revealedElements = [];
  var offset = 5000;
  function init() {
    elems = document.getElementsByClassName('animated');
    windowHeight = window.innerHeight;
    addEventHandlers();
    checkPosition();
  }
  function addEventHandlers() {
    window.addEventListener('scroll', checkPosition);
    window.addEventListener('resize', init);
  }
  function checkPosition() {
    for (var i = 0; i < elems.length; i++) {
      var positionFromTop = elems[i].getBoundingClientRect().top;
      if (positionFromTop - windowHeight <= 0 && !revealedElements.includes(elems[i])) {
        elems[i].classList.add('fadeInDown');
        revealedElements.push(elems[i]);
      }
    }
  }
  return {
    init: init
  };
}

animateHTML().init();

const decimals = new BigNumber('1000000000000000000');
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
  let sales = JSON.parse(this.responseText);
  sales.forEach(soldItem => {
    console.log(soldItem);
    let parent = document.createElement('div');
    parent.classList.add('sold-item');

    let img = document.createElement('img');
    img.src = $('#images-path').text() + soldItem.item_identifier + '.png';
    img.height = 200;
    parent.appendChild(img);

    var options = {
      timeZone: 'Europe/Bratislava',
      hour: 'numeric', minute: 'numeric',
    };
    var formatter = new Intl.DateTimeFormat([], options);

    let p = document.createElement('p');
    p.innerHTML = '<b>' + soldItem.item_identifier.replace(/_/g,' ') + '</b>  <br>';
    p.innerHTML += `<small><b>Sold to</b> ${soldItem.address.substr(0, 20)}...</small> <br>`;

    let date = new Date(soldItem.updatedAt);
    p.innerHTML += '@' + formatter.format(date) + '<br>';

    var price = new BigNumber(soldItem.price).div(decimals);
    p.innerHTML += 'For <span class="gold">' + `<b>${price.toString().substr(0, 5)}</b>` + ' CryptoGold</span>';
    p.classList.add('text-center');
    p.classList.add('grey');
    p.classList.add('capitalize');
    parent.appendChild(p);

    document.getElementById('sales-parent').appendChild(parent);
  });
}
};
xhttp.open("POST", "https://api.nbase.belgharbi.com/lastSolds", true);
xhttp.send();
</script>

<style>

html, body {
  background: #000 !important;
  max-width: 100%;
  overflow-x: hidden;
}

</style>
