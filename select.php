<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>
    <?php include 'links/links.php' ?>

<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<form action="pdf.php" method="post" target="_blank">
    <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
  width="120%">
  <thead>
    <tr>
      <th class="th-sm">id
      </th>
      <th class="th-sm">Name
      </th>
      <th class="th-sm">Email
      </th>
      <th class="th-sm">Phone
      </th>
      <th class="th-sm">Degree
      </th>
      <th class="th-sm">Reference
      </th>
      <th class="th-sm">Language
    </th>
    <th class="th-sm">Gender
    </th>
    <th class="th-sm">pic
    </th>
    <th colspan="2" class="th-sm">Operation
    </th>
    </tr>
  </thead>
  <tbody>
    


    <?php 
include('connection.php');

$selectquery = "select * from crud";
$query = mysqli_query($con , $selectquery);

$numsofrows = mysqli_num_rows($query);

while($res = mysqli_fetch_array($query)){
    ?>
    <tr>
      <td><?php echo $res['id']?></td>
      <td><?php echo $res['name']?></td>
      <td><?php echo $res['email']?> </td>
      <td><?php echo $res['phone']?></td>
      <td><?php echo $res['degree']?></td>
      <td><?php echo $res['refer']?></td>
      <td><?php echo $res['language']?></td>
      <td><?php echo $res['gender']?></td>
      <td> <img src="<?php echo $res['pic']?>" alt="" srcset="" width="50" height="50"> </td>
      <td><a href="update.php?id=<?php echo $res['id']?>" data-toggle="tooltip" data-placement="bottom" title="Update">
      <i class="fa-regular fa-pen-to-square"></i></a></td>
      <td><a href="delete.php?id=<?php echo $res['id']?>" data-toggle="tooltip" data-placement="bottom" title="Delete">
      <i class="fa-solid fa-trash"></i></a></td>
    </tr>

    <?php
}
?>
  </tbody>
</table>

        
        <div class="text-center">
        
           <button type="submit" class="btn btn-success" value="Submit" name="pdfbtn">Generate PDF</button>
           <a href="insert.php"> <button type="button" class="btn btn-primary">Add More</button> </a>
           <a href="logout.php"> <button type="button" class="btn btn-danger">Log Out</button> </a>           


        </div>
          </form>
      
</body>
</html>

