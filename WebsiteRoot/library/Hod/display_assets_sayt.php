<div id="content">
			
<table align="center">


 <?php
 	$count=0;
 	$q=$_GET["q"];
	require("connect.php");
	$extract = mysql_query("SELECT category,no_copies from cselib_categories_books where category like '%$q%' group by category ") or die(mysql_error());
	if(mysql_num_rows($extract)==0)
	{
		echo "<tr><td width='200'><center>No entry in this Section</center></td></tr>";
	}
	else
	{

		echo "
			<tr>
				<th width=70>Sr. No.</th>
	    		<th width=350>Category</th>
	  		</tr>";

		while($row1 = mysql_fetch_assoc($extract))
		{
				$count=$count+1;
				$sumcopies=$row1['no_copies'];
				$categories=$row1['category'];
				echo "	<tr>
								<td><center>$count.</center></td>
								<td><center><a href='display_categories.php?link=".$categories." '> ".$categories."</a>&emsp;(".$sumcopies.")</center></td>
						<tr>";		
				
		}
	}
	?>

</table>
</div>
<br>
<br>
<center>
	<input class="button-style" type="button" value="PRINT" onclick="printDiv()"/>
</center>