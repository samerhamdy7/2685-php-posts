<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2685</title>
   <link rel="stylesheet" href="our_group/style.css">
</head>
<body class= 'flex flex-col min-h-screen fade-in'>

<?php 

$group_2685 = [
    ["name" => "Maged Yaseen", "role" => "INSTRUCTOR <br> Full Stack <br> Web Developer" , "img" => "our_group/maged.png" ],
    ["name" => "Nour ", "role" => "Back-End Developer" , "img" => "our_group/back developer.png"],
    ["name" => "Salma El-Qady", "role" => "Back-End Developer" , "img" => "our_group/back developer.png"],
    ["name" => "Hager Essam", "role" => "Back-End Developer" , "img" => "our_group/back developer.png"],
    ["name" => "Ahmed Khaled", "role" => "Back-End Developer" , "img" => "our_group/back developer.png"],
    ["name" => "Nada Ahmed", "role" => "Back-End Developer", "img" => "our_group/back developer.png"],
    ["name" => "Mohamed Sahwan", "role" => "Back-End Developer", "img" => "our_group/back developer.png"],
    ["name" => "Samer Hamdy", "role" => "Back-End Developer" , "img" => "our_group/back developer.png"],
    ["name" => "Adam Sherif", "role" => "Back-End Developer" , "img" => "our_group/back developer.png"],
    ["name" => "Youssif Elsayed", "role" => "Back-End Developer" , "img" => "our_group/back developer.png"],
    ["name" => "Amr Safy", "role" => "Back-End Developer" , "img" => "our_group/back developer.png"],
    ["name" => "Mayar Ali", "role" => "Back-End Developer" , "img" => "our_group/back developer.png"],
    ["name" => "Maya Younes", "role" => "Back-End Developer" , "img" => "our_group/back developer.png"],
    ["name" => "Mohamed Nader", "role" => "Back-End Developer" , "img" => "our_group/back developer.png"],
    ["name" => "Zeyad Dewedar", "role" => "Back-End Developer" , "img" => "our_group/back developer.png"],
    ["name" => "Ahmed Sayed", "role" => "Back-End Developer" , "img" => "our_group/back developer.png"],
    ["name" => "Ahmed Khalid", "role" => "Back-End Developer" , "img" => "our_group/back developer.png"],
    ["name" => "Alyaa ", "role" => "Back-End Developer" , "img" => "our_group/back developer.png"],
    ["name" => "Ahmed Wallied", "role" => "Back-End Developer" , "img" => "our_group/back developer.png"],
    ["name" => "Karim Fawzy", "role" => "Back-End Developer" , "img" => "our_group/back developer.png"],
];

 
   /*function check_name($name, $array){
    foreach($array as $a){
     if(strtolower($a['name']) == strtolower($name)){
      return true;
     }
    } return false;
   };

   $name_check = 'samer hamdy';
   if(check_name($name_check , $group_2685)){
    echo "class='true_name'>$name_check is in Array";
   }else {echo "$name_check is not Array";}*/



    function getinit($name) {

    $f_l = substr($name , 0 , 1);

    $name_part = explode(' ', $name);
    
    $l_name = end($name_part);
    
    $s_l = substr($l_name , 0 , 1);

    return $f_l . $s_l;

    }
    
    $instructor = array_shift($group_2685);
    $student = $group_2685;

           
    $instructor_init = getinit($instructor['name']);
    
    echo "
    <div class='container'> 
       <div class='card instructor'>
       <img src='{$instructor['img']}' />
       <div class='initials'>{$instructor_init}</div>
       <h2>{$instructor['name']}</h2>
       <p>{$instructor['role']}</p>
    </div>";
    
    
    echo "
    <div class='students-container'>"; 
    foreach ($student as $st)
    { 
      $student_init = getinit($st['name']);
      echo 
      "<div class='card student'> 
      <img src='{$st['img']}' />
      <div class='initials'>{$student_init} <span>2685</span></div>
      <p>{$st['name']}</p>
      <p>{$st['role']}</p>
      </div>";}

     echo "</div>";
     
    ?>
</body>
</html>