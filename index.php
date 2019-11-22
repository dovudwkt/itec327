<?php 
session_start();
if (!isset($_SESSION['current_user']) )
{
  header("Location: login.php");
  exit();
}
$_SESSION['current_user'];
// include_once('mysqli_connect.php');
// include('mysqli_connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>workout||Log in</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity=
 "sha3849gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
   <!-- <script src="verify.js"></script> -->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="AJAX-requests.js"></script>

   <style type="text/css">
     aside{
      float:right;
     }
    #top-players-table tr:nth-child(odd){
      background-color:#e8e8e8;
     }
    #top-players-table  td{
      border: 1px solid white;
      padding: 6px;
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
    .icon-holder:hover{
    /*  width:150px;
      height:150px;*/
      box-shadow: 0px 12px 8px -5px;
    }
   /* .icon-holder-small {
      width: 33%;
      height: 42%;
      margin: 15px;
      border-radius: 20px;
      float: left;
      background-position: center !important;
      background-size: contain !important;
      background-repeat: no-repeat !important;
      box-shadow: 0px 6px 20px -8px;
    }
    */
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
      display:block;
    }
    .modal{
      position: absolute;
      margin-left: auto;
      margin-right: auto;
      /*margin-top: 8%;*/
      width: 30%;
      height: 70%;
      display: flex;
      justify-content: center;
      flex-direction: row;
      background: #fdfdfd;
      flex-flow: wrap;
    }
    .name-indicator{
      width: 33%;
      height: 42%;
      max-height:200px;
      margin: 15px;
      flex: 1 24%;
    }

   </style>
</head>
<body>
<!-- 
<div class='name-indicator' style='float:left'>
  <p>Dovud</p>
  <div class='icon-holder-small' style='background:url("images/rock.png");float:left'></div> 
</div>

<div class='name-indicator' style='float:right'>
  <p>Bot</p>
  <div class='icon-holder-small' style='background:url("images/paper.png");float:right'></div> 
</div>
 -->

<div class="modal-container" id="modal-container">
  <div class="modal" id="modal">
      <div class='name-indicator' style='float:left'>
        <p>Dovud</p>
        <div class='icon-holder-small' style='background:url("images/rock.png");'></div> 
      </div>
      <span class='' style='margin-top: auto;margin-bottom: auto;flex: 1;font-size: 115px;'> < </span>
      <div class='name-indicator' style='float:right'>
        <p>Bot</p>
        <div class='icon-holder-small' style='background:url("images/paper.png");'></div> 
      </div>
      <P>working</P>
      <h2 class="row col-md-4">+2xp</h2>
      <p class="row col-md-4">Win!</p>      

    <button id="closeModal_btn" style="position: absolute;bottom: 0;margin-left: 41%;margin-right: 50%;">OK</button>
  </div>

</div>

<div class="container" style="margin-top:30px">     
<!-- Header Section -->
 <nav class="col-sm-2">
      <div class="btn-group-vertical btn-group-sm" role="group"
        aria-label="Button Group">
          <button type="button" class="btn btn-secondary"
                onclick="location.href = 'logout.php'" >Logout</button>
      </div>
  </nav>
<header class="jumbotron row col-sm-14"
style="margin-bottom:2px; background:linear-gradient(white, #e3ffdfc2);
  padding:20px;">
  <div class="col-sm-6"> <div id="show-name-xp"></div>   </div>
<!-- <div class="col-sm-8"> </div> -->
    <div class="col-sm-6">
      <div style="float:right" id="top-players-container"></div>
    </div>

   <!--  <nav class="col-sm-2">
      <div class="btn-group-vertical btn-group-sm" role="group"
        aria-label="Button Group">
          <button type="button" class="btn btn-secondary"
                onclick="location.href = 'logout.php'" >Logout</button>
      </div>
    </nav> -->
    
</header>
  <div class="row" style="padding-left: 0px;">
  <nav class="col-sm-2">
      <ul class="nav nav-pills flex-column">
      </ul>
  </nav>
<div class="col-sm-8">

  <aside class="">
    <div id="top-players-container"> </div>

  </aside>
	
