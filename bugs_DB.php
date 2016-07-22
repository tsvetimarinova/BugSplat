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

/*Creates sql table*/

$sql = "CREATE TABLE Bugs (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
bugID               CHAR ( 4 ) NOT NULL,
bug_name            VARCHAR ( 50 ) NOT NULL,
bug_ description    VARCHAR ( 100 ) NOT NULL,
userID              CHAR ( 4 ) NOT NULL,

CONSTRAINT pkBugs PRIMARY KEY (bugID),
CONSTRAINT fk_userID FOREIGN KEY (userID) REFERENCES Users (userID),

) ENDINE = MYISAM;
";


if ($conn->query($sql) === TRUE){
    echo "Table Users created";
} else {
    echo "Error found creating table " . $conn->error;
}

$conn->close();

?>