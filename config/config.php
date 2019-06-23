<?php

$config['base_url'] = "http://$_SERVER[HTTP_HOST]/opsyst/";

$config['nav-bar'] = [
    'home' => [
        'url' => $config['base_url'],
        'title' => 'Home'
    ],
    'Disk Scheduling' => [
        'url' => $config['base_url'].'disk-scheduling.php',
        'title' => 'Proceed to Disk Scheduling'
    ],
];

$config['nav-tabs'] = [
    'SSTF' => [
        'url' => '#sstf',
    ],
    'SCAN (towards 0)' => [
        'url' => '#scant0',
    ],
    'SCAN (upwards)' => [
        'url' => '#scanup',
    ],
    'C-SCAN (downward)' => [
        'url' => '#cscandown',
    ],
    'C-SCAN (upwards)' => [
        'url' => '#cscanup',
    ],
    'LOOK (downward)' => [
        'url' => '#lookdown',
    ],
    'LOOK (upwards)' => [
        'url' => '#lookup',
    ],
    'C-LOOK (downward)' => [
        'url' => '#clookdown',
    ],
    'C-LOOK (upwards)' => [
        'url' => '#clookup',
    ],
];

$config['instructions'] = 'Compute for the total head movement for a 200 (0 - 199) track disk and seek  time using the seek rate of 3ms for each
disk scheduling algorithm. Seek time rate = Total Head Movement x Seek Time Rate';

$config['group_mates'] = [
    'torino' => [
        'image' => 'ryan-torino.jpg',
        'name' => 'Ryan M. Torino'
    ],
    'sy' => [
        'image' => 'jer-jay.jpg',
        'name' => 'Jerjay Sy'
    ],
    'devera' => [
        'image' => 'christian.jpg',
        'name' => 'Christian Jay De Vera'
    ],
    'lorenzo' => [
        'image' => 'lorenzo.jpg',
        'name' => 'Lorenzo Matienzo'
    ],
];