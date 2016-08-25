
      
            
<div class="about">
			<div class="about-text">
				<h3></h3>
			</div>	
			<?php foreach($result as $vresult){ ?>
			<br/>
			<div class="about-info">
				
				<div class="col-md-5 about-info-left">
					<a href="<?php echo base_url();?>welcome/single_blog/<?php echo $vresult->blog_id;?>"><img src="<?php echo base_url();?>blog_images/<?php echo $vresult->blog_image ?>" alt=""/></a>
				</div>
				<div class="col-md-7 about-info-right">
					<h4><a href="<?php echo base_url();?>welcome/single_blog/<?php echo $vresult->blog_id;?>"><?php echo $vresult->blog_title;?></a></h4>
					
					<p><?php echo $vresult->blog_description;?>...</p>
					<p style="text-align: right"> <?php echo $vresult->created_date_time;?></p>
					<div class="rd-mre">
							<a href="<?php echo base_url();?>welcome/single_blog/<?php echo $vresult->blog_id;?>" class="hvr-bounce-to-bottom quod">Read More</a>
						</div>
				</div>
				<img src="<?php echo base_url();?>images/dcenv5.jpg" alt=""/>
				<?php } ?>
				<div class="clearfix"> </div>
				
			</div>

			 <p style="text-align: right"> <?php echo $blog;?></p>
</div>

