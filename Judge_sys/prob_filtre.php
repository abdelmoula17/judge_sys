<?php
    include 'connection/connect.php';

    $field_id =  isset($_GET['field_id']) ? $_GET['field_id'] : (int)"0";
    if($field_id != 0)
    {
        $query = "SELECT * FROM lang_field INNER JOIN languages ON lang_field.field_id = $field_id AND languages.lang_id = lang_field.lang_id ";
        $result = $conn->query($query);
        if(!$result)
        {
            die("error".mysqli_error($conn));
        }
        echo "<select name='lang'>";
        while($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            echo "<option value={$row['lang_id']}> {$row['lang_name']} </option>";
        }
        echo  "</select>";
    }   
?>