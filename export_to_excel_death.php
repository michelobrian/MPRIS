<?php
include 'db_connect.php'; // Include the database connection file

// Set headers to force download as an Excel file
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=death_records.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Fetch data from the database
$result = $connection->query("SELECT * FROM deaths");

// Output column headers
echo "ID\tName of Deceased\tName of Informant\tSex\tAge\tDate of Death\tCause of Death\tPlace of Death\tBurial Place\tAmount Paid\tReceipt Number\tDeath Certificate\n";

// Output rows
while ($row = $result->fetch_assoc()) {
    echo $row['id'] . "\t" .
         $row['name_of_deceased'] . "\t" .
         $row['name_of_informant'] . "\t" .
         $row['sex'] . "\t" .
         $row['age_of_deceased'] . "\t" .
         $row['date_of_death'] . "\t" .
         $row['cause_of_death'] . "\t" .
         $row['place_of_death'] . "\t" .
         $row['burial_place'] . "\t" .
         $row['amount_paid'] . "\t" .
         $row['receipt_number'] . "\t" .
         $row['death_certificate_scan'] . "\n";
}

$connection->close();
?>