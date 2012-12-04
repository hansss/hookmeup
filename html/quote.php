<?php
   
   
    // configuration
    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        // if form was submitted
        if (($stock = lookup($_POST["symbol"])) !==false )
        {
            render("quote_display.php", ["title" => "Stock Price","stock" => $stock]); 
        }
        else if($stock == false)
        {
            apologize("Could not find stock");
        }
     }
    else
    {
    // else render form
    render("quote_form.php", ["title" => "Quote"] );
    }
?>
