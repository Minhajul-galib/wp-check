<?php
    function Basic_functions(){
    add_theme_support('menus');
    add_theme_support('widgets');
    add_theme_support('custom-header');
    add_theme_support('custom-header');
    add_theme_support('custom-logo');
    add_theme_support('post-formats',['video','audio','gallery']);
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    register_nav_menus([
        'Home-menu'                       =>'HOME MENUS'
    ]);

    };


    add_filter('redux/options/your_option_name/field/COMMITMENT_DATE', 'custom_date_format');

    function custom_date_format($field) {
        // Modify date format to 'd-m-Y'
        $field['date_format'] = 'd-m-Y';
        return $field;
    }
    

    add_action('after_setup_theme','Basic_functions');


    
    

    
    function Css_Js_file_connect() {
        // Enqueue Bootstrap CSS from CDN 
        
        // Enqueue custom CSS
        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', [], '5.3.3');
        wp_enqueue_style('custom-style', get_template_directory_uri() . '/asset/css/style.css', ['bootstrap-css'], '1.0');
    
        // Enqueue XlsxPopulate library
        wp_enqueue_script('xlsx-populate', get_template_directory_uri() . '/asset/js/xlsx-populate.min.js', [], null, true);
    

        wp_enqueue_script('jquery');
        
        wp_enqueue_script('html2canvas', 'https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js', array(), '0.5.0-beta4', true);

        // Enqueue Bootstrap JS from CDN
        wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', ['jquery'], '5.3.3', true);
    
        
        wp_enqueue_script('html2pdf', 'https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js', array(), '0.17.3', true);
        wp_enqueue_script('custom-script', get_template_directory_uri() . '/asset/js/custom-script.js', array('jquery'), '1.0', true);

        wp_enqueue_script('sheetjs', 'https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js', array(), '0.17.3', true);

        wp_enqueue_script('filesaver', 'https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js', array(), '2.0.5', true);

    
    }
   
    add_action('wp_enqueue_scripts', 'Css_Js_file_connect');


    

    require_once"opt/redux-core/framework.php";
    require_once"opt/sample/config.php";


?>

