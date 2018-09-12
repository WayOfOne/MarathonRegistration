<?php 
function get_Age($m,$d,$y){
        $dob = date("Y-m-d",strtotime($y."-".$m."-".$d));
        $dobObject = new DateTime($dob);
        $nowObject = new DateTime();
        $diff = $dobObject->diff($nowObject);

        return $diff->y;

}
function validate_data($params) {


     /* Birthday error checking */
    $age = get_Age($params[4],$params[5],$params[6]));
    $msg = "";
    if(strlen($params[0]) == 0)
        $msg .= "Please enter a first name<br />";  
    if(strlen($params[2]) == 0)
        $msg .= "Please enter a last name<br />";  
    if(strlen($params[3]) == 0)
        $msg .= "Please select a gender<br />"; 
    if(strlen($params[4]) == 0)
        $msg .= "Please enter the month<br />";
    elseif(!is_numeric($params[4])) 
        $msg .= "Month contain only numeric digits<br />";
    if(strlen($params[5]) == 0)
        $msg .= "Please enter the day<br />";
    elseif(!is_numeric($params[5])) 
        $msg .= "Day may contain only numeric digits<br />";
    if(strlen($params[6]) == 0)
        $msg .= "Please enter the year<br />"; 
    elseif(!is_numeric($params[6])) 
        $msg .= "Year may contain only numeric digits<br />";
    if($age < 12)
        $msg .= "You are too young to participate in this event<br />";
    if(strlen($params[7]) == 0)
        $msg .= "Please enter an address<br />";    
    if(strlen($params[9]) == 0)
        $msg .= "Please enter a city<br />";                        
    if(strlen($params[10]) == 0)
        $msg .= "Please select a state<br />";

    if(strlen($params[11]) == 0)
        $msg .= "Please enter a valid 5 digit zip code<br />";
    elseif(!is_numeric($params[11])) 
        $msg .= "Zip code may contain only numeric digits<br />";

    if(strlen($params[12]) == 0)
        $msg .= "Please enter an area code number<br />";
    elseif(!is_numeric($params[11])) 
        $msg .= "Area code may contain only numeric digits<br />";

    if(strlen($params[13]) == 0)
        $msg .= "Please enter a prefix phone number<br />";
    elseif(!is_numeric($params[11])) 
        $msg .= "Phone numbers may contain only numeric digits<br />";

    if(strlen($params[14]) == 0)
        $msg .= "Please enter phone number<br />";
    elseif(!is_numeric($params[11])) 
        $msg .= "Phone code may contain only numeric digits<br />";
    if(strlen($params[15]) == 0)
        $msg .= "Please enter email<br />";
    elseif(!filter_var($params[15], FILTER_VALIDATE_EMAIL))
        $msg .= "Your email appears to be invalid<br/>";    

    if(strlen($params[16]) == 0)
        $msg .= "Please select an age group<br />";
    if(strlen($params[17]) == 0)
        $msg .= "Please select an experience level<br />";
     if(strlen($params[18]) == 0)
        $msg .= "Please upload a profile picture<br />"; 
    if($msg) {
        write_form_error_page($msg);
        exit;
        }
    }
  
function write_form_error_page($msg) {
    write_header();
    echo "<h4>Sorry, an error occurred<br />",
    $msg,"</h4>";
    write_form();
    write_footer();
    }  
    
