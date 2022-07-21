<?php
include("./db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Docker Demo</title>
</head>

<body>

    <?php
    if (isset($_GET['file_deleted'])) :
    ?>
        <h3>File deleted!</h3>
    <?php endif; ?>
    <?php
    if (isset($_POST['upload_btn'])) {
        $upload_file = $_FILES['file'];
        $upload_path = "./uploads/" . $_FILES['file']['name'];
        if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_path)) {

            $add_file_query =  "INSERT INTO files (file_path) VALUES ('{$upload_path}')";
            mysql_query($add_file_query) or die(mysql_error());

            echo "<h3>File uploaded!</h3>";
        } else {
            echo "<h3>File upload failed!</h3>";
        }
    }
    ?>

    <form method="POST" enctype="multipart/form-data">
        <div>
            <input type="file" name="file" id="file" accept="image/*">
        </div>
        <div>
            <input type="submit" name="upload_btn" value="Submit">
        </div>
    </form>

    <h2>Files</h2>

    <?php
    $path = "./uploads";
    ?>
    <ul>
        <?php

        $files_query = "SELECT * FROM files ";
        $files_result = mysql_query($files_query) or die(mysql_error());


        while ($file = mysql_fetch_array($files_result)) :
        ?>
            <?php
            $file_path = $file['file_path'];
            ?>
            <li>
                <a href="<?= $file_path ?>">
                    <figure>
                        <img src="<?= $file_path ?>" alt="<?= $file_path ?>" style="width:300px;height:auto;">
                    </figure>
                </a>
                <form action="delete_file.php" method="GET">
                    <input type="hidden" name="file_id" value="<?= $file['id'] ?>">
                    <input type="submit" value="[X] Delete file" name="delete_file">
                </form>
            </li>
        <?php
        endwhile;
        ?>
    </ul>
</body>

</html>