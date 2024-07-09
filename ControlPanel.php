<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "robotcontrol"; 

$connect = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $action = $_POST['action'];

    $stmt = $connect->prepare("INSERT INTO actions (Action) VALUES (?)");
    $stmt->bind_param("s", $action); 

    if ($stmt->execute()) {
        header("Location: ControlPanel.php?status=success");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $connect->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://s-m.com.sa/smtc/td/assets/images/logo/sm.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <title>Robot Control Panel</title>

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
            flex-direction: column;
            align-items: center;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 30%;
        }
        @media (max-width: 768px) {
            .container{
                width: 90%;
            }
        }
        .mid {
            display: flex;
            justify-content: center;
        }
        .control-btn {
            background-color: #ffffff;
            color: #8F82DF;
            border: none;
            cursor: pointer;
            font-size: 55px;
        }
        .control-btn:hover{
            color:#5BAC9B;
        }
    </style>
</head>
<body>

    
    <form action="ControlPanel.php" method="post" class="container">
            <button class="control-btn" name="action" value="Forward" ><i class="bi bi-arrow-up-short"></i></button>
            <div class="mid">
                <button class="control-btn" name="action" value="Left"><i class="bi bi-arrow-left-short"></i></button>
                <button class="control-btn" name="action" value="Stop" ><i class="bi bi-stop-fill"></i></button>
                <button class="control-btn" name="action" value="Right" ><i class="bi bi-arrow-right-short"></i></button>
            </div>
            <button class="control-btn" name="action" value="Backward" ><i class="bi bi-arrow-down-short"></i></button>
        
    </form>
</body>
</html>