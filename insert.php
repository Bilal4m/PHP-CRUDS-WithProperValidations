<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
   
    <link rel="stylesheet" href="./css/st.css">
    <?php include 'links/links.php' ?>





    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <!------ Include the above in your HEAD tag ---------->
</head>
<body>
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="./images/logo1.jpg" alt="no"/>
                        <h3>Welcome! <?php echo $_SESSION ['s_name']?></h3>
                        <p>You are 30 seconds away from earning your own money!</p>
                        <a href="select.php">
                        <input class ="btn btn-primary" type="button" name="" value="Check Form"/> 
                        </a> <br/>
                       
                        
                    </div>
                    <div class="col-md-9 register-right">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <!-- <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">LogOut</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="logout.php" role="tab" aria-controls="profile" aria-selected="false">Logout</a>
                    </li>
                </ul>
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Apply For Job</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <form action="insert.php" method="POST" enctype="multipart/form-data">
                                            <input type="text" class="form-control" placeholder="Your Name *" value="" required name="name"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Phone Number *" value="" required name="phone"/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="Any Reference *" value="" required name="refer"/>
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="male" checked required name="gender">
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="female" required name="gender">
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email *" value="" required name="email"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Your Qualification *" value=""required name="degree" />
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="language">
                                                <option class="hidden"  selected disabled required >Please select your Prefered Language</option>
                                                <option>React</option>
                                                <option>VUE</option>
                                                <option>Laravel</option>
                                                <option>.NET</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="photo" value="" />
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Submit" name="submit"/>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            
                     
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>

    </div>
    
</body>
</html>



<?php 
include 'connection.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $degree = $_POST['degree'];
    $refer = $_POST['refer'];
    $language = $_POST['language'];
    $gender = $_POST['gender'];
    $file = $_FILES['photo'];
    

    $filename = $file['name'];
    $filepath = $file['tmp_name'];
    $fileerror = $file ['error'];

    

    if($fileerror==0){
        
        
        $destfile = 'upload/'.$filename ;
        move_uploaded_file($filepath , $destfile);

        $insertquery = "insert into crud (name,email,phone,degree,refer,language,gender,pic) values ('$name','$email','$phone','$degree','$refer','$language','$gender','$destfile') ";
        $iquery = mysqli_query($con,$insertquery);
    }

    

    if($iquery){
     echo "Data Inserted ";
    }else{
     echo "Data Not Inserted";
    }

}else{
    echo "Form Not Submitted";
}

?>