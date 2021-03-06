@include('main.layout.header')

<style>
	.bootstrapWizard li{
		width:33.3333%;
	}
    .titles .form-group{
        /* margin-top: 28px; */
        margin-left: 6rem;
        font-size: 15px;
        margin-bottom: 0;
        margin-bottom: 15px;
        height: 45px;
        margin-top:15px;
    }
    .titles .form-group .input-group{
        vertical-align: middle;
    }
    .nav.nav-tabs > li.disabled { pointer-events: none; a { color: silver; } }
</style>
<!-- MAIN PANEL -->
<div id="main" role="main">
<div id="content">
<!-- widget grid -->
<section id="widget-grid" class="">

    <!-- row -->
    <div class="row">
<!-- NEW WIDGET START -->
						<article class="col-sm-12 col-md-12 col-lg-12">

							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-deletebutton="false">
								<!-- widget options:
								usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

data-widget-colorbutton="false"
								data-widget-editbutton="false"
								data-widget-togglebutton="false"
								data-widget-deletebutton="false"
								data-widget-fullscreenbutton="false"
								data-widget-custombutton="false"
								data-widget-collapsed="true"
								data-widget-sortable="false"

                                    -->
								<header>
									<span class="widget-icon"> <i class="fa fa-check"></i> </span>
									<h2>Search building </h2>

								</header>

								<!-- widget div-->
								<div>

									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->

									</div>
									<!-- end widget edit box -->

									<!-- widget content -->
									<div class="widget-body">

										<div class="row">
											<form id="wizard-1" novalidate="novalidate">
												<div id="bootstrap-wizard-1" class="col-sm-12">
													<div class="form-bootstrapWizard">
														<ul class="bootstrapWizard form-wizard">
															<li class="active" data-target="#step1">
																<a href="#tab1" data-toggle="tab"> <span class="step">1</span> <span class="title">Upload</span> </a>
															</li>
															<li data-target="#step2">
																<a href="#tab2" data-toggle="tab"> <span class="step">2</span> <span class="title">Match</span> </a>
															</li>
															<li data-target="#step3">
																<a href="#tab3" data-toggle="tab"> <span class="step">3</span> <span class="title">Search</span> </a>
															</li>

														</ul>
														<div class="clearfix"></div>
													</div>
													<div class="tab-content">
														<div class="tab-pane active" id="tab1">
															<br>
															<h3><strong>Step 1 </strong> - File uploading</h3>

															<div class="row">

																<div class="col-sm-12">
																	<div hidden class="alert alert-danger alert-upload fade in">

																		<i class="fa-fw fa fa-times"></i>
																		<strong>Error!</strong> <span class="errror-text"></span>
																	</div>
																	<div class="form-group">
																		<ul id="filelist"></ul>
																		<div hidden class="progress">
																			<div class="progress progress-striped active">
																				<div class="progress-bar bg-color-purple" role="progressbar" style=""></div>
																			</div>
																		</div>
																		<div id="container">
																			<a id="browse" class="btn btn-primary" href="javascript:;">[Browse...]</a>
																			<a id="start-upload" class="btn btn-default" href="javascript:;">[Start Upload]</a>
																			<a id="reset" class="btn btn-default" href="javascript:;">[Reset]</a>
																		</div>
																	</div>
                                                                    <div class="well well-sm">
                                                                        <h3 class="text-primary">File requirements</h3>
                                                                        <table class="table table-bordered">

                                                                            <tbody>


                                                                            <!-- new tr -->
                                                                            <tr>
                                                                                <td>
                                                                                    <p class="txt-color-greenDark">
                                                                                       Extensions
                                                                                    </p></td>

                                                                                <td>csv, xls, xlsx</td>
                                                                            </tr>
																			<tr>
                                                                                <td>
                                                                                    <p class="txt-color-greenDark">
                                                                                       Amount of files
                                                                                    </p></td>

                                                                                <td>1</td>
                                                                            </tr>




                                                                            </tbody>

                                                                        </table>

                                                                    </div>

																</div>
                                                                <!-- Widget ID (each widget will need unique ID)-->


                                                                <!-- end widget -->
															</div>


														</div>
														<div class="tab-pane" id="tab2">
															<br>
															<h3><strong>Step 2</strong> - Matching</h3>

															<div class="row">
																<div class="col-sm-4 titles">
																	<div class="form-group">
																		<div class="input-group">
																			<p>Product title</p>
																		</div>
																	</div>
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <p>Product UPS</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <p>Product ASIN</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <p>Product price</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <p>Product image</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <p>Product note</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <p>Product quantity</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <p>Product url</p>
                                                                        </div>
                                                                    </div>


																</div>
																<div class="col-sm-8">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="fa fa-font fa-lg fa-fw"></i></span>
                                                                                <select class="form-control input-lg product-input title-prod" name="productData[title]">
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="fa fa-amazon fa-lg fa-fw"></i></span>
                                                                                <select class="form-control input-lg product-input upc" name="productData[upc]">
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="fa fa-amazon fa-lg fa-fw"></i></span>
                                                                                <select class="form-control input-lg product-input asin" name="productData[asin]">
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="fa fa-dollar fa-lg fa-fw"></i></span>
                                                                                <select class="form-control input-lg product-input" name="productData[price]">
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="fa fa-image fa-lg fa-fw"></i></span>
                                                                                <select class="form-control input-lg product-input" name="productData[image]">
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="fa fa-sticky-note fa-lg fa-fw"></i></span>
                                                                                <select class="form-control input-lg product-input" name="productData[note]">
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="fa fa-list-ol fa-lg fa-fw"></i></span>
                                                                                <select class="form-control input-lg product-input" name="productData[quantity]">
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="fa fa-link fa-lg fa-fw"></i></span>
                                                                                <select class="form-control input-lg product-input" name="productData[url]">
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                            </div>
														</div>

														<div class="tab-pane" id="tab3">
															<br>
															<h3><strong>Step 3</strong> - Start searching</h3>
															<br>
															<h1 class="text-center text-success"><strong><i class="fa fa-check fa-lg"></i> Almost done!</strong></h1>
															<h4 class="text-center">Click Scan to start searching</h4>
															<div style="margin-top:15px;" class="text-center"><a id="scan" class="btn btn-primary" href="javascript:;">Scan</a></div>

															<br>
															<br>
														</div>

														<div class="form-actions">
															<div class="row">
																<div class="col-sm-12">
																	<ul class="pager wizard no-margin">
																		<!--<li class="previous first disabled">
																		<a href="javascript:void(0);" class="btn btn-lg btn-default"> First </a>
																		</li>-->
																		<li class="previous disabled">
																			<a href="javascript:void(0);" class="btn btn-lg btn-default"> Previous </a>
																		</li>
																		<!--<li class="next last">
																		<a href="javascript:void(0);" class="btn btn-lg btn-primary"> Last </a>
																		</li>-->
																		<li class="next">
																			<a href="javascript:void(0);" class="btn btn-lg txt-color-darken"> Next </a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>

													</div>
												</div>
											</form>
										</div>

									</div>
									<!-- end widget content -->

								</div>
								<!-- end widget div -->

							</div>
							<!-- end widget -->

						</article>
						<!-- WIDGET END -->

    </div>
