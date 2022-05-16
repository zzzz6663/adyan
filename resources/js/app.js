require('./bootstrap');


window.onload = function() {
    if (window.jQuery) {
        if ($('#quiz_p').length){
            window.history.pushState(null, "", window.location.href);
            window.onpopstate = function() {
                window.history.pushState(null, "", window.location.href);
            };

        }

        function progress(timeleft, timetotal, $element) {
            var progressBarWidth = timeleft * $element.width() / timetotal;
            $element.find('div').animate({ width: progressBarWidth }, 500).html(Math.floor(timeleft/60) + ":"+ timeleft%60);
            if(timeleft > 0) {
                setTimeout(function() {
                    progress(timeleft - 1, timetotal, $element);
                }, 1000);
            }else{
                console.log('finish')
                $('#quiz_form').submit()
            }
        };

        if ($('#progressBar').length){
            let time= $('#progressBar').data('time')

        progress(time, time, $('#progressBar'));

        }

        $('body').on('click', '#finish_butt', function() {

            $('.finish_zone').removeClass('hide')
            $('#finish_butt').addClass('hide')
        })
        $('body').on('click', '#cancel_finish_butt', function() {


            $('.finish_zone').addClass('hide')
            $('#finish_butt').removeClass('hide')

        })



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
        if ($('.persian2').length){
            $(".persian2").persianDatepicker({
                initialValue: false,
                persianDigit : false,
                format: 'YYYY-MM-DD',
                autoClose: true,
                initialValueType:'persian',
                calendar:{
                    persian: {
                        local: 'fa'
                    }
                }

            });
        }
        if($('.select2').length){
            $('.select2').select2(
                {
                 placeholder: 'Select an option',
                 templateSelection : function (tag, container){
                         // here we are finding option element of tag and
                    // if it has property 'locked' we will add class 'locked-tag'
                    // to be able to style element in select
                      var $option = $('.select2 option[value="'+tag.id+'"]');
                    if ($option.attr('locked')){
                       $(container).addClass('locked-tag');
                       tag.locked = true;
                    }
                    return tag.text;
                 },
               }
            )

            // .on("select2:unselecting", function(e)
            // {
            //     $(this).data('state', 'unselected');
            //             }).on("select2:opening", function(e) {
            //                 // if ($(this).data('state') === 'unselected') {
            //                 //     $(this).removeData('state');
            //                 //     return false;
            //                 // }
            //                 if ($(this).attr('data-locked') ) {
            //                         console.log('81111')
            //                 }
            //             });
        }

        if($('.select2_normal').length){
            $('.select2_normal').select2({
            });
        }
        if($('.select3').length){
            $('.select3').select2({
            });
        }
        if($('.select4').length){
            $('.select4').select2({
            });
        }
        if($('.select5').length){
            $('.select5').select2({
            });
        }
        if($('.select6').length){
            $('.select6').select2({
            });
        }
        if($('.select2_tag').length){
            $('.select2_tag').select2({
                tags: true
            });
        }

        var a= $('#prog .wizard.wizard-1 .wizard-nav .wizard-steps .wizard-step[data-wizard-state="current"]').length
        console.log(a)
        console.log(122222222)
        $('#prog .wizard.wizard-1 .wizard-nav .wizard-steps .wizard-step[data-wizard-state="current"]').eq(a-1).addClass('red');
        console.log(a)
        $('#prog .wizard.wizard-1 .wizard-nav .wizard-steps .wizard-step[data-wizard-state="current"]').eq(a-1).find('.wizard-icon').addClass('flaticon2-information').removeClass('flaticon2-check-mark');





        $('body').on('click', '#kt_login_forgot', function () {
            console.log(12);
            $('.login-signin').hide(400);
            $('.login-forgot').show(400);
          });
          $('body').on('click', '#kt_login_forgot_cancel', function () {
            console.log(12);
            $('.login-signin').show(400);
            $('.login-forgot').hide(400);
          });

        $('body').on('click', '.show', function() {

          $(this).closest('.par').find('.inp').removeClass('hide');
          $(this).hide(400)
        })
        $('body').on('click', '#new_ostad', function() {
            $('#ostad_port').show(400)
        })
        $('body').on('click', '#show_tags', function() {
            $('#tags_section').show(400)
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

        $('#ostan').on('change', function (e) {
            var ele=$(this)

            var str= {'ostan':ele.val()}
           var res= lara_ajax('/admin/similar_tags/'+ele.val(),str)
           $('#similar_list').html(res.body)
        });
        $('body').on('click', '#add_ex', function() {
            let val =$('#ex_p').val();
            // val = val.replace(/\s/g, '');
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
            // val = val.replace(/\s/g, '');
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
        $('body').on('click', '#add_ex2', function() {
            let val =$('#ex_p2').val();
            // val = val.replace(/\s/g, '');\
            if(val.length<3){
                noty('حداقل سه کاراکتر وارد نمایید')
                return

            }

            let el =`
            <span type="button" class="btn self btn-outline-success mr-2">
            ${val}
            <input type="text" name="en_tags[]" hidden="" value="${val}">
             </span>
            `
            $('#en_tags').append(el);
            $('#ex_p2').val('');
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


    $('#tags').on('change', function (e) {
        var ele = $(this);
        console.log(ele.val())
        var str = {
          'tags': ele.val()
        };
        var res = lara_ajax('/admin/similar_curt' , str);
        // $('#similar_tags').html(res.body);
      });

      $("form").bind("keypress", function (e) {
        if (e.keyCode == 13) {
            $("#btnSearch").attr('value');
            //add more buttons here
            return false;
        }
    });
function lara_ajax(url,str ){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN':document.head.querySelector('meta[name="csrf-token"]').content,
        }
    });
    var jqXHR=   $.ajax(url,{
        type:'post',
        data:  str,
        headers:{
            'X-CSRF-TOKEN':document.head.querySelector('meta[name="csrf-token"]').content,
            // 'Content-Type':'application/json,charset=utf-8'
        },
        dataType:'json',
        // async:false,
        // cache:false,
        // contentType: false,
        // processData: false,

        success:function (data) {
            console.log(data);
            $('#similar_tags').html(data.body);
        },
        error: function (request, status, error) {
            console.log(error);
        }
    });
    // var res= JSON.parse(jqXHR.responseText)
    // var all = Object.keys(res);
    // return res ;
    }
}
// $(document).ready(function(){
//     if (jQuery) {



//     }
//   });
