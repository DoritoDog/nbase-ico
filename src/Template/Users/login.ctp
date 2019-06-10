<h2 class="text-center my-4 grey">Sign in</h2>
<div class="w-100 mx-auto">
    <?= $this->Form->create() ?>
    <div class="form-group mx-auto w-75 login-field">
        <?php
        echo $this->Form->label('email', 'Email', ['style' => 'font-weight:bold', 'class' => 'white']);

        $options = [
            'type' => 'text', 'name' => 'email', 'label' => false,
            'class' => 'form-control dark-form-input', 'required' => true
        ];
        echo $this->Form->control('', $options);
        ?>
    </div>
    <div class="form-group mx-auto w-75 login-field">
        <?php
        echo $this->Form->label('password', 'Password', ['style' => 'font-weight:bold', 'class' => 'white']);
        
        $options = [
            'type' => 'password', 'name' => 'password', 'label' => false,
            'class' => 'form-control dark-form-input', 'required' => true
        ];
        echo $this->Form->control('', $options);
        ?>
    </div>

    <div class="w-100 centered-content">
      <?= $this->Form->button('Login', ['class' => 'btn btn-light mx-auto']) ?>
    </div>

    <div class="w-100 centered-content mt-4">
      <p class="text-center grey mx-auto">Don't have an account? Create one 
      <?php $options = ['class' => 'site-link']; echo $this->Html->link('here', '/users/add', $options); ?></p>
    </div>

    <div class="w-100 centered-content">
    <?php
        $options = ['controller' => 'Users', 'action' => 'add', 'class' => 'text-center site-link mx-auto'];
        echo $this->Html->link('I forgot my password', '/users/forgotPassword', $options);
    ?>
    </div>

    <?= $this->Form->end() ?>
</div>
