  <!-- slider section -->
  <section class=" slider_section position-relative">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php 
          //  if(have_posts()):
          //   while(have_posts()): the_post();
          //   the_post_thumbnail('custom-100x100'); // Use the custom size
          //       the_title();
          //       the_content();
          //   endwhile;
          //   else:
          //       echo "No posts found";
          //   endif;
          $myarguments = array(
            'post_type' => 'neogym_student_post'
        );
        
        $the_query = new WP_Query($myarguments);
        
        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
                the_post_thumbnail('custom-100x100'); // Use the custom size
                // Display the title
                the_title('<h2>', '</h2>');
        
                // Display the content
                the_content();
        
                // Display the categories or terms
                $categories = get_the_terms(get_the_ID(), 'student_department'); // Use the correct taxonomy slug
                if (!empty($categories) && !is_wp_error($categories)) {
                    echo '<ul class="categories">';
                    foreach ($categories as $category) {
                        echo '<li>' . esc_html($category->name) . '</li>';
                    }
                    echo '</ul>';
                }

            }
        
            // Restore the original post data
            wp_reset_postdata();
        } else {
            echo 'No posts found.';
        }
        
        
    
            ?>
          <!-- <div class="carousel-item active">
            <div class="container">
              <div class="col-lg-10 col-md-11 mx-auto">
                <div class="detail-box">
                  <div>
                    <h3>
                      Fitness
                    </h3>
                    <h2>
                      Training
                    </h2>
                    <h1>
                      Neogym
                    </h1>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse .
                    </p>
                    <div class="">
                      <a href="">
                        Contact Us
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        
         
       
      
        </div>
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
      </div>
    </section>
    <!-- end slider section -->