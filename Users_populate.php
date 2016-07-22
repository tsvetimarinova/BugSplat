<?php
$conn = new mysqli(
    "us-cdbr-azure-west-c.cloudapp.net",
    "b4bbf8767a3b3c",
    "7ae9ed4b",
    "databasebug1300608"
);
/*Establishes connection*/
//$conn - newmysqli($srevername, $username, $password, $dbname);
/*Connection check*/
if ($conn->connect_error){
    die("Connection has failed " . $conn->connect_error);
}
/*Populates sql table*/
$sql = "
INSERT INTO Users (userID, name, email, country, developer, admin) VALUES ('U001', 'Tsvetoslava Marinova', 'tsvetoslavka@abv.bg', 'Bulgaria', '1', '1', 'PR01');
INSERT INTO Users (userID, name, email, country, developer, admin) VALUES ('U002', 'Hristina Dimitrova', 'h.v.dimitrova@gmail.com', 'Bulgaria', '1', '0', 'PR01');
INSERT INTO Users (userID, name, email, country, developer, admin) VALUES ('U003', 'Georgi Parapanov', 'g.parapanov@gmail.com', 'Germany', '0', '1', 'PR01');
INSERT INTO Users (userID, name, email, country, developer, admin) VALUES ('U004', 'Konstantin Velchevski', 'k.vel@gmail.com', 'USA', '1', '0', 'PR01');
INSERT INTO Users (userID, name, email, country, developer, admin) VALUES ('U005', 'Martin Petrov', 'm.petrov@gmail.com', 'Egypt', '1', '0', 'PR01');
INSERT INTO Users (userID, name, email, country, developer, admin) VALUES ('U006', 'Vasil Mitsev', 'v.p.mitsev@gmail.com', 'Australia', '1', '0', 'PR01');
";



if ($conn->query($sql) === TRUE){
    echo "Table Users populated";
} else {
    echo "Error found creating table " . $conn->error;
}
$conn->close();
?>