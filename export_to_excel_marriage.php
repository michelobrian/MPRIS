<?php
include 'db_connect.php'; // Include the database connection file

// Set headers to force download as an Excel file
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=marriage_records.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Fetch data from the database
$result = $connection->query("SELECT * FROM marriages");

// Output column headers
echo "ID\tName of Groom\tName of Bride\tDate of Marriage\tPlace of Marriage\tMarriage Certificate Number\tAmount Paid\tReceipt Number\tMarriage Certificate\n";

// Output rows
while ($row = $result->fetch_assoc()) {
    echo $row['id'] . "\t" .
         $row['name_of_groom'] . "\t" .
         $row['name_of_bride'] . "\t" .
         $row['date_of_marriage'] . "\t" .
         $row['place_of_marriage'] . "\t" .
         $row['marriage_certificate_number'] . "\t" .
         $row['amount_paid'] . "\t" .
         $row['receipt_number'] . "\t" .
         $row['marriage_certificate_scan'] . "\n";
}

$connection->close();
?>