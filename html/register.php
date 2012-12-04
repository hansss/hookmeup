<?php
   
   
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Check if user input
        if (empty($_POST["username"]))
        {
            apologize("You must provide a username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide a password.");
        }
        else if($_POST["confirmation"] !== $_POST["password"])
        {
            apologize("Your passwords do not match, please try again");
        }
        
        if(query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)",$_POST["username"], crypt($_POST["password"])) === false)
        {
            apologize("Username already in use, please try again");
        }
        else
        {
            $rows = query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            // remember that user's now logged in by storing user's ID in session
            $_SESSION["id"] = $id;
            // redirect to portfolio
            redirect("/");
        }
    }
    else
    {
    // else render form
    render("register_form.php", ["title" => "Register"]);
    }
?>
