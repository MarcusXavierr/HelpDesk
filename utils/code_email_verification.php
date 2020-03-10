<?php

     $code_array = [];
     $letters = [
        'q','w','e','r','t','y','u','i',
        'o','p','a','s','d','f','g','h','j',
        'k','l','z','x','c','v','b','n','m'
        ];
    
        $numbers = [
        '0','1','2','3','4','5','6','7','8','9'
        ];

        for($i = 0; $i < 8; $i++){
            if(rand(0,1) == 0){
                $code_array[$i] = $letters[rand(0,25)];
            }
             else{
                $code_array[$i] = $numbers[rand(0,9)];
             }
        }

       $code = implode("",$code_array);

?>