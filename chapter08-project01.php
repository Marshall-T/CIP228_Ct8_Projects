<? include "book-data.php";

   function Servers(){
   // loop thru servers
      for ($i = 1; $i <= 5; $i++) {
         echo "<option>Server" . $i . "</option>";
   }
}
/*
   function output ()
   {
               echo '<div class="form-group has-error">';
               echo '   <label for="exampleInputEmail1">Email address</label>';
               echo '   <input type="email" class="form-control" name="email" value="">';
               echo '   <p class="help-block">Enter an email</p>';
               echo '</div>';
   }
*/
   function email($title, $inBox){
      if ($inBox === null || $inBox === "")
      {
         echo '<div class="has-error">';
         echo '   <label for="Email">Email address</label>';
         echo '   <input type="email" class="form-control" name="email" value="">';
         echo '   <p class="help-block">No ' . $title . ' entered</p>';
         echo '</div>';
      }
      else  {
         echo '<div class="form-group">';
         echo '   <label for="Email">Email address</label>';
         echo '   <input type="email" class="form-control" name="email" value="' . $inBox . '">';  // should this not be empty after a submit?
         echo '   <p class="help-block">Entered ' . $title . ' ' . $inBox . '</p>';
   // attempting to compare email with input?  why does it not print?
         if ($inbox == $email)
         {
            echo '<p>' . $inbox . ' = ' . $email . '</p>';     //debugging
         }
         else{
            echo '<p>' . $inbox . ' ?≠? ' . $email . '</p>';   // debugging
         }
      }
   }
              
function password($title, $inBox){
      if ($inBox === null || $inBox === "")
      {
         echo '<div class="has-error">';
         echo '   <label for="exampleInputPassword1">Password</label>';
         echo '   <input type="password" class="form-control" name="password" value="">';
         echo '   <p class="help-block">No ' . $title . ' entered</p>';
         echo '</div>';
      }
      else  {
         echo '<div class="form-group">';
         echo '   <label for="exampleInputPassword1">Password</label>';
         echo '   <input type="password" class="form-control" name="password" value="' . $inBox . '">';
         echo '   <p class="help-block">Entered ' . $title . ' ' . $inBox . '</p>';
      }
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
                 email("Email", $_GET["email"]);

                 password("Password", $_GET["password"]);
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
