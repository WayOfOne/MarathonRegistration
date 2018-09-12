<?php

$bad_chars = array('$','%','?','<','>','php');

function check_post_only() {
if(!$_POST) {
    write_error_page("This scripts can only be called from a form.");
    exit;
    }
}

function write_error_page($msg) {
    write_header();
    echo "<h4>Sorry, an error occurred<br />",
    $msg,"</h4>";
    write_footer();
    }
    
function write_header() {
print <<<ENDBLOCK
<!DOCTYPE html>
<head>
    <title>SDSU Marathon</title>
    <meta http-equiv="content-type" 
        content="text/html;charset=utf-8" />  
        <link rel="stylesheet" type="text/css" href="proj2.css" />    
         <script type="text/javascript" src="http://jadran.sdsu.edu/jquery/jquery.js"></script>        
         <script type="text/javascript" src="form.js"></script>             
</head>
<body>  

 <img id="logo" src="images/sdsu_logo.gif" alt="SDSU Logo" width="1043">
    <div class ="main">
        <h1>Marathon Registration</h1>
        <p id="req">* Indicates required field</p> 
ENDBLOCK;
}

function write_footer() {
    echo "</body></html>";
    }
    
function get_db_handle() {
    ########################################################
    # DO NOT USE jadrn000, DO NOT MODIFY jadnr000 DATABASE!
    ########################################################            
    $server = 'opatija.sdsu.edu:3306';
    $user = 'jadrn021';
    $password = 'chair';
    $database = 'jadrn021';   
    ########################################################
        
    if(!($db = mysqli_connect($server, $user, $password, $database))) {
        write_error_page('SQL ERROR: Connection failed: '.mysqli_error($db));
        }
    return $db;
    }        
       
function close_connector($db) {
    mysqli_close($db);
    }
    
?>