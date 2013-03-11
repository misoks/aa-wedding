<?php 
        $name = 'RSVP';
        include_once('../header.php'); 
?>
    <h1>RSVP</h1>
    
        <p>
            Please use this form to let us know if you'll be able to attend our wedding.
        </p>

        <form method="post" action="details.php">
            <table class="rsvp-form">
                <tr><td class="label">Name</td><td class="field" id="names-cell"><input type="text" name="name"></td></tr>
                <tr><td class="label">Will you be attending?</td><td class="field"><input type="radio" name="attending" value="yes" checked="true">Yes<br>
                                                                                   <input type="radio" name="attending" value="no">No</td></tr>
                <tr><td></td><td><input type="submit" value="Next"></td>
            </table>
        </form>
        

            
<?php
    include_once('../footer.php');
?>