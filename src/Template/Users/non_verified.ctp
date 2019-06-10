<p class="grey text-center mt-5">Please verify your account with the URL sent to your email to proceed.</p>

<?= $this->Form->create(false, ['url' => ['action' => 'resendVerificationCode']]) ?>
<div class="w-50 centered-content mx-auto">
  <?= $this->Form->button('Resend Code', ['class' => 'btn btn-light mx-auto']); ?>
</div>
<?= $this->Form->end() ?>