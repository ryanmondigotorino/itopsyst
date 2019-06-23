var GlobalPage = {

    INIT: function(){
        this.EVENTS();
    },

    EVENTS: function(){
        swal({
            title: "Warning!",
            text: 'You should enter a values first!',
            icon: 'warning',
            button: "Ok",
        }).then((result) => {
            $('#input_values').modal();
        });

        $('.modal-close').on('click',function(){
            swal({
                title: "Warning!",
                text: 'Your inputs will be deleted? Close modal?',
                icon: 'warning',
                button: "Ok",
            }).then((result) => {
                $('#input_values').modal('toggle');
            });
        });

        $('button[type="button"].no-track-request').on('click',function(){
            var gettrack = $('input[type="text"].get-track').val();
            var url = $(this).attr('data-url');
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    notrack: gettrack
                },
            }).done(function(result){
                var getResult = JSON.parse(result);
                if(getResult['status'] == 'error'){
                    swal({
                        title: "Error!",
                        text: getResult['message'],
                        icon: getResult['status'],
                        button: "Ok",
                    });
                }else{
                    $('.get-track-requests').remove('div.get-track-requests');
                    $('input[name="noofelements"]').val(getResult['count']);
                    $('div.form-elements').append(getResult['content']);
                    $('button[type="submit"].global-landing-form-btn').removeClass('d-none');
                }
            });

        });
    }
};