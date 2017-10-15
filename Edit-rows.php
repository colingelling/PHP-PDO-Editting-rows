<?php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); ?>
<?php
    
    if(isset($_POST['update']))
    {
        try {
        $pdoConnect = new PDO("mysql:host=localhost;dbname=testpdo","root","");
        } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
        }
    
        $id = $_POST['id'];
        $name = $_POST['name'];

        $query = "UPDATE `testpdo` SET `name`=:name WHERE `id` = :id";
    
        $pdoResult = $pdoConnect->prepare($query);
    
        $pdoExec = $pdoResult->execute(array(":name"=>$name,":id"=>$id));
    
        if($pdoExec)
        {
        echo 'Success, data saved. Look in your database.';
        }else{
        echo 'Error, data not saved. There must be a problem with the code or the database credentials.';
        }

}
    
?>
<html>
<head>
</head>
<body>
    
    <form action="Edit-rows.php" method="post">
        <input type="text" name="id" placeholder="ID"><input type="text" name="name" placeholder="Name"><input type="submit" name="update">
    </form>
    
</body>


</html>
