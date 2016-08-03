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
    INSERT INTO Comments (comID, description, com_date, userID, bugID) VALUES ('1', 'I had the same problem. It's hard to find them., '2016-07-19', '3', '1');
    INSERT INTO Comments (comID, description, com_date, userID, bugID) VALUES ('11', 'It's not very often when I forget to put curly braces but I usually forget to close them.', '2016-08-02', '5', '5');
    INSERT INTO Comments (comID, description, com_date, userID, bugID) VALUES ('21', 'I always forget the break statemnts.', '2016-07-24', '2', '3');
    INSERT INTO Comments (comID, description, com_date, userID, bugID) VALUES ('31', 'Some comment.', '2016-07-27', '2', '4');
    INSERT INTO Comments (comID, description, com_date, userID, bugID) VALUES ('41', 'Another comment.', '2016-08-04', '6', '5');
    INSERT INTO Comments (comID, description, com_date, userID, bugID) VALUES ('181', 'Comment...', '2016-07-31', '1', '6');
    INSERT INTO Comments (comID, description, com_date, userID, bugID) VALUES ('191', 'comment again...', '2016-08-01', '4', '7');
    INSERT INTO Comments (comID, description, com_date, userID, bugID) VALUES ('201', 'Comment here.', '2016-08-03', '6', '8');
    INSERT INTO Comments (comID, description, com_date, userID, bugID) VALUES ('211', 'Comments, comments, comments...', '2016-07-30', '1', '9');
";



if ($conn->query($sql) === TRUE){
    echo "Table Comments populated";
} else {
    echo "Error found creating table " . $conn->error;
}
$conn->close();
?>