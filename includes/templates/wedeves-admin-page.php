<div class="wrap">
    <h1 class="wp-heading-inline">Customs Posts</h1>

    <div class="tablenav top">
     <form action="" method="GET">
        <div class="alignleft actions  ">
                <input type="hidden" name="page" value="academy_wp_plugin">
            <select name="category-customized" id="cat" class="postform">

            <?php 
            $selected_categoried= isset($_GET['category-customized'])? $_GET['category-customized'] :'-1';
            
            ?>
                <option value="-1" <?php selected( '-1', $selected_categoried ); ?>>All Categories</option>
                <?php
                foreach($terms as $term):
                ?>
                <option class="level-0" value="<?php echo $term->term_id;?>" <?php selected( $term->term_id, $selected_categoried ); ?>>

                    <?php echo $term->name;?>
                
                </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="filter_action" id="post-query-submit" class="button" value="Filter">
        </div> 
        </form>
    </div>

    

    <table class="wp-list-table widefat fixed striped table-view-list posts">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Categories</th>
                </tr>

            </thead>
            <tbody>
                <?php 
                    foreach( $posts as $post):
                        $author= get_user_by('id', $post->post_author);

                       
                        $categories = wp_get_post_categories( $post->ID, array( 'fields' => 'names' ) );
                        
                     
                ?>
                <tr>
                    <td><?php echo $post->post_title; ?> </td>
                    <td><?php echo $author->data->display_name; ?> </td>

                    <?php 
                        if($categories) {
                            foreach($categories as $categ){
                                ?>
                                <td><?php echo $categ;?></td>
                                <?php 

                            }
                        }
                    ?>
                    
                             
                    
                </tr>
                <?php endforeach;?>
            </tbody>

    </table>

</div>