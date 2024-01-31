<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee_record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style1.css">
    
</head>
<body>
    <div class="navbar p-0 text-white">
        <ul class="nav  w-100 bg-dark navbar-dark text-white d-flex justify-content-between p-1">
            <h3>Employee Management System</h3>
            <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="form.php">Back to Home</a>
            </li>
        </ul>
    </div>

    <div class="tab mx-auto w-75">
    <table border="2" class="table text-white" >
        <tr>
            <th>ID</th>
            <th>Emplyee Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Department</th>
            <th>Address</th>
        </tr>

        <?php
    include ("connection.php");

    $sql="SELECT * FROM emp_info";
    $data=mysqli_query($conn,$sql);

    $total=mysqli_num_rows($data);

    if($total !=0){
        // echo "Table has recorded";
        while($result=mysqli_fetch_assoc($data))
        {
            echo "
            <tr>
                <td>".$result['id']."</td>
                <td>".$result['emp_name']."</td>
                <td>".$result['emp_gender']."</td>
                <td>".$result['emp_email']."</td>
                <td>".$result['emp_dept']."</td>
                <td>".$result['emp_address']."</td>
            </tr>";
        }
    }
    else
    {
        echo "Table not found";
    }
?>
    </table>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
</html>

