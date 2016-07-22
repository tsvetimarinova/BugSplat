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
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('B001', 'Accidental semicolon ', 'for (i=0; i<numrows; i++)
  for (j=0; j<numcols; j++);
    pixels++;

Caused by a stray \";\" on line 2. Accidental bugs are often caused by stray characters, etc. While \"minor\" in their fix, they can be the devil to find!', 'U001');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('B002', 'Curly braces', 'Forgetting to put curly braces around the body of a loop or conditional statement, and wonder what's happening!

Ex:
while ( SomeCondition )
    Something(); SomeCondition = false;', 'U001');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('B003', 'Break-statement', 'Not actually a bug, but mistake: To forget to put break-statement after case-statement inside a switch-statement and not knowing it will fall-throug', 'U001');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('B004', '', '', 'U002');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('B005', '', '', 'U002');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('B006', '', '', 'U002');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('B007', '', '', 'U004');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('B008', '', '', 'U004');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('B009', '', '', 'U004');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('B010', '', '', 'U005');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('B011', '', '', 'U005');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('B012', '', '', 'U005');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('B013', '', '', 'U006');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('B014', '', '', 'U006');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('B015', '', '', 'U006');

";



if ($conn->query($sql) === TRUE){
    echo "Table Bugs populated";
} else {
    echo "Error found creating table " . $conn->error;
}
$conn->close();
?>