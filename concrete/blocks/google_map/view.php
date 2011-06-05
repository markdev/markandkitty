<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>

<?php 
$c = Page::getCurrentPage();
if ($c->isEditMode()) { ?>

	<div class="ccm-edit-mode-disabled-item" style="height: 400px">
		<div style="padding: 80px 0px 0px 0px"><?php echo t('Content disabled in edit mode.')?></div>
	</div>

<?php  } else { ?>
	
	<style type="text/css">
	.googleMapCanvas{ width:100%; border:0px none; height: 400px;}
	</style>
	
	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=<?php echo $api_key?>" type="text/javascript"></script>
	<script type="text/javascript"> 
	function googleMapInit<?php echo $bID?>() { 
		try{
			if (GBrowserIsCompatible()) { 
				var map = new GMap2(document.getElementById("googleMapCanvas<?php echo $bID?>"));
				map.setCenter(new GLatLng(<?php echo $latitude?>, <?php echo $longitude?>), <?php echo $zoom?>); 
				<?php  if($latitude!=0 && $longitude!=0){ ?>
				var point = new GLatLng(<?php echo $latitude?>,<?php echo $longitude?>);
				map.addOverlay(new GMarker(point));
				<?php  } ?> 
				var mapControl = new GSmallMapControl();
				map.addControl(mapControl); 
			}
		}catch(e){alert(e.message)} 
	}
	</script>
	
	<?php  if( strlen($title)>0){ ?><h3><?php echo $title?></h3><?php  } ?>
	
	<div id="googleMapCanvas<?php echo $bID?>" class="googleMapCanvas"></div>
	<script type="text/javascript">$(function() {
		googleMapInit<?php echo $bID?>();
	});</script>
	
<?php  } ?>