<?php

function execute($query){

    $conn= mysqli_connect('localhost','root','root','cbs',3307);

        $result = mysqli_query($conn,$query);
        mysqli_close($conn);

        return $result;
}
?>