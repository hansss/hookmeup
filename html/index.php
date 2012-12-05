<?php

    // configuration
    require("../includes/config.php"); 

    $rows = query("SELECT symbol, shares FROM Portfolio WHERE id = ?", $_SESSION["id"]);
    $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    for ($i = 0, $j = count($rows); $i < $j; $i++) 
    {
        $stock = lookup($rows[$i]["symbol"]);
        $rows[$i]["price"]= $stock["price"];
        $rows[$i]["name"] = $stock["name"];
        $rows[$i]["total"] = $stock["price"] * $rows[$i]["shares"];
    }
    // render portfolio
    render("portfolio.php", ["rows" => $rows, "title" => "Portfolio", "cash" => $cash ]);

?>
