<?php
/*
 * This script exports all records from the main tables (births, deaths, marriages, dogs, and land_records)
 * in tab-separated format as a single Excel file download.
 * It sets the appropriate headers for Excel, queries each table, and outputs the data with column headers.
 * Each section is separated by a blank line and a header row for clarity in Excel.
 * Usage: Access this file via browser to download all records as an Excel (.xls) file.
 */

include 'db_connect.php'; // Include the database connection file

//
// Set headers to force download as an Excel file
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=records_export.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Export Birth Records
$result = $connection->query("SELECT * FROM births");
echo "ID\tName of Child\tDate of Birth\tSex\tPlace of Birth\tName of Mother\tName of Father\tBirth Certificate Number\tDate of Registration\tPlace of Registration\tAmount Paid\tReceipt Number\tBirth Certificate\n";
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

// Export Death Records
$result = $connection->query("SELECT * FROM deaths");
echo "\nID\tName of Deceased\tName of Informant\tSex\tAge\tDate of Death\tCause of Death\tPlace of Death\tBurial Place\tAmount Paid\tReceipt Number\tDeath Certificate\n";
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

// Export Marriage Records
$result = $connection->query("SELECT * FROM marriages");
echo "\nID\tName of Groom\tName of Bride\tDate of Marriage\tPlace of Marriage\tMarriage Certificate Number\tAmount Paid\tReceipt Number\tMarriage Certificate\n";
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

// Export Dog Registration Records
$result = $connection->query("SELECT * FROM dogs");
echo "\nID\tDog Name\tBreed\tAge\tOwner Name\tOwner Contact\tRegistration Date\tVaccination Certificate\n";
while ($row = $result->fetch_assoc()) {
    echo $row['id'] . "\t" .
         $row['dog_name'] . "\t" .
         $row['breed'] . "\t" .
         $row['age'] . "\t" .
         $row['owner_name'] . "\t" .
         $row['owner_contact'] . "\t" .
         $row['registration_date'] . "\t" .
         $row['vaccination_certificate'] . "\n";
}

// Export Land Records
$result = $connection->query("SELECT * FROM land_records");
echo "\nID\tPlot No\tProperty Owner\tContact Number\tArea\tZone\tCouncil Documents\tMinistry Documents\tDate Created\n";
while ($row = $result->fetch_assoc()) {
    echo $row['id'] . "\t" .
         $row['plot_no'] . "\t" .
         $row['property_owner'] . "\t" .
         $row['contact_number'] . "\t" .
         $row['area'] . "\t" .
         $row['zone'] . "\t" .
         $row['council_documents'] . "\t" .
         $row['ministry_documents'] . "\t" .
         $row['date_created'] . "\n";
}

$connection->close();
?>