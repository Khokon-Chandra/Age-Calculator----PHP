<!DOCTYPE html>
<html>
<head>
	<title>Php tutorials</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>


<section class="main">
	<h1>PHP Multiple Select option</h1>
	<h2>Age Calculator</h2>
	<form action="#" method="post">
<select name="date">
	<option>Date</option>
	<?php for ($i=1; $i <=31 ; $i++) { 
		echo "<option>$i</option><br>";
	} ?>	
</select>
<select name="month">
	<option>Months</option>
	<?php 
	$month_arr = array("January","February","March","Appril","May","June","July","Augost","September","October","November","December");
		foreach ($month_arr as $key) {
			echo "<option>$key</option><br>";
		}
	 ?>
</select>
<select  name="year">
	<option>Years</option>
	<?php foreach (range(1970,2030) as $j) {
		echo "<option>$j</option><br>";
	} ?>
</select>
<input type="submit" name="submit"  value="Calculate" style="color:blue;background: lightgray; padding: 10px;">
</form>

<?php 
$Date=$Month=$Year=$s_month=$s_date=$s_year=$c_day=$c_month=$c_year=0;

if (isset($_POST["submit"])) {
	$s_date = intval($_POST["date"]);
	$s_month = $_POST["month"];
	$s_year= intval($_POST["year"]);
	
}

	if ($s_date=="Date" || $s_month=="Months" || $s_year == "Years") {
		echo "<div>Selection is Required !!</div>";
		// echo '<script>alert("Please Select Date")</script>'; 
  
	}

	else{

		echo "<p> You have Selected:<span>".$s_date."- ".$s_month."- ".$s_year."</span></p>";

		$current_date = date("d-m-y");
		$s = explode("-",$current_date);
		echo "<h4>Current Date is: $current_date</h4>";

		$c_day = intval($s[0]);
		$c_month = intval($s[1]);
		$c_year = intval($s[2])+2000;
		
		
			for ($i=0; $i < count($month_arr); $i++) { 
				if ($s_month==$month_arr[$i]) {
					$s_month=$i+1;
					break;
				}
			}


		// .........Start condition for age calculator................


		if (($s_date>$c_day && $s_month==$c_month && $s_year==$c_year) or ($s_date>=$c_day && $s_month>$c_month && $s_year==$c_year) or($s_year>$c_year)) {
			echo "Invalid Date of Birth";
			echo "<h4>You've not borth yet</h4>";
		}
				 
		 elseif ($s_date>$c_day && $s_month<=$c_month) {
		 	$Date = (($c_day+30)-$s_date);
		 	$s_month=$s_month+1;
		 	if ($s_month>$c_month) {
		 		$Month= (($c_month+12)-$s_month);
		 		$Year=($c_year-($s_year+1));
		 	}
		 	else{
		 		$Month=$c_month-$s_month;
		 		$Year=$c_year-$s_year;
		 	}
		 }


		elseif ($s_month>$c_month && $s_date<=$c_day) {
			$Date = $c_day-$s_date;
			$Month = (($c_month+12)-$s_month);
			$Year = $c_year-($s_year+1);	
		}

		elseif ($s_date>$c_day && $s_month>$c_month) {
			$Date = (($c_day+30)-$s_date);
			$s_month=$s_month+1;
			$Month = (($c_month+12)-$s_month);
			$Year = ($c_year-($s_year+1));
		}

		elseif($s_date<=$c_day && $s_month<=$c_month){
			$Date = $c_day-$s_date;
			$Month = $c_month-$s_month;
			$Year = $c_year-$s_year;
		}


}

  ?>

<table cellpadding="10" border="0" cellspacing="3" style="text-align: center;margin: 0 auto;">
	<?php 
		echo "<tr><th class='h' colspan='3'>Your Age is</th><tr>";
		echo "<tr><th>Year</th><th>Month</th><th>Day</th></tr>";
		echo "<tr><td>$Year</td><td>$Month</td><td>$Date</td></tr>";

	 ?>
</table>
</section>
</body>
</html>