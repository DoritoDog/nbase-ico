<div class="container mt-3">
  <div class="row pt-5">
    <div class="col-sm-6">
    <h3 class="grey text-center"><span class="fa fa-gear"></span> Account</h3>
      <div class="form-group inline grey">
      <?= $this->Form->create($user, ['action' => 'settings', 'type' => 'post']) ?>

      <div class="form-group">
        <?php
        echo $this->Form->label('first_name', 'First name', ['class' => 'bold']);
        echo $this->Form->control('first_name', ['class' => 'dark-form-input', 'label' => false]);
        ?>
      </div>
      <div class="form-group">
        <?php
        echo $this->Form->label('last_name', 'Last name', ['class' => 'bold']);
        echo $this->Form->control('last_name', ['class' => 'dark-form-input', 'label' => false]);
        ?>
      </div>
      <div class="form-group">
        <?php
        echo $this->Form->label('email', 'Email', ['class' => 'bold']);
        echo $this->Form->control('email', ['class' => 'dark-form-input', 'label' => false]);
        ?>
      </div>
      <div class="form-group">
        <?= $this->Form->label('country_id', 'Country', ['class' => 'bold']); ?>
        <?php
        $options = array();
        foreach ($countries as $country)
            $options[$country->id] = $country->name;
        
        echo $this->Form->select('country_id', $options, ['class' => 'dark-form-input']);
        ?>
      </div>

      <?= $this->Form->button('Save Changes', ['class' => 'btn profile-btn']) ?>
      <?= $this->Form->end()  ?>
      </div>
    </div>
    <div class="col-sm-6">
      <h3 class="grey"><span class="fa fa-vcard"></span> Security</h3>
      <?php
        echo $this->Form->create(false, ['type' => 'get', 'action' => 'forgotPassword']);
        $options = ['class' => 'btn profile-btn mt-2', 'id' => 'reset-button'];
        echo $this->Form->button('Reset Password', $options);
        echo $this->Form->end();
      ?>
    </div>
  </div>
</div>