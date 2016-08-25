<h2>Sing Up</h2>
<h3>
    <?php
    $message=$this->session->userdata('message');
    if(isset($message)){
        echo $message;
        $this->session->unset_userdata('message');
    }
    ?>
</h3>
<form action="<?php echo base_url(); ?>index.php/login/save_user" method="post" onsubmit="return validateStandard(this)">
    <table border="1" align="center">
        <tr>
            <td>First Name:</td>
            <td><input type="text" name="first_name" placeholder="First Name" required="1" regexp="JSVAL_RX_ALPHA" err="Enter First Name..." /><span class="required">*</span></td>
        </tr>
       <tr><td><br/></td></tr>
        <tr>
            <td>Last Name:</td>
            <td><input type="text" name="last_name" placeholder="Last Name" required="1" regexp="JSVAL_RX_ALPHA" err="Enter Last Name..."  /><span class="required">*</span></td>
        </tr>
        <tr><td><br/></td></tr>
        <tr>
            <td>Email Address:</td>
            <td><input type="text" name="email_address" placeholder="Email Address" required="1" regexp="JSVAL_RX_EMAIL" err="Enter Valid Email Address..."  /><span class="required">*</span></td>
        </tr>
        <tr><td><br/></td></tr>
      
       <tr>
            <td colspan="2" align="center"><input type="submit" name="btn"  value="Sign_Up"/></td>
        </tr>
      <tr><td><br/></td></tr>
    </table>
</form>
