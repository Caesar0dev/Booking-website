<?php
$errors = array();
$message;
$customerRef = $_SESSION['customerRef'];
$email = $_SESSION['email'];
$name = $_SESSION['username'];
$linkAddress = 'http://shanelucy.pcriot.com/bookingtemplate/account.php';
include 'scripts/dbConn.php';

// actions to be performed if the register button is clicked
if (isset($_POST['Booking'])) {
	// validation check for first name, checks if its empty and only contains letters if it's a post request from the server
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// validation for number plate
		if (empty($_POST['numberPlate'])) {
			$errors[numberPlate] = "Number Plate is Required";
		}
		else {
			$numberPlate = strtoupper($_POST['numberPlate']);
			if (!preg_match("/^[a-zA-Z0-9 ]*$/", $numberPlate)) {
				$errors[numberPlate] = "Number Plate may only contain letters numbers and spaces";
			}
			// checks if the number plate exists in the vehicle table if not shows a link to accounts page
			$sql = "SELECT * FROM vehicle WHERE numberPlate=?";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				$errors[numberPlate] = "SQL statement failed";
			}
			else {
				mysqli_stmt_bind_param($stmt, "s", $numberPlate);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				if (mysqli_stmt_num_rows($stmt) == 0) {
					$errors[numberPlate] = "That vehicle isn't registered yet.<a href='" . $linkAddress . "'>Register Here</a>";
				}
			}
		}
		// validation for date
		$dateOfAppointment = $_POST['date'];
		// checks if a date has been entered
		if (strlen($dateOfAppointment) < 8) {
			$errors[date] = "Please Enter a Date";
		}
		else {
			// setting sunday to false
			$sunday = false;
			// getting the day of the selected date in a 3 character format e.g. Sun
			$day = date("D", strtotime($dateOfAppointment));
			// if the selected date is a sunday set the variable to true
			if ($day == 'Sun') {
				$sunday = true;
			}
			// if sunday is true output an error message
			if ($sunday) {
				$errors[date] = "We are closed on Sundays";
			}
		}
		// validation for fault
		if (empty($_POST['fault'])) {
			$errors[fault] = "Fault is Required";
		}
		else {
			$fault = $_POST['fault'];
			if (!preg_match("/^[a-zA-Z0-9', ]*$/", $fault)) {
				$errors[fault] = "Fault may only contain letters numbers spaces , and '";
			}
		}
		// validation for time
		$timeOfAppointment = $_POST['time'];
		if (strlen($timeOfAppointment) < 3) {
			$errors[time] = "Please Enter a Time";
		}
		else {
			// opening and closing times of the garage
			$opening = ('08:29:00');
			$closing = ('16:30:00');
			// checks if the user selected time falls within the opening and closing times
			if ($timeOfAppointment >= $opening && $timeOfAppointment <= $closing) {
			}
			else {
				$errors[time] = "Bookings are between 08:30 and 16:30";
			}
			$sql1 = "SELECT dateOfBooking FROM booking WHERE dateOfBooking=?";
			// initalise the prepared statement
			$stmt1 = mysqli_stmt_init($conn);
			// prepare the prepared statement
			if (mysqli_stmt_prepare($stmt1, $sql1)) {
				// bind values to the prepared statement
				mysqli_stmt_bind_param($stmt1, "s", $dateOfAppointment);
				// execute the prepared statement
				mysqli_stmt_execute($stmt1);
				// store the results of the prepared statement
				mysqli_stmt_store_result($stmt1);
				mysqli_stmt_bind_result($stmt1, $date);
				while (mysqli_stmt_fetch($stmt1)) {
					if ($date == $dateOfAppointment) {
						$errors[date] = "We already have a booking on this date";
					}
				}
			}
			// echo mysqli_stmt_error($stmt1);
		}
		if (empty($errors)) {
			$sql = "INSERT INTO booking (numberPlate, customerRef, dateOfBooking, timeOfBooking, description) VALUES (?,?,?,?,?)";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				$message = "SQL statement failed";
			}
			else {
				mysqli_stmt_bind_param($stmt, "sisss", $numberPlate, $customerRef, $dateOfAppointment, $timeOfAppointment, $fault);
				mysqli_stmt_execute($stmt);
				$message = "Booking Complete";
				// $message = mysqli_stmt_error($stmt);
				//formatting the date for email
				$formattedDate = date_format(date_create_from_format('Y-m-d', $dateOfAppointment), 'd-m-Y');
				// message to be emailed to user upon creating a booking
				$receiptMsg = "Hello $name\n You have booked your vehicle $numberPlate for an appointment on $formattedDate at $timeOfAppointment";
				// limits each line to 70 characters
				$receiptMsg = wordwrap($receiptMsg, 70);
				mail("$email", "Receipt for your garage appointment", $receiptMsg);
			}
			// Close statement
			$stmt->close();
			// Close connection
			$conn->close();
		} // end off insert
	} //server request method
} //isset
