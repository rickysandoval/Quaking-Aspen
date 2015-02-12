<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>

<?php
/* You can loop through all of the images in the chosen file set with some code like this:
 *
 *   <?php foreach ($images as $img): ?>
 *       ...
 *   <?php endforeach; ?>
 *
 * Inside the loop, the following data is available about each image:
 *   $img->title : Image's "Title" attribute (set via File Manager properties). Note that C5 sets titles to the file name upon initial upload, so you might not want to display this if you don't expect users to edit them)
 *   $img->description : Image's "Description" attribute (set via File Manager properties) -- use this for captions
 *   $img->orig->src : Original (full-size) image src
 *   $img->orig->width : Original (full-size) image width (in pixels)
 *   $img->orig->height : Original (full-size) image height (in pixels)
 *   $img->large->src : Large image src
 *   $img->large->width : Large image width (in pixels)
 *   $img->large->height : Large image height (in pixels)
 *   $img->thumb->src : Thumbnail image src
 *   $img->thumb->width : Thumbnail image width (in pixels)
 *   $img->thumb->height : Thumbnail image height (in pixels)
 *   $img->titleRaw : Unescaped title (html entities are not encoded -- use with caution!)
 *   $img->descriptionRaw : Unescaped title (html entities are not encoded -- use with caution!)
 *   $img->fID : Image's File ID (assigned by Concrete5 when first uploaded)
 *   $img->linkUrl : URL of a page that the image should link to when clicked (NOTE THAT THIS DOES NOT WORK OUT OF THE BOX -- SEE DOCUMENTATION FOR HOW TO SET THIS UP ON YOUR SITE)
 *	 $img->category : Category of image for filtering

 * If you need to set a container width/height or pass in an overall width/height to your plugin, you can use these:
 *   <?php echo $maxOrigWidth ?>
 *   <?php echo $maxOrigHeight ?>
 *   <?php echo $maxLargeWidth ?>
 *   <?php echo $maxLargeHeight ?>
 *   <?php echo $maxThumbWidth ?>
 *   <?php echo $maxThumbHeight ?>
 *
 * As with all C5 block templates, the $bID (Block ID) variable is available. If you're using a jquery plugin,
 * you will want to output this variable as part of an id so that this block's images can be uniquely identified
 * (otherwise there will be problems if the user adds more than one of this block to the same page).
 */
?>
<?php
	$categories = array();
	foreach ($images as $img){
		if (strlen((string)($img->category)) > 1) { 
			$categories[(string)($img->category)] = (string)($img->category);
		}
	}

?>
<?php if (count($categories)>0){ ?>
<div id="gallery-filters">
	<button class="gallery-filter filter" data-filter="all">All</button>
<?php foreach ($categories as $cat): ?>
	<button class="gallery-filter filter" data-filter=".<?php echo $cat; ?>"><?php echo $cat; ?></button>
<?php endforeach; ?>
</div>
<?php } ?>

<ul id="gallery">
	<?php foreach ($images as $img): ?>
		<?php 
		$cat = "";
		if($img->category) {
			$cat = (string)($img->category);
		}
		?>
		<li class="mix fancybox-box <?php echo $cat; ?>">
			<a class="fancybox" <?php if($img->description){ echo 'title="'.$img->description.'" '; }?>data-fancybox-group="gallery" data-rel="<?php echo $cat; ?>" href="<? echo $img->orig->src; ?>">
			<div class="fancybox-hover" ></div>
			<img src="<?php echo $img->large->src; ?>" width="<?php echo $img->large->width; ?>" height="<?php echo $img->large->height; ?>" alt="" class="<?php echo ($img->large->width >= $img->large->height ? 'landscape' : 'portrait'); ?>"/>
			</a>
			<p class="description"><?php echo $img->description; ?></p>
		</li>
	<?php endforeach; ?>
</ul>

<script type="text/javascript">
$(document).ready(function() {
	//JQUERY PLUGIN EXAMPLE:
	$(function(){
		$('#gallery').mixItUp({
			animation: {
				duration: 1200
			},
			load: {
				filter: 'all'
			}
		});
	});

	$('.fancybox').fancybox({
		padding: 0,
		margin: [5,5,5,5],
		nextEffect: 'fade',
		prevEffect: 'fade'

	});

	$('.filter').on('click', function(){
		var $this = $(this);
		if (!$this.hasClass('active')){
			var $filter = $this.data('filter');

			$filter == 'all' ?
				$(".fancybox")
				.attr('data-fancybox-group', 'gallery')
			: 
				$('.fancybox')
				.filter(function(){
					return $(this).data('rel') == $filter;
				})
				.attr('data-fancybox-group', $filter);
		}
	});
	
});
</script>
