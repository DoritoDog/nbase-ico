<div class="container">
  <div class="inline">
    <h1>Welcome <?= $firstName ?></h1>
    <?=
    $this->Html->image(
      'https://nbasemobile.io/webroot/img/Banner.png', 
      ['height' => 50, 'title' => 'Logo', 'alt' => 'h']
      ) ?>
  </div>

  <p>Thank you for becoming a member of the nBase ICO!</p>
  <a href="https://play.google.com/store/apps/details?id=com.warbase.android&hl=en_US">View nBase on Google Play</a>
  <p>nBase is a match-based RTS game with an advanced economy built for making profit through crypto trading and investing. It involves real-time, multiplayer matches between friends with fast paced gameplay (60 seconds is the max to build anything). The virtual economy was designed to empower players to trade with each other and increase the value of their inventories using advanced tools.</p>

  <p style="margin-top: 50px">You can view your CryptoGold balance in your account's dashboard: <?= $dashboardUrl ?></p>

  <p style="margin-top: 50px">
    Best regards, <br>
    nBase
  </p>
</div>