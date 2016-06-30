<?php
include "db/db.php";

if (isset($_POST['submit'])) {

	$event = $_POST['event'];
	$description = $_POST['description'];
	$t_date = $_POST['year']."-".$_POST['month']."-".$_POST['day'];

	$stmt = $con->prepare("INSERT INTO reminder_events (r_name, r_desc, r_date) VALUES (:event, :desc, :tdate");

	$stmt->execute([
		'event' => $event,
		'desc' => $description,
		'tdate' => $t_date
	]);

}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reminders</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>

    <div class="col-sm-6 col-sm-offset-4">
        <form action="reminder_setup.php" method="post" autocomplete="off">
            <div class="form-group">
                <label for="event">Event</label>
							<input class="form-control" type="text" name="event" id="event" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="year">Reminder Date - Year: </label>
								<select name="year" id="year">
                    <?php
                        $current_year = date('Y');
                        for ($counter=$current_year;$counter<=$current_year+2;$counter++) {
                            echo"\n<option value='$counter'>$counter</option>";
                        }
                    ?>
                </select>
								<label for="month">Month: </label>
								<select name="month" id="month">
									<?php
									$months = array('','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
									for ($counter=1;$counter<=12;$counter++) {
										if ($counter < 10) {
											$counter1 = "0".$counter;
										}
										echo"\n<option value='$counter1'>$counter1 - $months[$counter]</option>";
									}
									?>
								</select>
								<label for="day">Day: </label>
								<select name="day" id="day">
									<?php
									for ($counter=1;$counter<=31;$counter++) {
										if ($counter < 10) {
											$counter = "0".$counter;
										}
										echo"\n<option value='$counter'>$counter</option>";
									}
									?>
								</select>
            </div>
            <div class="form-group">
            	<input type="submit" name="submit" class="btn btn-primary">
            </div>
        </form>
    </div>

</body>
</html>
