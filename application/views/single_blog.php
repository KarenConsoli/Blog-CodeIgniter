
<div class="blog">
<div class="about">
			<div class="about-text">
				<div class="blog-left">
					<div class="blog-left-grid">
						<div class="blog-left-grid-left">
							<h3><a href="<?php echo base_url(); ?>welcome/single_blog/<?php echo $result->blog_id; ?>"><?php echo $result->blog_title; ?></a></h3>
							<p>| <?php echo $result->created_date_time;?> | </p>
						</div>
						<div class="blog-left-grid-right">
							<a href="#" class="hvr-bounce-to-bottom non"><?php echo $cont_comments;?> Comments</a>
						</div>
                        
						<div class="clearfix"> </div>
						<a  href="<?php echo base_url();?>welcome/single_blog/<?php echo $result->blog_id;?>"><img src="<?php echo base_url();?>blog_images/<?php echo $result->blog_image ?>" alt=" " class="img-responsive" /></a>
						<p class="para"> <?php echo $result->blog_description; ?></p>
						
					</div>
                    </form>

     <form action="<?php echo base_url(); ?>Welcome/export_pdf" method="post" onsubmit="return validateStandard(this)">
    
            <input type="hidden" name="user" value= '<?php echo $result->user_id;?>'/>
            <input type="hidden" name="blog" value= '<?php echo $result->blog_id;?>'/>
            <input type="hidden" name="desc" value= '<?php echo $result->blog_description;?>'/>
            
            
            <p ><input type="submit" name="btn"  value="Download PDF"/></p>

</form>


    <div class="meta">
        <p class="date">Created <?php echo $result->created_date_time;?></p>
         <table>
            <?php foreach ($comments as $acomments) {
                
            ?>
            <tr>
                <td> NAME :</td>
                <td>
                    <?php echo $acomments->first_name;?>
                </td>
            </tr>
            <tr>
                <td> comment :</td>
                <td>
                   <?php echo $acomments->comments_description;?>
                </td>
            </tr>
            <?php }?>
        </table>
        <form action="<?php echo base_url();?>welcome/save_comments" method="post">
               
        <table>
            <tr>
                

                <td> <input type="hidden" name="user_id" value="<?php echo $result->user_id;?>">
                    <input type="hidden" name="blog_id" value="<?php echo $result->blog_id;?>">    
                </td>
            </tr>
            <tr>
                <td>comment</td>
                <td>
                    <textarea name="comments_description" id="" cols="30" rows="10"> </textarea>
                </td>
            </tr>
            <tr>
            <td>&nbsp;</td>
            <td>
                <input type="submit" name="btn" value="Submit">
            </td>
            </tr>
        </table>
       
      		
				
				<div class="clearfix"> </div>

              
			
			</div>
            </div>
          
            </div>
