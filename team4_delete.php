<?php
include('data/db.php');

$id = $_GET['responderid'];

$remove = "DELETE FROM responders WHERE responder_id='$id'";

if($conn->query($remove) === true) {
    echo '<script> window.alert("Succesfully Deleted") </script>';
    echo "<script> window.location.href='team4_responder.php' </script>";
} else {
    echo '<script> window.alert("There was a problem on deleting") </script>';
    echo "<script> window.location.href='team4_responder.php' </script>";
}
?>