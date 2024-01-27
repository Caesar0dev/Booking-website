<?php
$sql1 = "SELECT make, model, numberPlate FROM vehicle WHERE customerRef = ?";
$stmt1 = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmt1, $sql1)) {
	// bind values to the prepared statement
	mysqli_stmt_bind_param($stmt1, "i", $customerRef);
	// execute the prepared statement
	mysqli_stmt_execute($stmt1);
	// store the results of the prepared statement
	mysqli_stmt_store_result($stmt1);
	// bind the results of the prepared statement to variables
	mysqli_stmt_bind_result($stmt1, $Make, $Model, $NumberPlate);
	while (mysqli_stmt_fetch($stmt1)) {
		echo "<strong> " . $Make . " , " . $Model . " - " . $NumberPlate . "<br /></strong>";
	}
}
// Close statement
$stmt1->close();
