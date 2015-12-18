<?php

  echo '<a href="' .base_url(). '">Home</a>';
  echo '</br>';

  echo form_open('home/login_validation');

	if (validation_errors() != NULL){
      echo validation_errors() ;
   }

	$input_username = array(
		'name' => 'username',
		'placeholder' => "Your username",
		'class' => 'form-control',
		'value' => $this->input->post('username')
		);
	echo form_input($input_username);

	$input_password = array(
		'name' => 'password',
		'placeholder' => "Your password",
		'class' => 'form-control'
		);
	echo form_password($input_password);

  	$submit = array(
  		'name' => 'login_submit',
  		'value' => 'Login'
  		);
  	echo form_submit($submit);
  	echo form_close();


?>
