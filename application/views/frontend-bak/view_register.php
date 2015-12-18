<?php
  echo '<a href="' .base_url(). '">Home</a>';
  echo '</br>';
  echo form_open('home/register_validation');

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
  echo '</br></br>';

  $input_password = array(
		'name' => 'password',
		'placeholder' => "Your password",
		'class' => 'form-control'
		);
	echo form_password($input_password);
    echo '</br></br>';

  $input_repassword = array(
		'name' => 'repassword',
		'placeholder' => "Confirm password",
		'class' => 'form-control'
		);
	echo form_password($input_repassword);
  echo '</br></br>';

  $input_name = array(
		'name' => 'name',
		'placeholder' => "Your name sir",
		'class' => 'form-control',
    'value' => $this->input->post('name')
		);
	echo form_input($input_name);
  echo '</br></br>';

  $input_email = array(
		'name' => 'email',
		'placeholder' => "Your email",
		'class' => 'form-control',
    'value' => $this->input->post('email')
		);
	echo form_input($input_email);
  echo '</br></br>';

  $input_address = array(
		'name' => 'address',
		'placeholder' => "Your Address",
		'class' => 'form-control',
    'value' => $this->input->post('address')
		);
	echo form_textarea($input_address);
  echo '</br></br>';

	$submit = array(
		'name' => 'login_submit',
		'value' => 'Register'
		);
	echo form_submit($submit);
	echo form_close();


?>
