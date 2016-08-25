<h2>Edit</h2>

<form name="edit_profile" action="<?php echo base_url(); ?>blogger/update_user" method="post" onsubmit="return validateStandard(this)">
    <table  align="center">
        <tr>
            <td>First Name:</td>
            <td><input type="text" name="first_name" value="<?php echo $result->first_name;?>" required="1" regexp="JSVAL_RX_ALPHA" err="Enter First Name..." /><span class="required">*</span></td>
        </tr>
        <tr><td><br/></td></tr>
        <tr>
            <td>Last Name:</td>
            <td><input type="text" name="last_name" value="<?php echo $result->last_name;?>" required="1" regexp="JSVAL_RX_ALPHA" err="Enter Last Name..."  /><span class="required">*</span></td>
        </tr>
        <tr><td><br/></td></tr>
        <tr>
            <td>Email Address:</td>
            <td><input type="text" name="email_address" value="<?php echo $result->email_address;?>" required="1" regexp="JSVAL_RX_EMAIL" err="Enter Valid Email Address..."  /><span class="required">*</span></td>
        </tr>
        <tr><td><br/></td></tr>
       <tr>
            <td colspan="2" align="center"><input type="submit" name="btn"  value="Update"/></td>
        </tr>
        <tr><td><br/></td></tr>
    </table>
    <script type="text/javascript" language="javascript">
        document.forms['edit_profile'].elements['country'].value='<?php echo $result->country;?>'
    </script>
</form>

