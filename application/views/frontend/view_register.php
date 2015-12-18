
    <!-- END / HEADER -->

    <!-- SUB BANNER -->
    <section class="sub-banner text-center section">
        <div class="awe-parallax bg-4"></div>
        <div class="awe-title awe-title-3">
            <h3 class="lg text-uppercase">Register</h3>
        </div>
    </section>
    <!-- END / SUB BANNER -->

    <!-- RESERVATION -->
    <section class="reservation section pd">
        <div class="divider divider-2"></div>
        <div class="reservation-content">
            <?php echo form_open('home/register_validation'); ?>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
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
                                        <label for="name">Username</label>
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
                                <tr class="t-telephone">
                                    <td>
                                        <label for="telephone">Confirm Password</label>
                                        <div class="form-item">
                                            <?php
                                            $input_repassword = array(
        									'name' => 'repassword',
        									'placeholder' => "Confirm password",
        									'class' => 'form-control'
        									);
    									echo form_password($input_repassword);
    									?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="t-telephone">
                                    <td>
                                        <label for="telephone">Name</label>
                                        <div class="form-item">
                                            <?php
                                            $input_name = array(
        									'name' => 'name',
        									'placeholder' => "Your name",
        									'class' => 'form-control',
    										'value' => $this->input->post('name')
        									);
    									echo form_input($input_name);
    									?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="t-telephone">
                                    <td>
                                        <label for="telephone">E-mail</label>
                                        <div class="form-item">
                                            <?php
                                            $input_email = array(
                                                  'name' => 'email',
                                                  'placeholder' => "Your email",
                                                  'class' => 'form-control',
                                              'value' => $this->input->post('email')
                                                  );
                                              echo form_input($input_email);
                                              ?>
                                        </div>
                                        <tr class="t-telephone">
                                            <td>
                                                <label for="telephone">Address</label>
                                                <div class="form-item">
                                                    <?php
                                                    $input_address = array(
                                                          'name' => 'address',
                                                          'placeholder' => "Your address",
                                                          'class' => 'form-control',
                                                      'value' => $this->input->post('address')
                                                          );
                                                      echo form_input($input_address);
                                                      ?>
                                                </div>
                                    </td>
                                </tr>
                                <tr class="t-telephone">
                                    <td>
                                        <label for="telephone">Phone Number</label>
                                        <div class="form-item">
                                            <?php
                                            $input_phone = array(
                                                  'name' => 'phone',
                                                  'placeholder' => "Your number",
                                                  'class' => 'form-control',
                                                  'value' => $this->input->post('phone')
                                                  );
                                              echo form_input($input_phone);
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
                            'value' => 'Submit',
                            'class' => 'awe-btn awe-btn-2 awe-btn-default text-uppercase'
                            );
                        echo form_submit($submit);

                    ?>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
    </section>
    <!-- END / RESERVATION -->
