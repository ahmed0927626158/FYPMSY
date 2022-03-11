
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
                     $_SESSION['username']='Ahmed';  
                    if(isset($_SESSION['username']))
                    {
                      $_SESSION['student']="Student Id";
                    }
                    if(isset($_POST['sub']))
                      header('location:./Student/.Submition.php');
                   header('location:./Student/FCSE.php');
               
            
                 echo "<script>location.href='FCSE.php'</script>";

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