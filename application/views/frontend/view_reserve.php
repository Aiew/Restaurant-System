<!-- SUB BANNER -->
<section class="sub-banner text-center section">
    <div class="awe-parallax bg-4"></div>
    <div class="awe-title awe-title-3">
        <h3 class="lg text-uppercase">Reservation</h3>
    </div>
</section>
<!-- END / SUB BANNER -->

<!-- RESERVATION -->
<section class="reservation section pd">
    <div class="divider divider-2"></div>
    <div class="reservation-content">
        <?php echo form_open('home/reserve_validation'); ?>
            <div class="row">
              <?php
                if ($success){
                  echo '<div class="awe-info">';
                  echo '<p>Your reservation successful.</p>';
                  echo '</div>';
                }
                if (validation_errors() != NULL){
                  echo '<div class="awe-error">';
                  echo '<p>'.validation_errors().'</p>';
                  echo '</div>';
                }
              ?>
                <div class="col-md-6">
                    <table class="form-table table-first">
                        <tbody>
                            <tr class="t-date">
                                <td colspan="2">
                                    <label for="date">Date</label>
                                    <div class="form-item">
                                        <!--input type="text" id="date" placeholder="dd/mm/yyyy"-->
                                        <input type="date" id="date" placeholder="dd/mm/yyyy" name="input_date" value="<?php echo $this->input->post('input_date'); ?>">
                                        <i class="icon awe_calendar"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr class="t-time-pers">
                                <td class="t-time">
                                    <label for="time">Time</label>
                                    <div class="form-item">
                                        <!--input type="text" id="time" placeholder="-- : --"-->
                                        <input type="time" id="date" placeholder="-- : --" name="input_time" value="<?php echo $this->input->post('input_time'); ?>">
                                        <i class="icon awe_clock_2"></i>
                                    </div>
                                </td>
                                <td class="t-pers">
                                    <label for="pers">Pers</label>
                                    <div class="form-item">
                                        <input type="text" id="pers" name="input_pers" value="<?php echo $this->input->post('input_pers'); ?>">
                                    </div>
                                </td>
                                <td class="t-pers">
                                    <label for="pers">Seat No.</label>
                                    <div class="form-item">
                                        <input type="text" id="seat_no" name="input_seat_no" value="<?php echo $this->input->post('input_seat_no'); ?>">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <table class="form-table">
                        <tbody>
                            <tr class="t-name">
                                <td>
                                    <label for="name">Guest Name</label>
                                    <div class="form-item">
                                        <input type="text" id="name" name="input_name" value="<?php echo $this->input->post('input_name'); ?>">
                                    </div>
                                </td>
                            </tr>
                            <tr class="t-telephone">
                                <td>
                                    <label for="telephone">Telephone</label>
                                    <div class="form-item">
                                        <input type="text" id="telephone" name="input_tel" value="<?php echo $this->input->post('input_tel'); ?>">
                                    </div>
                                </td>
                            </tr>
                            <tr class="t-email">
                                <td>
                                    <label for="email">Email</label>
                                    <div class="form-item">
                                        <input type="text" id="email" name="input_email" value="<?php echo $this->input->post('input_email'); ?>">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-footer text-center">
                <div class="form-item">
                    <input type="submit" value="GET" class="awe-btn awe-btn-3 awe-btn-default text-uppercase">
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</section>
<!-- END / RESERVATION -->

<!-- TESTIMONIAL -->
<section id="testimonial" class="testimonial testimonial-1 section">
    <!-- BACKGROUND -->
    <div class="awe-parallax bg-6"></div>
    <!-- END / BACKGROUND -->

    <!-- OVERLAY -->
    <div class="awe-overlay"></div>
    <!-- END / OVERLAY -->

    <div class="container">
        <div class="testimonial-content">
            <div class="icon-head">
                <i class="icon awe_quote_left"></i>
            </div>

            <blockquote>
                <p>Real food for Real people.</p>
                <span>It’s about sharing. It’s about honesty.</span>
                <div class="test-footer text-right">
                    <span class="sm">Aiew Pudding</span>
                </div>
            </blockquote>
        </div>
    </div>
</section>
<!-- END / TESTIMONIAL -->
