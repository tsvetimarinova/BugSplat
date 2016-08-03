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
INSERT INTO Tags (tagID, tag_description) VALUES ('1', 'semicolon');
INSERT INTO Tags (tagID, tag_description) VALUES ('2', 'braces');
INSERT INTO Tags (tagID, tag_description) VALUES ('3', 'break-statement');
INSERT INTO Tags (tagID, tag_description) VALUES ('4', 'problem');
INSERT INTO Tags (tagID, tag_description) VALUES ('5', 'help');

";



if ($conn->query($sql) === TRUE){
    echo "Table Tags populated";
} else {
    echo "Error found creating table " . $conn->error;
}
$conn->close();
?>