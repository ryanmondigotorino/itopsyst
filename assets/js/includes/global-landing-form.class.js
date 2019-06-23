var GlobalForm = {

    INIT: function(){
        this.EVENT();
    },
    
    EVENT: function(){
        $('form.global-landing-form').on('submit',function(event){
            event.preventDefault();
            var url = $(this).attr('action');
            var targetBtn = $('button[type="submit"].global-landing-form-btn')
            $.ajax({
                type:'post',
                url: url,
                data: $(this).serialize(),
                beforeSend: function(){
                    $(targetBtn).prop('disabled',true);
                    $(targetBtn).html('<i class="fa fa-spinner fa-pulse"></i> Processing..');
                },
                success:function(result){
                    console.log(result);
                    return false;
                    if(result['status'] == 'success'){
                        if(result['url'] == 'none'){
                            location.reload();
                        }else{
                            swal({
                                title: "Success",
                                text: result['message'],
                                icon: result['status'],
                            }).then((confirm) => {
                                if(confirm){
                                    location.href = result['url'];
                                }
                            });
                        }
                    }else if(result['status'] == 'warning'){
                        swal({
                            title: "Warning",
                            text: result['messages'],
                            icon: result['status'],
                            button: "Ok",
                        });
                    }else{
                        swal({
                            title: "Error",
                            text: result['messages'],
                            icon: result['status'],
                            button: "Ok",
                        });
                    }
                }
            }).done(function(result){
                if(result['status'] == 'success'){
                    targetBtn.html('<span class="fa fa-check"></span> Success! Please wait <i class="fa fa-spinner fa-pulse"></i>');
                }else{
                    targetBtn.prop('disabled',false);
                    targetBtn.html('<span class="fa fa-edit"></span> Re-submit');
                }
            });
        });
    }
};
GlobalForm.INIT();