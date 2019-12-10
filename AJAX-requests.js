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
      },

    });
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

  }




})
