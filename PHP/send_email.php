
#######################################
# S I M P L E  C O N T A C T  F O R M
#######################################

<form action="" method="post">
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" />

  <label for="Email">Email:</label>
  <input type="text" name="email" id="email" />

  <label for="Message">Message:</label><br />
  <textarea name="message" rows="20" cols="20" id="message"></textarea>

  <input type="submit" name="submit" value="Submit" />
</form>

####################################
#        S E N D E M A I L 
####################################

<?php
       // from the form
       $name = trim(strip_tags($_POST['name']));
       $email = trim(strip_tags($_POST['email']));
       $message = htmlentities($_POST['message']);

       // set here
       $subject = "Contact form submitted!";
       $to = 'your@email.com';

       $body = <<<HTML
$message
HTML;

       $headers = "From: $email\r\n";
       $headers .= "Content-type: text/html\r\n";

       // send the email
       mail($to, $subject, $body, $headers);

       // redirect afterwords, if needed
       header('Location: thanks.html');
?>