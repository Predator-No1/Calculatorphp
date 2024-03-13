<?php
session_start();

if($_GET)
{
    if($_GET['btn'] != "-" && $_GET['btn'] != "+" && $_GET['btn'] != "*" && $_GET['btn'] != "/" && $_GET['btn'] != "C" && $_GET['btn'] != "+/-" && $_GET['btn'] != "=" )
    {
    
        $_SESSION['screen'] = (int)($_SESSION['screen'].$_GET['btn']);
    }
    else
    {
        if($_GET['btn']== "+")
        {
            $_SESSION['op'] = "+";
            $_SESSION['oldnum'] = $_SESSION['screen'];
            $_SESSION['screen'] = 0;
        }
        if($_GET['btn']== "-")
        {
            $_SESSION['op'] = "-";
            $_SESSION['oldnum'] = $_SESSION['screen'];
            $_SESSION['screen'] = 0;
        }
        if($_GET['btn']== "*")
        {
            $_SESSION['op'] = "*";
            $_SESSION['oldnum'] = $_SESSION['screen'];
            $_SESSION['screen'] = 0;
        }
        if($_GET['btn']== "/")
        {
            $_SESSION['op'] = "/";
            $_SESSION['oldnum'] = $_SESSION['screen'];
            $_SESSION['screen'] = 0;
        }
        if($_GET['btn']== "+/-")
        {
            $_SESSION['screen'] =$_SESSION['screen'] *-1;
        }

        if($_GET['btn']== "C")
        {
            unset($_SESSION['oldnum']);
            unset($_SESSION['screen']);
            $_SESSION['screen'] = 0;
        }
        if($_GET['btn']== "=")
        {
            switch($_SESSION['op'])
            {
                case "+":
                    $_SESSION['screen'] = $_SESSION['oldnum'] + $_SESSION['screen'];
                    unset($_SESSION['oldnum']);
                    break;
                case "-":
                    $_SESSION['screen'] = $_SESSION['oldnum'] - $_SESSION['screen'];
                    unset($_SESSION['oldnum']);
                    break;
                case "*":
                    $_SESSION['screen'] = $_SESSION['oldnum'] * $_SESSION['screen'];
                    unset($_SESSION['oldnum']);
                    break;
                case "/":
                    $_SESSION['screen'] = $_SESSION['oldnum'] / $_SESSION['screen'];
                    unset($_SESSION['oldnum']);
                    break;
            }
            
        }
    }
    
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        input {
    width: 98%;
    border-radius: 25px;
    text-align: center;
    background-color: lightblue;
    font-weight: bolder;
    
    
}
td{
    border-radius: 25px;
    background-color: grey;

}
#screen{
    text-align: right;
    background-color: grey;
    font-size: 16px;
    padding-right: 5px;
}
#screen:hover{
    color: black;
}
input:hover{
    background-color: indigo;
    color: white;
}
table
{
    margin-top: 100px;
    background-color: darkorchid;
    border-radius: 18px;
    border-color: black;
    font-weight: bold;
}
body{
    background-color: grey;
}
    </style>
</head>
<body>

<form  method="get">
    <center><table border="2">
        <tr>
            <td colspan="4"><input id="screen" type="text" value = "<?php echo $_SESSION['screen']; ?>"></td>
        </tr>
        <tr>
            <td><input type="submit" value="C" name='btn'></td>
            <td><input type="submit" value="+/-" name='btn'></td>
            <td><input  type="submit" value="/" name='btn'></td>
            <td><input type="button" value="O/I" name='btn'></td>
        </tr>
        <tr>
            <td><input type="submit" value="7" name='btn'></td>
            <td><input type="submit" value="8" name='btn'></td>
            <td><input type="submit" value="9" name='btn'></td>
            <td><input type="submit" value="*" name='btn'></td>
        </tr>
        <tr>
            <td><input type="submit" value="4" name='btn'></td>
            <td><input type="submit" value="5" name='btn'></td>
            <td><input type="submit" value="6" name='btn'></td>
            <td><input type="submit" value="-" name='btn'></td>
        </tr>
        <tr>
            <td><input type="submit" value="1" name='btn'></td>
            <td><input type="submit" value="2" name='btn'></td>
            <td><input type="submit" value="3" name='btn'></td>
            <td><input type="submit" value="+" name='btn'></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="0" name='btn'></td>
            <td><input type="submit" value="." name='btn'></td>
            <td><input type="submit" value="=" name='btn'></td>
        </tr>
    </table></center>
</form>
    
</body>
</html>