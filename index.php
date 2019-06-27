<?php require('includes/header.php')?>
<div class="profile_container">
    <div class="row">
        <div class="card box_shad" style="width:100%;">
            <div class="card-body">
                <div class="profile_content">
                    <h1 class="text-center">Welcome to our project in ITOPSYSTA</h1>
                    <p class="text-center">Disk Scheduling Techniques Application using PHP</p><hr>
                    <h1><span class="fa fa-users"></span> Our group mates</h1><hr>
                    <div class="row">
                        <?php foreach($config['group_mates'] as $key => $group):?>
                            <div class="col-12 col-md-6 col-lg-3 mt-5">
                                <div class="card card_shad card-container" style="width:100%;">
                                    <div class="card-body">
                                        <div class="items">
                                            <img src="<?=$config['base_url']?>images/<?=$group['image']?>" style="width:100%;height:250px;" alt="<?=$group['name']?> Photo"><hr>
                                            <b>Name: <span><?=$group['name']?></span></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div><hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <div align="center">
                                <a class="btn btn-secondary" href="<?=$config['base_url'].'disk-scheduling.php'?>" style="color:#FFFFFF;">PROCEED NOW!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('includes/javascript.php')?>
<?php require('includes/footer.php')?>