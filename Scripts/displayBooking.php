<?php
$sql2 = "SELECT bookingRef, numberPlate, dateOfBooking, timeOfBooking FROM booking WHERE customerRef =?";
$stmt2 = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmt2, $sql2)) {
	// bind values to the prepared statement
	mysqli_stmt_bind_param($stmt2, "i", $customerRef);
	// execute the prepared statement
	mysqli_stmt_execute($stmt2);
	// store the results of the prepared statement
	mysqli_stmt_store_result($stmt2);
	// bind the results of the prepared statement to variables
	mysqli_stmt_bind_result($stmt2, $ref, $plate, $date, $time);
	
	
	echo "<table>";
	echo "<tr><th> Booking Ref </th><th> Number Plate </th><th> Appointment Date </th><th> Appointment Time </th></tr>";
	while (mysqli_stmt_fetch($stmt2)) {
	        //changes the date format from y-m-d to d-m-y for display purposes
	        $formattedDate = date_format(date_create_from_format('Y-m-d', $date), 'd-m-Y');
		// prints the results of the above prepared statement in a table
		echo "<tr><td>  $ref  </td><td>  $plate </td><td> $formattedDate </td><td>$time</td></tr>";
	}
	echo "</table>";
}
// Close statement
$stmt2->close();
// Close connection
$conn->close();
