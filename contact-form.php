<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  // var_dump($_POST);
  // displays all information from $_POST variable
  $name = trim($_POST["name"]);
  $email = trim($_POST["email"]);
  $message = trim($_POST["message"]);
  $material = trim($_POST["material"]);

  if ($name == "" OR $email == "" OR $message == ""){
    $error_messages[1] = "You must specify a name, email address, and message.";
  }

  foreach( $_POST as $value){
    if ( stripos($value, 'Content-Type:') !== FALSE){
      $error_messages[2] = "There was a problem with the information you entered.";
    }
  }

  if ($_POST["address"] != "") {
    $error_messages[3] = "Your form submission has an error.";
  }


  require_once("inc/phpmailer/class.phpmailer.php");
  $mail = new PHPMailer();
  if (!$mail->ValidateAddress($email)){
    $error_messages[4] = "You must specify a valid email address.";
  }

  if (!isset($error_messages)){
    $email_body= "";
    $email_body = $email_body . "Name: " . $name . "\n";
    $email_body = $email_body . "Email: ".$email."\n";
    $email_body = $email_body . "Message: ".$message."\n";

    $mail->SetFrom($email, $name);

    $address = "craigvkm@gmail.com"; //TODO: Change to Buisness e-mail
    $mail->AddAddress($address, "Craig Manes");
    $mail->Subject    = "Modern Design Contact Form from | " . $name;
    // $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
    $mail->MsgHTML($email_body);
    // $mail->AddAttachment("images/phpmailer.gif");      // attachment
    // $mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

    if($mail->Send()) {
      header("Location: contact-form.php?status=thanks");
      exit;
    } else {
      $error_messages[5] = "Mailer Error: " . $mail->ErrorInfo;
    }
  }


}
?>

<?php
  include ('inc/header.php');
?>
<div id="contact">
<h1>Contact Form</h1>


<?php
  //checks to see if get variable status is set and if status = thanks
  if (isset($_GET["status"]) AND $_GET["status"] == "thanks") {
?>

  <p>Thakns for the email! I&rsquo;ll be in touch shortly.</p>

<?php
  } else {
?>


  <?php
    if(!isset($error_messages)){
      echo '<p>We would love to hear from you!<p>';
    } else {
      foreach($error_messages as $error_message){
        echo '<p class="errorMessage">'. $error_message . '<p>';
      }
    }
  ?>
  <form method="post" action="contact-form.php">
      <table>

        <tr>
          <th>
            <label for="name">Name</label>
          </th>
          <td>
            <input type="text" name="name" id="name" value="<?php if(isset($name)){echo htmlspecialchars($name);} ?>">
          </td>
        </tr>

        <tr>
          <th>
            <label for="email">Email</label>
          </th>
          <td>
            <input type="text" name="email" id="email" value="<?php if(isset($email)){echo htmlspecialchars($email);} ?>">
          </td>
        </tr>

        <tr>
          <th>
            <label for="message">Message</label>
          </th>
          <td>
            <textarea name="message" id="message"><?php if(isset($message)){echo htmlspecialchars($message);} ?></textarea>
          </td>
        </tr>

        <tr style="display:none;">
          <th>
            <label for="address">Address</label>
          </th>
          <td>
            <input type="text" name="address" id="address">
            <p>Please leave this field blank if it appeared to you<p>
          </td>
        </tr>
      </table>
      <input type="submit" value="send">
      <input type="hidden" value="order_id" value="101010"> <!-- this will be in $_POST["order_id"] and will have a value of 101010 -->
  </form>
<?php } ?>

</div>
<?php
  include('inc/footer.php');
?>
