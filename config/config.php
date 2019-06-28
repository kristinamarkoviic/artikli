<?php

    

    define("ABSOLUTH_PATH",$_SERVER['DOCUMENT_ROOT']."/hueman/");

    define("ENV_FAJL",ABSOLUTH_PATH."/config/.env");
    define("SERVER",env("SERVER"));
    define("DBNAME",env("DBNAME"));
    define("USERNAME",env("USERNAME"));
    define("PASSWORD",env("PASSWORD"));

    function env($parametar){
        $data = file(ENV_FAJL);
        $values="";
        foreach($data as $key=>$value){
            $config=explode("=",$value);
            
            if($config[0]==$parametar){
                $values=trim($config[1]);
            }
        }
        return $values;
    }

?>