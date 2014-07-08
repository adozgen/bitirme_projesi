/*Starting of the functions used to eliminate or remove the spaces from the string in the beginning and ending of the string.*/
	function ltrim(s)
	{
		return s.replace(/^\s*/,"")
	}	
	function rtrim(s)
	{
		return s.replace(/\s*$/,"");
	}	
	function trim(s)
	{
		return rtrim(ltrim(s));
	}
/*Ending of the functions used to eliminate or remove the spaces from the string in the beginning and ending of the string.*/

//Empty Field Validation Start

function isEmpty(field,mes)
{	
	
	var val=document.getElementById(field).value;
	if(val=="")
	{
		alert(mes);
		document.getElementById(field).focus();
		return true;
	}
	else
	return false;
}

//space validation
function isSpace(field,msg)
{
	
	var val=document.getElementById(field).value;
	if(val.replace(/ /g,'').length==0  )
		{
			return_false(field,msg); 
			 return true;
		}
	else
	return false;
}
//Empty field validation End
function return_false(obj_nam,rtrn_msg){
	  alert(rtrn_msg);      
	  document.getElementById(obj_nam).select();
	  document.getElementById(obj_nam).focus();
	  return false;
}

//check numeric values validation
function Chk_Numeric(obj_nam,rtrn_msg,stat)    //Please Enter a Valid Product Price
{
	 var x=document.getElementById(obj_nam).value; 
	 
	 if(stat == 0)
		 var invalids = "`~@#$%^&*()_-+=\|{}[]:;'\"<>?";
	 if(stat == 1)
		 var invalids = "`~@#$%^&*()_-+=\|{}[]:;'\"<>.?";
	 if(stat == 2)
	 	 var invalids = "`~@#$%^&*()_-+=\|{}[]:;'\"<>,.?/";
	 if(stat == 3)
	 	 var invalids = "`~@#$%^&*()_-+=\|{}[]:;'\"<>,.?/1234567890";
		 
	 if(stat == 0 || stat == 1)
	 {
		 if(isNaN(x)==true)
		 {
			 return_false(obj_nam,rtrn_msg); 
			 return true;
		 }
	 }
	
		 for(i=0; i<invalids.length; i++) 
		 {    
				if(x.indexOf(invalids.charAt(i)) >= 0 || x==false)
				{
					return_false(obj_nam,rtrn_msg); 
					return true;
				}
		 }
		
		 return false;
}

//string validation
function chk_string(field,msg)
{
	var val=document.getElementById(field).value;
	for(i=0; i<val.length; i++) 
		 {    
			ascii=val.charCodeAt(i);
				if(!(ascii>=65&&ascii<=91||ascii>=97&&ascii<=122||ascii>=48&&ascii<=57))
				{
					return_false(field,msg); 
					return true;
				}
		 }
}

//Email Validation start

