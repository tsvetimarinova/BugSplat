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

$sql = "CREATE TABLE Users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userID    CHAR ( 4 ) NOT NULL,
    name      VARCHAR ( 20 ) NOT NULL,
    country   VARCHAR ( 10 ) NOT NULL,
    email     VARCHAR ( 30 ) NOT NULL,
    developer BIT,
    admin     BIT,
    privID    CHAR ( 4 )  NOT NULL,
    
    CONSTRAINT pkUser PRIMARY KEY (userID),
    CONSTRAINT fk_privID FOREIGN KEY (privID) REFERENCES Privileges (privID),
    
    ) ENDINE = MYISAM;
";


if ($conn->query($sql) === TRUE){
    echo "Table Users created";
} else {
    echo "Error found creating table " . $conn->error;
}

$conn->close();

?>