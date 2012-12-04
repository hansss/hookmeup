
    <ul class="nav nav-pills">
        <li><a href="quote.php"><strong>Quote</strong></a></li>
        <li><a href="buy.php"><strong>Buy</strong></a></li>
        <li><a href="sell.php"><strong>Sell</strong></a></li>
        <li><a href="history.php"><strong>History</strong></a></li>
        <li><a href="passwordchange.php"><strong>Change Password</strong></a></li>
        <li><a href="logout.php"><strong>Log Out</strong></a></li>
    </ul>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Symbol</th>
                <th>Name</th>
                <th>Shares</th>
                <th>Price</th>
                <th>TOTAL</th>
            </tr>
        </thead>

        <tbody>

            <?php 
            foreach ($rows as $row)	
            {	
                print("<tr>");		
                print("<td>{$row["symbol"]}</td>");		
                print("<td>{$row["name"]}</td>");
                print("<td>{$row["shares"]}</td>");
                print("<td>{$row["price"]}</td>");
                print("<td>{$row["total"]}</td>");		
                print("</tr>");
            }
            ?>
            <tr>
            <td colspan="4">CASH</td>
            <td><?php print(number_format($cash[0]["cash"], 2)) ?> </td>
            </tr>

        </tbody>

    </table>

