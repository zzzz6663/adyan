@extends('master.main')
{{-- @php($side=true) --}}
@section('main')
<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">


            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            {{ __('sentences.users_table') }}
                             <span class="text-muted pt-2 font-size-sm d-block">
                                {{ __('sentences.statement_list') }}
                            </span>
                        </h3>
                    </div>

                </div>
                <div class="card-body">

                </div>
            </div>
            <!--end::Card-->


            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
            <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
            <script>
                function getPDF(){

                    var HTML_Width = $(".canvas_div_pdf").width();
                    var HTML_Height = $(".canvas_div_pdf").height();
                    var top_left_margin = -0;
                    var PDF_Width = 595;
                    var PDF_Height = 842;
                    var canvas_image_width = HTML_Width;
                    var canvas_image_height = HTML_Height;

                    var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;


                    html2canvas($(".canvas_div_pdf")[0],{
                        allowTaint:true,
                        quality: 10,
                        scale: 3,

                    }).then(function(canvas) {

                        canvas.getContext('2d');
                        canvas.setAttribute('dir','rtl');
                        // console.log(canvas.height+"  "+canvas.width);


                        var imgData = canvas.toDataURL("image/jpeg", 1.0);
                        console.log(imgData);
                        var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
                        pdf.addImage(imgData, 'JPG', -5, top_left_margin,canvas_image_width,canvas_image_height);


                        for (var i = 1; i <= totalPDFPages; i++) {
                            pdf.addPage(PDF_Width, PDF_Height);
                            pdf.addImage(imgData, 'JPG', -5, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
                        }

                        pdf.save("reizan1.pdf");
                        // $('body').preloader('remove')
                    });
                };
            </script>
        </div>
        <!--end::Container-->
    </div>
</div>

@endsection
