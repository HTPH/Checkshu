<?php

include_once('functions.php');

$updatedata = new DB_con();

if (isset($_POST['update'])) {

    $userid = $_GET['id'];
    $fname = $_POST['fullname'];
    $address = $_POST['address'];
    $timedate = $_POST['postingtime'];

    $sql = $updatedata->update($fname, $address, $timedate, $userid);
    if ($sql) {
        echo "<script>alert('สำเร็จ');</script>";
        echo "<script>window.location.href='crud.php'</script>";
    } else {
        echo "<script>alert('ผิดพลาด');</script>";
        echo "<script>window.location.href='update.php'</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อัพเดต</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script type="text/javascript">
        function CheckColors(val) {
            var element = document.getElementById('color');
            if (val == 'pick a color' || val == 'อื่นๆ')
                element.style.display = 'block';
            else
                element.style.display = 'none';
        }
    </script>

</head>

<body>

    <div class="container">
        <h1 class="mt-5">อัพเดต</h1>
        <hr>
        <?php

        $userid = $_GET['id'];
        $updateuser = new DB_con();
        $sql = $updateuser->fetchonerecord($userid);
        while ($row = mysqli_fetch_array($sql)) {
        ?>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="fullname" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" name="fullname" value="<?php echo $row['fullname']; ?>" required>
                </div>
                <div class="form-floating">
                    <label for="address" class="form-label">สถานที่ทำงาน</label>
                    <select name="address" onchange='CheckColors(this.value);' class="form-select">
                        <option value="บ้าน">บ้าน</option>
                        <option value="ที่ทำงาน">ที่ทำงาน</option>
                        <option value="อื่นๆ">อื่นๆ..</option>
                    </select>
                    <br>
                    <input type="text" name="address" class="form-control" id="color" style='display:none;' />
                <?php } ?>
                <button type="submit" name="update" class="btn btn-success">อัพเดต</button>
            </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>