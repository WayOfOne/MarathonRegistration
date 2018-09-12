/*  form.js modified from jadrn000
    Donglin Lao
    CS545 Fall 2016
    Project 2
*/    

// Copied from Jadrn000
    
    function isEmpty(fieldValue) {
        return $.trim(fieldValue).length == 0;    
        } 
    
     function isValidState(state) {                                
        var stateList = new Array("AK","AL","AR","AZ","CA","CO","CT","DC",
        "DE","FL","GA","GU","HI","IA","ID","IL","IN","KS","KY","LA","MA",
        "MD","ME","MH","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ",
        "NM","NV","NY","OH","OK","OR","PA","PR","RI","SC","SD","TN","TX",
        "UT","VA","VT","WA","WI","WV","WY");
        for(var i=0; i < stateList.length; i++) 
            if(stateList[i] == $.trim(state))
                return true;
        return false;
        }  

    // copied from stackoverflow.com, not checked or validated for correctness.        
    function isValidEmail(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
        }     

    // date checker from stackoverflow: http://stackoverflow.com/questions/8098202/javascript-detecting-valid-dates
    function isValidDate(month, day, year){
        var d = new Date(year, month-1, day);  
     
        if(day == d.getDate() && month == d.getMonth()+1 && year == d.getFullYear())
            return true;
        else
            return false;
    }  

    // taken from stackoverflow: http://stackoverflow.com/questions/4060004/calculate-age-in-javascript
    function getAge(month, day, year) { 
        var d = new Date(year, month-1, day);  
        var ageDiff = Date.now() - d.getTime();
        var ageDate = new Date(ageDiff); 
        return Math.abs(ageDate.getUTCFullYear() - 1970);
    }

    
function dup_handler(response) {
    if(response == "dup")
        $('#status').text("ERROR, duplicate. You've already registered. Please check your email.");
    else if(response == "OK") {
        $('form').serialize();
        $('form').submit();
        }
    else
        alert(response);
    }

              
