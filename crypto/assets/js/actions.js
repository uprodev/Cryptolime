jQuery(document).ready(function($){






    if($('.drop').length){

        if(Dropzone) Dropzone.autoDiscover = false;

       // var inputDZ = $('.drop');
        $('.drop').dropzone({
            // autoProcessQueue: false,
            url:  global.ajaxurl + '?action=submit_dropzonejs',
            maxFiles: 1,
        //    thumbnailHeight: 640,
            previewsContainer: ".avatar_wrap",
           previewTemplate: "<span><img class='avatar' data-dz-thumbnail /></span>",
             dictRemoveFile: ' ',
             dictCancelUpload: '',
            init: function() {

                var myDropzone = this,
                    container = $(myDropzone.element);

                this.on("sending", function(files, xhr, formData) {
                    container.addClass("loading");
                    $('.old_avatar').remove()
                });

                this.on("success", function(file, data) {
                    console.log('data', data)

                    $('.profile-image-delete').attr('data-id', data)



                    // var elem = $(this)[0].element;

                    if(data) {
                        $.ajax({
                            type: 'POST',
                            url: '/wp-admin/admin-ajax.php',
                            data: {
                                'action': 'upd_avatar',
                                'img_id': data
                            },
                            dataType: "json",
                            beforeSend: function (response) {


                            },
                            complete: function (response) {
                                $('.profile-image-delete').show()
                            }
                        });
                    }

                });

            },
            addRemoveLinks: true,

            // uploadMultiple: false,
            dictDefaultMessage: "<strong>Drop files here or click to upload. </strong>"
        });
    }


    $('.profile-image-delete').click(function(){
        var id = $(this).attr('data-id');

        $('.avatar_wrap img').attr('src', '/wp-content/themes/crypto/assets/img/avatar.jpg')
        $('.profile-image-delete').hide()
        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: {
                'action': 'delete_avatar',
                'img_id': id
            },
            type: 'POST',
            dataType: 'json',
            success:function(data){
                if (data) {
                    console.log(data)


                }
            }
        });
    })


    if($('#profileForm').length)
        $('#profileForm').validate({
    
            submitHandler: function(form) {
    
                var data = $('#profileForm').serialize()
                $.ajax({
                    url: '/wp-admin/admin-ajax.php',
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    success:function(data){
                        if (data) {
                            console.log(data)
    
                            $('.result').html(data.status)
                        }
                    }
                });
    
            }
        });

    if($('.loginform').length)
        $('.loginform').validate({

            submitHandler: function(form) {

                var data = $('.loginform').serialize()
                $.ajax({
                    url: '/wp-admin/admin-ajax.php',
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    success:function(data){
                        if (data) {
                            console.log(data)

                            $('.result-login').html(data.status)

                            location.href = data.redirect
                        }
                    }
                });

            }
        });

    if($('.registerform').length)
        $('.registerform').validate({

            submitHandler: function(form) {

                var data = $('.registerform').serialize()
                $.ajax({
                    url: '/wp-admin/admin-ajax.php',
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    success:function(data){
                        if (data) {
                            console.log(data)

                            $('.result-register').html(data.status)

                            location.href = data.redirect
                        }
                    }
                });

            }
        });


    if($('.lostpasswordform').length)
        $('.lostpasswordform').validate({

            submitHandler: function(form) {

                var data = $('.lostpasswordform').serialize()
                $.ajax({
                    url: '/wp-admin/admin-ajax.php',
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    success:function(data){
                        if (data) {
                            console.log(data)

                            $('.result-reset').html(data.status)


                        }
                    }
                });

            }
        });


    $('.resetpass').click(function () {
        $('.loginform').hide()
        $('.lostpasswordform').show()
    })

    $('.resetpasshide').click(function () {

        $('.lostpasswordform').hide()
        $('.loginform').show()
    })







})