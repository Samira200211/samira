# 1st-Task


First, I created a simple form using Bootstrap icons for directions and customized them with CSS. I made sure to carefully design the form to be responsive across all devices.

Then, I created a database named "robotcontrol" that contains a single table named "actions." This table has two columns: one for the ID and one for the action.

![Database](imgs/actionsDB.png)

Then, connect the page to the database using this command
```php
$connect = new mysqli($servername, $username, $password, $dbname);
```
After That, I checked if a form was submitted via a POST request and if a specific field (action) was included in the form submission by writing this block of code:
```php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $action = $_POST['action'];
```
And then, I started inserting values into the database:
```php
$stmt = $connect->prepare("INSERT INTO actions (Action) VALUES (?)");
    $stmt->bind_param("s", $action); 
```
And then I redirected back to the same page :)
```php
if ($stmt->execute()) {
        header("Location: ControlPanel.php?status=success");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
```
Finally, closing the connection:
```php
$stmt->close();
$connect->close();
```

Same process in the second file "LastAction.php", but I retrieved the desired data using these commands:
```php

$sql = "SELECT action FROM actions ORDER BY id DESC LIMIT 1";
$result = $connect->query($sql);

$row = $result->fetch_assoc();
$lastAction = $row['action'];
$lastAction = htmlspecialchars($lastAction, ENT_QUOTES, 'UTF-8');
```
Here HTML code that displays the data fetched from DB:
```html
<h2 id="ac"><?php echo $lastAction ?></h2>
```
