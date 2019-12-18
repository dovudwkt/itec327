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
  <style type="text/css">
   .blue{
    background:blue;
   }
   .green{
    background:green;
   }
   .red{
    background:red;
   }
   .bg{
    background: url("images/bg3.jpg");
    background-size: 105%;
    background-position: 50% 40%;
    background-repeat: no-repeat;
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: -1;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    filter: blur(1.4px);
   }
   #container{
    background: #91ceabbf;
    border-radius: 0px 0 60px 60px;
   }
  aside{
    float:right;
  }

    #top-players-table tr:nth-child(even){
      /*background-color:#f7f3a154;*/
     }
    #top-players-table  td, #top-players-table  th{
      /*border: 1px solid white;*/
      /*padding: 5px 12px;*/
      text-align:center;
      
      padding: 3.35px 1.5rem;
     }
     .icon-holder{
      width:140px;
      height:140px;
      /*margin:15px;*/
      border-radius:20px;
      float:left;
      background-position: center !important;
      background-size: contain !important;   
      transition: .2s;  
      background-repeat: no-repeat !important;
      box-shadow: 0px 6px 20px -8px;
    }
    /*.icon-holder:hover{
      box-shadow: 0px 12px 8px -5px;
    }*/
    .choiceTxt{
      display:none;
    }

     .icon-holder-small {
      width: 100%;
      height: 100%;
      /*margin: 15px;*/
      border-radius: 20px;
      /*float: left;*/
      background-position: center !important;
      background-size: contain !important;
      background-repeat: no-repeat !important;
      box-shadow: 0px 6px 20px -8px;
    }
    #icons-section{
      width:100%;
      height:250px;
      position: relative;
      padding:20px;
    }
    .active{
      width:150px;
      height:150px;
      box-shadow: 0px 12px 8px -5px;
    }
    .modal-container{
      position:absolute;
      width:100vw;
      height:100%;
      background-color:#1f1f1f69;
      z-index:99;
      display:none;
    }
    .modal{
      position: absolute;
      margin-left: auto;
      margin-right: auto;
      width: 30%;
      height: 70%;
      min-height: 274px;
      max-width:409px;
      display: flex;
      justify-content: center;
      flex-direction: row;
      background: #fdfdfd;
      flex-flow: wrap;
      border-radius:15px;
    }
    #closeModal_btn:hover{
      background-color:#56cec5;
    }
    .name-indicator{
      width: 33%;
      height: 32%;
      max-height:200px;
      margin: 15px;
      flex: 1 25%;
    }
    #wins-icon{
      background-image:url('images/arrow_up.png');
    }
    #loses-icon{
      background-image:url('images/arrow_down.png');
    }
    #wins-icon, #loses-icon{
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
    }
   </style>
</head>
<body>

<div class="bg"></div>
<div class="modal-container" id="modal-container">
  <div class="modal" id="modal">
    <!-- this part will be generated dinamically from process-game.php -->
  </div>
</div>

<div class="container" id="container" style="margin-top:5px">     
    <nav class="col-sm-14">
        <div class="btn-group-vertical btn-group-sm" style='margin-left:90%' role="group"
        aria-label="Button Group">
            <button type="button" class="btn btn-secondary"
                onclick="location.href = 'logout.php'" >Logout</button>
        </div>
    </nav>
    <header class="jumbotron row col-sm-14"
    style="margin-bottom:2px; padding:7px; background:linear-gradient(white, #e3ffdfc2);">
        <div class="col-sm-3"> 
            <div id="show-name-xp"></div>   
        </div>
        <div class="col-sm-9">
            <div style="float:" id="top-players-container"></div>
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
    // $(this).children('.choiceTxt').fadeOut();
})





})
</script>
</body>
</html>
