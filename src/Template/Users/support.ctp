<h2 class="text-center my-4 grey">Get in Touch</h2>
<div class="w-100 mx-auto">
    <?= $this->Form->create($msg) ?>
    <div class="form-group mx-auto w-50 login-field">
        <?php
        echo $this->Form->label('email', 'Your Email', ['class' => 'grey bold']);

        $options = [
            'type' => 'text', 'name' => 'email', 'label' => false, 'autocomplete' => 'off',
            'class' => 'dark-form-input', 'required' => true, 'placeholder' => 'user@example.com'
        ];
        echo $this->Form->control('email', $options);
        ?>
    </div>

    <div class="form-group mx-auto w-50 login-field">
        <?php
        echo $this->Form->label('subject', 'Subject', ['class' => 'grey bold']);

        $options = [
            'type' => 'text', 'name' => 'subject', 'label' => false, 'autocomplete' => 'off',
            'class' => 'dark-form-input', 'required' => true
        ];
        echo $this->Form->control('subject', $options);
        ?>
    </div>

    <div class="form-group mx-auto w-50">
        <?php
        echo $this->Form->label('message', 'Message', ['class' => 'grey bold']);

        $options = [
            'name' => 'message', 'label' => false, 'autocomplete' => 'off', 'class' => 'form-control', 'required' => true, 'cols' => 4
        ];
        echo $this->Form->textarea('message', $options);
        ?>
    </div>

    <div class="w-100 centered-content">
      <?= $this->Form->button('Send', ['class' => 'btn btn-light mx-auto']) ?>
    </div>

    <?= $this->Form->end() ?>
</div>