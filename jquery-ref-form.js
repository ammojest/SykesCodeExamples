 jQuery(document).ready(function() { //adds the event tracking when a user presses enter
    jQuery("#emailRefInput").keyup(function(event) {
        if (event.which === 13) {
          jQuery("#myBtn").click(); // fires mybtn onclick
        }
  });
});

 
 jQuery(document).ready(function() {
  jQuery("#myBtn").click(function() {
        var email = jQuery("#emailRefInput").val(); // pulls the email address from the form
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i; // validates the email address
        if (testEmail.test(email)) {
        var refLink = jQuery("#referralLink").val();
        var subject = "Wanna join our gang?";
        var emailBody = "Hi, Please use " + refLink + "to join the Seafood by Sykes Refferal programme, where when you place an order, you\'re referree will get points towards their order</p>";
        window.location = 'mailto:' + email + '?subject=' + subject + '&body=' +   emailBody; 
        jQuery.ajax({
            url : '/wp-admin/admin-ajax.php',
            data : {
                action : 'post_word_count',
                email: email,
            },
            success : function( response ) {
                alert("data has been sent");
            }
        });
        } else {
          alert("Please enter valid email");
        }
  });
});  
