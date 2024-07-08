<?php
$conn=mysqli_connect('localhost' , 'root' , '' , 'Hunger');
if(!$conn){
    echo mysqli_error($conn);
}else{
    
    $name = mysqli_escape_string($conn,$_POST['name']);
    $email = mysqli_escape_string($conn,$_POST['email']);
    $password = mysqli_escape_string($conn,$_POST['password']);
    $age = mysqli_escape_string($conn,$_POST['age']);
    $phone = mysqli_escape_string($conn,$_POST['phone']);
    $address = mysqli_escape_string($conn,$_POST['address']);

    $query="INSERT INTO register SET name='".$name."', email='".$email."',
    password='".$password."', age='".$age."', phoneNum='".$phone."', address='".$address."'; ";
    if(mysqli_multi_query($conn, $query)){
        echo "inserted data";
    }else{
        echo mysqli_error($conn);
 
    }
}
mysqli_close($conn);
?>