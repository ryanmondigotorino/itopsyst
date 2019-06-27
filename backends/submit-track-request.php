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
        /**
         * -------------------------------------------------
         * -        First Come First serve (FCFS)
         * -------------------------------------------------
         */
        $initFCFS = [];
        for($count = 0;$count < $noofElements;$count++){
            if($count == 0){
                $initFCFS[0] = abs($read_write_head - $gets[0]);
            }else{
                $prev = $count - 1;
                $initFCFS[$count] = abs($gets[$prev] - $gets[$count]);
            }
        }
        $getThmFCFS = 0;
        foreach($initFCFS as $value){
            $getThmFCFS += $value;
        }
        $orGetsFCFS = '<b>Get THM: </b>'.implode(' + ',$initFCFS).' = '."<b>".$getThmFCFS."</b>"."<br>".
            "<b>Get SeekTime: </b>".$getThmFCFS. ' x 3 = '."<b>".($getThmFCFS * 3)."</b>";
        $fcfs = [
            'computeThm' => $orGetsFCFS,
            'thm' => 'THM: '.$getThmFCFS.' tracks',
            'seektime' => 'Seek-time: '.($getThmFCFS * 3).'ms',
        ];
        /**
         * -----------------------------------------------
         * -        Shortest seek time first (SSTF)
         * -----------------------------------------------
         */
        // $initSSTF = [];
        // sort($gets);
        // echo json_encode($gets);
        // exit;
        // for($count = 0;$count < $noofElements;$count++){
            // $compe = 0;
            // if($count == 0){
            //     $initSSTF[0] = ($read_write_head - $gets[0]);
            // }else{
            //     $prev = $count - 1;
            //     $initSSTF[$count] = abs($gets[$prev] - $gets[$count]);
            // }
        // }

        // exit;
        // $sstf = [
        //     'computeThm' => $orGets,
        //     'thm' => 'THM: '.$getThm.' tracks',
        //     'seektime' => 'Seek-time: '.($getThm * 3).'ms',
        // ];

        $result = [
            'status' => 'success',
            'values' => 'Given the following track request in the disk queue compute for the total head movement (THM) of the R/W Head '.implode(', ',$gets).'.
                Consider that the read write head is positioned at location '.$read_write_head.'.',
            'fcfs' => $fcfs,
            // 'sstf' => $sstf,
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