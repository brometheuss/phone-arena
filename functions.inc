<?php 

    function dynamicList($begin, $end){
        
        
        for($i = $begin; $i <= $end; $i++){
            
            echo("<option value='".$i."'>".$i."</option>");
        }
    }

    function dynamicMonthList(){
        
        $months = array(
            '1' => 'January',
            '2' => 'February',
            '3' => 'March',
            '4' => 'April',
            '5' => 'May',
            '6' => 'June',
            '7' => 'July',
            '8' => 'August',
            '9' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        );
        
        foreach($months as $index => $value){
            echo("<option value='".$index."'>".$value."</option>");
        }
    }

?>