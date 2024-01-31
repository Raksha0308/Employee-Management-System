<?php
    include('connection.php');
    $result = array();
?>

<?php
    
    if(isset($_POST['searchdata']))
    {
        $search     =$_POST['search'];

        $sql= "SELECT * from emp_info WHERE id='$search' ";
        $data= mysqli_query($conn,$sql);

        $result=mysqli_fetch_assoc($data);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style1.css">
    
</head>
<body>
    <div class="navbar p-0 text-white">
            <ul class="nav  w-100 bg-dark navbar-dark text-white d-flex justify-content-between p-1">
                <h3>Employee Management System</h3>
                <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="table.php">VIEW DETAILS</a>
                </li>
        </ul>
    </div>



    <div class="container">
        <h2>Employee Data Entry Automation Software</h2>
        <div class="form">
        <form action="#" method="post" id="employeeForm">
            <input type="text" placeholder="Search ID" class="textfield" name="search" value="<?php if(isset($_POST['searchdata'])){echo $result['id'];}?>" >

            <input type="text" placeholder="Employee Name" class="textfield" name="name" value="<?php if(isset($_POST['searchdata'])){echo $result['emp_name'];}?>">

            <select id="" class="textfield" name="gender">
                <option value="Not Selected">Select Gender</option>
                <option value="Male"
                <?php if(isset($result['emp_gender']) &&  $result['emp_gender']=='Male')
                {
                    echo "selected";
                }
                ?>
                >Male</option>
                <option value="Female"
                <?php if(isset($result['emp_gender']) &&  $result['emp_gender']=='Female')
                {
                    echo "selected";
                }
                ?>
                >Female</option>
            </select>

            <input type="email" placeholder="Email Address" class="textfield" name="email" value="<?php if(isset($_POST['searchdata'])){echo $result['emp_email'];}?>">

            <select id="" class="textfield" name="department">
                <option value="Not Selected">Select Department</option>
                <option value="IT"
                    <?php if(isset($result['emp_dept']) && $result['emp_dept']=='IT')
                    {
                        echo "selected";
                    }
                    ?>
                >IT</option>
                <option value="HR"
                    <?php if(isset($result['emp_dept']) && $result['emp_dept']=='HR')
                    {
                        echo "selected";
                    }
                    ?>
                >HR</option>
                <option value="Account"
                    <?php if(isset($result['emp_dept']) && $result['emp_dept']=='Account')
                    {
                        echo "selected";
                    }
                    ?>
                >Account</option>
                <option value="Sales"
                    <?php if(isset($result['emp_dept']) && $result['emp_dept']=='Sales')
                    {
                        echo "selected";
                    }
                    ?>
                >Sales</option>
                <option value="Marketing"
                    <?php if(isset($result['emp_dept']) && $result['emp_dept']=='Marketing')
                    {
                        echo "selected";
                    }
                    ?>
                >Marketing</option>
                <option value="Business Development"
                    <?php if(isset($result['emp_dept']) && $result['emp_dept']=='Business Development')
                    {
                        echo "selected";
                    }
                    ?>
                >Business Development</option>
            </select>

            <textarea name="address" id="" cols="30" rows="3" placeholder="Enter Address"><?php if(isset($_POST['searchdata'])){echo $result['emp_address'];}?></textarea>

            <input type="submit" value="Search" class="btn btn-secondary" name="searchdata">
            <input type="submit" value="Save" class="btn btn-success" name="save">
            <input type="submit" value="Update" class="btn btn-warning" name="update">
            <input type="submit" value="Delete" class="btn btn-danger" name="delete" onclick="return checkdelete()">
            <input type="reset" value="Clear" class="btn btn-primary" name="">
        </form>
        
        </div>
    </div>
    
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save']))
    {

        if(!empty($_POST['name']))
        {
            $name       =$_POST['name'];
            $gender     =$_POST['gender'];
            $email      =$_POST['email'];
            $department =$_POST['department'];
            $address    =$_POST['address'];

            $sql="INSERT INTO emp_info (emp_name,emp_gender,emp_email,emp_dept,emp_address) VALUES ('$name','$gender','$email','$department','$address')";

            if(mysqli_query($conn,$sql)){
                echo "<script> alert('Data is Save'); window.location.href = 'form.php';
                exit();
                </script>";
            }
            else{
                echo"<script> alert('Failed to save data') </script>".mysqli_error($conn);
            }
        }    
    }
?>

<script>
    let checkdelete=function checkdelete()
    {
        return confirm("Are you shure you want to delete this record?");
    }
</script>

<?php   
    if(isset($_POST['delete'])){

        if(!empty($_POST['search']))
        {
            $id=$_POST['search'];
        
            $sql= "DELETE from emp_info WHERE id= '$id'";
            
            if(mysqli_query($conn,$sql)){
                echo "<script> alert('Data is deleted'); window.location.href = 'form.php' </script>";
            }
            else{
                echo"<script> alert('Failed to delete data') </script>".mysqli_error($conn);
            }
        }
    }
?>

<?php
    if(isset($_POST['update']))
    {
        if(!empty($_POST['search']))
        
        {
        $id         =$_POST['search'];
        $name       =$_POST['name'];
        $gender     =$_POST['gender'];
        $email      =$_POST['email'];
        $department =$_POST['department'];
        $address    =$_POST['address'];

        $sql="UPDATE emp_info SET emp_name='$name',emp_gender='$gender',emp_email='$email',emp_dept='$department',emp_address='$address' WHERE id='$id'";

        if(mysqli_query($conn,$sql)){
            echo "<script> alert('Record Updated'); window.location.href = 'form.php' </script>";
            exit();
        }
        else{
            echo"<script> alert('Failed to update record') </script>".mysqli_error($conn);
        }
    }
    }
?>



