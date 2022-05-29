@extends('layouts.main-rt')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vector-map.css')}}">
@endpush

@section('container')
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid general-widget">
      <div class="row">
        <div class="col-sm-6 col-xl-3 col-lg-6">
          <div class="card o-hidden border-0">
            <div class="bg-primary b-r-4 card-body">
              <div class="media static-top-widget">
                <div class="align-self-center text-center"><i data-feather="user"></i></div>
                <div class="media-body"><span class="m-0">Jumlah warga</span>
                  <h4 class="mb-0 counter">659</h4><i class="icon-bg" data-feather="user"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3 col-lg-6">
          <div class="card o-hidden border-0">
            <div class="bg-danger b-r-4 card-body">
              <div class="media static-top-widget">
                <div class="align-self-center text-center"><i data-feather="sun"></i></div>
                <div class="media-body"><span class="m-0">Covid-19</span>
                  <h4 class="mb-0 counter">56</h4><i class="icon-bg" data-feather="sun"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3 col-lg-6">
          <div class="card o-hidden border-0">
            <div class="bg-secondary b-r-4 card-body">
              <div class="media static-top-widget">
                <div class="align-self-center text-center"><i data-feather="calendar"></i></div>
                <div class="media-body"><span class="m-0">Agenda</span>
                  <h4 class="mb-0 counter">93</h4><i class="icon-bg" data-feather="calendar"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3 col-lg-6">
          <div class="card o-hidden border-0">
            <div class="bg-warning b-r-4 card-body">
              <div class="media static-top-widget">
                <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                <div class="media-body"><span class="m-0">Kepala Keluarga</span>
                  <h4 class="mb-0 counter">531</h4><i class="icon-bg" data-feather="user-plus"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 xl-50 col-sm- box-col-3">
  
        </div>
        <div class="col-xl-3 xl-100 box-col-3">
          <div class="card">
            <div class="cal-date-widget card-body">
              <div class="row">
                <div class="col-xl-6 col-xs-12 col-md-6 col-sm-6">
                  <div class="cal-datepicker">
                    <div class="datepicker-here float-sm-end" data-language="en"> </div>
                  </div>
                </div>
                <div class="col-xl-6 col-xs-12 col-md-6 col-sm-6">
                  <div class="card">
                    <div class="mobile-clock-widget">
                      <div class="bg-svg">
                        <svg class="climacon climacon_cloudLightningMoon" id="cloudLightningMoon" version="1.1" viewBox="15 15 70 70">
                          <clippath id="moonCloudFillClipfill11">
                            <path d="M0,0v100h100V0H0z M60.943,46.641c-4.418,0-7.999-3.582-7.999-7.999c0-3.803,2.655-6.979,6.211-7.792c0.903,4.854,4.726,8.676,9.579,9.58C67.922,43.986,64.745,46.641,60.943,46.641z"></path>
                          </clippath>
                          <clippath id="cloudFillClipfill19">
                            <path d="M15,15v70h70V15H15z M59.943,61.639c-3.02,0-12.381,0-15.999,0c-6.626,0-11.998-5.371-11.998-11.998c0-6.627,5.372-11.999,11.998-11.999c5.691,0,10.434,3.974,11.665,9.29c1.252-0.81,2.733-1.291,4.334-1.291c4.418,0,8,3.582,8,8C67.943,58.057,64.361,61.639,59.943,61.639z"></path>
                          </clippath>
                          <g class="climacon_iconWrap climacon_iconWrap-cloudLightningMoon">
                            <g clip-path="url(#cloudFillClip)">
                              <g class="climacon_wrapperComponent climacon_wrapperComponent-moon climacon_componentWrap-moon_cloud" clip-path="url(#moonCloudFillClip)">
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" d="M61.023,50.641c-6.627,0-11.999-5.372-11.999-11.998c0-6.627,5.372-11.999,11.999-11.999c0.755,0,1.491,0.078,2.207,0.212c-0.132,0.576-0.208,1.173-0.208,1.788c0,4.418,3.582,7.999,8,7.999c0.614,0,1.212-0.076,1.788-0.208c0.133,0.717,0.211,1.452,0.211,2.208C73.021,45.269,67.649,50.641,61.023,50.641z"></path>
                              </g>
                            </g>
                            <g class="climacon_wrapperComponent climacon_wrapperComponent-lightning">
                              <polygon class="climacon_component climacon_component-stroke climacon_component-stroke_lightning" points="48.001,51.641 57.999,51.641 52,61.641 58.999,61.641 46.001,77.639 49.601,65.641 43.001,65.641 "></polygon>
                            </g>
                            <g class="climacon_wrapperComponent climacon_wrapperComponent-cloud">
                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M59.999,65.641c-0.28,0-0.649,0-1.062,0l3.584-4.412c3.182-1.057,5.478-4.053,5.478-7.588c0-4.417-3.581-7.998-7.999-7.998c-1.602,0-3.083,0.48-4.333,1.29c-1.231-5.316-5.974-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,12c0,5.446,3.632,10.039,8.604,11.503l-1.349,3.777c-6.52-2.021-11.255-8.098-11.255-15.282c0-8.835,7.163-15.999,15.998-15.999c6.004,0,11.229,3.312,13.965,8.204c0.664-0.114,1.338-0.205,2.033-0.205c6.627,0,11.999,5.371,11.999,11.999C71.999,60.268,66.626,65.641,59.999,65.641z"></path>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div>
                        <ul class="clock" id="clock">
                          <li class="hour" id="hour"></li>
                          <li class="min" id="min"></li>
                          <li class="sec" id="sec"></li>
                        </ul>
                        <div class="date f-24 mb-2" id="date"><span id="monthDay"></span><span id="year">, </span></div>
                        <div>
                          <p class="m-0 f-14 text-light">Riau, Indonesia </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 xl-100 box-col-12">
        <div class="card">
          <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h5>Agenda</h5>
            <div class="setting-list">
              <ul class="list-unstyled setting-option">
                <li>
                  <div class="setting-primary"><i class="icon-settings"></i></div>
                </li>
                <li><i class="view-html fa fa-code font-primary"></i></li>
                <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                <li><i class="icofont icofont-error close-card font-primary"></i></li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <div class="user-status table-responsive">
              <table class="table table-bordernone">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama agenda</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="f-w-600">1</td>
                    <td class="f-w-600">Simply dummy text of the printing</td>
                    <td>1</td>
                    <td>
                      <div class="span badge rounded-pill pill-badge-secondary">6523</div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="code-box-copy">
              <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#products-cart" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
              <pre><code class="language-html" id="products-cart">&lt;div class="card"&gt;
   &lt;div class="card-header pb-0 d-flex justify-content-between align-items-center"&gt;
     &lt;h5&gt;PRODUCTS CART&lt;/h5&gt;
     &lt;div class="setting-list"&gt;
       &lt;ul class="list-unstyled setting-option"&gt;
         &lt;li&gt;
           &lt;div class="setting-primary"&gt;&lt;i class="icon-settings"&gt;&lt;/i&gt;&lt;/div&gt;
         &lt;/li&gt;
         &lt;li&gt;&lt;i class="view-html fa fa-code font-primary"&gt;&lt;/i&gt;&lt;/li&gt;
         &lt;li&gt;&lt;i class="icofont icofont-maximize full-card font-primary"&gt;&lt;/i&gt;&lt;/li&gt;
         &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card font-primary"&gt;&lt;/i&gt;&lt;/li&gt;
         &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card font-primary"&gt;&lt;/i&gt;&lt;/li&gt;
         &lt;li&gt;&lt;i class="icofont icofont-error close-card font-primary"&gt;&lt;/i&gt;&lt;/li&gt;
       &lt;/ul&gt;
     &lt;/div&gt;
   &lt;/div&gt;
   &lt;div class="card-body"&gt;
     &lt;div class="user-status table-responsive"&gt;
       &lt;table class="table table-bordernone"&gt;
         &lt;thead&gt;
           &lt;tr&gt;
             &lt;th scope="col"&gt;Details&lt;/th&gt;
             &lt;th scope="col"&gt;Quantity&lt;/th&gt;
             &lt;th scope="col"&gt;Status&lt;/th&gt;
             &lt;th scope="col"&gt;Price&lt;/th&gt;
           &lt;/tr&gt;
         &lt;/thead&gt;
         &lt;tbody&gt;
           &lt;tr&gt;
             &lt;td class="f-w-600"&gt;Simply dummy text of the printing&lt;/td&gt;
             &lt;td&gt;1&lt;/td&gt;
             &lt;td class="font-primary"&gt;Pending&lt;/td&gt;
             &lt;td&gt;
               &lt;div class="span badge rounded-pill pill-badge-secondary"&gt;6523&lt;/div&gt;
             &lt;/td&gt;
           &lt;/tr&gt;
           &lt;tr&gt;
             &lt;td class="f-w-600"&gt;Long established&lt;/td&gt;
             &lt;td&gt;5&lt;/td&gt;
             &lt;td class="font-secondary"&gt;Cancle&lt;/td&gt;
             &lt;td&gt;
               &lt;div class="span badge rounded-pill pill-badge-success"&gt;6523&lt;/div&gt;
             &lt;/td&gt;
           &lt;/tr&gt;
           &lt;tr&gt;
             &lt;td class="f-w-600"&gt;sometimes by accident&lt;/td&gt;
             &lt;td&gt;10&lt;/td&gt;
             &lt;td class="font-secondary"&gt;Cancle&lt;/td&gt;
             &lt;td&gt;
               &lt;div class="span badge rounded-pill pill-badge-warning"&gt;6523&lt;/div&gt;
             &lt;/td&gt;
           &lt;/tr&gt;
           &lt;tr&gt;
             &lt;td class="f-w-600"&gt;Classical Latin literature&lt;/td&gt;
             &lt;td&gt;9&lt;/td&gt;
             &lt;td class="font-primary"&gt;Return&lt;/td&gt;
             &lt;td&gt;
               &lt;div class="span badge rounded-pill pill-badge-primary"&gt;6523&lt;/div&gt;
             &lt;/td&gt;
           &lt;/tr&gt;
           &lt;tr&gt;
             &lt;td class="f-w-600"&gt;keep the site on the Internet&lt;/td&gt;
             &lt;td&gt;8&lt;/td&gt;
             &lt;td class="font-primary"&gt;Pending&lt;/td&gt;
             &lt;td&gt;
                 &lt;div class="span badge rounded-pill pill-badge-danger"&gt;6523&lt;/div&gt;
             &lt;/td&gt;
           &lt;/tr&gt;
           &lt;tr&gt;
               &lt;td class="f-w-600"&gt;Molestiae consequatur&lt;/td&gt;
               &lt;td&gt;3&lt;/td&gt;
               &lt;td class="font-secondary"&gt;Cancle&lt;/td&gt;
               &lt;td&gt;
                 &lt;div class="span badge rounded-pill pill-badge-info"&gt;6523&lt;/div&gt;
               &lt;/td&gt;
           &lt;/tr&gt;
           &lt;tr&gt;
             &lt;td class="f-w-600"&gt;Pain can procure&lt;/td&gt;
             &lt;td&gt;8&lt;/td&gt;
             &lt;td class="font-primary"&gt;Return&lt;/td&gt;
             &lt;td&gt;
               &lt;div class="span badge rounded-pill pill-badge-primary"&gt;6523&lt;/div&gt;
             &lt;/td&gt;
           &lt;/tr&gt;
         &lt;/tbody&gt;
       &lt;/table&gt;
     &lt;/div&gt;
   &lt;/div&gt;
  &lt;/div&gt;</code></pre>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 xl-100 box-col-12">
        <div class="card employee-status">
          <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h5>Warga RW 04</h5>
            <div class="setting-list">
              <ul class="list-unstyled setting-option">
                <li>
                  <div class="setting-primary"><i class="icon-settings"></i></div>
                </li>
                <li><i class="view-html fa fa-code font-primary"></i></li>
                <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                <li><i class="icofont icofont-error close-card font-primary"></i></li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <div class="user-status table-responsive">
              <table class="table table-bordernone">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomor HP</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="bd-t-none u-s-tb">
                      <div class="align-middle image-sm-size"><img class="img-radius align-top m-r-15 rounded-circle" src="../assets/images/user/4.jpg" alt="">
                        <div class="d-inline-block">
                          <h6>John Deo <span class="text-muted">(14+ Online)</span></h6>
                        </div>
                      </div>
                    </td>
                    <td>Designer</td>
                    <td>
                      <div class="progress-showcase">
                        <div class="progress" style="height: 8px;">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="bd-t-none u-s-tb">
                      <div class="align-middle image-sm-size d-flex align-items-center"><img class="img-radius align-top m-r-15 rounded-circle" src="../assets/images/user/1.jpg" alt="">
                        <div class="d-inline-block">
                          <h6>Holio Mako <span class="text-muted">(250+ Online)</span></h6>
                        </div>
                      </div>
                    </td>
                    <td>Developer</td>
                    <td>
                      <div class="progress-showcase">
                        <div class="progress" style="height: 8px;">
                          <div class="progress-bar bg-secondary" role="progressbar" style="width: 70%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="bd-t-none u-s-tb">
                      <div class="align-middle image-sm-size"><img class="img-radius align-top m-r-15 rounded-circle" src="../assets/images/user/5.jpg" alt="">
                        <div class="d-inline-block">
                          <h6>Mohsib lara<span class="text-muted">(99+ Online)</span></h6>
                        </div>
                      </div>
                    </td>
                    <td>Tester</td>
                    <td>
                      <div class="progress-showcase">
                        <div class="progress" style="height: 8px;">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="bd-t-none u-s-tb">
                      <div class="align-middle image-sm-size"><img class="img-radius align-top m-r-15 rounded-circle" src="../assets/images/user/6.jpg" alt="">
                        <div class="d-inline-block">
                          <h6>Hileri Soli <span class="text-muted">(150+ Online)</span></h6>
                        </div>
                      </div>
                    </td>
                    <td>Designer</td>
                    <td>
                      <div class="progress-showcase">
                        <div class="progress" style="height: 8px;">
                          <div class="progress-bar bg-secondary" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="bd-t-none u-s-tb">
                      <div class="align-middle image-sm-size"><img class="img-radius align-top m-r-15 rounded-circle" src="../assets/images/user/7.jpg" alt="">
                        <div class="d-inline-block">
                          <h6>Pusiz bia <span class="text-muted">(14+ Online)</span></h6>
                        </div>
                      </div>
                    </td>
                    <td>Designer</td>
                    <td>
                      <div class="progress-showcase">
                        <div class="progress" style="height: 8px;">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="code-box-copy">
              <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#emplotee-status" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
              <pre><code class="language-html" id="emplotee-status">&lt;div class="card"&gt;
   &lt;div class="card-header pb-0 d-flex justify-content-between align-items-center"&gt;
     &lt;h5&gt;EMPLOYEE STATUS&lt;/h5&gt;
     &lt;div class="setting-list"&gt;
       &lt;ul class="list-unstyled setting-option"&gt;
         &lt;li&gt;
           &lt;div class="setting-primary"&gt;&lt;i class="icon-settings"&gt;&lt;/i&gt;&lt;/div&gt;
         &lt;/li&gt;
         &lt;li&gt;&lt;i class="view-html fa fa-code font-primary"&gt;&lt;/i&gt;&lt;/li&gt;
         &lt;li&gt;&lt;i class="icofont icofont-maximize full-card font-primary"&gt;&lt;/i&gt;&lt;/li&gt;
         &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card font-primary"&gt;&lt;/i&gt;&lt;/li&gt;
         &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card font-primary"&gt;&lt;/i&gt;&lt;/li&gt;
         &lt;li&gt;&lt;i class="icofont icofont-error close-card font-primary"&gt;&lt;/i&gt;&lt;/li&gt;
       &lt;/ul&gt;
     &lt;/div&gt;
   &lt;/div&gt;
   &lt;div class="card-body"&gt;
     &lt;div class="user-status table-responsive"&gt;
       &lt;table class="table table-bordernone"&gt;
         &lt;thead&gt;
           &lt;tr&gt;
             &lt;th scope="col"&gt;Name&lt;/th&gt;
             &lt;th scope="col"&gt;Alamt&lt;/th&gt;
             &lt;th scope="col"&gt;Nomor HP&lt;/th&gt;
             &lt;th scope="col"&gt;Experience&lt;/th&gt;
           &lt;/tr&gt;
         &lt;/thead&gt;
         &lt;tbody&gt;
           &lt;tr&gt;
             &lt;td class="bd-t-none u-s-tb"&gt;
               &lt;div class="align-middle image-sm-size"&gt;&lt;img class="img-radius align-top m-r-15 rounded-circle" src="../assets/images/user/4.jpg" alt=""&gt;
                 &lt;div class="d-inline-block"&gt;
                   &lt;h6&gt;John Deo &lt;span class="text-muted"&gt;(14+ Online)&lt;/span&gt;&lt;/h6&gt;
                 &lt;/div&gt;
               &lt;/div&gt;
             &lt;/td&gt;
             &lt;td&gt;Designer&lt;/td&gt;
             &lt;td&gt;
               &lt;div class="progress-showcase"&gt;
                 &lt;div class="progress" style="height: 8px;"&gt;
                   &lt;div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                 &lt;/div&gt;
               &lt;/div&gt;
             &lt;/td&gt;
             &lt;td&gt;2 Year&lt;/td&gt;
           &lt;/tr&gt;
           &lt;tr&gt;
             &lt;td class="bd-t-none u-s-tb"&gt;
               &lt;div class="align-middle image-sm-size d-flex align-items-center"&gt;&lt;img class="img-radius align-top m-r-15 rounded-circle" src="../assets/images/user/1.jpg" alt=""&gt;
                 &lt;div class="d-inline-block"&gt;
                   &lt;h6&gt;Holio Mako &lt;span class="text-muted"&gt;(250+ Online)&lt;/span&gt;&lt;/h6&gt;
                 &lt;/div&gt;
               &lt;/div&gt;
             &lt;/td&gt;
             &lt;td&gt;Developer&lt;/td&gt;
             &lt;td&gt;
               &lt;div class="progress-showcase"&gt;
                 &lt;div class="progress" style="height: 8px;"&gt;
                   &lt;div class="progress-bar bg-secondary" role="progressbar" style="width: 70%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                 &lt;/div&gt;
               &lt;/div&gt;
             &lt;/td&gt;
            &lt;td&gt;3 Year&lt;/td&gt;
          &lt;/tr&gt;
          &lt;tr&gt;
            &lt;td class="bd-t-none u-s-tb"&gt;
              &lt;div class="align-middle image-sm-size"&gt;&lt;img class="img-radius align-top m-r-15 rounded-circle" src="../assets/images/user/5.jpg" alt=""&gt;
                  &lt;div class="d-inline-block"&gt;
                    &lt;h6&gt;Mohsib lara&lt;span class="text-muted"&gt;(99+ Online)&lt;/span&gt;&lt;/h6&gt;
                  &lt;/div&gt;
               &lt;/div&gt;
             &lt;/td&gt;
             &lt;td&gt;Tester&lt;/td&gt;
             &lt;td&gt;
               &lt;div class="progress-showcase"&gt;
                 &lt;div class="progress" style="height: 8px;"&gt;
                   &lt;div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                 &lt;/div&gt;
               &lt;/div&gt;
             &lt;/td&gt;
             &lt;td&gt;5 Month&lt;/td&gt;
           &lt;/tr&gt;
           &lt;tr&gt;
             &lt;td class="bd-t-none u-s-tb"&gt;
               &lt;div class="align-middle image-sm-size"&gt;&lt;img class="img-radius align-top m-r-15 rounded-circle" src="../assets/images/user/6.jpg" alt=""&gt;
                 &lt;div class="d-inline-block"&gt;
                   &lt;h6&gt;Hileri Soli &lt;span class="text-muted"&gt;(150+ Online)&lt;/span&gt;&lt;/h6&gt;
                 &lt;/div&gt;
               &lt;/div&gt;
             &lt;/td&gt;
             &lt;td&gt;Designer&lt;/td&gt;
             &lt;td&gt;
               &lt;div class="progress-showcase"&gt;
                 &lt;div class="progress" style="height: 8px;"&gt;
                   &lt;div class="progress-bar bg-secondary" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                 &lt;/div&gt;
               &lt;/div&gt;
             &lt;/td&gt;
             &lt;td&gt;3 Month&lt;/td&gt;
           &lt;/tr&gt;
           &lt;tr&gt;
             &lt;td class="bd-t-none u-s-tb"&gt;
               &lt;div class="align-middle image-sm-size"&gt;&lt;img class="img-radius align-top m-r-15 rounded-circle" src="../assets/images/user/7.jpg" alt=""&gt;
                 &lt;div class="d-inline-block"&gt;
                    &lt;h6&gt;Pusiz bia &lt;span class="text-muted"&gt;(14+ Online)&lt;/span&gt;&lt;/h6&gt;
                 &lt;/div&gt;
               &lt;/div&gt;
             &lt;/td&gt;
             &lt;td&gt;Designer&lt;/td&gt;
               &lt;td&gt;
                 &lt;div class="progress-showcase"&gt;
                   &lt;div class="progress" style="height: 8px;"&gt;
                     &lt;div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                     &lt;/div&gt;
                 &lt;/div&gt;
               &lt;/td&gt;
               &lt;td&gt;5 Year&lt;/td&gt;
           &lt;/tr&gt;
         &lt;/tbody&gt;
       &lt;/table&gt;
     &lt;/div&gt;
   &lt;/div&gt;
  &lt;/div&gt;</code></pre>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
  </div>
  @endsection
  @push('js')
  