<!--   <section>
    <div>
  		<form action="process-game.php" method="post"> 
  			<h2>ROCK PAPER SCISSORS</h2>	
  			<select name="choice" id="choice">
  			  <option value="rock" selected="">Rock</option>
  			  <option value="paper">Paper</option>
  			  <option value="scissors">Scissors</option>
  			</select>
        <input type="button" name="btn" onclick="sendDt()" value="ok">
  			<input type="submit" name="processGame" value="Play!">
  		</form>
    </div>
	</section> -->
  <h2>Make your choice <?php if( isset($_SESSION['user_name']) ) echo $_SESSION['user_name']  ?></h2>
  <section id="icons-section" class="row col-sm-14">
    <div class="col-sm-4"><label for="rock"> <div class=" icon-holder" style="background:url('images/rock.png')">
    <input type="radio" hidden name="choice" value="rock" id="rock"></div></label>
    </div>
    <div class="col-sm-4"><label for="paper"><div class="icon-holder" style="background:url('images/paper.png')">
    <input type="radio" hidden name="choice" value="paper" id="paper"></div></label>
    </div>
    <div class="col-sm-4"><label for="scissors"><div class="icon-holder" style="background:url('images/scissors.png')">
    <input type="radio" hidden name="choice" value="scissors" id="scissors"></div></label>
</div>
<!-- <input type="button" value="play" onclick="play()" name=""> -->
<input type="button" value="play" onclick="" id="playBtn" name="">
  </section>
	


</div>
<!-- <?php
 if(!isset($errorstring)) {
        echo '<aside class="col-sm-2">';
        // include('info-col.php');
        echo '</aside>';
        echo '</div>';
        echo '<footer class="jumbotron text-center row col-sm-14"
               style="padding-bottom:1px; padding-top:8px;">';
 }
 else
 {
        echo '<footer class="jumbotron text-center col-sm-12"
        style="padding-bottom:1px; padding-top:8px;">';
 }
  // include('footer.php');
 ?> -->
</footer>
</div>
<script type="text/javascript">
$(document).ready(function(){

var modalContainer = $("#modal-container");

   $(document).on('click', '#closeModal_btn', function(){
      console.log("asdsad");
        modalContainer.hide();
  });

//     show_Top_Players();
//     show_my_xp();

// $("input[name='choice']").on('click', function(){
//   var iconHolder = $(".icon-holder");
//   for(var i=0;i<iconHolder.length;i++){
//     iconHolder.removeClass("active");
//   }
//     $(this).parent().addClass("active");
//     console.log($(this).val());
// })

// // send data on PLAY click by calling play() function
// $("#playBtn").on('click', function(){play() } );

// function play(){
//   if(!document.querySelector("input[name='choice']:checked") ){
//       alert("Enter your choice!");
//   }else{
//       var user_choice = document.querySelector("input[name='choice']:checked").value;
//       console.log(user_choice);
//       xhttp = new XMLHttpRequest();
//       xhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//           alert(this.responseText);
//           displayResult(this.responseText);

//           show_Top_Players();  //load and display updated values asynchronously
//           show_my_xp();
//         }
//       };
//           // send parameters to server for processing
//       xhttp.open("GET", "process-game.php?uc="+user_choice, true);
//       xhttp.send();
//   }

// }
// var modalContainer = $("#modal-container");
// modalContainer.show();


// function displayResult(responseTxt){
//   modalContainer.show();
//   $("#modal").prepend(responseTxt);
// }

// $("#closeModal_btn").on('click', function(){
//   closeModal();
// })
// function closeModal(){
//   modalContainer.hide();
// }


// function show_Top_Players(){
//   xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//       document.querySelector("#top-players-container").innerHTML = this.responseText;
//     }
//   };
//   xhttp.open("GET", "show-top-players.php", true);
//   xhttp.send();

// }


// function show_my_xp(){
//   xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//       document.querySelector("#show-name-xp").innerHTML = this.responseText;
//     }
//   };
//   xhttp.open("GET", "show-name-xp.php", true);
//   xhttp.send();
// }


// //    // send new inputed value to server
// // function sendDt(){
// //   var user_choice = document.querySelector("#choice").value;
// //   console.log(user_choice);
// //   xhttp = new XMLHttpRequest();
// //   xhttp.onreadystatechange = function() {
// //     if (this.readyState == 4 && this.status == 200) {
// //       alert(this.responseText);
// //       show_Top_Players();  //load updated values asynchronously
// //       show_my_xp();
// //     }
// //   };
// //       // send parameters to server for processing
// //   xhttp.open("GET", "process-game.php?uc="+user_choice, true);
// //   xhttp.send();

// // }



})
</script>
</body>
</html>
