<h2>
    Password
    <form action="<?php echo base_url(); ?>login/reset_password" method="post" onsubmit="return validateStandard(this)">
    <table align="center">
    <tr><td><br/></td></tr>
        <tr>
           
            <td><input type="hidden" value="<?php echo $user;?>" name="user_id" /></td> 
        </tr>
        <tr><td><br/></td></tr>
        <tr>
            <td>Change Password:</td>
            <td><input type="password" name="password" placeholder="Your Password" required="1" regexp="JSVAL_RX_ALPHA_NUMERIC_WITHOUT_HIFANE" err="Enter Password.."/><span class="required">*</span></td>
        </tr>
        <tr><td><br/></td></tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="btn"  value="Change Password"/></td></tr>

    </table>
</form>
</h2>
