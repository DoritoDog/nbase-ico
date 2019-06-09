<div class="w-50 mx-auto mt-5">
  <p class="grey text-center">Please enter the email address associated with your account. <br>
    An email will be sent to you containing instructions on how to reset your password.</p>
  <?php
    echo $this->Form->create(false);

    echo $this->Form->label('email', 'Email', ['class' => 'grey font-weight-bold']);
    $options = ['class' => 'form-control', 'placeholder' => 'bill@example.com', 'label' => false, 'name' => 'email'];
    echo $this->Form->control('email', $options);

    echo $this->Form->button('Send Reset', ['class' => 'btn btn-light mt-3']);

    echo $this->Form->end();
  ?>
</div>
