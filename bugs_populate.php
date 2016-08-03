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
INSERT INTO Bugs (bugID, bug_name, bug_description, userID, tagID, date) VALUES ('1', 'Accidental semicolon ', 'for (i=0; i<numrows; i++)
  for (j=0; j<numcols; j++);
    pixels++;

Caused by a stray \";\" on line 2. Accidental bugs are often caused by stray characters, etc. While \"minor\" in their fix, they can be the devil to find!', '1', '2', '2016-08-02');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('2', 'Curly braces', 'Forgetting to put curly braces around the body of a loop or conditional statement, and wonder what's happening!

Ex:
while ( SomeCondition )
    Something(); SomeCondition = false;', '1', '2', '2016-08-01);
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('3', 'Break-statement', 'Not actually a bug, but mistake: To forget to put break-statement after case-statement inside a switch-statement and not knowing it will fall-throug', '1'., '3', '2016-07-30);
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('4', 'Semicolon again', 'Some infromation about semicolons...', '6', '1', '2016-07-26');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('5', 'Find the bug', 'Some code that's not working should be here...', '2', '5', '2016-07-23');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('6', 'Problem in the code', 'Another problem in the code... Can you find it?', '1', NULL, '2016-07-27');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('7', 'Fixed the bug', 'The bug in the code is fixed and is working perfectly.', '4', '5', '2016-07-28');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('8', 'Semicolon', 'Another semicolon problem. Help, please!', '4', '1', '2016-07-26');
INSERT INTO Bugs (bugID, bug_name, bug_description, userID) VALUES ('9', 'Braces', 'I've missed braces somewhere. Help me find them, please!, '5', '2', '2016-08-01');

";



if ($conn->query($sql) === TRUE){
    echo "Table Bugs populated";
} else {
    echo "Error found creating table " . $conn->error;
}
$conn->close();
?>