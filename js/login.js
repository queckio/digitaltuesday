 // Variable to count number of attempts.
// Below function Executes on click of login button.
$(function() {
    var attempt = 3;
    $('#submit').on('click', function() {
        var username = $("#username").val();
        var password = $("#password").val();
        if (username == "dt-admin" && password == "Lalala1!") {
            location.replace('admin.html');
        return false;
        }
        else{
            attempt --;// Decrementing by one.
            alert("You have left "+attempt+" attempt(s)");
        // Disabling fields after 3 attempts.
        if( attempt == 0){
            $("#username").disable(true);
            $("#password").disable(true);
            $("#submit").disable(true);
            return false;
            }
        }
    });
});