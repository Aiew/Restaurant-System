
<!-- SUB BANNER -->
<section class="sub-banner text-center section">
    <div class="awe-parallax bg-4"></div>
    <div class="awe-title awe-title-3">
        <h3 class="lg text-uppercase">Member Page</h3>
    </div>
</section>
<!-- END / SUB BANNER -->



<!-- SHOP PAGE -->
<section id="shop-page" class="shop-page section">
    <div class="container">
        <div class="row">
            <div class="checkout">
                <!-- YOUR ORDER -->
                <?php echo form_open('members/reserve_validation'); ?>
                <div class="col-md-3">
                    <div class="your-order">
                        <h4 class="xmd text-capitalize">Reserve</h4>

                        <table class="form-table table-first">
                          <?php

                            if ($reserve_success){
                              echo '<div class="awe-info">';
                              echo '<p>Reserve successful.</p>';
                              echo '</div>';
                            }

                          if (form_error('input_date') != NULL || form_error('input_time') != NULL || form_error('input_pers') != NULL || form_error('input_seat_no') != NULL){
                            echo '<div class="awe-error">';
                            echo '<p>'.form_error('input_date').'</p>';
                            echo '<p>'.form_error('input_time').'</p>';
                            echo '<p>'.form_error('input_pers').'</p>';
                            echo '<p>'.form_error('input_seat_no').'</p>';
                            echo '</div>';
                          }
                          ?>
                        <tbody>
                            <tr class="t-date">
                                <td colspan="2">
                                    <label for="date">Date</label>
                                    <div class="form-item">
                                        <!--input type="text" id="date" placeholder="dd/mm/yyyy"-->
                                        <input type="date" id="date" placeholder="dd/mm/yyyy" name="input_date" value="<?php echo $this->input->post('input_date') ?>">
                                        <i class="icon awe_calendar"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr class="t-time-pers">
                                <td class="t-time">
                                    <label for="time">Time</label>
                                    <div class="form-item">
                                        <!--input type="text" id="time" placeholder="-- : --"-->
                                        <input type="time" id="date" placeholder="-- : --" name="input_time" value="<?php echo $this->input->post('input_time') ?>">
                                        <i class="icon awe_clock_2"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="t-pers">
                                    <label for="pers">Pers</label>
                                    <div class="form-item">
                                        <input type="text" id="pers" name="input_pers" value="<?php echo $this->input->post('input_pers') ?>">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="t-pers">
                                    <label for="pers">Seat No</label>
                                    <div class="form-item">
                                        <input type="text" id="seat_no" name="input_seat_no" value="<?php echo $this->input->post('input_seat_no') ?>">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="submit" value="GET" class="awe-btn awe-btn-3 awe-btn-default text-uppercase">

                    </div>

                </div>
                <?php echo form_close(); ?>
                <!-- END / YOUR ORDER -->


                <!-- CHECKOUT CONTENT -->
                <?php echo form_open('members/update_validation'); ?>
                <div class="col-md-8">
                    <div class="checkout-content">

                        <h4 class="xmd text-capitalize">ข้อมูลของคุณ, <?php echo $this->session->userdata('username');?></h4>
                        <h5>คะแนนสะสม <?php echo $point; ?> แต้ม</h5>


                        <div class="row">
                          <?php

                            if ($update_success){
                              echo '<div class="awe-info">';
                              echo '<p>Update successful.</p>';
                              echo '</div>';
                            }

                          if (form_error('input_name') != NULL || form_error('input_email') != NULL || form_error('input_telephone') != NULL || form_error('input_address') != NULL){
                            echo '<div class="awe-error">';
                            echo '<p>'.form_error('input_name').'</p>';
                            echo '<p>'.form_error('input_email').'</p>';
                            echo '<p>'.form_error('input_address').'</p>';
                            echo '<p>'.form_error('input_telephone').'</p>';
                            echo '</div>';
                          }
                          ?>
                            <div class="col-md-6">
                                <label for="billing_first_name">
                                    Name <abbr class="required"></abbr>
                                </label>
                                <input type="text" id="billing_first_name" name="input_name" value="<?php echo $input_name; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="billing_email">
                                    Email Address <abbr class="required"></abbr>
                                </label>
                                <input type="text" id="billing_email" name="input_email" value="<?php echo $input_email; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="billing_email">
                                    Address <abbr class="required"></abbr>
                                </label>
                                <input type="text" id="billing_email" name="input_address" value="<?php echo $input_address; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="billing_email">
                                    Telephone <abbr class="required"></abbr>
                                </label>
                                <input type="text" id="billing_email" name="input_telephone" value="<?php echo $input_telephone; ?>">
                            </div>
                        </div>


                        <div class="row">
                        <input type="submit" value="update" class="awe-btn awe-btn-3 awe-btn-default text-uppercase">
                        </div>
                        <?php echo form_close(); ?>


                        <!--div class="row">
                        <a href="repassword.html" ><input type="submit" value="repassword" class="awe-btn awe-btn-3 awe-btn-default text-uppercase"></a>
                      </div-->

                    </div>
                </div>
                <!-- END / CHECKOUT CONTENT -->
            </div>
        </div>
    </div>
</section>
<!-- END / SHOP PAGE -->