$(document).ready( function() {
    var errorStatusHandle = $('#message_line');
    var elementHandle = new Array(16);
    elementHandle[0] = $('[name="fname"]');
    elementHandle[1] = $('[name="lname"]');
    elementHandle[2] = $('[name="address"]');
    elementHandle[3] = $('[name="city"]');
    elementHandle[4] = $('[name="state"]');
    elementHandle[5] = $('[name="zip"]');
    elementHandle[6] = $('[name="area_phone"]');
    elementHandle[7] = $('[name="prefix_phone"]');
    elementHandle[8] = $('[name="phone"]');
    elementHandle[9] = $('[name="email"]');
    
    elementHandle[10] = $('[name="gender"]');
    elementHandle[11] = $('[name="month"]');
    elementHandle[12] = $('[name="day"]');
    elementHandle[13] = $('[name="year"]');
    elementHandle[14] = $('[name="age_group"]');
    elementHandle[15] = $('[name="experience"]');
         
    function isValidData() {
        if(isEmpty(elementHandle[0].val())) {
            elementHandle[0].addClass("error");
            errorStatusHandle.text("Please enter your first name");
            elementHandle[0].focus();
            return false;
            }
        if(isEmpty(elementHandle[1].val())) {
            elementHandle[1].addClass("error");
            errorStatusHandle.text("Please enter your last name");
            elementHandle[1].focus();            
            return false;
            }
        if(isEmpty(elementHandle[2].val())) {
            elementHandle[2].addClass("error");
            errorStatusHandle.text("Please enter your address");
            elementHandle[2].focus();            
            return false;
            }
        if(isEmpty(elementHandle[3].val())) {
            elementHandle[3].addClass("error");
            errorStatusHandle.text("Please enter your city");
            elementHandle[3].focus();            
            return false;
            }
        if(isEmpty(elementHandle[4].val())) {
            elementHandle[4].addClass("error");
            errorStatusHandle.text("Please enter your state");
            elementHandle[4].focus();            
            return false;
            }
        if(!isValidState(elementHandle[4].val())) {
            elementHandle[4].addClass("error");
            errorStatusHandle.text("The state appears to be invalid, "+
            "please use the two letter state abbreviation");
            elementHandle[4].focus();            
            return false;
            }
        if(isEmpty(elementHandle[5].val())) {
            elementHandle[5].addClass("error");
            errorStatusHandle.text("Please enter your zip code");
            elementHandle[5].focus();            
            return false;
            }
        if(!$.isNumeric(elementHandle[5].val())) {
            elementHandle[5].addClass("error");
            errorStatusHandle.text("The zip code appears to be invalid, "+
            "numbers only please. ");
            elementHandle[5].focus();            
            return false;
            }
        if(elementHandle[5].val().length != 5) {
            elementHandle[5].addClass("error");
            errorStatusHandle.text("The zip code must have exactly five digits")
            elementHandle[5].focus();            
            return false;
            }
        if(isEmpty(elementHandle[6].val())) {
            elementHandle[6].addClass("error");
            errorStatusHandle.text("Please enter your area code");
            elementHandle[6].focus();            
            return false;
            }            
        if(!$.isNumeric(elementHandle[6].val())) {
            elementHandle[6].addClass("error");
            errorStatusHandle.text("The area code appears to be invalid, "+
            "numbers only please. ");
            elementHandle[6].focus();            
            return false;
            }
        if(elementHandle[6].val().length != 3) {
            elementHandle[6].addClass("error");
            errorStatusHandle.text("The area code must have exactly three digits")
            elementHandle[6].focus();            
            return false;
            }   
        if(isEmpty(elementHandle[7].val())) {
            elementHandle[7].addClass("error");
            errorStatusHandle.text("Please enter your phone number prefix");
            elementHandle[7].focus();            
            return false;
            }           
        if(!$.isNumeric(elementHandle[7].val())) {
            elementHandle[7].addClass("error");
            errorStatusHandle.text("The phone number prefix appears to be invalid, "+
            "numbers only please. ");
            elementHandle[7].focus();            
            return false;
            }
        if(elementHandle[7].val().length != 3) {
            elementHandle[7].addClass("error");
            errorStatusHandle.text("The phone number prefix must have exactly three digits")
            elementHandle[7].focus();            
            return false;
            }
        if(isEmpty(elementHandle[8].val())) {
            elementHandle[8].addClass("error");
            errorStatusHandle.text("Please enter your phone number");
            elementHandle[8].focus();            
            return false;
            }            
        if(!$.isNumeric(elementHandle[8].val())) {
            elementHandle[8].addClass("error");
            errorStatusHandle.text("The phone number appears to be invalid, "+
            "numbers only please. ");
            elementHandle[8].focus();            
            return false;
            }
        if(elementHandle[8].val().length != 4) {
            elementHandle[8].addClass("error");
            errorStatusHandle.text("The phone number must have exactly four digits")
            elementHandle[8].focus();            
            return false;
            }  
        if(isEmpty(elementHandle[9].val())) {
            elementHandle[9].addClass("error");
            errorStatusHandle.text("Please enter your email address");
            elementHandle[9].focus();            
            return false;
            }            
        if(!isValidEmail(elementHandle[9].val())) {
            elementHandle[9].addClass("error");
            errorStatusHandle.text("The email address appears to be invalid,");
            elementHandle[9].focus();            
            return false;
            }    

        // [10] gender
        if(!elementHandle[10].is(':checked')){
            elementHandle[10].addClass("error");
            errorStatusHandle.text("Please select your gender");
            elementHandle[10].focus();            
            return false;
            }
        //month
        if(isEmpty(elementHandle[11].val())) {
            elementHandle[11].addClass("error");
            errorStatusHandle.text("Please enter a month");
            elementHandle[11].focus();            
            return false;
            }
        if(elementHandle[11].val().length != 2) {
            elementHandle[11].addClass("error");
            errorStatusHandle.text("The month must have exactly two digits")
            elementHandle[11].focus();            
            return false;
            }

         if(!$.isNumeric(elementHandle[11].val())) {
            elementHandle[11].addClass("error");
            errorStatusHandle.text("The month appears to be invalid, "+"please enter numbers only. ");
            elementHandle[11].focus();            
            return false;
            }

        //day
        if(isEmpty(elementHandle[12].val())) {
            elementHandle[12].addClass("error");
            errorStatusHandle.text("Please enter a day");
            elementHandle[12].focus();            
            return false;
            }  
        if(!$.isNumeric(elementHandle[12].val())) {
            elementHandle[12].addClass("error");
            errorStatusHandle.text("The day appears to be invalid, "+"please enter numbers only. ");
            elementHandle[12].focus();            
            return false;
            }

         if(elementHandle[12].val().length != 2) {
            elementHandle[12].addClass("error");
            errorStatusHandle.text("The day must have exactly two digits")
            elementHandle[12].focus();            
            return false;
            }   

        //year 
        if(isEmpty(elementHandle[13].val())) {
            elementHandle[13].addClass("error");
            errorStatusHandle.text("Please enter a year");
            elementHandle[13].focus();            
            return false;
            }      

         if(elementHandle[13].val().length != 4) {
            elementHandle[13].addClass("error");
            errorStatusHandle.text("The year must have exactly four digits")
            elementHandle[13].focus();            
            return false;
            }   

        if(!$.isNumeric(elementHandle[13].val())) {
            elementHandle[13].addClass("error");
            errorStatusHandle.text("The year appears to be invalid, "+"please enter numbers only. ");
            elementHandle[13].focus();            
            return false;
            }

        if(!isValidDate(elementHandle[11].val(), elementHandle[12].val(), elementHandle[13].val())){
            elementHandle[11].addClass("error");
            elementHandle[12].addClass("error");
            elementHandle[13].addClass("error");
            errorStatusHandle.text("Please enter a valid birthday");
            elementHandle[13].focus();            
            return false;
        }


        if(getAge(elementHandle[11].val(), elementHandle[12].val(), elementHandle[13].val()) < 12){
            elementHandle[11].addClass("error");
            elementHandle[12].addClass("error");
            elementHandle[13].addClass("error");
            errorStatusHandle.text(" You appear to be too young to participate in this event.");
            elementHandle[13].focus();            
            return false;
        }

        if(getAge(elementHandle[11].val(), elementHandle[12].val(), elementHandle[13].val()) > 117){
            elementHandle[11].addClass("error");
            elementHandle[12].addClass("error");
            elementHandle[13].addClass("error");
            errorStatusHandle.text("You are the oldest person alive...Or perhaps you entered the wrong birthday?");
            elementHandle[13].focus();            
            return false;
        }

        if(!elementHandle[14].is(':checked')){
            elementHandle[14].addClass("error");
            errorStatusHandle.text("Please select your age group");
            elementHandle[14].focus();            
            return false;
            }

        if(!elementHandle[15].is(':checked')){
            elementHandle[15].addClass("error");
            errorStatusHandle.text("Please select a(n) experience level");
            elementHandle[15].focus();            
            return false;
            }

        return true;
        }       
//focus first field
   elementHandle[0].focus();
   
// taken from jadrn000
/////// HANDLERS

// on blur, if the user has entered valid data, the error message
// should no longer show.
    elementHandle[0].on('blur', function() {
        if(isEmpty(elementHandle[0].val()))
            return;
        $(this).removeClass("error");
        errorStatusHandle.text("");
        });
    
    elementHandle[1].on('blur', function() {
        if(!isEmpty(elementHandle[1].val())) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
        }
    });

    elementHandle[2].on('blur', function() {
        if(elementHandle[2].is(':checked')) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
        }
    });
    
    elementHandle[3].on('blur', function() {
        if(!isEmpty(elementHandle[3].val())) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
        }
    });
    elementHandle[5].on('blur', function() {
        if(!isEmpty(elementHandle[5].val())) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
        }
    });
    elementHandle[6].on('blur', function() {
        if(elementHandle[6].is(':checked')) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
        }
    });
    elementHandle[7].on('blur', function() {
        if(!isEmpty(elementHandle[7].val())) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
        }
    });
    elementHandle[8].on('blur', function() {
        if(!isEmpty(elementHandle[8].val())) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
        }
    });
    elementHandle[9].on('blur', function() {
        if(isEmpty(elementHandle[9].val()))
            return;
        if(isValidEmail(elementHandle[9].val())) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
            }
        });
     elementHandle[10].on('blur', function() {
        if(!isEmpty(elementHandle[8].val())){
            $(this).removeClass("error");
            errorStatusHandle.text("");
        }
    });

    elementHandle[10].on('blur', function() {
        if(isEmpty(elementHandle[10].val()))
            return;
        $(this).removeClass("error");
        errorStatusHandle.text("");
    });

    elementHandle[11].on('blur', function() {
        if(!isEmpty(elementHandle[11].val())) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
        }
    });
    elementHandle[12].on('blur', function() {
        if(!isEmpty(elementHandle[12].val())) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
        }
    });
    elementHandle[13].on('blur', function() {
        if(!isEmpty(elementHandle[13].val())) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
        }
    });
    elementHandle[14].on('blur', function() {
        if (isValidEmail(elementHandle[14].val())) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
        }
    });
    elementHandle[15].on('blur', function() {
        if(elementHandle[15].is(':checked')) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
        }
    });  

    elementHandle[11].on('blur', function() {
         if(isValidDate(elementHandle[11].val(), elementHandle[12].val(), elementHandle[13].val())) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
        }
    });  
    
    elementHandle[12].on('blur', function() {
         if(isValidDate(elementHandle[11].val(), elementHandle[12].val(), elementHandle[13].val())) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
        }
    });  

    elementHandle[13].on('blur', function() {
         if(isValidDate(elementHandle[11].val(), elementHandle[12].val(), elementHandle[13].val())) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
        }
    });  
