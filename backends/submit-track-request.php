<?php

$noofElements = isset($_POST['noofelements']) ? $_POST['noofelements'] : 0;
$read_write_head = isset($_POST['read_write_head']) ? $_POST['read_write_head'] : 0;
if($noofElements > 0){
    if($read_write_head > 0 && $read_write_head < 200){
        $getInputs = [];
        $result = [];
        for($count = 0;$count < $noofElements;$count++){
            $getInputs[$count] = $_POST['track_request_'.$count];     
            if(is_numeric($getInputs[$count])){
                if($getInputs[$count] >= 0 && $getInputs[$count] < 200){
                    $gets[$count] = $getInputs[$count];
                }else{
                    $result = [
                        'status' => 'error',
                        'messages' => 'Inputs must be between 0 and 199'
                    ];
                    echo json_encode($result);
                    exit;
                }
            }else{
                $result = [
                    'status' => 'error',
                    'messages' => 'All inputs should be in number format!'
                ];
                echo json_encode($result);
                exit;
            }
        }
        $computation = 0;
        $getDetails = [];
        for($count = 0;$count < $noofElements;$count++){
            if($count == 0){
                $init = $read_write_head - $gets[0];
            }else{
                echo $count;
            }
            $compe = $gets[$count] - $gets[$counter];
            // $computation = $compe;
        }
        exit;
        // foreach($gets as $key => $get){
        //     $comps = 0;
        //     if($key == 0){
        //         // $comps = $read_write_head - $get;
        //     }else{
        //         $comps = $get;
        //     }
        //     $computation = $comps;
        //     // $inital = $read_write_head - $gets[0];
        //     // $computation += (abs($get - $read_write_head));
        //     // $getDetails[$key] = (abs($get - $read_write_head));
        // }
        echo $computation;
        exit;
        $orGets = implode(' + ',$getDetails).' = '.$computation;
        $orSeek = $computation. ' x 3 = '.($computation * 3);
        $fcfs = [
            'computeThm' => $orGets,
            'computeSeek' => $orSeek,
            'thm' => $computation,
            'seektime' => ($computation * 3),
        ];
        $result = [
            'status' => 'success',
            'values' => 'Given the following track request in the disk queue compute for the total head movement (THM) of the R/W Head '.implode(', ',$gets).'.
                Consider that the read write head is positioned at location '.$read_write_head.'.',
            'fcfs' => $fcfs
        ];
        echo json_encode($result);
        exit;
    }else{
        $result = [
            'status' => 'error',
            'messages' => 'Read Write Head must be between 0 and 199'
        ];
        echo json_encode($result);
        exit;
    }
    
}