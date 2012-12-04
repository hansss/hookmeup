<?php
   
   
    // configuration
    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {   
       if (empty($_POST["symbol"]))
       {
           apologize("You must a choose stock to sell");
       }
       $shares = query("SELECT shares FROM Portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
       $stock = lookup($_POST["symbol"]);
       $total = $shares[0]["shares"] * $stock["price"];
       if((query("DELETE FROM Portfolio WHERE id = ? AND symbol = ? ", $_SESSION['id'], $_POST["symbol"]))=== false)
       {
            apologize("There was a problem selling your stock, please try again later");
       }
       if((query("UPDATE users SET cash = cash + ? WHERE id = ?", $total, $_SESSION["id"])) === false)
       {
            apologize("There was a problem selling your stock, please try again later");
       }
       query("INSERT INTO History (id, symbol, bought, shares, price, date) 
       VALUES (?,?, '0', ?, ?, CURRENT_TIMESTAMP)",$_SESSION['id'], $_POST["symbol"], $shares[0]["shares"],$stock["price"]); 
       redirect("/");
    }   
    else
    {
    
    $portfolio = query("SELECT symbol FROM Portfolio WHERE id = ?", $_SESSION["id"]);        
    // else render form
    render("sell_form.php", ["portfolio" => $portfolio, "title" => "Sell Shares"] );
    }
?>
