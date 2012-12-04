<table class="table table-striped">

    <thead>
        <tr>
            <th>Transaction</th>
            <th>Date/Time</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>

    <tbody>
    <?php 
            foreach ($rows as $row)	
            {	
                print("<tr>");		
                if($row["bought"]== 1)
                    print("<td>BUY</td>");
                else
                    print("<td>SELL</td>");
                print("<td>{$row["date"]}</td>");		
                print("<td>{$row["symbol"]}</td>");
                print("<td>{$row["shares"]}</td>");
                print("<td>{$row["price"]}</td>");	
                print("</tr>");
            }
            ?>
    </tbody>

</table>

 
