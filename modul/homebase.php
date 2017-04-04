<style type="text/css">
	.custom-koniciwa-moshi{text-align: center;} 
	.welcoming-session{font-family: inherit;}
	.dont-worry{font-family: monospace;font-size: 18px}
	.daily-activity .main-images .action-images { transition: all .5s ease-in-out; cursor: pointer; }
	.action-images:hover { transform: scale(1.1); }
	/*IMAGE ROTATION*/
	img.image-rotation{
		-webkit-transition: -webkit-transform .8s ease-in-out;
         transition:         transform .8s ease-in-out;
    }
    img.image-rotation:hover{
		-webkit-transform: rotate(360deg);
	    transform: rotate(360deg);
		box-shadow: 2px 3px 5px #dcdcdc;
		-moz-border-radius: 50%;
		-webkit-border-radius: 50%;
		border-radius: 50%;
    }
</style>
<div class="row">
	<div class="container">
		<div class="form-group">
			<div class="row">
				<div class="col-md-2 col-md-offset-5">
					<img class="img-responsive image-rotation" src="<?php echo $site;?>frontend/logo/ms-icon-310x310.png">
				</div>
			</div>
		</div>
		<div class="custom-koniciwa-moshi">
			<h4 class="welcoming-session">WELCOME TO INFOMATION SYSTEM DRY CLEANING SHOES T.M </h4>
			<p class="dont-worry">DONT WORY WE CARE ABOUT YOUR SHOES</p>		
		</div>
		<section class="daily-activity">
			<div class="row main-images">
				<div class="col-md-4 action-images">
					<img class="img-responsive" src="<?php echo $site;?>frontend/bg/activity1.jpg">
				</div> 
				<div class="col-md-4 action-images">
					<img class="img-responsive" src="<?php echo $site;?>frontend/bg/activity2.jpg">
				</div>
				<div class="col-md-4 action-images">
					<img class="img-responsive" src="<?php echo $site;?>frontend/bg/activity1.jpg">
				</div>
			</div>
		</section>
	</div>
</div>