</section>
</div>
</div>
@include('main.layout.footer')

<!-- PAGE RELATED PLUGIN(S) -->
<script src="{{asset('resources/assets/main/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
<script src="{{asset('resources/assets/main/js/plugin/fuelux/wizard/wizard.min.js')}}"></script>



<script src={{ asset('resources/assets/plupload/moxie.min.js') }}></script>
<script src={{ asset('resources/assets/plupload/plupload.js') }}></script>
<script src={{ asset('resources/assets/plupload/upload.js') }}></script>


<script>
    var fileColumns=[];
    var uploadedFile;
</script>

<script type="text/javascript">
	var maxFiles = 1;
    var uploader = new plupload.Uploader({
        browse_button: 'browse', // this can be an id of a DOM element or the DOM element itself
        url: "{{route('uploadscanfile')}}?_token={{ csrf_token() }}",
        multi_selection:false,
        chunk_size: '10mb',
		max_file_count: 1,
        filters : [
            {title : "Excel files", extensions : "csv,xls,xlsx"}
        ]
    });

    uploader.init();

    uploader.bind('FilesAdded', function(up, files) {
        var html = '';
        plupload.each(files, function(file) {
			if (up.files.length > maxFiles) {
			    uploader.files.forEach(function(f){
			        if(f.id != file.id)
			            up.removeFile(f)
                })
			}
			html = '<li id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></li>';

        });
		document.getElementById('filelist').innerHTML = html;
    });

    uploader.bind('UploadProgress', function(up, file) {
        $(".alert-upload").hide();
		$("#start-upload").hide();
		$("#browse").hide();
		$(".moxie-shim").hide();
		$("#reset").hide();
		$(".progress").show();
		$(".progress-bar").css({"width":file.percent+"%"});


        // if (uploader.files.length > 0)
        // 	document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span >' + file.percent + "%</span>";
    });

    uploader.bind('FileUploaded', function(up, file, result) {
        $("#reset").show();
        $(".progress").hide();
        fileColumns = JSON.parse(result.response);
        uploadedFile = file
    });

    uploader.bind('Error', function(up, err) {
        $(".alert-upload .errror-text").text($(".alert-upload .errror-text").text() + "\nError #" + err.code + ": " + err.message);
        uploader.files.length = 0
    });

    document.getElementById('start-upload').onclick = function() {
        console.log(uploader.files)
        if(uploader.files.length>  0)
            uploader.start();
    };

    document.getElementById('reset').onclick = function() {
        $("#start-upload").show();
        $("#browse").show();
        $(".moxie-shim").show();
        uploader.files.length = 0
        document.getElementById('filelist').innerHTML = '';
    };