function checkemail(email)
{
	var val=document.getElementById(email).value;
	var regex = /^[a-zA-Z]{1}[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$/;
	if(regex.test(val)==0)
	{
		alert("Please enter valid Email Address");
		document.getElementById(email).select();
		document.getElementById(email).focus();
		return false;
	}
	else
	return true;;
}

//Email Validation End

//Change password Validation start

function Comp_Password(obj_nam1,obj_nam2,obj_nam3,rtrn_msg)           
{
  var x1=document.getElementById(obj_nam1).value;
  var x2=document.getElementById(obj_nam2).value;
  var x3=document.getElementById(obj_nam3).value;
	if(x1 == "")
	 return_false(obj_nam1,"Please enter your Old Password");
	else if(x2 == "")		
	  {
		return_false(obj_nam2,"Please enter your New Password");	
	  }
	else if(x2.length<6)
		return_false(obj_nam2,"New Password should contain minimum six characters");
	else if(x3 == "")		
	  return_false(obj_nam3,"Please enter your Confirm Password");		
	else if(x2!= x3)
	       return_false(obj_nam2,rtrn_msg);
	else
        return true;
}

//Change password validation end

//PhoneNumber Validation Start

var digits = "0123456789";
var phoneNumberDelimiters = "()- ";
var validWorldPhoneChars = phoneNumberDelimiters + "+";
var minDigitsInIPhoneNumber = 10;
function isInteger(phone)
{   
	var i;
	var s=document.getElementById(phone).value;
	for (i = 0; i < s.length; i++)
	{   
		// Check that current character is number.
	        var c = s.charAt(i);
        	if (((c < "0") || (c > "9")))
        	{
        		alert("Phone number should be Numbers");
         		return true;
         	}
    	}
    // All characters are numbers.
    return false;
}

//Phone Number Validation End

//ZipCode Validation Start

function validateZIP(zip)
{
	var field=document.getElementById(zip).value;
	var valid = "0123456789-";
	var hyphencount = 0;
	if (field.length!=5 && field.length!=10) 
	{
		alert("Please enter your 5 digit or 5 digit+4 zip code.");
		document.getElementById(zip).select();
		document.getElementById(zip).focus();
		return true;
	}
	for (var i=0; i < field.length; i++) 
	{
		temp = "" + field.substring(i, i+1);
		if (temp == "-") hyphencount++;
		if (valid.indexOf(temp) == "-1") 
		{
			alert("Invalid characters in your zip code.  Please try again.");
			return true;
		}
		if ((hyphencount > 1) || ((field.length==10) && ""+field.charAt(5)!="-")) 
		{
			alert("The hyphen character should be used with a properly formatted 5 digit+four zip code, like '12345-6789'.   Please try again.");
			return true;
   		}
	}
	return false;
}

//ZipCode Validation END

//Credit Card Validation Start

function validateCreditCard(cardno) 
{
	var s=document.getElementById(cardno).value;
	function cardval(s)
	{
		// remove non-numerics
		var v = "0123456789";
		var w = "";
		for (i=0; i < s.length; i++) 
		{
			x = s.charAt(i);
			if (v.indexOf(x,0) != -1)
			{
				alert("Invalid Number");
				w += x;
			}
		}
		// validate number
		j = w.length / 2;
		if (j < 6.5 || j > 8 || j == 7)
		{
			alert("InvalidCardNo.");
			return true;
		}
		k = Math.floor(j);
		m = Math.ceil(j) - k;
		c = 0;
		for (i=0; i<k; i++) 
		{
			a = w.charAt(i*2+m) * 2;
			c += a > 9 ? Math.floor(a/10 + a%10) : a;
		}
		for (i=0; i<k+m; i++) c += w.charAt(i*2+1-m) * 1;
			return (c%10 == 0);
	}
}



//Credit Card Validation End


//numbers validation start

function chk_num(field,msg)
{
	var val=document.getElementById(field).value;
	
	for(i=0; i<val.length; i++) 
		 {    
			ascii=val.charCodeAt(i);
				if(!(ascii>=48&&ascii<=57))
				{
					return_false(field,msg); 
					return true;
				}
		 }
}
function chk_numanddot(field,msg)
{
	var val=document.getElementById(field).value;
	
	for(i=0; i<val.length; i++) 
		 {    
			ascii=val.charCodeAt(i);
			
				if(!(ascii>=48&&ascii<=57||ascii==46))
				{
					return_false(field,msg); 
					return true;
				}
		 }
}


function twodigitcheck(field,msg)
{
	var val=document.getElementById(field).value;
	if(val!="")
	{
		
		var price1=val.split('.');
		var price2=price1[price1.length-1];
		if(price1.length>1)
		{
			if(price2.length>2)
			{	
				return_false(field,msg); 
					return true;
				
			}
		}
	}
}
function selectD(id,day)
{ 
	var num_of_days;
	var now = new Date();
	year=now.getYear();
	if(year%4==0)
		num_of_days=29;
	else
		num_of_days=28;

	if(id==2)
	{	
		var selbox = document.getElementById(day);
		document.getElementById(day).options.length = 0;
		selbox.options[selbox.options.length] = new Option('dd','');
		
		for(i=1;i<=num_of_days;i++)
		{
			selbox.options[selbox.options.length] = new Option(i,i);
		}
	}

	if(id==1 || id==3 || id==5 || id==7 || id==8 || id==10 || id==12)
	{
		var selbox = document.getElementById(day);
		document.getElementById(day).options.length = 0;
		selbox.options[selbox.options.length] = new Option('dd','');
		for(i=1;i<=31;i++)
		{
				selbox.options[selbox.options.length] = new Option(i,i);
		}
	}

	if(id==4 || id==6 || id==9 || id==11)
	{
		var selbox = document.getElementById(day);
		document.getElementById(day).options.length = 0;
		selbox.options[selbox.options.length] = new Option('dd','');
		for(i=1;i<=30;i++)
		{
				selbox.options[selbox.options.length] = new Option(i,i);
		}
	}	
}
