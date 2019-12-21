<?php 
session_start();
if (!isset($_SESSION['current_user']) )
{
  header("Location: login.php");
  exit();
}
$_SESSION['current_user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Game|Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha3849gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="AJAX-requests.js"></script>
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
 
</head>
<body>

<div class="bg"></div>
<div class="modal-container" id="modal-container">
  <div class="modal" id="modal">
    <!--  will be generated dinamically from "process-game.php" -->
  </div>
</div>

<div class="container" id="container" style="margin-top:5px">     
    <nav class="col-sm-14" style="position:relative">
      <button type="button" class="btn btn-secondary" onclick="location.href = 'password-update.php'" >Settings
          </button>
      <button type="button" style='position:absolute; right:0;' class="btn btn-secondary" onclick="location.href = 'logout.php'" >Logout</button>
    </nav>

    <header class="jumbotron row col-sm-14" style="margin-bottom:2px; padding:7px; 
          background:linear-gradient(white, #e3ffdfc2);">
        <div class="col-lg-3"> 
            <div id="show-name-xp">
              <!-- dinamically generated from "show-name-xp.php" -->
            </div>   
        </div>
        <div class="col-lg-9">
            <div style="float:" id="top-players-container">
              <!-- dinamically generated from "show-top-players.php" -->
            </div>
        </div>
    </header>
    <div class="row" style="padding-left: 0px;">

        <h2 class="text-muted mx-auto">Make your choice <?php if( isset($_SESSION['user_name']) ) echo $_SESSION['user_name']  ?></h2>
        <section id="icons-sectionlll" class="row col-sm-10 mx-auto">
            <div class="row mx-auto">
                <div title='Rock' class="col-sm-4"><label for="rock"> <div class="icon-holder" style="background:url('images/rock.png')">
                    <input type="radio" hidden name="choice" value="rock" id="rock"></div>
                    <div class="choiceTxt text-center">Rock</div>
                  </label>
                </div>
                <div title='Paper' class="col-sm-4"><label for="paper"><div class="icon-holder" style="background:url('images/paper.png')">
                    <input type="radio" hidden name="choice" value="paper" id="paper"></div>
                    <div class="choiceTxt text-center">Paper</div>
                  </label>
                </div>
                <div title='Scissors' class="col-sm-4"><label for="scissors"><div class="icon-holder" style="background:url('images/scissors.png')">
                   <input type="radio" hidden name="choice" value="scissors" id="scissors"></div>
                    <div class="choiceTxt text-center">Scissors</div>
                  </label>
                </div>
                <input class="row mx-auto btn btn-primary btn-lg" type="button" value="play" onclick="" id="playBtn" name="">
            </div>

        </section>
    </div>

</div> <!-- end of #container -->
 
<script type="text/javascript">

$(document).ready(function(){
  var modalContainer = $("#modal-container");

  $(document).on('click', '#closeModal_btn', function(){
      modalContainer.hide();
      $(".container").css({'filter':"none"}, 1000);
    });

  $(".icon-holder").parent().on('mouseenter', function(){
      $(this).children('.choiceTxt').fadeIn('slow');
  })
  $(".icon-holder").parent().on('mouseleave', function(){
      $(this).children('.choiceTxt').fadeOut();
  })



})
</script>
</body>
</html>
