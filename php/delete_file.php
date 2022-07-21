<?php 
        include("./db.php");
    ?>
<?php

$file_id = $_GET['file_id'];
$file_query = "SELECT * FROM files WHERE id = {$file_id} LIMIT 1";
$file_result = mysql_query($file_query) or die(mysql_error());

$file = mysql_fetch_array($file_result);

$delete_file_ok = unlink($file['file_path']);
if ($delete_file_ok) {
    $delete_file_query = "DELETE FROM files WHERE id = {$file_id}";
    mysql_query($delete_file_query) or die(mysql_error());

    header("location:index.php?file_deleted=true");
} else {
    echo "Delete file failed";
}
