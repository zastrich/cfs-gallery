# CFS Gallery
====================

The CFS Gallery Add-on for [Custom Field Suite]

# Functions
* Drag'n Drop between multiple galleries
* Use galleries in Loops
* Reorder imagens
* Return array from IDs

## Installation
* Click the "Download ZIP" button on the right side of this GitHub page.
* Upload the unzipped folder into the /wp-content/plugins/ directory, OR
* Upload the zip file into WordPress (Plugins > Add New > Upload)
* Activate the plugin (CFS must also be active)

## Example of Code to Display images on your theme
```
$Images = CFS()->get("gallery"); /* Return array of Image IDs */

if(is_array($Images) && sizeof($Images) > 0)
foreach($Images as $ImageID){
    $Image = get_post($ImageID); /* Get properties of image post by ID */
    ?>
    <a href="<?=@array_shift(wp_get_attachment_image_src($ImageID, "full"))?>">
        <img src="<?=@array_shift(wp_get_attachment_image_src($ImageID, "large"))?>" alt="<?=$Image->post_content?>">
    </a>
    <?php 
}
```
