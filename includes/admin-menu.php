
<?php 


class Query_data_wedevs_accademy_Admin_Menu{

 public function __construct(){
    add_action('admin_menu', [$this, 'add_menu_styles']);
 }


 public function add_menu_styles(){

    add_menu_page(
        'academy page Title',
        'add academy page',
        'manage_options',
        'academy_wp_plugin',
        [$this, 'wedevs_academy_manu_slug']

    );
 }

   public function wedevs_academy_manu_slug(){
      $posts_agrs= array(
         'post_type'=>'post',
         
      );

      if(isset($_GET['category-customized']) && $_GET['category-customized'] != '-1'){
         $posts_agrs ['tax_query']=array(
               array(

                  'taxonomy'=>'category',
                  'field'=>'term_id',
                  'terms'=>$_GET['category-customized'],
               )
               );

      }

      $posts= get_posts($posts_agrs);
// get the category 
         $terms = get_terms( array( 
            'taxonomy' => 'category'
      ) );

      
    
    
    include_once __DIR__ .'/templates/wedeves-admin-page.php';
  
    ?>

    <?php 


 }
    
}