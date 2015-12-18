
    <!-- SUB BANNER -->
    <section class="sub-banner text-center section">
        <div class="awe-parallax bg-4"></div>
        <div class="awe-title awe-title-3">
            <h3 class="lg text-uppercase">Menu</h3>
        </div>
    </section>
    <!-- END / SUB BANNER -->

    <!-- THE MENU -->
    <section id="the-menu" class="the-menu section">
        <div class="tabs-menu tabs-page">
            <div class="container">
                <ul class="nav-tabs text-center" role="tablist">
                    <li class="active"><a href="#Dishes" role="tab" data-toggle="tab">Dishes</a></li>
                    <li><a href="#dessert" role="tab" data-toggle="tab">Dessert</a></li>
                    <li><a href="#beverage" role="tab" data-toggle="tab">Beverage</a></li>
                </ul>
            </div>
        </div>
        <div class="section-content">
            <div class="container">
                <div class="tab-menu-content tab-content">
                    <!-- BREAKFAST -->
                    <div class="tab-pane fade in active" id="Dishes">
                        <div class="row">


                            <!-- THE MENU ITEM -->

                               <?php
                               $this->db->where('TYPE','Dish');
                               $query = $this->db->get('FOODS');

                               foreach($query->result() as $row)
                               {
                               	echo '<div class="col-lg-6">';
                                echo '<div class="the-menu-item">';
                                    echo '<div class="image-wrap">';
                                    echo '<img src="'.base_url('public').'/images/themenu/F'.$row->F_ID.'.jpg" alt="">';
                                    echo '</div>';
                                    echo '<div class="the-menu-body">';
                                        echo '<h4 class="xsm">'.$row->F_NAME.'</h4>';
                                        echo '<p>'.$row->TYPE.'</p>';
                                    echo '</div>';
                                    echo '<div class="prices">';
                                    echo '<span class="price xsm">฿'. $row->PRICE .'</span>';
                                    echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                }
								?>
                        </div>

                    </div>
                    <!-- END / BREAKFAST -->

                    <!-- DESSERT -->
                    <div class="tab-pane fade" id="dessert">
                        <div class="row">

                            <!-- THE MENU ITEM -->
                               <?php
                               $this->db->where('TYPE','Dessert');
                               $query = $this->db->get('FOODS');

                               foreach($query->result() as $row)
                               {
                               	echo '<div class="col-lg-6">';
                                echo '<div class="the-menu-item">';
                                    echo '<div class="image-wrap">';
                                    echo '<img src="'.base_url('public').'/images/themenu/F'.$row->F_ID.'.jpg" alt="">';
                                    echo '</div>';
                                    echo '<div class="the-menu-body">';
                                        echo '<h4 class="xsm">'.$row->F_NAME.'</h4>';
                                        echo '<p>'.$row->TYPE.'</p>';
                                    echo '</div>';
                                    echo '<div class="prices">';
                                    echo '<span class="price xsm">฿'. $row->PRICE .'</span>';
                                    echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                }
								?>
                        </div>

                    </div>
                    <!-- END / DESSERT -->

                    <!-- DRINK -->
                    <div class="tab-pane fade" id="beverage">
                        <div class="row">

                           <?php
                               $this->db->where('TYPE','Beverage');
                               $query = $this->db->get('FOODS');

                               foreach($query->result() as $row)
                               {
                               	echo '<div class="col-lg-6">';
                                echo '<div class="the-menu-item">';
                                    echo '<div class="image-wrap">';
                                    echo '<img src="'.base_url('public').'/images/themenu/F'.$row->F_ID.'.jpg" alt="">';
                                    echo '</div>';
                                    echo '<div class="the-menu-body">';
                                        echo '<h4 class="xsm">'.$row->F_NAME.'</h4>';
                                        echo '<p>'.$row->TYPE.'</p>';
                                    echo '</div>';
                                    echo '<div class="prices">';
                                    echo '<span class="price xsm">฿'. $row->PRICE .'</span>';
                                    echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                }
								?>
                        </div>

                        </div>
                    </div>
                    <!-- END / DRINK -->

                </div>
            </div>
        </div>
    </section>
    <!-- END / THE MENU -->
