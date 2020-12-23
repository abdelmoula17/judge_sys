<?php
    session_start();
    $url_run = 'https://api.hackerearth.com/v3/code/run/'; 
    $url_compile = 'https://api.hackerearth.com/v3/code/compile/';
    $HAKCER_EA = array(
        'CLIENT_SECRET' => '8fd6facc526e20b8279d4723c2147e75367839cd',
        'time_limit' => '5',   //(OPTIONAL) Time Limit (MAX = 5 seconds )
        'memory_limit' => '262144',  //(OPTIONAL) Memory Limit (MAX = 262144 [25
    );

    $code_get = isset($_GET['code']) ? "ok" : "no";

    $input_path = "../../".$_SESSION["path"]."/input.txt";
 
    $c_file = fopen("compiled_code.c","w+");
    fwrite($c_file,$_GET['code']);
    $MY_CONFIG = array(
        'time' => '5',
        'memory' => '262144',
        'file' => 'compiled_code.c',
        'lang' => 'C',
        'input' => $input_path,
    );

    

    function httppost_compile($MY_CONFIG,$HAKCER_EA)   
    {
        $url_compile = 'https://api.hackerearth.com/v3/code/compile/';
        $source = fopen($MY_CONFIG['file'],"r") or die("unable to open file");
        $input = fopen($MY_CONFIG['input'],"r") or die("unabel to open file");

        $curl = curl_init();
        curl_Setopt_array(
            $curl,array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url_compile,
                CURLOPT_POST => 1,
                CURLOPT_SSL_VERIFYPEER => 'true',
                CURLOPT_ENCODING => 'UTF-8',
                CURLOPT_POSTFIELDS => array(
                'client_secret' => $HAKCER_EA['CLIENT_SECRET'],
                'time_limit' => $HAKCER_EA['time_limit'],
                'memory_limit'=>$HAKCER_EA['memory_limit'],
                'source' => fread($source,filesize($MY_CONFIG['file'])),
                'lang' => $MY_CONFIG['lang'],
                'input'=> $MY_CONFIG['input']//fread($input,filesize($MY_CONFIG['input'])),
                )   
            )
        );

        return json_decode(curl_exec($curl),true);
    }

    
    // .... compiling the code
    function compile_code($HAKCER_EA,$MY_CONFIG)
    {
        httppost_compile($MY_CONFIG,$HAKCER_EA);      
    }
    // ... running the ocde
    function run_file($HAKCER_EA,$MY_CONFIG){
        $url_run = 'https://api.hackerearth.com/v3/code/run/'; 
        $source = fopen($MY_CONFIG['file'],"r") or die("unable to open file");
        $input =  fopen($MY_CONFIG['input'],"r") or die("unable to open file");
	$curl = curl_init();
        curl_Setopt_array(
            $curl,array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url_run,
                CURLOPT_POST => 1,
                CURLOPT_SSL_VERIFYPEER => 'true',
                CURLOPT_ENCODING => 'UTF-8',
                CURLOPT_POSTFIELDS => array(
                'client_secret' => $HAKCER_EA['CLIENT_SECRET'],
                'time_limit' => $HAKCER_EA['time_limit'],
                'memory_limit'=>$HAKCER_EA['memory_limit'],
                'source' => fread($source,filesize($MY_CONFIG['file'])),
                'lang' => $MY_CONFIG['lang'],
                'input' => fread($input,filesize($MY_CONFIG['input']))
                )  
            )
        );

        return json_decode(curl_exec($curl),true);
    }

    compile_code($HAKCER_EA,$MY_CONFIG);
    $run_file = run_file($HAKCER_EA,$MY_CONFIG);
    //print_r($run_file);
    $challenger_out  = explode("<br>",$run_file["run_status"]["output_html"]);
    $i = 0;
    $locked_out = 2;
    if($run_file["compile_status"] == "OK")
    {
        while($i < count($challenger_out) - 1)
        {
            $lock_test = $i > 1 ? "lock.png": "unlock.png";
            if($challenger_out[$i] == $_SESSION["out_values"][$i])
            {    
                
                echo '<div class = "col-sm" id = "test_row" border>';
                    echo '<div style = "color:green;font-weight:bold" >Test '. $i . '</div>';
                    echo '<div><img style="width:32px;height:32px"src= "code_run/check.png"></div>';
                    echo "<div><img style='width:32px;height:32px'src= 'code_run/$lock_test'></div>";
                echo '</div>';
                echo '<div class = "col-sm">';
                    echo '<div style="color:black;font-weight:bold">Intput : </div>';
                    echo '<div id = "result">'.$_SESSION["inp_values"][$i]. '</div>';  
                    echo '<div style="color:black;font-weight:bold">your output : </div>';
                    echo '<div id = "result">'.$challenger_out[$i]. '</div>';      
                    echo '<div style="color:black;font-weight:bold">expected output : </div>';
                    echo '<div id = "result">'.$_SESSION["out_values"][$i]. '</div>';
                echo '</div>';
            }else{
                echo '<div class = "col-sm" id = "test_row">';
                    echo '<div style = "color:red;font-weight:bold" >Test '. $i . '</div>';
                    echo '<div><img style="width:32px;height:32px"src= "code_run/uncheck.png"></div>';
                    echo "<div><img style='width:32px;height:32px'src= 'code_run/$lock_test'></div>";   
                echo '</div>';
                echo '<div class = "col-sm">';
                    echo '<div style="color:black;font-weight:bold">Intput : </div>';
                    echo '<div id = "result">'.$_SESSION["inp_values"][$i]. '</div>';  
                    echo '<div style="color:black;font-weight:bold">your output : </div>';
                    echo '<div id = "result">'.$challenger_out[$i]. '</div>';      
                    echo '<div style="color:black;font-weight:bold">expected output : </div>';
                    echo '<div id = "result">'.$_SESSION["out_values"][$i]. '</div>';
                echo '</div>';
            }
            $i++;
        }
    }else
    {   
        echo '<div class = "col-sm" id = "test_row">';
            echo '<div style = "color:block;font-weight:bold;font_size:27" >Test '. $run_file["compile_status"] . '</div>';
        echo '</div>';
    }

    print_r($challenger_out);
    echo "<br>";
    print_r($_SESSION["out_values"][0]);


?>
