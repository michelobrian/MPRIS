CREATE TABLE births (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_of_child VARCHAR(100) NOT NULL,
    date_of_birth DATE NOT NULL,
    sex ENUM('M', 'F') NOT NULL,
    place_of_birth VARCHAR(255) NOT NULL,
    name_0f_mother VARCHAR(255) NOT NULL,
    name_of_father VARCHAR(255) NOT NULL,
    birth_certificate_number VARCHAR(50) NOT NULL,
    date_of_registration DATE NOT NULL,
    place_of_registration VARCHAR(255) NOT NULL,
    amount_paid DECIMAL(10, 2) NOT NULL,
    receipt_number VARCHAR(50) NOT NULL,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);