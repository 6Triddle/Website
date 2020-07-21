<html lang="en">
  <head>
    <title>PHP Form Design</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- import the webpage's stylesheet -->
    <link rel="stylesheet" href="style.css">
    
    <!-- import the webpage's javascript file -->
    <script src="script.js" defer></script>
  </head>  
  <body>
    <header>
      <nav>
        <ul>
          <a href="index.html" class="header-brand">Tim Riddle</a>
          <li><a href="index.html">Home</a></li>
          <li class="dropdown">
            <!-- Dropdown Button -->
            <a href="javascript:void(0)" class="dropbtn">Links</a>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div>
          </li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav>
    </header>
      
    <br><br><hr><br>
      <?php
      require_once("connect.php");
      ?>
      <br>
      /* MAIN CONTENT */
  
      /* FORM */
      <?php
      //data from form
      $name = $_POST['name'];
      $number = $_POST['contactnumber'];
      $text = $_POST['body'];
      $email = $_POST['emailaddress'];
      //email server
      $awardspaceEmail = "admin@triddle.dx.am";
      $recipientEmail = "admin@triddle.dx.am";
        
      //formulate message
      $from = "From: Mail Contect Form<" . $awardspaceEmail . ">";
      $to = $recipientEmail;

      $subject = "Form submission from: $name";
  
      $body = "Message: $text \n Email Address: $email \n Phone Number: $number";
      //send email
      if(mail($to, $subject, $body, $from)){
        echo'E-mail message sent!';
      } else {
        echo'E-mail delivery failure!';
      }

      ?>
  
  </body>
</html>