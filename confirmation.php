<!DOCTYPE html>
      

<!--    Donglin Lao   
        Account: jadrn021
        CS545, Fall 2016
        Project #3
--> 

<head>
    <title>Confirmation Page</title>
    <meta http-equiv="content-type" 
        content="text/html;charset=utf-8" />  
        <script type="text/javascript" src="http://jadran.sdsu.edu/jquery/jquery.js"></script>        
         <link rel="stylesheet" type="text/css" href="style.css" />

</style>
</head>
    
<body>
 
<?php
echo <<<ENDBLOCK
    <h1>$params[0], thank you for registering.</h1>
    <h1>Below are the information you provided:</h1>
    <table>
        <tr>
            <td>First Name</td>
            <td>$params[0]</td>
        </tr>
        <tr>
            <td>Middle Name</td>
            <td>$params[1]</td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td>$params[2]</td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>$params[3]</td>
        </tr>   
        <tr>
            <td>Birthday</td>
            <td>$params[4]/$params[5]/$params[6]</td>
        </tr>  
        <tr>
            <td>Address</td>
            <td>$params[7]</td>
        </tr>  
        <tr>
            <td>Address</td>
            <td>$params[8]</td>
        </tr>  
        <tr>
            <td>City</td>
            <td>$params[9]</td>
        </tr>  
        <tr>
            <td>State</td>
            <td>$params[10]</td>
        </tr>  
        <tr>
            <td>Zip Code</td>
            <td>$params[11]</td>
        </tr>   
        <tr>
            <td>Phone</td>
            <td>($params[12])$params[13]-$params[14]</td>
        </tr> 
        <tr>
            <td>Email</td>
            <td>$params[15]</td>
        </tr> 
        <tr>
            <td>Category</td>
            <td>$params[16]</td>
        </tr> 
        <tr>
            <td>Experience</td>
            <td>$params[17]</td>
        </tr> 
        <tr>
            <td>Profile Picture</td>
            <td>$params[18]</td>
        </tr> 
        <tr>
            <td>Medical Conditions</td>
            <td>$params[19]</td>
        </tr> 
    </table>                          
ENDBLOCK;


echo "<p>The raw query string that came from the browser is ",
    file_get_contents("php://input"),"</p>";

?>
  </body>    
</html>
