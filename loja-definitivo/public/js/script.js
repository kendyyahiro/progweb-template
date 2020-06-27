Dropzone.autoDiscover = false;


$(document).ready(function(){
    $('#slider-categorias').slick({
        infinite: false,
        slidesToShow: 5,
        slidesToScroll: 3,
        responsive: [
            {
            breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    /** Submeter cadastro/edit do produto **/
    $('#btn-submit-produto').on('click', function(){
        $('#form-produto').submit();
    });

    $("#image-upload").dropzone({
        acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg",
        dictDefaultMessage: 'Selecione as imagens',
        dictRemoveFile: "Remover Imagem",
        addRemoveLinks: true,
        success: function (file, response) {
            $('#form-produto').append(`<input type="hidden" name="document[]" data-name="${response.original_name}" value="${response.nome}">`)
        },
        removedfile: function (file) {
            file.previewElement.remove();
            var name = '';
            console.log(file.name);
            if (typeof file.name !== 'undefined') {
                name = file.name;
            } else {
                return;
            }

            $('#form-produto').find('input[name="document[]"][data-name="' + name + '"]').remove();

        },
        // init:function(){

        //     $.ajax({
        //         url: `{{ route('produto/fetch') }}`,
        //         type: 'GET',
        //         data:{
        //             id: 5
        //         },
        //         success: (response) => {
        //             console
        //         },
        //         error: () => {
        //             sweetToastError('Não foi possível realizar esta ação. Tente novamente!')
        //         }
        //     });
            
        //     var mockFile = { name: "_img_34975.jpeg", size: 12345, type: 'image/jpeg' };       
        //     this.options.addedfile.call(this, mockFile);
        //     this.options.thumbnail.call(this, mockFile, "http://localhost/progweb-template/loja-definitivo/public/img/produtos_cadastrados/_img_34975.jpeg");
        //     mockFile.previewElement.classList.add('dz-success');
        //     mockFile.previewElement.classList.add('dz-complete');

        // }
    });

    $('.produto_anunciado').on('click', function(){
        $(this).find('i').toggleClass('fa-heart-o fa-heart');
        let produto_id = $(this).data('id');

        $.ajax({
            url:  `{{ route('favoritos/addFavoritos') }}`,
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                produto_id: produto_id
            },
            success: (response) => {
                
            },
            error: () => {
                sweetToastError('Não foi possível realizar esta ação. Tente novamente!')
            }
        });

    });

    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: true,
        centerMode: true,
        focusOnSelect: true
    });

});