<?php
	require_once("../../Includes/Auth.php");
	auth();
	require_once("../../Includes/Layout.php");

	drawHeader("Account Functions");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript">
function search_as_you_type(str)
		{
		var xmlhttp;
		if (str.length==0)
		  { 
		  document.getElementById("ajx").innerHTML="";
		  return;
		  }
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if(xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		    document.getElementById("ajx").innerHTML=xmlhttp.responseText;
		    }
		  }
		xmlhttp.open("GET","search_ajx.php?q="+str,true);
		xmlhttp.send();
		}
	</script>
</head>

<script>
function printDiv()
{
  var divToPrint=document.getElementById("content");
  newWin= window.open("");
  newWin.document.write(divToPrint.outerHTML);
  newWin.print();
  newWin.close();
}
</script>

<h1 class="page-head">Computer Science & Engineering</h1>
<h2>Department Library</h2>
<p>&nbsp;&nbsp;</p>
<center>
<form method="post" action="search.php">
<input type="text" size=100 name="textfield" placeholder="Search For A Book Here ..." onkeyup="search_as_you_type(this.value)">
<input type="submit" value="Search" />
</form>
</center>
<p>&nbsp;&nbsp;</p>	
<div id="ajx" style="padding:30px;"></div>

<div id="content">
<table width=100%>


 <?php
 	$count=0;
	require("connect.php");
	$extract = mysql_query("SELECT book_name,author_name,no_copies FROM cselib_books") or die(mysql_error());
	if(mysql_num_rows($extract)==0)
	{
		echo "<tr><td>NO ENTRY IN THIS SECTION<br><br></td></tr>";
		
	}
	else
	{
	echo "<span><h3>Available Books : <br><br></h3></span>";

	echo "

 
  
  
  	<tr>
    
			<th>Sr.No</th>
    		<th>Book Name</th>
    		<th>Author</th>
   			 <th>No. Copies</th>
   
	</tr>

 	";
 
	
	
	while($row = mysql_fetch_assoc($extract))
	{
			$book_name=$row['book_name'];
			$author_name=$row['author_name'];
			$no_copies=$row['no_copies'];
			
			if($no_copies==0)
			continue;
			$count=$count+1;
			echo " <tr>
   
	<td><center>$count.</center></td>
    <td><center>$book_name</center></td>
    <td><center>$author_name</center></td>
    <td><center>$no_copies</center></td>
   
  </tr> ";
	}
	}
	?>

</table>
</div>
	<br>
	<br>
	<center><input class="button-style" type="button" value="PRINT" onclick="printDiv()"/></center>




</body>
</html>

<?php
drawFooter();
?>