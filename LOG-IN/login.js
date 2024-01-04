var attempt = 3; // Variable to count number of attempts.
function validate()
{
var username = login.getElementById("username").value;
var password = login.getElementById("password").value;
if ( username == "lipsa" && password == "lipsa@123")
{
alert ("Login successful !");
//window.location = "success.html"; // Redirecting to other page.
return false;
}

}