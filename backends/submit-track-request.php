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
        // $getMin = [];$val = [];$exemptIndexkey = [];
        // sort($gets);
        // for($mainCount = 0; $mainCount < $noofElements;$mainCount++){
        //     if($mainCount == 0){
        //         for($count = 0;$count < $noofElements;$count++){
        //             $getMin[$mainCount][$count] = abs($read_write_head - $gets[$count]);
        //         }
        //         $val[$mainCount] = min($getMin[$mainCount]); //$exemptIndexKey[$mainCount] is the key of this value
        //         $exemptIndexkey[$mainCount] = array_search($val[$mainCount],$getMin[$mainCount]);
        //     }else{
        //         echo $mainCount - 1;
                
        //         foreach($gets as $key => $get){
        //             $getMin[$mainCount][$key] = $get;
        //         }
        //         echo json_encode($getMin);
                // for($count = 0;$count < $noofElements;$count++){
                    // if($count != $exemptIndexkey0){
                    //     $getMin1[$count] = abs($gets[$exemptIndexkey0] - $gets[$count]);
                    // }
                // }
                // $val1 = min($getMin1);//$exemptIndexKey1 is the key of this value
                // $exemptIndexkey1 = array_search($val1,$getMin1);
            // }
        // }
        // echo json_encode($val);
        // exit;
        
        // $sstf = [
        //     'computeThm' => $orGets,
        //     'thm' => 'THM: '.$getThm.' tracks',
        //     'seektime' => 'Seek-time: '.($getThm * 3).'ms',
        // ];

        /**
         * -----------------------------------------------
         * -        Scan Towards 0 (SCAN 0)
         * -----------------------------------------------
         */
        $initSCAN0 = [];
        $getGiven = [$read_write_head];
        $sortedGets = array_merge($getGiven,$gets);
        sort($sortedGets);
        $getIndexRead = array_search($read_write_head,$sortedGets);
        $getSliceDesc = array_slice($sortedGets,0,$getIndexRead);
        rsort($getSliceDesc);
        foreach($getSliceDesc as $key => $getTowards0){
            if($key == 0){
                $initSCAN0[0] = abs($read_write_head - $getTowards0);
            }else{
                $prev = $key - 1;
                $initSCAN0[$key] = abs($getSliceDesc[$prev] - $getTowards0);
            }
        }
        $getSliceAsc = array_slice($sortedGets,$getIndexRead + 1);
        sort($getSliceAsc);
        $getLastValDesc = $getSliceDesc[count($getSliceDesc) - 1];
        foreach($getSliceAsc as $key => $finalScan){
            $genKey = $key + count($getSliceDesc);
            if($key == 0){
                $initSCAN0[$genKey] = abs($getLastValDesc - $finalScan);
            }else{
                $prev = $key - 1;
                $initSCAN0[$genKey] = abs($getSliceAsc[$prev] - $finalScan);
            }
        }
        $getThmSCAN0 = 0;
        foreach($initSCAN0 as $value){
            $getThmSCAN0 += $value;
        }
        $orGetsSCAN0 = '<b>Get THM: </b>'.implode(' + ',$initSCAN0).' = '."<b>".$getThmSCAN0."</b>"."<br>".
            "<b>Get SeekTime: </b>".$getThmSCAN0. ' x 3 = '."<b>".($getThmSCAN0 * 3)."</b>";
        $scan0 = [
            'arrangement' => "0,".implode(',',$sortedGets).",199",
            'computeThm' => $orGetsSCAN0,
            'thm' => 'THM: '.$getThmSCAN0.' tracks',
            'seektime' => 'Seek-time: '.($getThmSCAN0 * 3).'ms',
        ];
        
        $result = [
            'status' => 'success',
            'values' => 'Given the following track request in the disk queue compute for the total head movement (THM) of the R/W Head '.implode(', ',$gets).'.
                Consider that the read write head is positioned at location '.$read_write_head.'.',
            'fcfs' => $fcfs,
            // 'sstf' => $sstf,
            'scan0' => $scan0
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