require('./bootstrap');



window.onload = function() {
    if (window.jQuery) {
        var element = document.getElementById("avatarinp");
        if(element){
            element.onchange = evt => {
                const [file] =  element.files
                if (file) {
                    // $('#avatar').css("background-image", "url('')") = URL.createObjectURL(file)
                    let url=URL.createObjectURL(file)
                    console.log(url)
                    $('#avatar').css("background-image", 'url('+url+')')

                }
              }

        }
        if ($('.persian').length){
            $(".persian").persianDatepicker({
                initialValue: true,
                persianDigit : false,
                format: 'YYYY-MM-DD',
                autoClose: true,
                initialValueType:'gregorian',
                calendar:{
                    persian: {
                        local: 'fa'
                    }
                }

            });
        }
        if($('.select2').length){
            $('.select2').select2();
        }
        $('body').on('click', '.show', function() {

          $(this).closest('.par').find('.inp').removeClass('hide');
          $(this).hide(400)
        })
        $('body').on('click', '#new_ostad', function() {
            $('#ostad_port').show(400)
        })
        // $('body').on('change', '#ostad', function() {
        //     let el =$(this)

        //     if(el.val()=='9999999999'){
        //         $('#ostad_port').show(400)
        //         console.log(0)
        //     }else{
        //         $('#ostad_port').hide(400)
        //         console.log(2)
        //     }
        // })
        $('body').on('click', '#add_ex', function() {
            let val =$('#ex_p').val();
            val = val.replace(/\s/g, '');
            if(val.length<3){
                noty('حداقل سه کاراکتر وارد نمایید')
                return

            }

            let el =`
            <span type="button" class="btn self btn-outline-success mr-2">
            ${val}
            <input type="text" name="expert[]" hidden="" value="${val}">
             </span>
            `
            $('#tags').append(el);
            $('#ex_p').val('');
        });;
        $('body').on('click', '#add_ex1', function() {
            let val =$('#ex_p').val();
            val = val.replace(/\s/g, '');
            if(val.length<3){
                noty('حداقل سه کاراکتر وارد نمایید')
                return

            }

            let el =`
            <span type="button" class="btn self btn-outline-success mr-2">
            ${val}
            <input type="text" name="tags[]" hidden="" value="${val}">
             </span>
            `
            $('#tags').append(el);
            $('#ex_p').val('');
        });;
        $('body').on('click', '.self', function() {
          var ele=$(this)
          ele.hide(400)
          ele.remove()
        });;
    } else {
        // jQuery is not loaded
        alert("Doesn't Work");
    }
}
// $(document).ready(function(){
//     if (jQuery) {



//     }
//   });
