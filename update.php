

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
   
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
                        <h3>Welcome</h3>
                        <p>You are 30 seconds away from earning your own money!</p>
                        <a href="select.php">
                        <input class ="btn btn-primary" type="button" name="" value="Check Form"/> </a> <br/>
                        
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
                                <?php 
include 'connection.php';

$ids = $_GET['id'];
$showdata = "select * from crud where id= '$ids'";
$query = mysqli_query($con, $showdata);

$result = mysqli_fetch_array($query);

if(isset($_POST['submit'])){
    
    $updateid = $_GET['id'];

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
        $destfile = 'upload/'.$filename;
        move_uploaded_file($filepath, $destfile);

        $updatequery = "update crud set id=$updateid, name='$name', email='$email' ,phone='$phone' , degree='$degree', refer='$refer', language='$language', gender='$gender',pic='$destfile' where id= '$updateid'";
        $iquery = mysqli_query($con,$updatequery);
    
    }

    // $insertquery = "insert into crud (name,email,phone,degree,refer,language,gender) values ('$name','$email','$phone','$degree','$refer','$language','$gender') ";

   
    if($iquery){
        ?>
         <script>
            alert("Updated Data");
         location.replace('select.php');
       </script>
        
        <?php
         header('select.php');
    }else{
     echo "Data Not Updated";
    }
}
else{
}

?>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <form action="#" method="POST" enctype="multipart/form-data">
                                            <input type="text" class="form-control" placeholder="Your Name *" value="<?php echo $result['name']?>" required name="name"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Phone Number *" value="<?php echo $result['phone']?>" required name="phone"/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="Any Reference *" value="<?php echo $result['refer']?>" required name="refer"/>
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="Male" checked required name="gender" <?php if ($result['gender'] == 'Male'){echo "checked";}?>>
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="Female" required name="gender" <?php if ($result['gender'] == 'Female'){echo "checked";}?>>
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email *" value="<?php echo $result['email']?>" required name="email"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Your Qualification *" value="<?php echo $result['degree']?>"required name="degree" />
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="language" value="">
                                                <option class="hidden"  selected disabled required >Please select your Prefered Language</option>
                                                <option <?php if ($result['language'] == 'React'){echo "selected";}?> >React</option>
                                                <option <?php if ($result['language'] == 'VUE'){echo "selected";}?>>VUE</option>
                                                <option <?php if ($result['language'] == 'Laravel'){echo "selected";}?>>Laravel</option>
                                                <option <?php if ($result['language'] == '.NET'){echo "selected";}?>>.NET</option>
                                                <option <?php if ($result['language'] == 'Other'){echo "selected";}?>>Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="photo" value="<?php echo $result['pic']?>" />
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Update" name="submit"/>
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



