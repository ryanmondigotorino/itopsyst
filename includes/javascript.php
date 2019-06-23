<script src="<?=$config['base_url']?>assets/js/bootstrap/jquery-3.3.1.min.js"></script>
<script src="<?=$config['base_url']?>assets/js/bootstrap/popper.min.js"></script>
<script src="<?=$config['base_url']?>assets/js/bootstrap/bootstrap.min.js"></script>
<script src="<?=$config['base_url']?>assets/js/holder.min.js"></script>
<script src="<?=$config['base_url']?>assets/js/jquery-validator.js"></script>
<script src="<?=$config['base_url']?>assets/js/sweetalert/sweetalert.js"></script>
<script src="<?=$config['base_url']?>assets/js/includes/global-landing-form.class.js"></script>
<script src="<?=$config['base_url']?>assets/js/includes/global-page.class.js"></script>
<script>
    $(document).ready(function(){
        setTimeout(showPage, 100);
    });
    function showPage(){
        $('#loader').css('display','none');
        $('#myDiv').css('display','block');
    }
</script>