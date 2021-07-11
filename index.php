<?php

include_once('functions.php');

$insertdata = new DB_con();

if (isset($_POST['insert'])) {
    $fname = $_POST['fullname'];
    $address = $_POST['address'];

    $sql = $insertdata->insert($fname, $address);

    if ($sql) {
        echo "<script>alert('สำเร็จ');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('ผิดพลาด!');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>doucument</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<script type="text/javascript">
function CheckColors(val){
 var element=document.getElementById('color');
 if(val=='pick a color'||val=='อื่นๆ')
   element.style.display='block';
 else  
   element.style.display='none';
}

</script> 
</head>

<body>

    <div class="container">
        <hr>
        <h1 class="mt-3">เช็คชื่อ</h1>
        <td><a href="login.php" class="btn btn-primary">Edit</a></td>
        
        <hr>
        <form action="" method="post">
            <div class="mb-3">
                <label for="fullname" class="form-label">ชื่อ</label>
                <input type="text" class="form-control" name="fullname" required>
            </div>
            <div class="form-floating">
                <label for="address" class="form-label">สถานที่ทำงาน</label>
                <select name="address" onchange='CheckColors(this.value);' class="form-select">
                    <option value="บ้าน">บ้าน</option>
                    <option value="ที่ทำงาน">ที่ทำงาน</option>
                    <option value="อื่นๆ" required >อื่นๆ..</option>
                </select>
                <br>
                <input type="text" name="address" class="form-control" id="color" style='display:none;'/>
            </div>
            <br>
            <button type="submit" name="insert" class="btn btn-success">เช็คชื่อ</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>