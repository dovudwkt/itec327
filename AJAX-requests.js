$(document).ready(function(){
    show_Top_Players();
    show_my_xp();

$("input[name='choice']").on('click', function(){
  var iconHolder = $(".icon-holder");
  for(var i=0;i<iconHolder.length;i++){
    iconHolder.removeClass("active");
  }
    $(this).parent().addClass("active");
    console.log($(this).val());
})

// send data on PLAY click by calling play() function
$("#playBtn").on('click', function(){play() } );

function play(){
  if(! $("input[name='choice']:checked") ){
      alert("Enter your choice, please!");
  }else{
      var user_choice = $("input[name='choice']:checked").val();
      console.log(user_choice);
      $.ajax({
        url: 'process-game.php',
        type: 'Get',
        data: {uc: user_choice},

        success: function(data){
          displayResult(data);
          show_Top_Players();  //load and display updated values asynchronously
          show_my_xp();
        },
        error: function(){
          console.log("Something went wrong with AJAX request");
        }

      });



      // xhttp = new XMLHttpRequest();
      // xhttp.onreadystatechange = function() {
      //   if (this.readyState == 4 && this.status == 200) {
      //     // alert(this.responseText);
      //     displayResult(this.responseText);

      //     show_Top_Players();  //load and display updated values asynchronously
      //     show_my_xp();
      //   }
      // };
          // send parameters to server for processing
      // xhttp.open("GET", "process-game.php?uc="+user_choice, true);
      // xhttp.send();
  }

}
var modalContainer = $("#modal-container");
// modalContainer.show();

function displayResult(data){
  modalContainer.fadeIn(200);
  $("#modal").html(data);
 
  $(".container").delay(1000).css({
                        "filter":"blur(4px)"
                      }, 1500);
}


function closeModal(){
  modalContainer.hide();
}

function show_Top_Players(){
  var container = $("#top-players-container");
  //jquery ajax
  $.ajax({
    url: 'show-top-players.php',

    success: function(data){
      container.html(data);
    },
    error: function(){
      console.log("Something went wrong with AJAX request");
    }

  });

  // xhttp = new XMLHttpRequest();
  // xhttp.onreadystatechange = function() {
  //   if (this.readyState == 4 && this.status == 200) {
  //     document.querySelector("#top-players-container").innerHTML = this.responseText;
  //   }
  // };
  // xhttp.open("GET", "show-top-players.php", true);
  // xhttp.send();

}


function show_my_xp(){

  $.ajax({
    url: 'show-name-xp.php',
    type:'Post',
    success: function(data){
      $('#show-name-xp').html(data);
    },
    error: function(){
        console.log("Error with request to 'show-name-xp.php'!");
    }

  });

  // xhttp = new XMLHttpRequest();
  // xhttp.onreadystatechange = function() {
  //   if (this.readyState == 4 && this.status == 200) {
  //     document.querySelector("#show-name-xp").innerHTML = this.responseText;
  //   }
  // };
  // xhttp.open("GET", "show-name-xp.php", true);
  // xhttp.send();
}


//    // send new inputed value to server
// function sendDt(){
//   var user_choice = document.querySelector("#choice").value;
//   console.log(user_choice);
//   xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//       alert(this.responseText);
//       show_Top_Players();  //load updated values asynchronously
//       show_my_xp();
//     }
//   };
//       // send parameters to server for processing
//   xhttp.open("GET", "process-game.php?uc="+user_choice, true);
//   xhttp.send();

// }

})
