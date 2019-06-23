<div class="d-flex flex-column fixed-top flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal"><img src="<?=$config['base_url']?>images/sys-logo.png" style="width:50px;height:50px;" alt="System Logo"></h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <?php foreach($config['nav-bar'] as $navcontent):?>
            <a class="p-2 text-dark" href="<?=$navcontent['url']?>"><?=$navcontent['title']?></a>
        <?php endforeach;?>
    </nav>
</div>