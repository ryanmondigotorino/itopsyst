<?php


$getTrackNo = isset($_POST['notrack']) ? $_POST['notrack'] : '';
if(is_numeric($getTrackNo)){
    if($getTrackNo > 0 && $getTrackNo <= 10){
        $shouldAppend = [];
        for($count = 0; $count < $getTrackNo; $count++){
            $shouldAppend['content'][$count] = '<div class="col-lg-2">
                <div class="form-group">
                    <label for="track_request">TR # '.($count + 1).'</label>
                    <input type="text" class="form-control input-track-request" name="track_request_'.$count.'" placeholder="Enter Track Request">
                </div>
            </div>';
        }
        $shouldAppend['count'] = $getTrackNo;
        echo json_encode($shouldAppend);
    }else{
        $result = [
            'status' => 'error',
            'message' => 'Input must be between 1 until 10'
        ];
        echo json_encode($result);
    }
}else{
    $result = [
        'status' => 'error',
        'message' => 'Input must be a number!'
    ];
    echo json_encode($result);
}