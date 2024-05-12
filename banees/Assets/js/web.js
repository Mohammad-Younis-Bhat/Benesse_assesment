
$('.btn-enregistrer').click(function() {
    $('.connexion').addClass('remove-section');
      $('.enregistrer').removeClass('active-section');
    $('.btn-enregistrer').removeClass('active');
    $('.btn-connexion').addClass('active');
  });
  
  $('.btn-connexion').click(function() {
    $('.connexion').removeClass('remove-section');
      $('.enregistrer').addClass('active-section');	
    $('.btn-enregistrer').addClass('active');
    $('.btn-connexion').removeClass('active');
  });
  

$(document).ready(function() {

  $("#loginForm").submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "Actions/login.php",
        data: formData,
        success: function(response) {
            window.location.replace("http://localhost/banees/Dashboard.php");
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});


    $("#registerForm").submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "Actions/register.php",
            data: formData,
            success: function(response) {
                alert(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });


    
});

