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
        $getGiven = [0,$read_write_head,199];
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

        $getSliceAsc = array_slice($sortedGets,$getIndexRead + 1, -1);
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
            'arrangement' => implode(',',$sortedGets),
            'computeThm' => $orGetsSCAN0,
            'thm' => 'THM: '.$getThmSCAN0.' tracks',
            'seektime' => 'Seek-time: '.($getThmSCAN0 * 3).'ms',
        ];


        /**
         * -----------------------------------------------
         * -        Scan Towards Upwards
         * -----------------------------------------------
         */
        $initSCANUP = [];
        $getScanUp = array_slice($sortedGets,$getIndexRead + 1);
        sort($getScanUp);
        foreach($getScanUp as $key => $scanUp){
            if($key == 0){
                $initSCANUP[0] = abs($read_write_head - $scanUp);
            }else{
                $prev = $key - 1;
                $initSCANUP[$key] = abs($getScanUp[$prev] - $scanUp);
            }
        }
        $getScanDown = array_slice($sortedGets,1,$getIndexRead - 1);
        rsort($getScanDown);
        $getLastValScanUp = $getScanUp[count($getScanUp) - 1];
        foreach($getScanDown as $key => $scandown){
            $genKey = $key + count($getScanUp);
            if($key == 0){
                $initSCANUP[$genKey] = abs($getLastValScanUp - $scandown);
            }else{
                $prev = $key - 1;
                $initSCANUP[$genKey] = abs($getScanDown[$prev] - $scandown);
            }
        }
        $getThmSCANUP = 0;
        foreach($initSCANUP as $value){
            $getThmSCANUP += $value;
        }
        $orGetsSCANUP = '<b>Get THM: </b>'.implode(' + ',$initSCANUP).' = '."<b>".$getThmSCANUP."</b>"."<br>".
            "<b>Get SeekTime: </b>".$getThmSCANUP. ' x 3 = '."<b>".($getThmSCANUP * 3)."</b>";
        $scanUP = [
            'arrangement' => implode(',',$sortedGets),
            'computeThm' => $orGetsSCANUP,
            'thm' => 'THM: '.$getThmSCANUP.' tracks',
            'seektime' => 'Seek-time: '.($getThmSCANUP * 3).'ms',
        ];

        /**
         * -----------------------------------------------
         * -        LOOK downward direction
         * -----------------------------------------------
         */
        $initLOOKDOWN = [];
        foreach($getScanDown as $key => $lookdown){
            if($key == 0){
                $initLOOKDOWN[0] = abs($read_write_head - $lookdown);
            }else{
                $prev = $key - 1;
                $initLOOKDOWN[$key] = abs($getScanDown[$prev] - $lookdown);
            }
        }
        $getLastValLookDown = $getScanDown[count($getScanDown) - 1];
        
        foreach($getSliceAsc as $key => $lookup){
            $genKey = $key + count($getScanDown);
            if($key == 0){
                $initLOOKDOWN[$genKey] = abs($getLastValLookDown - $lookup);
            }else{
                $prev = $key - 1;
                $initLOOKDOWN[$genKey] = abs($getSliceAsc[$prev] - $lookup);
            }
        }
        
        $getThmLOOKDOWN = 0;
        foreach($initLOOKDOWN as $value){
            $getThmLOOKDOWN += $value;
        }
        $orGetsLOOKDOWN = '<b>Get THM: </b>'.implode(' + ',$initLOOKDOWN).' = '."<b>".$getThmLOOKDOWN."</b>"."<br>".
            "<b>Get SeekTime: </b>".$getThmLOOKDOWN. ' x 3 = '."<b>".($getThmLOOKDOWN * 3)."</b>";
        $lookDOWN = [
            'arrangement' => implode(',',$sortedGets),
            'computeThm' => $orGetsLOOKDOWN,
            'thm' => 'THM: '.$getThmLOOKDOWN.' tracks',
            'seektime' => 'Seek-time: '.($getThmLOOKDOWN * 3).'ms',
        ];


        /**
         * -----------------------------------------------
         * -        LOOK upward direction
         * -----------------------------------------------
         */
        $initLOOKUP = [];
        foreach($getSliceAsc as $key => $lookup){
            if($key == 0){
                $initLOOKUP[0] = abs($read_write_head - $lookup);
            }else{
                $prev = $key - 1;
                $initLOOKUP[$key] = abs($getSliceAsc[$prev] - $lookup);
            }
        }
        $getLastValLookUp = $getSliceAsc[count($getSliceAsc) - 1];
        foreach($getScanDown as $key => $lookdown){
            $genKey = $key + count($getSliceAsc);
            if($key == 0){
                $initLOOKUP[$genKey] = abs($getLastValLookUp - $lookdown);
            }else{
                $prev = $key - 1;
                $initLOOKUP[$genKey] = abs($getScanDown[$prev] - $lookdown);
            }
        }
        $getThmLOOKUP = 0;
        foreach($initLOOKUP as $value){
            $getThmLOOKUP += $value;
        }
        $orGetsLOOKUP = '<b>Get THM: </b>'.implode(' + ',$initLOOKUP).' = '."<b>".$getThmLOOKUP."</b>"."<br>".
            "<b>Get SeekTime: </b>".$getThmLOOKUP. ' x 3 = '."<b>".($getThmLOOKUP * 3)."</b>";
        $lookUP = [
            'arrangement' => implode(',',$sortedGets),
            'computeThm' => $orGetsLOOKUP,
            'thm' => 'THM: '.$getThmLOOKUP.' tracks',
            'seektime' => 'Seek-time: '.($getThmLOOKUP * 3).'ms',
        ];

        $result = [
            'status' => 'success',
            'values' => 'Given the following track request in the disk queue compute for the total head movement (THM) of the R/W Head '.implode(', ',$gets).'.
                Consider that the read write head is positioned at location '.$read_write_head.'.',
            'fcfs' => $fcfs,
            // 'sstf' => $sstf,
            'scan0' => $scan0,
            'scanUP' => $scanUP,
            'lookDOWN' => $lookDOWN,
            'lookUP' => $lookUP,
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