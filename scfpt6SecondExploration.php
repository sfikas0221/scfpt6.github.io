<!DOCTYPE>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover({
                placement : 'top'
        });
    });
</script>
    <style type="text/css">
	.bs-example{
    	margin: 150px 50px;
    }
	.popover-demo{
        margin-bottom: 20px;
    }
</style>
    
  <body>
      
      
      <h1>Second Exploration on MySQL!</h1>

      
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
      </script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
      </script>
      
      <br>
      <br>
      
      <div class="alert alert-primary" role="alert">
          This is a primary alert with a <a href="http://getbootstrap.com/" class="alert-link">Bootstrap</a> link. Give it a click if you like.
      </div>
      
      
      
      <div class="bs-example">
        <div class="popover-demo">
            <button type="button" class="btn btn-primary" data-toggle="popover" title="Blue Popover" data-content="You just clicked me!">Popover</button>
        </div>
          <p><strong>Note:</strong> Click on the buttons to display the popover.</p>
      </div>
      
      
      <form action="scfpt6SecondExploration.php" method="POST"> 
          Enter your name to create an account in the database!
          <br>
          <input name="name" type="text">
          <button type="submit" name="submit">Register</button>
          
      </form>
      
      
      <?php
        if(isset($_POST['submit'])){
            
            
            // Create connection
            $mysqli = new mysqli("localhost", "root", "21February1996", "SecondExploration");
            // Check connection
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }
            
            //Create statements to register the user
            $stmt = $mysqli->prepare("INSERT INTO users (name) VALUES (?);");
            //$stmt = mysqli_prepare($sql);
            
            $stmt->bind_param("s", $name);
            $name = isset($_POST['name'])
              ? $_POST['name']
              : '';
            $stmt->execute();
            
            printf("%d Row inserted.\n", $stmt->affected_rows);

            /* close statement and connection */
            $stmt->close();

            /* close connection */
            $mysqli->close();
            
        }
            
      ?>
      
  </body>
    
    

</html>