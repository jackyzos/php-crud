<?php include('inc/header.php');?>
<?php
if (isset($_SESSION['user'])) {
  include('inc/connection.php');
  include('inc/classmovie.php');
if ((isset($_GET['id'])) && (!empty($_GET['id'])) && (is_numeric($_GET['id']))){
                          $id = $_GET['id'];
                          $movieID = Movie::getMovieByID($id);
                          // $moviesGenre[] = $movieGenra;
                          $genreItems = Movie::getMovieGenre($id);
                          $actorsItems = Movie::getMovieActors($id);

                          if ($movieID) {
                            ?>
                            <div class="container is-fluid">
                            <div class="columns is-centered">
                              <div class="column ">
                                <br>
                                <div class="hero is-light">
                                <div class="title">
                                  <?php echo $movieID['MovieTitle'] ?> (<?php echo date("Y",strtotime($movieID['MovieYear']))  ?>)
                                </div>
                              </div>
                              <figure>
                                <img src="img/<?php echo $movieID['MovieImg']  ?>" alt="  <?php echo $movieID['MovieTitle'] ?>">
                              </figure>
                              <p class=""><?php echo $movieID['MoviePlot'] ?></p>
                              <p><strong>Release Year:</strong>  <span> <?php echo $movieID['MovieYear'] ?></span> </p>
                              <p><strong>Length:</strong>  <span> <?php echo $movieID['MovieLength'] ?>min</span> </p>
                            <div class="tags">
                              <strong>Genre: </strong>
                              <?php
                              foreach($genreItems as $key => $val) {
                                  echo '<a class="tag" href="genre.php?GenreID='.$val['GenreID'].'">'. $val['GenreName'].'</a>';
                                  }
                               ?>
                          </div>
                          <p><strong>Director: </strong>  <a class="tag is-light" href="directors.php?action=view&id=<?php  echo $movieID['DirectorID'] ?>"> <?php echo $movieID['DirectorFirstName'].' ' . $movieID['DirectorLastName'] ?></a> </p>
                          <div class="tags">
                            <strong>Stars: </strong>
                            <?php
                            foreach($actorsItems as $key => $val) {
                                echo '<a class="tag" href="actors.php?action=view&id='.$val['ActorID'].'">' . $val['ActorFirstName'].' '.$val['ActorLastName'] .'</a>';
                                }
                             ?>
                        </div>
                        <div class="hero">
                          <iframe width="auto" height="auto" src="<?php echo $movieID['MovieTrailer'] ?>" frameborder="0" allowfullscreen></iframe>
                        </div>
           </div>
          </div>

        </div>
                            <?php
                          }else {
                            echo 'Movie With this ID not found in DB';
                          }
                      }else {
                        echo "Page not found Data Error";
                      }
  }else{
    header('Location: login.php');
  }


 ?>
<?php   include('inc/footer.php'); ?>
