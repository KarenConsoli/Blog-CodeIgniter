<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php if(is_array($images)) : ?>
				<?php foreach($images as $row) : ?>
				<img src="<?php echo base_url().'files_galeri/'.$row['name']; ?>" style="width : 500px; height: 500;" class="img-thumbnail">
				<br>
				<br>
				<div class="alert alert-info"><?php echo $row['title'] ?></div>
				<br>
				<?php echo anchor('upload_file/delete_data?id='.$row['id'], '<div class=\'btn btn-danger btn-sm\'>DELETE</div>', ''); ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>