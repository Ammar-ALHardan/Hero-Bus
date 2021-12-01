<?php
$title = 'driver';
include 'include/header.php';

?>
<link rel="stylesheet" href="layout/styles/student.css">


<div class="container">
  <div class="jumbotron">
    <div class="col-xs-12">

      <h1 style="background-color: #95103b;color: white;text-align: center;">Driver</h1>
      </br>
      </br>
      <h3><strong>Welcome to my Hero Bus!</strong></h3>
     
      <div class="wrapper row3">
   <main class="hoc container clear">
      <!-- main body -->
      <!-- ################################################################################################ -->
      <div class="group center btmspace-80">
      <?php
      if(isset($_SESSION['driver_email'])){
      $driver_email=$_SESSION['driver_email'];
      $q="SELECT * FROM driver where email='$driver_email'";
     
      $resd=mysqli_query($conn,$q);
      $rowd=mysqli_fetch_assoc($resd);
      $driver_id=$rowd['id'];

      $q2="SELECT student.*,parents.*,address.address,school.name as 'school_name' FROM student  INNER JOIN address on student.address_id=address.id  INNER JOIN school on student.school_id=school.id INNER JOIN parents on student.parent_id=parents.id where driver_id='$driver_id' AND student.status=1";
    
      $res=mysqli_query($conn,$q2);
      $count=mysqli_num_rows($res);
      
      while($row=mysqli_fetch_assoc($res)){?>
   

   <article class="one_third" style="border:1px solid silver;border-radius:5px;width: 28.52631%;margin-bottom:25px;background-color:seashell;">
            <a  href="#"><img src="images/demo/backgrounds/016.jpg" class="img" alt=""></a>
            <h6 class="heading " style="padding-bottom:10px ;border-bottom:1px solid silver;border-radius:20px;"><?php  echo $row['full_name'] ?></h6>
            <p style="color:orangered"><strong> Parent Information</strong></p>
            <p><?php   echo "<b>Parent Phone: </b>".$row['phone'] ?></p>
            <p><?php   echo "<b>Parent Name: </b>".$row['name'] ?></p>
            <p style="color:orangered"><strong> Student Information</strong></p>
            <p><?php   echo "<b>School Name :</b> ".$row['school_name'] ?></p>
            <p><?php   echo "<b>Phone(1): </b>".$row['phone1'] ?></p>
            <p><?php   echo "<b>Address :</b>".$row['address'] ?></p>
            <?php if($row['status']==0){?>
            <h3 style="color:orange"><b>pending</b></h3>
            <?php } elseif($row['status']==1){?>
            <h3 style="color:green"><b>Active</b></h3>
            <?php } else{?>
            <h3 style="color:red"><b>Decline</b></h3>
            <?php }?>
   </article>
 
<?php }} ?>    


         
        
        
        
      </div>
      
     
      <div class="clear"></div>
   </main>
</div>
      </br>
      </br>
      <h3 style="border:1px solid black;padding:15px;background-color:#95103b;color:white ;">The opportunity to register is available for drivers who meet the conditions, which gives drivers an extra income, short time and limited time.
      </h3></br>
        </br>
      
          </br>
          
          <h3><strong>Drivers Services</strong></h3>
          </br>
          </br>
          <div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
  
    <div class="group center btmspace-80">
      <article class="one_third first"><a  href="#"><img src="images/demo/backgrounds/07.jpg" alt=""></a>
        <h6 class="heading">Easy access to students</h6>
        <p>The work area is chosen by the driver and all students will be within the zone.</p>
      </article>
      <article class="one_third"><a href="#"><img src="images/demo/backgrounds/09.jpg" alt="" width="500" height="600"></a>
        <h6 class="heading">Side income</h6>
        <p>The driver will be charged per student on the bus.</p>
      </article>
      <article class="one_third"><a href="#"><img src="images/demo/backgrounds/08.jpg" alt=""></a>
        <h6 class="heading">The ease of our work</h6>
        <p>The nature of the work is to deliver students to schools and leave them, which makes our work easy and less in time and effort.</p>
      </article>
    </div>
    <p class="center"><a class="btn" href="rigsterdriver.php">Rigster Driver <i class="fas fa-angle-right"></i></a></p>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
         
<div class="wrapper row3" style="padding: 35px;">
  <section class="hoc container clear" style="padding:10px 0px;"> 
  
   
    <ul class="nospace group btmspace-80 overview" style="margin:0px;">
      <li class="one_third">
        <article><a href="#"><i class="fa fa-facebook"></i></a>
          <h6 class="heading"><a href="https://www.facebook.com" target="_blank">Facebook</a></h6>
          
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><i class="fa fa-google"></i></a>
          <h6 class="heading"><a href="https://accounts.google.com/signin/v2/challenge/pwd?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin&cid=1&navigationDirection=forward&TL=AM3QAYbj0qDz5MhXUkuu6IHaUF3M8ZrCgT1Aiw_I7QWZTUmwEG20GwOY116146df">G-mail</a></h6>
          
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><i class="fa fa-linkedin"></i></a>
          <h6 class="heading"><a href="https://www.linkedin.com/login" target="_blank">LinkedIn</a></h6>
          
        </article>
      </li>
      
  
  </section>
</div>

<?php
include 'include/footer.php';
?>