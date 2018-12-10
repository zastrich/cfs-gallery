<?php
class cfs_gallery extends cfs_field
{
    function __construct($parent = ""){
        $this->name = 'gallery';
        $this->label = __('Gallery', 'cfs');
        $this->parent = $parent;
    }

    function html($field){
		wp_register_script('cfs-gallery-js', plugins_url('gallery.js?time='.time(), __FILE__) , '', '', true);
		wp_enqueue_script('cfs-gallery-js');
		
		wp_register_style('cfs-gallery-css', plugins_url('gallery.css?time='.time(), __FILE__));
		wp_enqueue_style('cfs-gallery-css');
		?>
		<script type="text/javascript">if(typeof(CFSGalLoadSort) == "function") CFSGalLoadSort();</script>
		<div class="cfs-gallery-base">
			<input type="hidden" name="<?=$field->input_name; ?>" class="<?=$field->input_class; ?>" value="<?=trim($field->value, ","); ?>" />
			
			<div class="cfs-gallery">
				<?php 
				foreach(explode(",",$field->value) as $img){
					if($img != ""){
						?>
						<div class="base-img" data-id="<?=$img?>" style="background-image:url(<?=@array_shift(wp_get_attachment_image_src($img, "thumbnail"))?>);">
							<a href="javascript:;" onclick="CFSGalremoveItemGallery(jQuery(this));">x</a>
						</div>
						<?php 
					}
				}
			?>
			</div>
			<input type="button" class="button-primary" value="<?=__('Add Images', 'cfs')?>" onclick="CFSusaGalleryWp(jQuery(this));" />
		</div>
		<?php
    }
	
	function format_value_for_api($value, $field = null){
		return explode(",",$value);
	}
}