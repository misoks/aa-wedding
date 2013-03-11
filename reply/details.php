<?php 
        $name = 'RSVP';
        include_once('../header.php'); 
?>

<script>
    $(document).ready(function() {
        counter = 1;
        if (counter < 7) {
            $('.add-field').click(function() {
                counter = counter + 1;
                if (counter == 6 ) {
                    $(this).addClass('hidden');
                }
                $(this).addClass('added');
                $('#names-cell').append('<br><input class="field-name" type="text" name="name'+counter+'">');
            });
        }
    });
</script>


<h1>RSVP</h1>
    
    
<?php
    if ( $_POST['attending'] == 'no' && isset($_POST['name']) ) {
        echo "<p>Thanks! We're sorry you won't be able to make it but sure you'll be there in spirit!</p>";
        $name = $_POST["name"];
        $to = "cathy.a.fisher@gmail.com";            
        $subject = "RSVP from $name";
    
        mail($to, $subject, "$name will not be attending");
    }
    elseif ( $_POST['attending'] == 'yes' && isset($_POST['name']) ) {
        $name = $_POST['name'];
    ?>
        <p>We're so glad you'll be able to attend! Please fill out a few more details.</p>
        <form method="post">
            <table class="rsvp-details">
                <tr>
                    <td class="label">Names of All Attending<br>(Including Children)</td>
                    <td class="field" id="names-cell">
                        <input type="text" class="field-name" name="name1" value="<?php echo $name; ?>">
                        <a class="add-field" id="add-field-1">+ Add Attendee</a>
                    </td>
                </tr>
                <tr>
                    <td class="label">Email</td>
                    <td class="field">
                        <input type="text" class="field-email" name="email">
                    </td>
                </tr>
                <tr>
                    <td class="label">Phone</td>
                    <td class="field">
                        <input type="text" class="field-phone" name="phone">
                    </td>
                </tr>
                <tr>
                    <td class="label">Ages of children 10 and under</td>
                    <td class="field">
                        <input class="field-child-count" type="text" name="child-count">
                    </td>
                </tr>
                <tr>
                    <td class="label">Dietary restrictions</td>
                    <td class="field">
                        <input class="field-dietary" type="text" name="dietary">
                        
                    </td>
                </tr>
                    <td></td>
                    <td>
                        <em class="field-caption">Dinner will be served buffet-style; vegetarian options available.</em>
                    </td>
                <tr>
                    <td class="label">Comments or Questions</td>
                    <td class="field">
                        <textarea rows="4" cols="50" name="comments"></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
    
    
    <?php
    }
    elseif (isset($_POST['name1'])) {
        $name1 = $_POST["name1"];
        $name2 = $_POST["name2"];
        $name3 = $_POST["name3"];
        $name4 = $_POST["name4"];
        $name5 = $_POST["name5"];
        $name6 = $_POST["name6"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $child_count = $_POST["child-count"];
        $dietary = $_POST["dietary"];
        $comments = $_POST["comments"];
        
        function check($name) {
            if ( strlen($name) > 0 ) {
                return ', '.$name;
            }
            else {
                return '';
            }
        }
        
        $guests = $name1.check($name2).check($name3).check($name4).check($name5).check($name6);
        
        $body = "
        Theses good folks will be attending the wedding.
        
        Attendees: $guests
        Email: $email
        Phone: $phone
        Age of Kid(s): $child_count
        Dietary Restrictions: $dietary
        Comments: $comments";
    
        $to = "cathy.a.fisher@gmail.com";            
        $from  =  $email;
        $subject = "RSVP from $name1";
    
        mail($to, $subject, $body);
        
        echo "<p class='centered'>Thank you for responding! We'll see you in June!</p>";
    }
    elseif (isset($_POST['attending']) && !isset($_POST['name1'])) {
        $error = "Please enter your name.";
    }
    elseif (!isset($_POST['attending']) && isset($_POST['name1'])) {
        $error = "Please let us know whether or not you'll be attending.";
    }
?>


            
<?php
    include_once('../footer.php');
?>