/////////////////////////////////////////////////////////////////        

    elementHandle[4].on('keyup', function() {
        elementHandle[4].val(elementHandle[4].val().toUpperCase());
        });
        
    elementHandle[6].on('keyup', function() {
        if(elementHandle[6].val().length == 3)
            elementHandle[7].focus();
            });
            
    elementHandle[7].on('keyup', function() {
        if(elementHandle[7].val().length == 3)
            elementHandle[8].focus();
            });            
    elementHandle[11].on('keyup', function() {
        if(elementHandle[11].val().length == 2)
            elementHandle[12].focus();
            });
            
    elementHandle[12].on('keyup', function() {
        if(elementHandle[12].val().length == 2)
            elementHandle[13].focus();
            });            
        
    $(':reset').on('click', function() {
        for(var i=0; i < 16; i++)
            elementHandle[i].removeClass("error");
        errorStatusHandle.text("");
        }); 

   // $(':submit').on('click', function() {
   //      for(var i=0; i < 16; i++)
   //          elementHandle[i].removeClass("error");
   //      errorStatusHandle.text("");
   //      return isValidData();
   //      });
   
    $(':submit').on('click', function(e) {
        e.preventDefault();
        var params = "email="+$('#email').val();
        var url = "check_dup.php?"+params;
        $.get(url, dup_handler);
    });
    
                                        
});
