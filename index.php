<?php 

// Creates a new date object for todays date
$date = new DateTime;

// Makes a copy of the date object, this is neccessary when you need multiple calculations on a date to receive independent results. 
$newDate = clone $date;

// Gets a date and formats it into the specified layout using the parameters given.
$formatted_date = $date->format('dS M Y');

// Gets the timezone of the current date object
$timezone = $date->getTimezone()->getName();

// Creates a new date object based on the string given and format specified.
$create_from_format = DateTime::createFromFormat('Y-m-d', '2016-11-16');

// Creates a new date object based on the given unix timestamp
$create_from_timestamp = (new DateTime)->setTimestamp('1614532600');

// Creates a new date object based on the given date set in the parameters (YEAR, MONTH, DAY)
// This format is especially useful for situations such as recieving seperated values in a form. 
$set_date = (new DateTime)->setDate(2021, 2, 28)->setTime(12, 30, 30);;
// Sets the time of a date object set in the parameters (HOUR, MINUTES, SECONDS), if no date is given the default is today. 
$set_time = (new DateTime)->setTime(12, 30, 30);

// Add to a date using the specified parameters (P{DAYS}(D)(T){TIME}(HOURS)(H))
$date->add(new DateInterval('P10DT2H'));
$date_add = new DateTime('+2 days 5 hours');
// Subtract from a date using the specified paramaters
$date->sub(new DateInterval('PT2H'));
$date_sub = new DateTime('-2 days 5 hours');

// Modify a date using addition or subtracting of a specified time
$date->modify('+2 days');
$date->modify('-2 days');

$myBirthday = (new DateTime('8 August'))->setTime(12, 00, 00);
// See the difference in time between one date and another date
$time_until_birthday = $newDate->diff($myBirthday);
// Automatically picks up on the time measurements given after the % sign, and replaces them with the values.
$diff_format = $time_until_birthday->format('%m months %d days %h hours till my birthday! Whoo!!');

$date1 = new DateTime;
$date2 = new DateTime('+ 5 days');

// An easy and simple way to compare dates is to use comparison operators on two seperate dates.
if($date1 < $date2) echo "Date 1 is before Date 2";
if($date1 > $date2)  echo "Date 1 is after Date 2";
if($date1 === $date2) echo "Date 1 is the same as Date 2";

// Set the specified timezone 
$date_timezone = (new DateTime)->setTimezone(new DateTimeZone('Europe/London'));
$date_timezone = new DateTime('now', new DateTimeZone('Europe/London'));
// List timezones
$timezone = DateTimeZone::listIdentifiers();
// Set default timezone for whole application
$timezone = 'Europe/London';
date_default_timezone_set($timezone);

function get_date_difference() {
    $end_date = '2021-3-1 20:30:00'; // receive the date from $product->get_lottery_dates_to();

    $date_now = new DateTime; // Current date and time
    $lottery_end_date = new DateTime($end_date); // End date of lottery item
    var_dump($date_now);

    $time_until_lottery_end = $date_now->diff($lottery_end_date); // Difference in time from now till lottery end
    $days_left = $time_until_lottery_end->days; // Days left until lottery end

    $today_midnight = (new DateTime('today'))->modify('+1 days');
    $tomorrow_midnight = (new DateTime('today'))->modify('+2 days');

    if($lottery_end_date < $today_midnight && $lottery_end_date > $date_now) {
        echo "<h1>Lottery ends today</h1>";
    } else if($lottery_end_date >= $today_midnight && $lottery_end_date < $tomorrow_midnight ) {
        echo "<h1>Lottery ends tomorrow</h1>";
    } else if($lottery_end_date >= $tomorrow_midnight) {
        echo $lottery_end_date->format('dS-y-m');
    } else {
        echo "<h1>Lottery ended</h1>";
    }
}
