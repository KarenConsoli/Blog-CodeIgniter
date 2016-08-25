<form action="<?php echo base_url('upload_file/do_upload'); ?>" enctype="multipart/form-data" method="POST">
	<input type="text" name="title" />
	<input type="file" name="file_upload" />
	<input type="submit" name="upload" value="upload" />
</form>