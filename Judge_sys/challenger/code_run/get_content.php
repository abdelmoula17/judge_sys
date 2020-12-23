<?php
    session_start();
    $get_lang = isset($_GET['lang']) ? strtolower($_GET["lang"]) : "undefined";
    $path = $_SESSION["path"];
    $path_to_file = "../../".$path;
    $file_to_get = "init_".$get_lang.".txt";
    $full_path = $path_to_file."/".$file_to_get;
    //echo basename($full_path);
    $fp = fopen($full_path,"r");
    while(!feof($fp))
    {
        $line = fgets($fp);
        echo $line;
    }
?>