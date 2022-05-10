<?php
//  svg-icon-primary
//  svg-icon-primary
$check =' flaticon2-check-mark';

$circle='flaticon2-information';

?>


<div class="card-body p-0" id="prog">

    <div class="wizard wizard-1" id="kt_wizard_v1" data-wizard-state="first" data-wizard-clickable="false">
        <div class="wizard-nav border-bottom">
            <div class="wizard-steps p-8 p-lg-10">
                <!--begin::ویزارد گام 1 Nav-->
                <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                    <div class="wizard-label">
                        <i class="wizard-icon flaticon2-check-mark"></i>
                        <h3 class="wizard-title">1.
                            {{ __('sentences.pass_quiz') }}

                        </h3>
                    </div>
                    <span class="svg-icon svg-icon-xl wizard-arrow">
                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\موقعیت یاب\Arrow-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"></rect>
                                <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon--></span>
                </div>
                <!--end::ویزارد گام 1 Nav-->

                <!--begin::ویزارد گام 2 Nav-->
                <div class="wizard-step" data-wizard-type="step" data-wizard-state="{{in_array($status,['curt','plan','booklet'])?'current':'pending'}}">
                    <div class="wizard-label">
                        <i class="wizard-icon {{in_array($status,['curt','plan','booklet'])? $check:$circle}}"></i>
                        <h3 class="wizard-title">2.
                            {{ __('sentences.pass_curt') }}

                        </h3>
                    </div>
                    <span class="svg-icon svg-icon-xl wizard-arrow">
                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\موقعیت یاب\Arrow-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"></rect>
                                <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon--></span>
                </div>
                <!--end::ویزارد گام 2 Nav-->
                <!--begin::ویزارد گام 3 Nav-->
                <div class="wizard-step" data-wizard-type="step" data-wizard-state="{{in_array($status,['plan','booklet' ])?'current':'pending'}}">
                    <div class="wizard-label">
                        <i class="wizard-icon {{in_array($status,['plan','booklet' ])? $check:$circle}}"></i>

                        <h3 class="wizard-title">3.
                            {{ __('sentences.pass_thesis') }}



                        </h3>
                    </div>
                    <span class="svg-icon svg-icon-xl wizard-arrow">
                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\موقعیت یاب\Arrow-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"></rect>
                                <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon--></span>
                </div>
                <!--end::ویزارد گام 3 Nav-->

                <!--begin::ویزارد گام 4 Nav-->
                <div class="wizard-step" data-wizard-type="step" data-wizard-state="{{in_array($status,['booklet' ])?'current':'pending'}}">
                    <div class="wizard-label">
                        <i class="wizard-icon {{in_array($status,['booklet'])? $check:$circle}}"></i>
                        <h3 class="wizard-title">4.

                            {{ __('sentences.pass_booklet') }}
                        </h3>
                    </div>
                    <span class="svg-icon svg-icon-xl wizard-arrow">
                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\موقعیت یاب\Arrow-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"></rect>
                                <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon--></span>
                </div>
                <!--end::ویزارد گام 4 Nav-->

                <!--begin::ویزارد گام 5 Nav-->
                <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                    <div class="wizard-label">
                        <i class="wizard-icon {{in_array($status,['booklet'])? $check:$circle}}"></i>
                        <h3 class="wizard-title">5.
                            {{ __('sentences.pass_perdefense') }}

                        </h3>
                    </div>
                    <span class="svg-icon svg-icon-xl wizard-arrow">
                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\موقعیت یاب\Arrow-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"></rect>
                                <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon--></span>
                </div>
                <!--end::ویزارد گام 5 Nav-->

                <!--begin::ویزارد گام 5 Nav-->
                <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                    <div class="wizard-label">
                        <i class="wizard-icon {{in_array($status,['booklet'])? $check:$circle}}"></i>
                        <h3 class="wizard-title">6.
                            {{ __('sentences.pass_defense') }}

                        </h3>
                    </div>
                   <span class="svg-icon svg-icon-xl wizard-arrow last">
                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\موقعیت یاب\Arrow-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"></rect>
                            <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "></path>
                        </g>
                    </svg>
                    <!--end::Svg Icon--></span>
                </div>
                <!--end::ویزارد گام 5 Nav-->
            </div>
        </div>
    </div>
</div>
