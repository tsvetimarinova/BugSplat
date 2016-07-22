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
INSERT INTO Tags (tagID, tag_description, bugID) VALUES ('T001', 'semicolon', 'B001');
INSERT INTO Tags (tagID, tag_description, bugID) VALUES ('T002', 'braces', 'B002');
INSERT INTO Tags (tagID, tag_description, bugID) VALUES ('T003', 'break-statement', 'B003');
INSERT INTO Tags (tagID, tag_description, bugID) VALUES ('T004', '', 'B004');
INSERT INTO Tags (tagID, tag_description, bugID) VALUES ('T005', '', 'B005');
INSERT INTO Tags (tagID, tag_description, bugID) VALUES ('T006', '', 'B006');
INSERT INTO Tags (tagID, tag_description, bugID) VALUES ('T007', '', 'B007');
INSERT INTO Tags (tagID, tag_description, bugID) VALUES ('T008', '', 'B008');

";



if ($conn->query($sql) === TRUE){
    echo "Table Tags populated";
} else {
    echo "Error found creating table " . $conn->error;
}
$conn->close();
?>