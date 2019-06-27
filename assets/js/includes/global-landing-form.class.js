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
                success:function(getResult){
                    // console.log(getResult);
                    // return false;   
                    var result = JSON.parse(getResult);
                    // console.log(result['fcfs']);
                    // return false;
                    if(result['status'] == 'success'){
                        $('p.input-given').append(result['values'])
                        $('p.instructions').removeClass('d-none');
                        $('div.modal#input_values').modal('toggle');
                        $('p.fcfs_computation').append(result['fcfs']['computeThm']);
                        $('p.fcfs_thm').append(result['fcfs']['thm']);
                        $('p.fcfs_seektime').append(result['fcfs']['seektime']);
                        $('p.scan0_arrangement').append(result['scan0']['arrangement']);
                        $('p.scan0_computation').append(result['scan0']['computeThm']);
                        $('p.scan0_thm').append(result['scan0']['thm']);
                        $('p.scan0_seektime').append(result['scan0']['seektime']);
                        $('p.scanUP_arrangement').append(result['scanUP']['arrangement']);
                        $('p.scanUP_computation').append(result['scanUP']['computeThm']);
                        $('p.scanUP_thm').append(result['scanUP']['thm']);
                        $('p.scanUP_seektime').append(result['scanUP']['seektime']);
                        $('p.lookUP_arrangement').append(result['lookUP']['arrangement']);
                        $('p.lookUP_computation').append(result['lookUP']['computeThm']);
                        $('p.lookUP_thm').append(result['lookUP']['thm']);
                        $('p.lookUP_seektime').append(result['lookUP']['seektime']);
                        $('p.lookDOWN_arrangement').append(result['lookDOWN']['arrangement']);
                        $('p.lookDOWN_computation').append(result['lookDOWN']['computeThm']);
                        $('p.lookDOWN_thm').append(result['lookDOWN']['thm']);
                        $('p.lookDOWN_seektime').append(result['lookDOWN']['seektime']);
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