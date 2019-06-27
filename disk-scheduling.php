<?php require('includes/header.php')?>
<div class="profile_container">
    <div class="row">
        <div class="card box_shad" style="width:100%;">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12"><h1><span class="fa fa-cog"></span> Disk Scheduling Techniques</h1></div>
                </div><hr>
                <div class="row">
                    <div class="col-lg-2 card_shad">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#fcfs">FCFS</a>
                            </li>
                            <?php foreach($config['nav-tabs'] as $key => $value):?>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="<?=$value['url']?>"><?=$key?></a>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-9 card_shad">
                        <div class="tab-content">
                            <div class="tab-pane active container" id="fcfs">
                                <h1 class="mt-2"><span class="fa fa-user"></span> First Come First serve (FCFS)</h1><hr>
                                <p class="input-given"></p>
                                <p class="instructions d-none"><?=$config['instructions']?></p><hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <b>Computation</b><hr>
                                        <p class="fcfs_computation"></p><hr>
                                        <b>Answers</b>
                                        <p class="fcfs_thm"></p>
                                        <p class="fcfs_seektime"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container" id="sstf">
                                <h1 class="mt-2"><span class="fa fa-user"></span> Shortest seek time first (SSTF)</h1><hr>
                                <p class="input-given"></p>
                                <p class="instructions d-none"><?=$config['instructions']?></p>
                                <div class="row">
                                    <div class="col-lg-12">

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container" id="scant0">
                                <h1 class="mt-2"><span class="fa fa-user"></span> SCAN (Towards 0)</h1><hr>
                                <p class="input-given"></p>
                                <p class="instructions d-none"><?=$config['instructions']?></p>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <b>Arrangement</b><hr>
                                        <p class="scan0_arrangement"></p><hr>
                                        <b>Computation</b><hr>
                                        <p class="scan0_computation"></p><hr>
                                        <b>Answers</b>
                                        <p class="scan0_thm"></p>
                                        <p class="scan0_seektime"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container" id="scanup">
                                <h1 class="mt-2"><span class="fa fa-user"></span> SCAN (upwards)</h1><hr>
                                <p class="input-given"></p>
                                <p class="instructions d-none"><?=$config['instructions']?></p>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <b>Arrangement</b><hr>
                                        <p class="scanUP_arrangement"></p><hr>
                                        <b>Computation</b><hr>
                                        <p class="scanUP_computation"></p><hr>
                                        <b>Answers</b>
                                        <p class="scanUP_thm"></p>
                                        <p class="scanUP_seektime"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container" id="cscandown">
                                <h1 class="mt-2"><span class="fa fa-user"></span> C-SCAN (downward)</h1><hr>
                                <p class="input-given"></p>
                                <p class="instructions d-none"><?=$config['instructions']?></p>
                                <div class="row">
                                    <div class="col-lg-12">

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container" id="cscanup">
                                <h1 class="mt-2"><span class="fa fa-user"></span> C-SCAN (upwards)</h1><hr>
                                <p class="input-given"></p>
                                <p class="instructions d-none"><?=$config['instructions']?></p>
                                <div class="row">
                                    <div class="col-lg-12">

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container" id="lookdown">
                                <h1 class="mt-2"><span class="fa fa-user"></span> LOOK (downward)</h1><hr>
                                <p class="input-given"></p>
                                <p class="instructions d-none"><?=$config['instructions']?></p>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <b>Arrangement</b><hr>
                                        <p class="lookDOWN_arrangement"></p><hr>
                                        <b>Computation</b><hr>
                                        <p class="lookDOWN_computation"></p><hr>
                                        <b>Answers</b>
                                        <p class="lookDOWN_thm"></p>
                                        <p class="lookDOWN_seektime"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container" id="lookup">
                                <h1 class="mt-2"><span class="fa fa-user"></span> LOOK (upwards)</h1><hr>
                                <p class="input-given"></p>
                                <p class="instructions d-none"><?=$config['instructions']?></p>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <b>Arrangement</b><hr>
                                        <p class="lookUP_arrangement"></p><hr>
                                        <b>Computation</b><hr>
                                        <p class="lookUP_computation"></p><hr>
                                        <b>Answers</b>
                                        <p class="lookUP_thm"></p>
                                        <p class="lookUP_seektime"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container" id="clookdown">
                                <h1 class="mt-2"><span class="fa fa-user"></span> C-LOOK (downward)</h1><hr>
                                <p class="input-given"></p>
                                <p class="instructions d-none"><?=$config['instructions']?></p>
                                <div class="row">
                                    <div class="col-lg-12">

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container" id="clookup">
                                <h1 class="mt-2"><span class="fa fa-user"></span> C-LOOK (upwards)</h1><hr>
                                <p class="input-given"></p>
                                <p class="instructions d-none"><?=$config['instructions']?></p>
                                <div class="row">
                                    <div class="col-lg-12">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="input_values" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Values</h5>
                <button type="button" class="close modal-close" data-url="<?=$config['base_url']?>">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <b>(The Total Head Movement is Set to 200 track disk.)</b>
                        </div>
                    </div><hr>
                    <div class="get-track-requests row">
                        <div class="col-lg-12">
                            <label for="nooftrack">Number of Track Requests</label>
                            <input type="text" class="form-control get-track" placeholder="Enter No of track request">
                        </div>
                        <div class="col-lg-12">
                            <button type="button" data-url="<?=$config['base_url']?>backends/get-track-request.php" class="btn btn-secondary mt-2 no-track-request pull-right">Enter</button>
                        </div>
                    </div>
                    <form action="<?=$config['base_url']?>backends/submit-track-request.php" class="global-landing-form d-none ">
                        <div class="row form-elements"></div>
                        <input type="hidden" name="noofelements">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="read_write_head">Read Write Head</label>
                                <input type="text" class="form-control" name="read_write_head" placeholder="Enter for Read Write Head Position">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group pull-right">
                                    <button type="submit" class="btn btn-secondary mt-3 global-landing-form-btn">Submit</button>                            
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary modal-close" data-url="<?=$config['base_url']?>">Close</button>
            </div>
        </div>
    </div>
</div>
<?php require('includes/javascript.php')?>
<script>
    GlobalPage.INIT();
</script>
<?php require('includes/footer.php')?>