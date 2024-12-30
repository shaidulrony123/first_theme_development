
  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="info_items">
        <a href="">
          <div class="item ">
            <div class="img-box box-1">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                <?php
                 $options = get_option( '_prefix_my_options' );
                 echo $options['add-location-1'];
                ?>
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item ">
            <div class="img-box box-2">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                <?php
                 $options = get_option( '_prefix_my_options' );
                 echo $options['cell-phone'];
                ?>
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item ">
            <div class="img-box box-3">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                <?php
                 $options = get_option( '_prefix_my_options' );
                 echo $options['add-mail-1'];
                ?>
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p>
      <?php 
        $options = get_option( '_prefix_my_options' );
        echo $options['opt-text-2'];
      ?>
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </footer>
  <!-- footer section -->

  <script src="<?php echo get_template_directory_uri() . '/assets/js/jquery-3.4.1.min.js'; ?>"></script>
  <script src="<?php echo get_template_directory_uri() . '/assets/js/bootstrap.js'; ?>"></script>

</body>

</html>