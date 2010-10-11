<?php

### Settings Page 

function bp_seo_settings() { ?>
  <?php bp_seo_settings_page();?>
  <div class="wrap">
  	<br>
    <h2><?php _e('SeoPress:General settings'); ?></h2>
    <br><br>
  	<?php if(!function_exists('get_keywords_from_content')){ echo "For functionality of the keyword generator, you need the Pro Version, <a href='admin.php?page=seomenue#cap_pro'>Get the Pro Version now!</a> "; } ?>
    <form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
      <p><strong><?php _e('Keyword Generator'); ?></strong></p>
      <p><?php _e('Check this, if you want SeoPress to generate the keywords from the content, if there are no Keywords set.'); ?>
      <input type="checkbox" name="bp_seo_keywords" <?php if(get_option('bp_seo_keywords') == true ){ echo "checked";} ?> value="1" /></p>
      <p><?php _e('How many Keywords to use?'); ?>
     <input type="text" name="bp_seo_keywords_quantity" length="4" size="4" value="<?php echo get_option('bp_seo_keywords_quantity'); ?>" />
      <div class="submit"><input type="submit" name="bp_seo_keywords_submit" value="<?php _e('Save', 'buddypress') ?>"  style="font-weight:bold;" /></div>	
    </form>
    
    <form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
      <p><strong><?php _e('Hide meta box in “Add New Page/Edit” screen '); ?></strong></p>
      <p><?php _e('Check this, if you do not want to edit meta data in the “Add New Page/Edit” screen: '); ?>
      <input type="checkbox" name="bp_seo_meta_box_page" <?php if(get_option('bp_seo_meta_box_page') == true ){ echo "checked";} ?> value="1" /></p>
      <div class="submit"><input type="submit" name="bp_seo_meta_box_page_submit" value="<?php _e('Save', 'buddypress') ?>"  style="font-weight:bold;" /></div>	
    </form>
   
    <form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
      <p><strong><?php _e('Hide meta box in “Add New Post/Edit” screen '); ?></strong></p>
      <p><?php _e('Check this, if you do not want to edit meta data in the “Add New Post/Edit” screen: '); ?>
      <input type="checkbox" name="bp_seo_meta_box_post" <?php if(get_option('bp_seo_meta_box_post') == true){ echo "checked";} ?> value="1" /></p>
            <div class="submit"><input type="submit" name="bp_seo_meta_box_post_submit" value="<?php _e('Save', 'buddypress') ?>"  style="font-weight:bold;" /></div>	
    </form>
    
    <form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
      <p><strong><?php _e('Standard length of the title'); ?></strong></p>
      <p><?php _e('Please set up a maximum length of the title. After this the title will be stopped. If you dont want to stop, please type in 0.'); ?><br /><input type="text" name="bp_seo_metatitle_length" length="4" size="4" value="<?php echo get_option('bp_seo_metatitle_length'); ?>" /> (<?php _e('number of chars'); ?>)</p>
      
      <div class="submit"><input type="submit" name="bp-metatitle-length" value="<?php _e('Save standard title length', 'buddypress') ?>"  style="font-weight:bold;" /></div>	
    </form>
    
    <form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
      <p><strong><?php _e('Standard length of meta description'); ?></strong></p>
      <p><?php _e('Please set up a maximum length of meta description. After this the meta description will be stopped. If you dont want to stop, please type in 0.'); ?><br /><input type="text" name="bp_seo_metadesc_length" length="4" size="4" value="<?php echo get_option('bp_seo_metadesc_length'); ?>" /> (<?php _e('number of chars'); ?>)</p>
      
      <div class="submit"><input type="submit" name="bp-metadesc-length" value="<?php _e('Save standard description length', 'buddypress') ?>"  style="font-weight:bold;" /></div>	
    </form>
          
    <form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
      <p><strong><?php _e('Delete Seo for Buddypress'); ?></strong></p>
      <p><?php _e('I dont want to use Seo for Buddypress! Delete all concerning fields from the option table.'); ?></p>
      <p><div class="submit"><input type="submit" name="bp-seo-remove" value="<?php _e('Delete Seo for Buddypress', 'buddypress') ?>"  style="font-weight:bold;" /></div></p>	
    </form> 
          
  </div> 

  <?php } ?>