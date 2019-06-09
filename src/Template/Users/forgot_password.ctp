<div class="w-50 mx-auto mt-5">
  <?php
    echo $this->Form->create(false);

    echo $this->Form->label('email', 'Enter the email address associated with your account', ['class' => 'white']);
    $options = ['class' => 'form-control', 'placeholder' => 'bill@example.com', 'label' => false, 'name' => 'email'];
    echo $this->Form->input('email', $options);

    echo $this->Form->button('Send Reset', ['class' => 'btn btn-light mt-3']);

    echo $this->Form->end();
  ?>
</div>
