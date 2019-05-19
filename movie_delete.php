<?php include('inc/header.php');?>
<?php
include('inc/connection.php');
include('inc/classmovie.php');
  if (isset($_SESSION['user'])) {
    if ((isset($_GET['id'])) && (!empty($_GET['id'])) && (is_numeric($_GET['id']))){
                              $id = $_GET['id'];
                              $deleteMovie = Movie::deleteMovie($id);
                              if ($deleteMovie == true) {
                                $msg = 'movie was successfully deleted';
                                echo '<div class="notification is-danger">' . $msg .' <a href="movies.php" class="tag is-dark"> Go Back</a></div>';
                              }else {
                                echo 'failed';
                              }
                              }
  }else{
    header('Location: login.php');
  }


 ?>
<?php   include('inc/footer.php'); ?>
