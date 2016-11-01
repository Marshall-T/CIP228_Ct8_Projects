<? include "book-data.php";

   $inMail;
   $inPass;
   $response;
      
   function Servers()
   {
   // loop thru servers
      for ($i = 1; $i <= 5; $i++)
      {
         echo "<option>Server" . $i . "</option>";
      }
   }
   
   function PassCheck ($title, $inBox)
   {
      global $email;
      global $password;
      global $inMail;
      global $inPass;
      
      if ($title == "email")
      {
         $inMail = $inBox;
      }
      else
      {
         $inPass = $inBox;
      }

      if ($password == $inPass && $email == $inMail)
      {
         $response = '<br><br><p class="has-error">Welcome Back!.</p>';
      }
      else
      {
         if ( ( !$inMail == null && !$inMail == "" ) && ( !$inPass == null && !$inPass == "" ) )
         {
            $response = '<br><br><p class="has-error">Email and Password do not match.</p>';
         }
      }
//      echo '<p>Password = ' . $password . ' Email = ' . $email . ' Inpass = ' . $inPass . ' Inmail = ' . $inMail . '</p>';
      return $response;
   }

   function BuildLine ($title, $label)
   {
      $line;
      if ($title == "email")
      {
         $line = '   <p class="help-block">Enter an ' . $label . '</p><br>';
      }
      else
      {
         $line = '   <p class="help-block">Enter a ' . $label . '</p><br>';
      }
   return $line;
   }

   function DataForm ($title, $inBox, $label)
   {
      global $response;
      
      if ($inBox === null || $inBox === "")
      {
         echo '<div class="has-error">';
         echo '   <label for="Email">' . $label . '</label>';
         echo '   <input type="' . $title . '" class="form-control" name="' . $title . '" value="' . $inBox . '">';
         echo BuildLine($title, $label);  
         echo '</div>';
      }
      else
      {
         echo '<div class="has-error">';
         echo '   <label for="Email">' . $label . '</label>';
         echo '   <input type="' . $title . '" class="form-control" name="' . $title . '" value="' . $inBox . '">';  // should this not be empty after a submit?
         echo '   <p class="help-block"></p><br>';
         echo '</div>';

         $response = PassCheck ($title, $inBox);
     }
   return $response;
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Chapter 8</title>

   <!-- Bootstrap core CSS -->
   <link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="chapter08-project01.css" rel="stylesheet">

   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
   <script src="bootstrap3_defaultTheme/assets/js/html5shiv.js"></script>
   <script src="bootstrap3_defaultTheme/assets/js/respond.min.js"></script>
   <![endif]-->
</head>

<body>

<div class="container">
   <div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
         <div id="login">
            <div class="page-header">
               <h2>Login</h2> 
            </div>
            <form role="form">

<?
                 DataForm ("email", $_GET["email"], "Email Address");
                 DataForm ("password", $_GET["password"], "Password");
?>               
                <div class="form-group">
                <label for="exampleInputFile">Server</label>
                <select name="server" class="form-control">
                  <?
                     echo Servers();
                  ?>
                </select>             
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
              <? echo $response; ?>
            </form>  
         </div>
      </div>
      <div class="col-md-3">
      </div>
   </div>  
</div>  <!-- end container -->

 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="bootstrap3_defaultTheme/assets/js/jquery.js"></script>
 <script src="bootstrap3_defaultTheme/dist/js/bootstrap.min.js"></script>    
</body>
</html>
