<div class="container mt-5">
  <div class="row">
    <div class="col-lg-8">
      <div class="dashboard-balance border-bottom border-light pb-5">
        <h4 class="gold mb-3">Balance</h4>

        <?= $this->Form->create() ?>
        <div class="form-group w-75">
            <?php
            echo $this->Form->label('eth_address', 'Address', ['style' => 'font-weight:bold', 'class' => 'gold']);
            
            $options = [
                'type' => 'text', 'name' => 'eth_address', 'label' => false, 'class' => 'form-control dark-form-input', 'required' => true,
                'placeholder' => '0x0bc9390ce3e6510ae6523e41bfbf290e317d56ec', 'value' => $user->eth_address
            ];
            echo $this->Form->control('', $options);
            ?>
            <button type="submit" class="btn btn-light mt-2">Save</button>
        </div>
        <?= $this->Form->end() ?>

        <div class="inline grey">
          <div class="mr-5">NCG Balance</div>
          <div class="ml-5" id="ncg-balance">128.36</div>
        </div>
        <div class="inline grey">
          <div class="mr-5">ETH Balance</div>
          <div class="ml-5" id="ncg-balance">128.36</div>
        </div>
      </div>

      <h4 class="gold mt-5">Buy nBase CryptoGold</h4>

        <h5 class="gold mt-4">ICO Address</h5>
        <div class="inline">
          <span class="grey round-bg" id="ico-address">0x0bc9390ce3e6510ae6523e41bfbf290e317d56ec</span>
          <span class="ml-2 mt-1 grey font-weight-bold copy-btn" onclick="copy('#ico-address')">Copy</span>
        </div>

        <p class="grey mt-3">To take part in the nBase ICO, please send ETH to this address. Your transaction may take several minutes to be confirmed.</p>
    </div>
    <div class="col-lg-4">
      <h3 class="gold">ICO Details</h3>
      <ul class="grey ico-details-list">
        <li>Token name - nBase CryptoGold</li>
        <li>Abbreviation - NCG</li>
        <li><a class="site-link" href="#">Smart Contract</a></li>
        <li>Price - $0.03-0.12</li>
        <li>Start - June 7, 2019 (9:00AM GMT)</li>
        <li>End - July 7, 2019 (11:00AM GMT)</li>
        <li>Accepted currency - Ethereum</li>
        <li>Total amount of tokens - 500 million</li>
        <li>Softcap - $3,000,000</li>
        <li>Hardcap - $5,000,000</li>
        <li>Platform - Ethereum</li>
        <li><br></li>
        <li>KYC - KYC Required</li>
        <li>Restricted Countries - USA, Bosnia and Herzegovina, the Democratic People’s Repulic of Korea, Ethiopia, Iran, Iraq, Sri Lanka, Syria, Trinidad and Tobago, Tunisia, Vanuatu, Yemen, the People’s Republic of China, Singapore and Cuba.</li>
      </ul>
    </div>
  </div>
</div>

<script>

function copy(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
}

const url = 'https://api.tokenbalance.com/balance/0xe056C79647dF965cbECe291998Dd8C238304726b/0x198ef1ec325a96cc354c7266a038be8b5c558f67';
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    console.log(this.responseText);
  }
};
xhttp.open("GET", url, true);
xhttp.send();

</script>