</script>
<script>
    $(".chunk_size").change(function(){
        uploader.settings.chunk_size = $(".chunk_size").val()+'mb'
        console.log(uploader)
    })
</script>
<script>

    // DO NOT REMOVE : GLOBAL FUNCTIONS!

    $(document).ready(function() {
        $(".close").click(function () {
            $(this).parent().hide();

        })
        pageSetUp();



        //Bootstrap Wizard Validations
        jQuery.validator.addMethod("notEqual", function(value, element, param) {
            console.log($(".asin").val() != 'none', $(".title-prod").val() != 'none' , $(".upc").val() !=  'none')
            return  ($(".asin").val() != 'none' || $(".title-prod").val() != 'none' || $(".upc").val() !=  'none');
        }, "Please specify a different (non-default) value");

        var $validator = $("#wizard-1").validate({

            rules: {
                scanfileupload: {
                    required: true,
                },
                "productData[upc]": {
        			notEqual: "none"
                },
                "productData[title]": {
                    notEqual: "none"
                },
                "productData[asin]":
				{
                    notEqual: "none"
                }
            },
            highlight: function (element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });

        $('#bootstrap-wizard-1').bootstrapWizard({
            'tabClass': 'form-wizard',
            onTabClick: function(tab, navigation, index) {
                return false;
            },
            'onNext': function (tab, navigation, index) {
                if(index == 1 &&  ((uploader.files.length == 0) || (uploader.files.length > 0 && uploader.files[0].percent != 100)))
				{
				    $(".alert-upload .errror-text").text("File has not uploaded")
                    $(".alert-upload").show();
					return false;
				}
                $(".alert-upload").hide();
                if(index == 1  && fileColumns.length > 0)
                {
                    $(".asin").val()
                    $(".title").val()
                    var output = '<option value="none">none</option>';
                    fileColumns.forEach(function(element) {
                        output += '<option value="'+element+'">'+element+'</option>'
                    });

                    $(".product-input").append(output)
                }
                var $valid = $("#wizard-1").valid();
                if (!$valid) {
                    $validator.focusInvalid();
                    return false;
                } else {
                    $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).addClass(
                        'complete');
                    $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).find('.step')
                        .html('<i class="fa fa-check"></i>');
                }
            }
        });


        // fuelux wizard
        var wizard = $('.wizard').wizard();

        wizard.on('finished', function (e, data) {
            //$("#fuelux-wizard").submit();
            //console.log("submitted!");
            $.smallBox({
                title: "Congratulations! Your form was submitted",
                content: "<i class='fa fa-clock-o'></i> <i>1 seconds ago...</i>",
                color: "#5F895F",
                iconSmall: "fa fa-check bounce animated",
                timeout: 4000
            });

        });


    })

</script>


<script>
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': '{{csrf_token()}}',
        }
    });
    $("#scan").click(() => {
        var matchData = $("#wizard-1").serialize()+'&fileName='+uploader.files[0].name;
        let url = "{{route('search')}}"
        $.post(url, matchData)
            .done(function( data ) {
                console.log(data)
            });
    })
</script>

