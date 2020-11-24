<?php
    $url_run = 'https://api.hackerearth.com/v3/code/run/'; 
    $url_compile = 'https://api.hackerearth.com/v3/code/compile/';
    $HAKCER_EA = array(
        'CLIENT_SECRET' => '8fd6facc526e20b8279d4723c2147e75367839cd',
        'time_limit' => '5',   //(OPTIONAL) Time Limit (MAX = 5 seconds )
        'memory_limit' => '262144',  //(OPTIONAL) Memory Limit (MAX = 262144 [25
    );

    $code_get = isset($_GET['code']) ? "ok" : "no";
    $c_file = fopen("fact.c","w+");
    fwrite($c_file,$_GET['code']);
    $MY_CONFIG = array(
        'time' => '5',
        'memory' => '262144',
        'file' => 'fact.c',
        'lang' => 'C',
        'input' => '4',
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
                'input' =>  $MY_CONFIG['input']//fread($input,filesize($MY_CONFIG['input']))
                )  
            )
        );

        return json_decode(curl_exec($curl),true);
    }

    var_dump(compile_code($HAKCER_EA,$MY_CONFIG));
    // var_dump(run_file($HAKCER_EA,$MY_CONFIG));

?>
