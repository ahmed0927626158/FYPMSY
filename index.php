  <?php //include"logsession.php"; ?>






























  <!DOCTYPE html>
  <html lang="en" style=" ">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>AMU FCSE FYPI</title>
      <link rel="stylesheet" href="./css/index.css">
      <link rel="stylesheet" href="./css/login.css">

      
  </head>
  <body>
      <main>
          <section class="site-title">
            <div class="site-background">
                <h1>Arbaminch University</h1>
                <h2>Final Year Project Information Site</h2>
                <h3 style="color: white;font-size: 30px; background-color: rgba(0, 0, 0, 0.7); border-radius: 50px; margin-top: 30px" class="form-boxa">Welcome to FYPI, Here you can find about your Title Advisor, Defence Date, Archive of Previously Done Projects and also you can submit your Project Titels.</h3>
                <button class="btn-log" >Login</button>
            </div>
        </section>
    
    <div class="log" style="margin-left:-200px;" >
        <div class="form-box">
            <!---->
            <div class="button-box">
                <div id="btn">
                 </div>
                <button type="button" name="studmove" class="toggle-btn" onclick="Student()">Student</button>
                <button type="button" name="adminmove" class="toggle-btn" onclick="Administrator()">Administrator</button>
            </div>
            <div class="log-text">
             <h2>LOGIN</h2>

        </div>

        <form id="Student" class="input-group" method="post">
         <p id="notifyStudent" style="color: red;font-size: 20px;font-family:bold"></p>
            <input type="text" name="sname" class="input-field" placeholder="Student Id or Username" required="required" autocomplete="of" >
            <input type="password" name="pass" class="input-field" placeholder="Enter Password" required>
           
            <button type="submit" name="studbutton" class="submit-btn">Login</button>
        </form>

        <form id="Administrator" class="input-group" method="post">
            <p id="notifyAdmin" style="color: red;font-size: 20px;font-family:bold"></p>
        <p id="notifyAdmin" style="color: red;font-size: 20px;font-family:bold"></p>
            <input type="text" name="Aname" class="input-field" placeholder="Username" required>
            <input type="password" name="Apass" class="input-field" placeholder="Enter Password" required>
            
            <button type="submit" name="adminbutton" class="submit-btn">Login</button>
        </form>
        </div>
        >
        
    </div>
    <script>
        var x = document.getElementById("Student");
        var y = document.getElementById("Administrator");
        var z = document.getElementById("btn");

        function Administrator(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function Student(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
        
    </script>
    
    
        
    </div>
      </main>
      <script src="./js/Jquery3.6.0.min.js"></script>

    <script src="./js/owl.carousel.min.js"></script>

    <script src="./js/main.js"></script>
  </body>
  </html>
 

 <?php

session_start();

$errorstud;
$id="";
$erroradmin;
$errordisplay="";
 
$con=mysqli_connect("localhost","root","","student");
$conemployee=mysqli_connect("localhost","root","","employee");

if((empty($_POST['sname'])||empty($_POST['pass']))&&isset($_POST['studbutton']))
{
$errorstud=" * Please fill the form";
$_POST['notify']=" * Please fill the form";
echo " stud not filed";
}

if((empty($_POST['Aname'])||empty($_POST['Apass']))&&isset($_POST['adminbutton']))
{
    $erroradmin="* Please fill the form";
    echo "admin not filed";
}
else if (isset($_POST['studbutton'])&&!isset($errorstud)) 
    {
        //$idComparator;
       $id=$_POST['sname'];//to restrict the where value
      // $searchId=$_POST['sname'];//to search first
       $pass=$_POST['pass'];//the password of the user typed on the pasword field

        $seach="SELECT id,password FROM student_registration where id='$id'";
          //$selectId="SELECT id FROM student_register where id='$id'";
           $execute=mysqli_query($con,$seach);
         //$idQuery=mysqli_query($con,$selectId);

       
        if($con)
        {
        if($execute)
        {
            if(mysqli_num_rows($execute)>0)
            {
        
             while($row=mysqli_fetch_array($execute))
             {
                

                if($pass==$row['password'])
                {
                     //echo "<script> var p=document.getElementById('notifyStudent').innerHTML='Corect user name and password'</script>";
                    $_SESSION['username']=$id;
                  
                  
                   header('location:./Student/FCSE.php');
               
            
                 

                }
                else
                {
                     echo "<script> var p=document.getElementById('notifyStudent').innerHTML='Incorect user name or password'</script>";
                     
                }

              }
        }
        else
                {
                     echo "<script> var p=document.getElementById('notifyStudent').innerHTML='Incorect user name or password'</script>";
                }
      }


 else
    {
            echo "Not executed";
 }
    }
    

    else
    {
        echo "no connected";
    } 
} 

/// for employeeee

 if (isset($_POST['adminbutton'])&&!isset($erroradmin)) 
    {
        if(empty($_POST['Aname'])||empty($_POST['Apass']))
       {
             $erroradmin="* pleease fill the all field";
       } 

        $adminname=$_POST['Aname'];
        $adminpassword=$_POST['Apass'];
        $adminLogin="SELECT id,password FROM admin where id='$adminname'";
        if($conemployee)
        {
            $query=mysqli_query($conemployee,$adminLogin);
            if($query)
            {
              if(mysqli_num_rows($query)>0)
              {
             while($row=mysqli_fetch_array($query))
             { 
               if($row['password']==$adminpassword)
               {
                 $_SESSION['userAdmin']=$adminname;
                header('location:./Admin/Admin.php');
               
               
               }

               else
              {
               echo "<script> var p=document.getElementById('notifyAdmin').innerHTML='Incorect user name or password'</script>";  //notifyAdmin
              }

             }
              }
              else
              {
               echo "<script> var p=document.getElementById('notifyAdmin').innerHTML='Incorect user name or password'</script>";  //notifyAdmin
              }

            }
            else
            {
                echo "not execute the query";
            }
        }
        else
        {
            echo "not connected";
        }
    }
    



?>
<?php  ?>


