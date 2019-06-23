<?php

$noofElements = isset($_POST['noofelements']) ? $_POST['noofelements'] : 0;
if($noofElements > 0){
    $getInputs = [];
    $result = [];
    for($count = 0;$count < $noofElements;$count++){
        $getInputs[$count] = $_POST['track_request_'.$count];     
        if(is_numeric($getInputs[$count])){
            
        }else{
            $result = [
                'status' => 'error',
                'messages' => 'All inputs should be in number format!'
            ];
            
        }
    }
    echo json_encode($result);
}