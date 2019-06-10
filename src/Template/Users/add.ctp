<?= $this->Html->css('StyleSheet') ?>
<?= $this->Html->script('register.js') ?>

<div>
    <h1 class="text-center grey mt-200">Sign up</h1>
    <p class="text-center w-75 mx-auto grey">In order to participate in the nBase ICO, please fill in the form with accurate details.</p>

    <?= $this->Form->create($user) ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <?php
                    echo $this->Form->label('first_name', 'First name', ['class' => 'bold grey']);

                    $options = [
                        'name' => 'first_name', 'class' => 'form-control dark-form-input', 'label' => false,
                        'required' => true, 'placeholder' => 'Bill'
                    ];
                    echo $this->Form->control('first_name', $options);
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo $this->Form->label('email', 'Email address', ['class' => 'bold grey']);
                    
                    $options = [
                        'name' => 'email', 'class' => 'form-control dark-form-input', 'type' => 'email',
                        'required' => true, 'placeholder' => 'user@example.com',
                        'label' => false
                    ];
                    echo $this->Form->control('email', $options);
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo $this->Form->label('password', 'Password', ['class' => 'bold grey']);
                    
                    $options = [
                        'name' => 'password', 'class' => 'form-control dark-form-input', 'type' => 'password',
                        'required' => true, 'label' => false
                    ];
                    echo $this->Form->control('password', $options);
                    ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <?php
                    echo $this->Form->label('last_name', 'Last name', ['class' => 'bold grey']);

                    $options = [
                        'name' => 'last_name', 'class' => 'form-control dark-form-input', 'label' => false,
                        'required' => true, 'placeholder' => 'Smith'
                    ];
                    echo $this->Form->control('last_name', $options);
                    ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->label('country_id', 'Country', ['class' => 'bold grey']); ?>
                    <?php
                    $options = array();
                    foreach ($countries as $country)
                        $options[$country->id] = $country->name;
                    
                    echo $this->Form->select('country_id', $options, ['class' => 'form-control dark-form-input']);
                    ?>
                </div>
            </div>
        </div>

        <div class="form-check">
            <label class="form-check-label grey">
                <input class="form-check-input" type="checkbox" onchange="toggleSubmit()">
                I agree with the <a class="site-link" href="<?= $termsUrl ?>">Terms and Conditions.</a>
            </label>
        </div>
        <?php
        $options = [
            'id' => 'reg-submit', 'style' => 'margin-top: 20px', 'class' => 'btn btn-dark',
            'disabled' => true
        ];
        echo $this->Form->button('Submit', $options);
        ?>
    </div>

    <?= $this->Form->end() ?>
</div>