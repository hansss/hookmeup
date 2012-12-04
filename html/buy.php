<?php
   
   
    // configuration
    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {   
       
        	
        //S
        if (preg_match("/^\d+$/", $_POST["shares"]) == false )
        {
             apologize("Please specify a positive integer for number of shares");
            
        }
        else if (($symbol = lookup($_POST["symbol"])) == false)
        {
            apologize("Could not find stock!");
        }
        
        $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        $stock = lookup($_POST["symbol"]);
        $total = $_POST["shares"] * $stock["price"];
        if($cash[0]["cash"] < $total )
        {
            apologize("You don't have enough money");
        }    
        else
        {
           $test = query("INSERT INTO Portfolio (id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)",
           $_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["shares"]);
           if($test === false)
           {
            apologize("System not working, please try again later");
           }  
           query("UPDATE users SET cash = cash - ? WHERE id = ?", $total, $_SESSION["id"]);
           query("INSERT INTO History (id, symbol, bought, shares, price, date) 
           VALUES (?,?, '1', ?, ?, CURRENT_TIMESTAMP)",$_SESSION['id'], strtoupper($_POST["symbol"]), $_POST["shares"],$stock["price"]);
           redirect("/");
        }
        
     }
    
    else
    {
    // else render form
    render("buy_form.php", ["title" => "Buy Shares"] );
    }
?>
