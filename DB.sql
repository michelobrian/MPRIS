CREATE TABLE deaths (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_of_deceased VARCHAR(100) NOT NULL,
    name_of_informant VARCHAR(100) NOT NULL,
    sex ENUM('M', 'F') NOT NULL,
    age_of_deceased INT NOT NULL,
    date_of_death DATE NOT NULL,
    cause_of_death VARCHAR(255) NOT NULL,
    place_of_death VARCHAR(255) NOT NULL,
    burial_place VARCHAR(255) NOT NULL,
    amount_paid DECIMAL(10, 2) NOT NULL,
    receipt_number VARCHAR(50) NOT NULL,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);