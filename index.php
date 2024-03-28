
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta <?php bloginfo('charset'); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('title') ?></title>


    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>

    
    <div style="background-image: url('<?php echo isset($globaMaindData['Banner_img']) ? $globaMaindData['Banner_img']['url']: ''; ?>');" class="home-banner">
    
        <div class="banner-overly">
            </div>
            <div class="banner-content text-center">
                <h2 class="mb-3">CLIFTON GROUP</h2>
                <div class="menu">
                  <ul>
                    <?php
                      wp_nav_menu( [
                        'theme_location'                        =>'Home-menu',
                        'container'                             =>'',
                        'menu_css'                              =>'cus-menu-css',
                        'menu_id'                               =>'cus-menu-id'
                      ] )
                    ?>
                  </ul>
                </div>
                
            </div>
    </div>
    



    <footer style="background-color: #171A7C;" class="p-3">
      <p style="color: #444444;" class="m-0 text-center fs-6"> &copy; Copyrights <?php echo date('Y'); ?> All Rights Reserved.</p>
    </footer>
    
    <?php wp_footer();?>
</body>
</html>