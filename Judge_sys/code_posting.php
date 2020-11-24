<?php
    include 'connection/connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
    <title>post_code</title>

    <link rel="stylesheet" href="bootstrap-4.4.1-dist/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href= "tools/index.css">
    </head>
    <body>
        <form method = "post" action= "#" enctype = "multipart/form-data">
            <input type= "text" name  ="title" placeholder="title">
            <br><br>
            <textarea name = "content" id="editor">
            </textarea>
            <!-- choose fields -->
            <select name = "fields" onchange = "showlang(this.value)">
                <option value="0">choose field</option>
                <?php 
                    $field = $conn->query("SELECT * FROM fields");
                    while($row = $field->fetch_array(MYSQLI_ASSOC)):
                ?>
                <option value = <?php echo $row['field_id'];?> ><?php echo $row['field_name'] ?></option>
                <?php endwhile; ?>       
            </select>
            <br>
            <!-- choose language -->
            <div id = "lang_field">
            
            </div>
            <!--
            <select name= "lang"> 
                <option selected>choose language</option>
                <?php
                    $result = $conn->query("select * from languages");
                    while($row = $result->fetch_array(MYSQLI_ASSOC)):
                ?>   
                <option><?php //echo$row['lang_name']; ?></option>
                <?php endwhile; ?>
            </select>
            -->
            <br>
            <input type = "text" name = "input" placeholder="input"><br>
            <input type= "text" name = "output" placeholder="output">
            <br>
            upload problem file
            <input type = "file" name = "prb_desc_file" value = "upload problem file">
            <br>
            upload input file
            <input type  = "file" name = "input_file" value = "upload input file">
            <br>
            upload outout file
            <input type = "file" name = "output_file" value = "upload outout file">
            <br>
            upload init files
            <input name = "init[]"  type = "file" multiple="multiple">
            <br>
            <input type = "submit" name = "submit" value= "submit">

        

        </form>
        <script src="ckeditor/ckeditor.js"></script>
        <script>
            ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    

    function showlang(field_id)
    {
        console.log(field_id);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("lang_field").innerHTML = this.responseText;
               // console.log(this.responseText);
            }
        };
        xmlhttp.open("GET", "prob_filtre.php?field_id=" + field_id, true);
        xmlhttp.send();

    }
        </script>
    </body>
</html>

<?php

    // ajax request
    //$field_id = isset($_GET['field_id']) ? $_GET['field_id'] : "oe";
    //echo $_GET['field_id'];  
   
    if(isset($_POST['submit']))
    {
        $title = $_POST['title'];
        $desc = isset($_POST['content']) ? $_POST['content'] : "problem data in the path";
        $input = isset($_POST['input']) ? $_POST['input'] : "problem data in the path";
        $output = isset($_POST['output']) ? $_POST['output'] : "problem data in the path";
        //$lang = $_POST['type'];
        $filed = $_POST['fields'];
        $lang_id = $_POST['lang'];
        $desc_data_insert = $conn->real_escape_string($desc);
        $query = "INSERT INTO problems(pr_title,pr_description,pr_input,pr_output) values('$title','$desc_data_insert','$input','$output')";
        $exec = $conn->query($query);
        $pr_id = $conn->insert_id;
        $exp = explode(" ",$title);
        $folder_format = implode("_",$exp)."_".$pr_id;
        $update_path = "UPDATE problems SET path = 'uploaded/problems_items/$folder_format' WHERE pr_id = $pr_id" ;
        $exec = $conn->query($update_path);
        $select_lang = "SELECT lang_name FROM languages WHERE lang_id = $lang_id";
        $exec_select_lang = $conn->query($select_lang);
        $row = $exec_select_lang->fetch_array();
        $insert_in_lang = "INSERT INTO prob_lang_set(pr_id,lang_id,pb_title,lang_name) values($pr_id,$lang_id,'$title','{$row[0]}')";
        $execute = $conn->query($insert_in_lang);   
        if(!$execute)
        {
            die("error".mysqli_error($conn));
        }
        if(!$exec)
        {
            echo "".mysqli_error($conn);
        }
       
        //echo $_FILES["prb_desc_file"]["name"]."<br>";
        //echo basename("path/to/folder/file.exe")."<br>";
        
       // print_r($_FILES['prb_desc_file']);
        //print_r($_FILES['input_file']);
        //print_r($_FILES['output_file']);
        //print_r($_FILES['init']);
        
        $titles = array();
        //exec("cd uploaded/problems_items/ && mkdir checkin");
        
        if(!in_array($folder_format,$titles))
        {
            $titles[] = $folder_format;
            exec("cd uploaded/problems_items/ && mkdir ".$folder_format);
     
            
            move_uploaded_file($_FILES['prb_desc_file']['tmp_name'],"uploaded/problems_items/".$folder_format."/".basename($_FILES['prb_desc_file']['name']));
            move_uploaded_file($_FILES['input_file']['tmp_name'],"uploaded/problems_items/".$folder_format."/".basename($_FILES['input_file']['name']));
            move_uploaded_file($_FILES['output_file']['tmp_name'],"uploaded/problems_items/".$folder_format."/".basename($_FILES['output_file']['name']));
            $total_init  = count($_FILES['init']['name']);
            $i = 0;
            for($i == 0;$i < $total_init;$i++)
            {
                // if(!file_exists($_FILES['init']['tmp_name'][$i]) || !is_uploaded_file($_FILES['init']['tmp_name'][$i]))
                // {
                    move_uploaded_file($_FILES['init']['tmp_name'][$i],"uploaded/problems_items/".$folder_format."/".basename($_FILES['init']['name'][$i])); 
                //}
            }
            
        }else{
            echo "the folder already exists"."<br>";
        }
    
        //  unset($title);
       
        // if(!file_exists($_FILES['prb_desc_file']['tmp_name']) || !is_uploaded_file($_FILES['prb_desc_file']['tmp_name']))
        // {
            // move_uploaded_file($_FILES['prb_desc_file']['tmp_name'],"uploaded/".$folder_format."/".basename($_FILES['prb_desc_file']['name']));

        // }else if(!file_exists($_FILES['input_file']['tmp_name']) || !is_uploaded_file($_FILES['input_file']['tmp_name']))
        // {
          //   move_uploaded_file($_FILES['input_file']['tmp_name'],"uploaded/".$folder_format."/".basename($_FILES['input_file']['name']));

        // }else if(!file_exists($_FILES['output_file']['tmp_name']) || !is_uploaded_file($_FILES['output_file']['tmp_name']))
        // {
        //     move_uploaded_file($_FILES['output_file']['tmp_name'],"uploaded/".$folder_format."/".basename($_FILES['output_file']['name']));
        // }else{
        //    echo "files already uploaded"."<br>";
        // }

        
    }
?>