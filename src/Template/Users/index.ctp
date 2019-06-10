<div class="container mt-5">
  <div class="row">
    <div class="col-lg-8">
      <div class="dashboard-balance border-bottom border-light pb-5">
        <h4 class="gold mb-3">Balance</h4>

        <?= $this->Form->create() ?>
        <div class="form-group w-75">
            <?php
            echo $this->Form->label('eth_address', 'Your Address', ['style' => 'font-weight:bold', 'class' => 'gold']);
            
            $options = [
                'type' => 'text', 'name' => 'eth_address', 'label' => false, 'class' => 'form-control dark-form-input', 'required' => true,
                'placeholder' => '0x0bc9390ce3e6510ae6523e41bfbf290e317d56ec', 'value' => h($user->eth_address)
            ];
            echo $this->Form->control('', $options);
            ?>
            <button type="submit" class="btn btn-light mt-2">Save</button>
        </div>
        <?= $this->Form->end() ?>

        <div class="inline grey">
          <div class="mr-5"><?= $tokenAbbreviation ?> Balance</div>
          <div class="ml-5" id="ncg-balance"></div>
        </div>
        <div class="inline grey">
          <div class="mr-5">ETH Balance</div>
          <div class="ml-5" id="eth-balance"></div>
        </div>
      </div>
      
      <h4 class="gold mt-5">Buy nBase CryptoGold</h4>

        <h5 class="gold mt-4">ICO Address</h5>
        <div class="inline">
          <span class="grey round-bg" id="ico-address"><?= $icoAddress ?></span>
          <span class="ml-2 mt-1 grey font-weight-bold copy-btn" onclick="copy('#ico-address')">Copy</span>
        </div>

        <p class="grey mt-3">To take part in the nBase ICO, please send ETH to this address. Your transaction may take several minutes to be confirmed.</p>
    </div>

    <?php $formatter = new NumberFormatter("en_US", NumberFormatter::GROUPING_USED); ?>
    <div class="col-lg-4">
      <h3 class="gold">ICO Details</h3>
      <ul class="grey ico-details-list">
        <li>Token name - <?= $tokenName ?></li>
        <li>Abbreviation - <?= $tokenAbbreviation ?></li>
        <li><a class="site-link" href="https://etherscan.io/address/<?= $tokenAddress ?>#contracts">Smart Contract</a></li>
        <li>Price - $0.03-0.12</li>
        <li>Start - <?= $icoStart ?></li>
        <li>End - <?= $icoEnd ?></li>
        <li>Accepted currency - Ethereum</li>
        <li>Total supply - <span class="capitalize"><?= $formatter->format($totalSupply) ?></span></li>
        <li>Softcap - $<span class="capitalize"><?= $formatter->format($softCap) ?></span></li>
        <li>Hardcap - $<span class="capitalize"><?= $formatter->format($hardCap) ?></span></li>
        <li>Platform - Ethereum</li>
        <li><br></li>
        <li>KYC - KYC Required</li>
        <li>Restricted Countries - USA, Bosnia and Herzegovina, the Democratic People’s Repulic of Korea, Ethiopia, Iran, Iraq, Sri Lanka, Syria, Trinidad and Tobago, Tunisia, Vanuatu, Yemen, the People’s Republic of China, Singapore and Cuba.</li>
      </ul>
    </div>
  </div>
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

const contractAddress = '0xe056C79647dF965cbECe291998Dd8C238304726b';
const accountAddress = '<?= h($user->eth_address) ?>';
const ncgBalanceUrl = `https://api.etherscan.io/api?module=stats&action=tokensupply&contractaddress=${contractAddress}&apikey=YourApiKeyToken`;
const ethBalanceUrl = `https://api.etherscan.io/api?module=account&action=balance&address=${accountAddress}&tag=latest&apikey=YourApiKeyToken`;

$.post(ncgBalanceUrl, { }, (data, status) => {
  let balance = new BigNumber(data.result).div(decimals);
  $('#ncg-balance').html(balance.toString() + ' NCG');
});
$.post(ethBalanceUrl, { }, (data, status) => {
  let balance = new BigNumber(data.result).div(decimals);
  $('#eth-balance').html(balance.toString() + ' ETH');
});

</script>