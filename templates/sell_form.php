<form action="sell.php" method="post">
    <fieldset>
        <div class="control-group">
            <select name="symbol">
            <option value = ''> </option>
            <?php  
            
            foreach ($portfolio as $port)
            {
                 print("<option value = '"); print($port["symbol"]); print("'>"); print($port["symbol"]); print("</option>\n");
            }
            ?>
            </select>
        </div>
        <div class="control-group">
            <button type="submit" class="btn">Sell</button>
        </div>
    </fieldset>
</form>

