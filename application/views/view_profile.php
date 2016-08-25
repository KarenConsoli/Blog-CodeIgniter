<br/>
<br/>
<br/>

<h2>Profile Info: </h2>
<br/>
<hr/>

    <table  align="center">
        <tr>
            <td><strong>Full  Name:</strong></td>
            <td>
                <?php
                echo $result->first_name.' '.$result->last_name;?>
              
            </td>
        </tr>
        <tr><td><br/></td></tr>
        <tr>
       
            <td><strong>Email Address:</strong></td>
            <td><?php echo $result->email_address;?></td>
 
        </tr>
        <tr><td><br/></td></tr>
    </table>

<h2>
    <a href="<?php echo base_url();?>blogger/edit_profile">Edit</a>
</h2>
