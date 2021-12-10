
<!DOCTYPE html>

<html>

  <head>

    <link

      rel="stylesheet"

      href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"

    />

    <link

      rel="stylesheet"

      href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"

    />

    <link rel="stylesheet" href="style.css" />

  </head>

  <body>

  <?php 
  function SanitizeString($var)
  {
      $var = strip_tags($var);
      $var = htmlentities($var);
      return stripslashes($var);
  }
		if(isset($_POST['send'])) {
      if (empty(trim($_POST["name"]))) {
        $errors['name'] = "Your name is required";
    } else {
        $name = SanitizeString($_POST["name"]);
        if (!preg_match('/^[a-zA-Z\s]{6,50}$/', $name)) {
            $errors['name'] = "Only letters and spaces allowed";
        }
    }

    if (empty(trim($_POST["userEmail"]))) {
        $errors["userEmail"] = "Your email is required";
    } else {
        $email = SanitizeString($_POST["userEmail"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["userEmail"] = "Pls give a proper email address";
        }
    }

    if (empty(trim($_POST["message"]))) {
        $errors["message"] = "Please type your message";
    } else {
        $message = SanitizeString($_POST["message"]);
        if (!preg_match("/^[a-zA-Z\d\s]+$/", $message)) {
            $errors["message"] = "Only letters, spaces and maybe numbers allowed";
        }
    }
			require 'PHPMailerAutoload.php';
			

			$mail = new PHPMailer;

			 //$mail->SMTPDebug = 4;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'lejhro.hashcode@gmail.com';                 // SMTP username
			$mail->Password = 'Lejhro@2021';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom('lejhro.hashcode@gmail.com', 'no reply@lejhro.com');
			$mail->addAddress($_POST['userEmail'],$_POST['name']);     // Add a recipient

			$mail->addReplyTo('lejhro.hashcode@gmail.com');
    
            
			// print_r($_FILES['file']); exit;
			//for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
				//$mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    // Optional name
			
			$mail->isHTML(true); 
          
             
            // Set email format to HTML

			$mail->Subject = 'lejhro';
			$mail->Body    = '<div>Thank you contact us as soon as possible to contact you .</div>';
			$mail->AltBody = $_POST['message'];

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}
		}
   
    
               
	 ?>
      

    <section id="last">

      <!-- heading -->

      <div class="full">

        <h3 style="text-align:center;">Contact us</h3>
 

        <div class="lt">
 

          <!-- form starting  -->

          <form class="form-horizontal"

                method="post" action="contact.php" onsubmit="return  SanitizeString();">

            <div class="form-group">

              <div class="col-sm-12">

                <!-- name  -->
                Name
                <input

                  type="text"

                  class="form-control"

                  id="name"

                  

                  name="name"

                  value=""

                required name only/>

              </div>

            </div>
 

            <div class="form-group">

              <div class="col-sm-12">

                <!-- email  -->
                Email
                <input

                  type="email"

                  class="form-control"

                  id="userEmail"

                  

                  name="userEmail"

                  value=""

                required/>

              </div>

            </div>
            <div class="form-group">

<div class="col-sm-12">

  <!-- name  -->
  Mobile no
  <input

    type="text"

    class="form-control"

    id="mobileno"

    

    name="mobileno"

    value=""

  required number only/>

</div>

</div>
 
            <div class="form-group">

<div class="col-sm-12">
            <!-- message  -->
            Message
            <textarea

              class="form-control"

              rows="8"
                columns="20"
              

              name="message" required>

            </textarea>
</div>
</div>

            <button

              class="btn btn-primary send-button"

              id="submit"

              type="submit"

              value="send"
              name="send">

              <i class="fa fa-paper-plane"></i>

              <span class="send-text">SEND</span>

            </button>

          </form>

          <!-- end of form -->

        </div>
 

        <!-- Contact information -->

        <div class="rt">

          <ul class="contact-list">

            <li class="list-item">

              <i class="fa fa-map-marker fa-1x">

                <span class="contact-text place">

                Virtual Office Address:
                    Bhubaneswar LB 193, Bhimatangi, Phase II, Bhubaneswar 751002
                    Bangalore

<br><br><br>



                    T-75, F block, PSR Aster, chembenahalli sarjapur road, Bangalore - 562125

                </span>

             </i>

            </li>
 

            <li class="list-item">

              <i class="fa fa-envelope fa-1x">

                <span class="contact-text gmail">

                  <a href="mailto:lejhro.hashcode@gmail.com" title="Send me an email">

                    lejhro.hashcode@gmail.com</a>

                </span>

              </i>

            </li>
 

            <li class="list-item">

              <i class="fa fa-phone fa-1x">

                <span class="contact-text phone">

                  

                </span>

              </i>

            </li>

          </ul>

        </div>

      </div>

    </section>
    
    

  </body>

</html>