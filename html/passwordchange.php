<?php
   
   
    // configuration
    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {   
         // Check if user has inputted his old password
        if (empty($_POST["password"]))
        {
            apologize("You must your old password.");
        }
        else if (empty($_POST["newpassword"]))
        {
            apologize("You must provide a new password.");
        }
        else if($_POST["confirmation"] !== $_POST["newpassword"])
        {
            apologize("Your passwords do not match, please try again");
        }
        
        $row = query("SELECT hash FROM users WHERE id = ?", $_SESSION["id"]);
        if (crypt($_POST["password"], $row[0]["hash"]) !== $row[0]["hash"])
        {
            apologize("Your old password is incorrect, please try again");
        }
        if(query("UPDATE users SET hash = ? WHERE id = ? ", crypt($_POST["newpassword"]), $_SESSION["id"]) === false)
        {
            apologize("Unable to change password, please try again");
        }
        else
        {
            // redirect to portfolio
            redirect("/");
        }
    }
    else
    {
    // else render form
    render("passwordchange_display.php", ["title" => "Password Change"]);
    }
?>
