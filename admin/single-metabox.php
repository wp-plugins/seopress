<?php
function seo4all_metabox(){
	global $post;
	
	$metatitle_length = 150;
	$metadesc_length = 170;
	if(get_option('bp_seo_metadesc_length')){
	$metadesc_length = get_option('bp_seo_metadesc_length');
	}
	if(get_option('bp_seo_metatitle_length')){
	$metatitle_length = get_option('bp_seo_metatitle_length');
	}
	
	$title=get_seo4all_title();
	$description=get_seo4all_description();
	$keywords=get_seo4all_keywords();
	$noindex=get_seo4all_noindex();
	
	if($noindex == 1){
		$checked = "checked";
	}

			if(function_exists('text_counter')){
				$tmp .= text_counter('seo4all_title', $metatitle_length);
				$tmp .= text_counter('seo4all_description', $metadesc_length);
			} else {
				$tmp = "For functionality of the textcounter, you need the Pro Version, <a href='admin.php?page=seomenue#cap_pro'>Get the Pro Version now!</a> ";
			}
			echo $tmp;
?>

<style type="text/css">
#seo4all_title, #seo4all_description, #seo4all_keywords{
	width:99%;
}
</style>
<div id="seo4all" class="postbox">
	<div class="handlediv" title="<?php _e('klick'); ?>">
		<br />
	</div>
	<h3 class="hndle"><?php _e('SeoPress settings')?></h3>
	<div class="inside">
	<p>
		<label for="seo4all_noindex"><?php _e('No Index')?>:</label>
		<input name="seo4all_noindex" id="seo4all_noindex" type="checkbox" <?php echo $checked ?> value="1" /> (Block searchengines from indexing this page)
	</p>
		<p>
			<div class="barbox" id="barboxseo4all_title"><div class="bar" id="barseo4all_title"></div></div><div class="count" id="countseo4all_title"><?php echo $metatitle_length ?></div>
			<label for="seo4all_title"><?php _e('Title')?>:</label>
			<input type="text" name="seo4all_title" id="seo4all_title" value="<?php echo $title; ?>" />
		</p>
		<p>
			<div class="barbox" id="barboxseo4all_description"><div class="bar" id="barseo4all_description"></div></div><div class="count" id="countseo4all_description"><?php echo $metadesc_length ?></div>
			<label for="seo4all_description"><?php _e('Description')?>:</label>
			<input type="text" name="seo4all_description" id="seo4all_description" value="<?php echo $description; ?>" />
		</p>
		<p>
			<label for="seo4all_keywords"><?php _e('Keywords')?>:</label>
			<input type="text" name="seo4all_keywords" id="seo4all_keywords" value="<?php echo $keywords; ?>" />
		</p>
	</div>	
</div>
<?php 
}
?>