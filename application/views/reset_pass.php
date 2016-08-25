<h2>this is Change Password form</h2>
<h3>
    <?php
    $exception = $this->session->userdata('exception');
    if (isset($exception)) {
        echo $exception;
        $this->session->unset_userdata('exception');
    }
    ?>
</h3>
<form action="<?php echo base_url(); ?>login/reset_password" method="post" onsubmit="return validateStandard(this)">
    <table align="center">
        <tr>
            <td>User Name:</td>
            <td><input type="hidden" value="<?php echo $result->email_address;?>" name="email_address" placeholder="Email Address" required="1" regexp="JSVAL_RX_EMAIL" err="Enter Valid Email Address..."  /></td> 
        </tr>
        <tr>
            <td>Change Password:</td>
            <td><input type="password" name="password" placeholder="Your Password" required="1" regexp="JSVAL_RX_ALPHA_NUMERIC_WITHOUT_HIFANE" err="Enter Password.."/><span class="required">*</span></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="btn"  value="Change Password"/></td></tr>

    </table>
</form>