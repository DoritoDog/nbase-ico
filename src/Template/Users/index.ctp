<?php $formatter = new NumberFormatter("en_US", NumberFormatter::SPELLOUT); ?>
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-dark">
      <li class="breadcrumb-item"><?= $this->Html->link('Main', ['controller' => 'Pages'], ['class' => 'site-link']) ?></li>
      <li class="breadcrumb-item active white"><?= $this->Html->link($user->first_name, ['controller' => 'Users', 'action' => 'index'], ['class' => 'site-link']) ?></li>
    </ol>
  </nav>

  <h3 class="white mt-5 pb-2">Wallets</h3>
  <div class="inline justify-left">
    <div class="wallet bg-ncg px-3 mr-3">
     <div class="inline pt-4 justify-left">
      <?= $this->Html->image('ncg-icon.png', ['width' => 50, 'height' => 50, 'class' => 'mr-3']) ?>
      <div class="inline">
        <div class="float-left mr-5">
          <span class="font-weight-300">nBase CryptoGold</span>
          <br>
          <span>NCG</span>
        </div>
        <div class="float-right">
          <span class="font-weight-300" id="ncg-balance"></span>
          <br>
          <span>0 USD</span>
        </div>
      </div>
     </div>

      <p style="font-size: 12px" class="mt-4 ml-2">
        <span>1 NCG - 0.000 USD</span> &nbsp; |
        <span class="ml-2">MAX SUPPLY - <?= $totalSupply ?></span>
      </p>
    </div>

    <div class="wallet bg-eth px-3 mr-3">
     <div class="inline pt-4 justify-left">
      <?= $this->Html->image('eth-icon.png', ['width' => 50, 'height' => 50, 'class' => 'mr-3']) ?>
      <div class="inline">
        <div class="float-left mr-5">
          <span class="font-weight-300">Ethereum</span>
          <br>
          <span>ETH</span>
        </div>
        <div class="float-right">
          <span class="font-weight-300" id="eth-balance"></span>
          <br>
          <span id="eth-balance-in-usd"></span>
        </div>
      </div>
     </div>

      <p style="font-size: 12px" class="mt-4">1 ETH - <span id="eth-to-dollar"></span></p>
    </div>
  </div>

  <?= $this->Form->create() ?>
  <?php $this->Form->setTemplates(['inputContainer' => '{{content}}']); ?>
  <label class="gold mt-3 bold" for="eth_address">EDIT YOUR ADDRESS</label><br>
  <div class="input-group">
    <?= $this->Form->control('eth_address', ['class' => 'form-control dark-form-input', 'value' => h($user->eth_address), 'label' => false, 'spellcheck' => false]) ?>
    <div class="input-group-append">
      <?= $this->Form->submit('Save', ['class' => 'btn btn-success']) ?>
    </div>
  </div>
  <?= $this->Form->end() ?>

  <div class="mt-3 pt-3">
    <h4 class="white">Buy Tokens</h4>

    <p class="grey">To take part in the NBASE ICO and receive NCG tokens, please send a minimum of 0.2 ETH to the contract at the following address. Your transaction may take several minutes to be confirmed on the blockchain.</p>

    <label class="gold bold">ICO ADDRESS</label>
    <div class="input-group">
      <span class="form-control dark-form-input" id="ico-address"><?= $icoAddress ?></span>
      <div class="input-group-append">
      <span class="ml-2 mt-1 grey font-weight-bold copy-btn gold" onclick="copy('#ico-address')">Copy</span>
      </div>
    </div>
  </div>

  <label for="rate" class="bold gold mt-2 uppercase">Contract Exchange Rate</label>
  <p class="grey" name="rate" style="font-size: 14px;">
    1 ETH DEPOSIT = <span class="capitalize"><?= $formatter->format($ethToNcgContractRate) ?></span> NCG RECEIVED
  </p>

</div>

<?= $this->Html->script('bignumber.js') ?>
<script>

function copy(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
}

const decimals = new BigNumber('1000000000000000000');
var ethBalance = 0;

const contractAddress = '0xe056C79647dF965cbECe291998Dd8C238304726b';
const accountAddress = '<?= h($user->eth_address) ?>';
const ncgBalanceUrl = `https://api.etherscan.io/api?module=stats&action=tokensupply&contractaddress=${contractAddress}&apikey=YourApiKeyToken`;
const ethBalanceUrl = `https://api.etherscan.io/api?module=account&action=balance&address=${accountAddress}&tag=latest&apikey=YourApiKeyToken`;

$.post(ncgBalanceUrl, { }, (data, status) => {
  let balance = new BigNumber(data.result).div(decimals);
  $('#ncg-balance').html(balance.toString() + ' NCG');
});
$.post(ethBalanceUrl, { }, (data, status) => {
  ethBalance = new BigNumber(data.result).div(decimals);
  $('#eth-balance').html(ethBalance.toString() + ' ETH');
});

$.get('https://api.coinbase.com/v2/exchange-rates?currency=ETH', {}, (data, status) => {
  let ethToDollarRate = data.data.rates['USD'];
  $('#eth-to-dollar').html(ethToDollarRate + ' USD');
  $('#eth-balance-in-usd').html((ethBalance * ethToDollarRate) + ' USD');;
});

</script>