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

$sql = "CREATE TABLE Tags (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
tagID             CHAR ( 4 ) NOT NULL,
tag_description   VARCHAR ( 100 ) NOT NULL,
bugID             CHAR ( 4 )  NOT NULL,

CONSTRAINT pkTags PRIMARY KEY (tagID),
CONSTRAINT fk_bugID FOREIGN KEY (bugID) REFERENCES Bugs (bugID),

) ENDINE = MYISAM;
";


if ($conn->query($sql) === TRUE){
    echo "Table Users created";
} else {
    echo "Error found creating table " . $conn->error;
}

$conn->close();

?>
