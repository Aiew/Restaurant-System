<?php
/*
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

*/
?>


<!-- SUB BANNER -->
    <section class="sub-banner text-center section">
        <div class="awe-parallax bg-4"></div>
        <div class="awe-title awe-title-3">
            <h3 class="lg text-uppercase">Login</h3>
        </div>
    </section>
    <!-- END / SUB BANNER -->

    <!-- RESERVATION -->
    <section class="reservation section pd">
        <div class="divider divider-2"></div>
        <div class="reservation-content">
        <?php
              echo form_open('/home/login_validation');
              ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <table class="form-table">
                            <tbody>
                              <?php
                                  if (validation_errors() != NULL){
                                    echo '<div class="awe-error">';
                                    echo '<p>'.validation_errors().'</p>';
                                    echo '</div>';
                                }
                                ?>
                                <tr class="t-name">
                                    <td>
                                        <label for="name">ID</label>
                                        <div class="form-item">
                                            <?php
                                            $input_username = array(
                                                'name' => 'username',
                                                'placeholder' => "Your username",
                                                'class' => 'form-control',
                                                'value' => $this->input->post('username')
                                                );
                                            echo form_input($input_username);
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="t-telephone">
                                    <td>
                                        <label for="telephone">Password</label>
                                        <div class="form-item">
                                            <?php
                                            $input_password = array(
                                                'name' => 'password',
                                                'placeholder' => "Your password",
                                                'class' => 'form-control'
                                                );
                                            echo form_password($input_password);
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-footer text-center">
                    <div class="form-item">
                        <?php
                        $submit = array(
                            'name' => 'login_submit',
                            'value' => 'Login',
                            'class' => 'awe-btn awe-btn-2 awe-btn-default text-uppercase'
                            );
                        echo form_submit($submit);
                        echo form_close();
                        ?>
                    </div>

                    <div class="form-item">
                        <a href="register"><input type="button"value="Register" class="awe-btn awe-btn-2 awe-btn-default text-uppercase"></input></a>
                    </div>

                </div>
        </div>
    </section>
