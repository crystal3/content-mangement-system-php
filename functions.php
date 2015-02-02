<?php 
	//checking validation-empty
   
function _fv($item1,$type)
{
  $item = trim($item1);
  
  //  
  if ($type=='fname')   
   {
     
   $errors = ""; 
   if (empty($item)) $errors .=">>Must not be blank"; 
   if ( (!empty($item)) && 
   (!preg_match('/^[A-Za-z]/', $item))) $errors .=">>Must be string"; 
   
    return $errors;
   }
   
   if ($type=='lname')   
   {
   $errors = ""; 
   if (empty($item)) $errors .=">>Must not be blank"; 
   if ( (!empty($item)) && 
   (!preg_match('/^[A-Za-z]/', $item))) 
      $errors .=">> Must be string"; 
    return $errors;
   }
   
   
  if ($type=='address') 
   {
   $errors = ""; 
    
   if (empty($item)) $errors .=">>Must not be blank"; 
   
      
       return $errors;
   }
  
  if ($type=='suburb')   
   {
   $errors = "";
   if (empty($item)) $errors .=">>Must not be blank"; 
   if ( (!empty($item)) && (!preg_match('/^[A-Za-z]/', $item)))
     $errors .=">>Must be String"; 
    return $errors;
   }
  
  if ($type=='state')   
   {
    $errors = "";
   if (empty($item)) $errors .=">>Must not be blank "; 
   if (!empty($item)   && (!preg_match('/^[A-Za-z]/', $item))) 
        $errors .=">>must string";
   
   if (!empty($item)  &&  strlen($item) < 2) 
	  $errors .=">>Lenght error,must be greater than 2";
	 return $errors;					  
   }
   if ($type=='postcode')   
   {
   $errors = ""; 
   if (empty($item)) $errors .=">>Must not be blank"; 
   if (!empty($item)   && (!preg_match('/^[0-9]/', $item)))
        $errors .=">>must be  digits";
   if (!empty($item)  
      && 
      strlen($item) <> 4) 
	  $errors .=">>Lenght error,must 4 digits";
	 return $errors;					  
   }
  
  if ($type=='email')   
   {
    $errors = "";
   if (empty($item)) $errors .=">>Must not be blank "; 
   if (!empty($item)  
		&& 
		(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/', trim($item))))
        $errors .=">>inalid format";
   	 return $errors;				  
   }
  
 
   
  
	}  
?>
