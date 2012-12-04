<?php

    // configuration
    require("../includes/config.php"); 

    $rows = query("SELECT symbol,bought,shares,price,date FROM History WHERE id = ?", $_SESSION["id"]);
    // render portfolio
    render("history_display.php", ["rows" => $rows, "title" => "History"]);

?>
