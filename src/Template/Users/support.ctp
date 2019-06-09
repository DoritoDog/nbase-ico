<h2 class="text-center my-4 grey">Get in Touch</h2>
<div class="w-100 mx-auto">
    <?= $this->Form->create($msg) ?>
    <div class="form-group mx-auto w-75 login-field">
        <?php
        echo $this->Form->label('email', 'Your Email', ['style' => 'font-weight:bold', 'class' => 'grey']);

        $options = [
            'type' => 'text', 'name' => 'email', 'label' => false, 'autocomplete' => 'off',
            'class' => 'form-control dark-form-input', 'required' => true
        ];
        echo $this->Form->control('email', $options);
        ?>
    </div>

    <div class="form-group mx-auto w-75 login-field">
        <?php
        echo $this->Form->label('subject', 'Subject', ['style' => 'font-weight:bold', 'class' => 'grey']);

        $options = [
            'type' => 'text', 'name' => 'subject', 'label' => false, 'autocomplete' => 'off',
            'class' => 'form-control dark-form-input', 'required' => true
        ];
        echo $this->Form->control('subject', $options);
        ?>
    </div>

    <div class="form-group mx-auto w-75 login-field">
        <?php
        echo $this->Form->label('message', 'Message', ['style' => 'font-weight:bold', 'class' => 'grey']);

        $options = [
            'type' => 'text', 'name' => 'message', 'label' => false, 'autocomplete' => 'off',
            'class' => 'form-control dark-form-input', 'required' => true
        ];
        echo $this->Form->textarea('message', $options);
        ?>
    </div>

    <div class="w-100 centered-content">
      <?= $this->Form->button('Send', ['class' => 'btn btn-light mx-auto']) ?>
    </div>

    <?= $this->Form->end() ?>
</div>