<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "mpris_db";

$connection = new mysqli($host, $user, $password, $db);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Set headers to force download as an Excel file
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=birth_records.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Fetch data from the database
$result = $connection->query("SELECT * FROM births");

// Output column headers
echo "ID\tName of Child\tDate of Birth\tSex\tPlace of Birth\tName of Mother\tName of Father\tBirth Certificate Number\tDate of Registration\tPlace of Registration\tAmount Paid\tReceipt Number\tBirth Certificate\n";

// Output rows
while ($row = $result->fetch_assoc()) {
    echo $row['id'] . "\t" .
         $row['name_of_child'] . "\t" .
         $row['date_of_birth'] . "\t" .
         $row['sex'] . "\t" .
         $row['place_of_birth'] . "\t" .
         $row['name_of_mother'] . "\t" .
         $row['name_of_father'] . "\t" .
         $row['birth_certificate_number'] . "\t" .
         $row['date_of_registration'] . "\t" .
         $row['place_of_registration'] . "\t" .
         $row['amount_paid'] . "\t" .
         $row['receipt_number'] . "\t" .
         $row['birth_certificate_scan'] . "\n";
}

$connection->close();
?>