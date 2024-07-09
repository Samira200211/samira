<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "robotcontrol"; 

$connect = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT action FROM actions ORDER BY id DESC LIMIT 1";
$result = $connect->query($sql);

$row = $result->fetch_assoc();
$lastAction = $row['action'];
$lastAction = htmlspecialchars($lastAction, ENT_QUOTES, 'UTF-8');
$connect->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://s-m.com.sa/smtc/td/assets/images/logo/sm.png">
    <title>Robot Control Panel - Last Action</title>

    <style>
        *{
        margin: 0;
        box-sizing: border-box;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .container{
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: #5BAC9B;
            width: 30%;
        }
        @media (max-width: 768px) {
            .container{
                width:90%;
            }
            h2{
                font-size:20px;
            }
        }
        #ac{
            color:#8F82DF;
            text-transform:uppercase;
        }
    </style>
</head>
<body>
            <div class="container">
                <h2>Last Action in DB: </h2>
                <h2 id="ac"><?php echo $lastAction ?></h2>
            </div>
</body>
</html>