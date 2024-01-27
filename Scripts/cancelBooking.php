<?php
include 'scripts/dbConn.php';

$customerRef = $_SESSION['customerRef'];
$messageCancelError;
$messageSuccess;
if (isset($_POST['Cancel'])) {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$cancelAppointment = $_POST['cancel'];
		// echo $cancelAppointment;
		/* I was unable to get the booking cancellation to work within two days of the booking
		$sql4 = "SELECT dateOfBooking FROM booking WHERE bookingRef=? AND customerRef=?";
		// initalise the prepared statement
		$stmt4 = mysqli_stmt_init($conn);
		// prepare the prepared statement
		if (mysqli_stmt_prepare($stmt4, $sql4)) {
		// bind values to the prepared statement
		mysqli_stmt_bind_param($stmt4, "ss", $cancelAppointment, $customerRef);
		// execute the prepared statement
		mysqli_stmt_execute($stmt4);
		// store the results of the prepared statement
		mysqli_stmt_store_result($stmt4);
		// bind the results of the prepared statement to variables
		mysqli_stmt_bind_result($stmt4, $appointmentDate);
		mysqli_stmt_fetch($stmt4);
		// echo mysqli_stmt_error($stmt4);
		// gets the current date in y-m-d format
		$date = date('Y-m-d'); //gets the difference in todays date and the date of an appointment in seconds
		$diff = abs(strtotime($date) - strtotime($appointmentDate)); echo $diff; }
		$stmt4->close();
		$stmt4->close();
		*/
		// 172800 seconds in 2 days
		$sql3 = "DELETE FROM  booking WHERE bookingRef =? AND customerRef =?";
		$stmt3 = mysqli_stmt_init($conn);
		if (mysqli_stmt_prepare($stmt3, $sql3)) {
			mysqli_stmt_bind_param($stmt3, "si", $cancelAppointment, $customerRef);
			mysqli_stmt_execute($stmt3);
			mysqli_stmt_store_result($stmt3);
			// $messageSuccess = "Booking deleted";
			// echo mysqli_stmt_error($stmt3);
		}
		if (mysqli_stmt_affected_rows($stmt3) === 1) {
			$messageSuccess = "Booking Cancelled";
		}
		else {
			$messageCancelError = "Couldn't cancel your booking, check your booking ref against existing ones ";
		}
		// Close statement
		$stmt3->close();
	}
}