function write_form() {
print <<< ENDBLOCK
       <form  
            name="register_form"
            method="post" 
            enctype="multipart/form-data"
            action="process_request.php">
        
        <fieldset>
        <legend>Personal Information </legend> 

            <label for="first_name">*First Name:</label>
            <input type="text" name="fname" value="$_POST[fname]" size="25" autofocus/>           
           
            Middle Name:
            <input type="text" name="mname" value="$_POST[mname]" size="20"  /><br />
           
            <label for="last_name">*Last Name:</label>
            <input type="text" name="lname" value="$_POST[lname]" size="20" /><br />

            <label for="gender">*Gender:</label> 


ENDBLOCK;

$gend = array("male", "female");
    foreach($gend as $item) {
        $field = ucfirst($item);
        echo "<input type='radio' name='gender'  value='$item'";
        if($item == $_POST[gender])
            echo " checked='checked'";
        echo"/>$field";
    }

echo"<br />";

print<<< ENDBLOCK
            <label for="birthday">*Date of Birth:</label>
            mm<input type="text" name="month" size="2" maxlength="2" value="$_POST[month]"/>
            dd<input type="text" name="day" size="2" maxlength="2" value="$_POST[day]"/>
            yyyy<input type="text" name="year" size="4" maxlength="4" value="$_POST[year]"/><br />


            <label for="address">*Address:</label>
            <input type="text" name="address" size="50" value="$_POST[address]"/><br />

            <label for="address">&nbsp;</label>
            <input type="text" name = "address2" size="50" value="$_POST[address2]"/><br />

         
            <label for="city">*City:</label>
            <input type="text" name="city" size="20" value="$_POST[city]"/>
          
           *State:
            <select name ="state">


ENDBLOCK;

echo " <option value =$_POST[state] selected>$_POST[state]</option>";
print <<< ENDBLOCK
                <option value ="">Select State</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
                <option value="NO">NON-US</option>
            </select>

            *Zipcode:                                     
                <input type="text" name="zip" size="10" id="zip" value="$_POST[zip]"/><br />
            
    
            <label for="phone">*Primary Phone:</label>
            (<input type="text" name="area_phone" size="3" maxlength="3" placeholder="xxx" value="$_POST[area_phone]"/>)
            <input type="text" name="prefix_phone" size="3" maxlength="3" placeholder="xxx" value="$_POST[prefix_phone]"/>
            <input type="text" name="phone" size="4" maxlength="4" placeholder="xxxx" value="$_POST[phone]"/><br />
           
            <label for="email">*Email:</label>
            <input type="text" name="email" value="$_POST[email]"/>

    </fieldset>
                
    <fieldset>
            <legend>Marathon Information</legend>
            <label for="age_group">*Category:</label>   
ENDBLOCK;

    $choice = array("teen", "adult", "senior");
    foreach($choice as $item) {
        $field = ucfirst($item);
        echo "<input type='radio' name='age_group'  value='$item'";
        if($item == $_POST[age_group])
            echo " checked='checked'";
        echo"/>$field";
    }
    
    echo"<br /><br />";

    echo"<label for='experience'>*Experience:</label>";
    
    $exp = array("expert", "experienced", "novice");
    foreach($exp as $item) {
        $field = ucfirst($item);
        echo "<input type='radio' name='experience'  value='$item'";
        if($item == $_POST[experience])
            echo " checked='checked'";
        echo " />$field";
    }
    echo"<br /><br />";

print <<< ENDBLOCK

    <label for="picture">*Upload Image:</label>
    <input type="file" name="file" onblur="getname();"  value="$_POST[file]"/>


    <div id="condition">Medical Condition(s):</div>
    <textarea name="medical_condition" rows="4" cols="100"></textarea>


    <div id="status">&nbsp;</div>
    <div id="message_line">&nbsp;</div>
    <div class="buttons">
            <input type="reset" value = "Clear"/>
            <input type="submit" value="Submit" />
    </div>     

           
        <div id="back"><p><a href="index.html">Go Back to the Main page</a></p>
       </div>
          
     </fieldset>
    
          
          
        </form>   
   
    </div>
ENDBLOCK;
}                        

function process_parameters($params) {
    global $bad_chars;
    $params = array();
    $params[] = trim(str_replace($bad_chars, "",$_POST['fname']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['mname']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['lname']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['gender']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['month']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['day']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['year']));

    $params[] = trim(str_replace($bad_chars, "",$_POST['address']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['address2']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['city']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['state']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['zip']));

    $params[] = trim(str_replace($bad_chars, "",$_POST['area_phone']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['prefix_phone']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['phone']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['email']));

    $params[] = trim(str_replace($bad_chars, "",$_POST['age_group']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['experience']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['file']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['medical_condition']));
    return $params;
    }
    
function store_data_in_db($params) {
    # get a database connection
    $db = get_db_handle();  ## method in helpers.php
    ##############################################################
    $sql = "SELECT * FROM person WHERE "."email='$params[19]';";
##echo "The SQL statement is ",$sql;    
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0) {
        write_form_error_page('This record appears to be a duplicate');
        exit;
        }
##OK, duplicate check passed, now insert
    $sql = "INSERT INTO person(fname,mname,lname,gender,month,day,year,address,address2,city,state,zip,area_phone,prefix_phone,phone,email,category, experience,pic,medical_condition) ".
    "VALUES('$params[0]','$params[1]','$params[2]','$params[3]','$params[4]','$params[5]','$params[6]','$params[7]','$params[8]','$params[9]','$params[10]','$params[11]','$params[12]','$params[13]','$params[14]','$params[15]','$params[16]','$params[17]','$params[18]','$params[19]');";
##echo "The SQL statement is ",$sql;    
    mysqli_query($db,$sql);
    $how_many = mysqli_affected_rows($db);
    echo("There were $how_many rows affected");
    close_connector($db);
    }
        
?>   