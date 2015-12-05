
<link href="<?php echo base_url('assets'); ?>/css/printCSS.css" rel="stylesheet" type="text/css" media="print"/>
<style>
    .datepicker{z-index:1151 !important;}
</style>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Request Progress</h3>
        </div> 
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Internal Patient</a></li>
                <li><a href="#tab_2" data-toggle="tab">Hospital Patient</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="panel panel-default">
                        <div class="panel-heading clickable">
                            Advance Search          
                        </div>
                        <div class="panel-body" >
                            <form class="form-horizontal" role="form" method="POST">
                                <div class="col-sm-12"> 

                                    <div class="form-group col-lg-6 input-group">
                                        <div class="input-group-btn search-panel">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                <span id="search_concept">Filter by</span> <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#by_name">By Patient Name</a></li>
                                                <li><a href="#by_nic">By Patient NIC</a></li>
                                                <li><a href="#by_id">By Patient ID</a></li>
                                                <li><a href="#by_requestID">By Request ID</a></li>
                                                <li><a href="#by_Priority">By Priority</a></li>
                                                <li><a href="#by_TestType">By Test Type</a></li>
                                                <li><a href="#by_status">By Status</a></li>
                                            </ul>
                                        </div>

                                        <input type="text" class="form-control" id="request_search" placeholder="Search Request" name="request_search" list="request_datalist" autocomplete="off"/>
                                        <datalist id="request_datalist"></datalist>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-success btn-add" id="request_search_btn">Search</button>
                                        </span>
                                    </div>
                                    <!--                                    <div class="row col-sm-12">  
                                                                            <p></p> 
                                                                        </div>-->
                                    <div class="form-group col-lg-6 input-group">
                                        <div class="input-group-btn search-panel1">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                <span id="search_concept1">Filter by</span> <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#by_dueDate">By Due Date</a></li>
                                                <li><a href="#by_requestDate">By Request Date</a></li>

                                            </ul>
                                        </div>

                                        <input type="date" class="form-control" id="request_search1"  name="request_search1"  autocomplete="off"/>

                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-success btn-add" id="patient_search_btn">Search</button>
                                        </span>
                                    </div>
                                </div>


                            </form>   
                        </div>

                    </div>

                    <!--                    <body onload="makeTableScroll();">
                                            <div class="scrollingTable">-->
                    <table id="tbl_internal_requests" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="width: 10%">Request ID</th>


<!--                                <th>Patient ID</th>-->
                                <th style="width: 20%">Patient Name</th>
                                <th style="width: 20%">Test Type</th>
                                <th style="width: 10%">Priority</th>
                                <th style="width: 10%">Request Date</th>
                                <th style="width: 10%">Due Date</th>
                                <th style="width: 10%">Status</th>
                                <th style="width: 10%">Specimen ID</th>
                                <th style="width: 20%">Add Result</th>
                            </tr>
                        </thead>

                        <tbody id="tbody_internal_requests">


                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                        <p data-placement='top' data-toggle='tooltip' title='Edit'>
                            <button class='btn btn-primary btn-xs btn_new_visit' id="addSpecimen" data-title='New Visit' data-toggle='modal' data-target='#viewAddSpecimen'  >
                                <span class='glyphicon glyphicon-ok-circle'></span>   Add Specimen




                            </button>
                        </p>
                        </th>
                        <th></th>


                        </tr>
                        </tfoot>
                    </table>
                    <!--                        </div>
                                        </body>-->
                </div>
                <div class="tab-pane" id="tab_2">
                    <div class="panel panel-default">
                        <div class="panel-heading clickable">
                            Advance Search          
                        </div>
                        <div class="panel-body" >
                            <form class="form-horizontal" role="form" method="POST">
                                <div class="col-sm-12"> 

                                    <div class="form-group col-lg-6 input-group">
                                        <div class="input-group-btn search-panel">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                <span id="search_concept">Filter by</span> <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#by_name">By Patient Name</a></li>
                                                <li><a href="#by_nic">By Patient NIC</a></li>
                                                <li><a href="#by_id">By Patient ID</a></li>
                                                <li><a href="#by_requestID">By Request ID</a></li>
                                                <li><a href="#by_Priority">By Priority</a></li>
                                                <li><a href="#by_TestType">By Test Type</a></li>
                                                <li><a href="#by_status">By Status</a></li>
                                            </ul>
                                        </div>

                                        <input type="text" class="form-control" id="request_search" placeholder="Search Request" name="request_search" list="request_datalist" autocomplete="off"/>
                                        <datalist id="request_datalist"></datalist>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-success btn-add" id="request_search_btn">Search</button>
                                        </span>
                                    </div>
                                    <!--                                    <div class="row col-sm-12">  
                                                                            <p></p> 
                                                                        </div>-->
                                    <div class="form-group col-lg-6 input-group">
                                        <div class="input-group-btn search-panel1">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                <span id="search_concept1">Filter by</span> <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#by_dueDate">By Due Date</a></li>
                                                <li><a href="#by_requestDate">By Request Date</a></li>

                                            </ul>
                                        </div>

                                        <input type="date" class="form-control" id="request_search1"  name="request_search1"  autocomplete="off"/>

                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-success btn-add" id="patient_search_btn">Search</button>
                                        </span>
                                    </div>
                                </div>


                            </form>   
                        </div>

                    </div>
                    <table id="tbl_hospital_requests" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Request ID</th>
                                <th>Patient Name</th>
                                <th>Hospital</th>
                                <th>Test Type</th>
                                <th>Priority</th>
                                <th>Request Date</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Specimen ID</th>
                                <th>Add Result</th>

                            </tr>
                        </thead>

                        <tbody id="tbody_hospital_requests">
                                
                                

                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                        <p data-placement='top' data-toggle='tooltip' title='Edit'>
                            <button class='btn btn-primary btn-xs btn_new_visit' id='addSpecimen' data-title='New Visit' data-toggle='modal' data-target='#viewAddSpecimen' onclick='myFunction()'>
                                <span class='glyphicon glyphicon-ok-circle'></span>   Add Specimen




                            </button>
                        </p>
                        </th>
                        <th></th>


                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ____________________ Mafais _______________________________________ -->

<div class="modal fade" id="viewAddSpecimen" tabindex="-1" role="dialog" aria-labelledby="addSpecimen" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Add Specimen Details</h4>
            </div>
            <div class="modal-body">
                <row class="col-md-12">
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label id="ReqID" name="ReqID" class="form-control " data-toggle="tooltip" data-placement="top" title="" data-original-title="labTestRequest ID"> </label>                

                    </div>
                     
                          
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">            
                        <select id="SpecimenType" name="SpecimenType" class="form-control" data-toggle="tooltip" data-placement="top"  data-original-title="Select SpecimenType" required="">
                            <option selected="selected" value="">Select a Type</option> 
                            <?php foreach ($specimen_types as $item): ?>
                                <option value="<?php echo $item->specimenTypeId; ?>"><?php echo $item->specimenName; ?></option>
                            <?php endforeach; ?>                                 
                        </select>
                    </div>
                </row>
                <row class="col-md-12">
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">                
                        <input  type="text" placeholder="collected date" id="datetimepicker1" name="collected_date" class="form-control"  data-date-format="yyyy-mm-dd">

                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <input  type="text" placeholder="delevere department date date" id="datetimepicker2" name="DeparmentDeleveredDate" class="form-control"  data-date-format="yyyy-mm-dd">

                    </div>
                </row>
                <row class="col-md-12">
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <input id="stored_location" name="stored_location" type="text" class="form-control" placeholder="Location"  value="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Stored or Destroyed Location">
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12 radio">
                        <label>
                            <input type="radio"  name="stored_or_destroyed" value="stored" required="" <?php ?>>
                            Stored
                        </label>
                        <label>
                            <input type="radio"  name="stored_or_destroyed" value="destroyed" required="" <?php ?>>
                            Destroyed
                        </label>
                    </div>
                </row>
                <row class="col-md-12">
                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                        <textarea id="remark" name="remark" type="text" class="form-control" placeholder="Remarks"  value="" data-toggle="tooltip" data-placement="top" title="" ></textarea> 
                    </div>             
                </row>
                
                <row>
                    <hr>
                    <div class="right_contents" id="right_contents"> 
                        
                                <div class="form-group " id="<?php $specimen_maxID[0]; ?>" name="<?php echo $specimen_maxID[0]; ?>">              
                                    <?php $specBarcodeID = $specimen_maxID[0]+1; ?>
                                     
                                     <div class="row">                                        
                                        <div class="col-sm-2">  
                                             <Img src = "<?php
                                            if ($specimen_maxID[0] != null) {                                                
                                                /* $url = SITE_URL();?>/mri_specimen_barcode_generate/barcode/<?php echo $code ; */
                                                echo SITE_URL(); ?>/test_request_progress_controller/barcode/<?php
                                                     echo $specBarcodeID;
                                                     //  $NewUrl = urldecode($url);
                                                     //  echo $NewUrl;
                                                 }
                                                 ?>" >
                                                 
                                        </div>
                                        <div class="col-sm-2"> 
                                            <Img src = "<?php
                                            if ($specimen_maxID[0] != null) {                                                
                                                /* $url = SITE_URL();?>/mri_specimen_barcode_generate/barcode/<?php echo $code ; */
                                                echo SITE_URL(); ?>/test_request_progress_controller/barcode/<?php
                                                     echo $specBarcodeID;
                                                     //  $NewUrl = urldecode($url);
                                                     //  echo $NewUrl;
                                                 }
                                                 ?>" >
                                                 
                                        </div> 
                                    </div> 
                                    <div class="row">                                        
                                        <div class="col-sm-2"> 
                                            <Img src = "<?php
                                            if ($specimen_maxID[0] != null) {                                                
                                                /* $url = SITE_URL();?>/mri_specimen_barcode_generate/barcode/<?php echo $code ; */
                                                echo SITE_URL(); ?>/test_request_progress_controller/barcode/<?php
                                                     echo $specBarcodeID;
                                                     //  $NewUrl = urldecode($url);
                                                     //  echo $NewUrl;
                                                 }
                                                 ?>" >
                                                
                                        </div>
                                        <div class="col-sm-2"> 
                                            <Img src = "<?php
                                            if ($specimen_maxID[0] != null) {                                                
                                                /* $url = SITE_URL();?>/mri_specimen_barcode_generate/barcode/<?php echo $code ; */
                                                echo SITE_URL(); ?>/test_request_progress_controller/barcode/<?php
                                                     echo $specBarcodeID;
                                                     //  $NewUrl = urldecode($url);
                                                     //  echo $NewUrl;
                                                 }
                                                 ?>" >
                                                
                                        </div> 
                                    </div>
 




                                </div>
 
                        
                              
                    </div>             
                 <!--   <div class="form-group ">
                            <button type="button" id="pdf" class="btn btn-primary col-md-offset-9"  value="">Print </button>
                        </div>-->
                       
                </row>
<!--                 <div class="pull-right">
                    <button id="print_tab1" type="button" class="btn btn-xs btn-labeled btn-success">
                        <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>  | Print</button>

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                </div>-->
            </div>

            
         
            
            
            <div class="modal-footer ">
                <button type="button" id ="specimen_save" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Save</button>
            </div>

        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>

<script>
    $('document').ready(function () {
        
        
//        $('#tbl_internal_requests').dataTable();
//        $('#tbl_hospital_requests').dataTable();
        
        var searchParam = "";


        $(document).on('click', '.panel-heading span.clickable', function (e) {
            var $this = $(this);
            if (!$this.hasClass('panel-collapsed')) {
                $this.parents('.panel').find('.panel-body').slideUp();
                $this.addClass('panel-collapsed');
                $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
            } else {
                $this.parents('.panel').find('.panel-body').slideDown();
                $this.removeClass('panel-collapsed');
                $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
            }
        });
        
        $(document).on('click', '.panel div.clickable', function (e) {
            var $this = $(this);
            if (!$this.hasClass('panel-collapsed')) {
                $this.parents('.panel').find('.panel-body').slideUp();
                $this.addClass('panel-collapsed');
                $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
            } else {
                $this.parents('.panel').find('.panel-body').slideDown();
                $this.removeClass('panel-collapsed');
                $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
            }
        });




        $('.panel-heading span.clickable').click();
        $('.panel div.clickable').click();


        $('.search-panel .dropdown-menu').find('a').click(function (e) {
            e.preventDefault();
            var param = $(this).attr("href").replace("#", "");
            searchParam = param;
            //alert(searchParam);
            var concept = $(this).text();
            $('.search-panel span#search_concept').text(concept);
            $('.input-group #search_param').val(param);

            $('#request_datalist').empty();
            $('#request_search').val('');

            if (param == "by_name") {
                $.ajax({
                    type: "GET",
                    url: 'patient_controller/GetAllExternalPatients',
                    dataType: 'json',
                    success: function (output) {
                        $.each(output, function (key, val) {
                            $('#request_datalist').append("<option id= '" + val['mriPatient']['patientId'] + "' value='" + val['mriPatient']['name'] + "'>");
                        });
                    }
                });
            } else if (param == "by_nic") {
                $.ajax({
                    type: "GET",
                    url: 'patient_controller/GetAllExternalPatients',
                    dataType: 'json',
                    success: function (output) {
                        $.each(output, function (key, val) {
                            $('#request_datalist').append("<option id= '" + val['mriPatient']['patientId'] + "' value='" + val['mriPatient']['nic'] + "'>");
                        });
                    }
                });
            } else if (param == "by_id") {
                $.ajax({
                    type: "GET",
                    url: 'patient_controller/GetAllExternalPatients',
                    dataType: 'json',
                    success: function (output) {
                        $.each(output, function (key, val) {
                            $('#request_datalist').append("<option id= '" + val['mriPatient']['patientId'] + "' value='" + val['mriPatient']['patientId'] + "'>");
                        });
                    }
                });
            } else if (param == "by_requestID") {
                $.ajax({
                    type: "GET",
                    url: 'test_request_progress_controller_1/GetInternalRequests',
                    dataType: 'json',
                    success: function (output) {

                        $.each(output, function (key, val) {

                            $('#request_datalist').append("<option id= '" + val['requestId'] + "' value='" + val['requestId'] + "'>");
                        });
                    }
                });
            } else if (param == "by_Priority") {
                $('#request_datalist').append("<option id= 'High' value='High'>");
                $('#request_datalist').append("<option id= 'Medium' value='Medium'>");
                $('#request_datalist').append("<option id= 'Low' value='Low'>");


            } else if (param == "by_TestType") {
                $.ajax({
                    type: "GET",
                    url: 'lab_tests_controller/getAllLabTests',
                    dataType: 'json',
                    success: function (output) {

                        $.each(output, function (key, val) {

                            $('#request_datalist').append("<option id= '" + val[0] + "' value='" + val[1] + "'>");
                        });
                    }
                });

            } else if (param == "by_status") {

                $('#request_datalist').append("<option id= 'Pending' value='Pending'>");
                $('#request_datalist').append("<option id= 'Resolved' value='Resolved'>");
            }


        });

$.ajax({
            type: "GET",
            url: 'test_request_progress_controller_1/GetHospitalRequests',
            dataType: 'json',
            success: function (output) {

                //$('#hospital_datalist').empty();
                $.each(output, function (key, val) {
                    var specimenCol = null;
                    if (val['mriSpecimen'] != null) {
                        var specimenID = val['mriSpecimen']['specimenId'];
                        specimenCol = specimenID;
                    } else {
                        specimenCol = "<p data-placement='top' data-toggle='tooltip' title='NewSpecimen'><input type='checkbox' autocomplete='off'data-title='New Visit' data-toggle='modal' data-target='#new_specimen'></p>";
                    }
                    // var requestDate = new Date(parseInt(val['testRequestDate'].substr(6)));

                    var rDate = new Date(parseInt(val['testRequestDate']));
                    var requestDate = rDate.toLocaleDateString();

                    var dDate = new Date(parseInt(val['testDueDate']));
                    var dueDate = dDate.toLocaleDateString();

                    var statusInt = val['status'];
                    var status = "";
                    if (statusInt == "0") {
                        status = "Pending";
                    } else {
                        status = "Resolved";
                    }
                    
                    var report = "<a style='margin-right:2px;' class='btn btn-success btn-xs btn_new_visit' href='http://localhost/Others/PRi/lims_new/mri_test_results/index/req_id/" + val['requestId'] + "/testId/" + val['testRequestId'] + "'><span class='glyphicon glyphicon-plus'></span></a>";
                    
                    if (statusInt == "1") {
                        report += "<a class='btn btn-success btn-xs btn_new_visit' href='http://localhost/Others/PRi/lims_new/mri_test_report/index/req_id/" + val['requestId'] + "/type/" + 0 + "'><span class='glyphicon glyphicon-list-alt'></span></a>";
                    }

                    $('#tbl_hospital_requests').append("<tr><td>" + val['requestId'] + "</td>\n\
                                                            <td>" + val['mriHospitalPatient']['mriPatient']['name'] + "</td>\n\
                                                            <td>" + val['mriHospitalPatient']['mriHospital']['hospitalName'] + " - " + val['mriHospitalPatient']['mriHospital']['location'] + "</td>\n\
                                                            <td>" + val['mriLaboratoryTest']['testFullName'] + "</td>\n\
                                                            <td>" + val['testPriority'] + "</td>\n\
                                                            <td>" + requestDate + "</td>\n\
                                                            <td>" + dueDate + "</td>\n\
                                                            <td>" + status + "</td>\n\
                                                            <td>" + specimenCol + "</td>\n\
                                                            <td>"+report+"</td></tr>");
                });

            }
        });
                                                    
                                                    
        $.ajax({
            type: "GET",
            url: 'test_request_progress_controller_1/GetInternalRequests',
            dataType: 'json',
            success: function (output) {

                $("#tbl_internal_requests tbody").empty();
                $.each(output, function (key, val) {
                    var specimenCol = null;
                    if (val['mriSpecimen'] != null) {
                        var specimenID = val['mriSpecimen']['specimenId'];
                        specimenCol = specimenID;
                    } else {
                        specimenCol = "<p data-placement='top' data-toggle='tooltip' title='NewSpecimen'><input type='checkbox' autocomplete='off'data-title='New Visit' data-toggle='modal' data-target='#new_specimen'></p>";
                    }
                    //var jsonRequestDate = val['testRequestDate'];
                    var rDate = new Date(parseInt(val['testRequestDate']));
                    var requestDate = rDate.toLocaleDateString();

                    var statusInt = val['status'];
                    var status = "";
                    if (statusInt == "0") {
                        status = "Pending";
                    } else {
                        status = "Resolved";
                    }
                    
                    var report = "<a style='margin-right:2px;' class='btn btn-success btn-xs btn_new_visit' href='http://localhost/Others/PRi/lims_new/mri_test_results/index/req_id/" + val['requestId'] + "/testId/" + val['testRequestId'] + "'><span class='glyphicon glyphicon-plus'></span></a>";
                    
                    if (statusInt == "1") {
                        report += "<a class='btn btn-success btn-xs btn_new_visit' href='http://localhost/Others/PRi/lims_new/mri_test_report/index/req_id/" + val['requestId'] + "/type/" + 0 + "'><span class='glyphicon glyphicon-list-alt'></span></a>";
                    } 
                    var dDate = new Date(parseInt(val['testDueDate']));
                    var dueDate = dDate.toLocaleDateString();
                    $('#tbl_internal_requests').append("<tr id='" + val['requestId'] + "'><td>" + val['requestId'] + "</td>\n\
                                                            <td>" + val['mriPatient']['name'] + "</td>\n\
                                                            <td>" + val['mriLaboratoryTest']['testFullName'] + "</td>\n\
                                                            <td>" + val['testPriority'] + "</td>\n\
                                                            <td>" + requestDate + "</td>\n\
                                                            <td>" + dueDate + "</td>\n\
                                                            <td>" + status + "</td>\n\
                                                            <td>" + specimenCol + "</td>\n\
                                                            <td>"+report+"</td></tr>");
                });

            }
        });



        $('#request_search').keypress(function (e) {
            var key = e.which;

            if (key == 13)   //the enter key code
            {

                e.preventDefault();

                var requestVal = $(e.target).val();
                var requestID = $('#request_datalist').find('option[value="' + requestVal + '"]').attr('id');
                //alert(requestID);

                $.ajax({
                    type: "GET",
                    url: 'test_request_progress_controller_1/GetInternalRequestsBySearch/' + searchParam + '/' + requestID,
                    dataType: 'json',
                    success: function (output) {

                        $("#tbl_internal_requests tbody").empty();
                        $.each(output, function (key, val) {
                            var specimenCol = null;
                            if (val['mriSpecimen'] != null) {
                                var specimenID = val['mriSpecimen']['specimenId'];
                                specimenCol = specimenID;
                            } else {
                                specimenCol = "<p data-placement='top' data-toggle='tooltip' title='NewSpecimen'><input type='checkbox' autocomplete='off'data-title='New Visit' data-toggle='modal' data-target='#new_specimen'></p>";
                            }
                            //var jsonRequestDate = val['testRequestDate'];
                            var rDate = new Date(parseInt(val['testRequestDate']));
                            var requestDate = rDate.toLocaleDateString();

                            var dDate = new Date(parseInt(val['testDueDate']));
                            var dueDate = dDate.toLocaleDateString();
                            $('#tbl_internal_requests').append("<tr id='" + val['requestId'] + "'><td>" + val['requestId'] + "</td>\n\
                                                            <td>" + val['mriPatient']['name'] + "</td>\n\
                                                            <td>" + val['mriLaboratoryTest']['testFullName'] + "</td>\n\
                                                            <td>" + val['testPriority'] + "</td>\n\
                                                            <td>" + requestDate + "</td>\n\
                                                            <td>" + dueDate + "</td>\n\
                                                            <td>" + val['status'] + "</td>\n\
                                                            <td>" + specimenCol + "</td>\n\
                                                            <td><p data-placement='top' data-toggle='tooltip' title='Edit'><button class='btn btn-success btn-xs btn_new_visit' data-title='New Visit' data-toggle='modal' data-target='#new_visit' ><span class='glyphicon glyphicon-plus'></span></button></p></td></tr>");
                            
                        });

                    }
                });
            }
        });

        $('.search-panel1 .dropdown-menu').find('a').click(function (e) {
            //alert("Hii");
            e.preventDefault();
            var param = $(this).attr("href").replace("#", "");
            searchParam = param;
            //alert(searchParam);
            var concept = $(this).text();
            $('.search-panel1 span#search_concept1').text(concept);
            $('.input-group #search_param').val(param);

            //alert(searchParam)

        });

        $('#request_search1').change(function () {

            var requestID = $('#request_search1').val();
            //alert(date);
            $.ajax({
                type: "GET",
                url: 'test_request_progress_controller_1/GetInternalRequestsBySearch/' + searchParam + '/' + requestID,
                dataType: 'json',
                success: function (output) {

                    $("#tbl_internal_requests tbody").empty();
                    $.each(output, function (key, val) {
                        var specimenCol = null;
                        if (val['mriSpecimen'] != null) {
                            var specimenID = val['mriSpecimen']['specimenId'];
                            specimenCol = specimenID;
                        } else {
                            specimenCol = "<p data-placement='top' data-toggle='tooltip' title='NewSpecimen'><input type='checkbox' autocomplete='off'data-title='New Visit' data-toggle='modal' data-target='#new_specimen'></p>";
                        }

                        var rDate = new Date(parseInt(val['testRequestDate']));
                        var requestDate = rDate.toLocaleDateString();

                        var dDate = new Date(parseInt(val['testDueDate']));
                        var dueDate = dDate.toLocaleDateString();
                        $('#tbl_internal_requests').append("<tr id='" + val['requestId'] + "'><td>" + val['requestId'] + "</td>\n\
                                                            <td>" + val['mriPatient']['name'] + "</td>\n\
                                                            <td>" + val['mriLaboratoryTest']['testFullName'] + "</td>\n\
                                                            <td>" + val['testPriority'] + "</td>\n\
                                                            <td>" + requestDate + "</td>\n\
                                                            <td>" + dueDate + "</td>\n\
                                                            <td>" + val['status'] + "</td>\n\
                                                            <td>" + specimenCol + "</td>\n\
                                                            <td><p data-placement='top' data-toggle='tooltip' title='Edit'><button class='btn btn-success btn-xs btn_new_visit' data-title='New Visit' data-toggle='modal' data-target='#new_visit' ><span class='glyphicon glyphicon-plus'></span></button></p></td></tr>");
                    });

                }
            });
        });

        $('#specimen_save').click(function () {
            var json = [];
            var obj = {};



            var ReqID = $('#ReqID').text();
            //var SpecimenType = $(' #SpecimenType option:selected').text();
            var SpecimenType = $(' #SpecimenType option:selected').val();
            var received = $('#datetimepicker1').val();
            //var received =  $("#datetimepicker1 input").datepicker("getDate").val();
            var deliver = $('#datetimepicker2').val();
            var stored_location = $('#stored_location').val();


            var stored_or_destroyed = $('input:radio[name=stored_or_destroyed]:checked').val();
            var remark = $('#remark').val();


            obj ['requestID'] = ReqID;

            obj ['specimenTypeId'] = SpecimenType;
            obj ['specimenReceivedDate'] = received;
            obj ['specimenDeliveredDepartmentDate'] = deliver;
            obj ['storedLocation'] = stored_location;
            obj ['storedOrDestroyed'] = stored_or_destroyed;
            obj ['remarks'] = remark;

            var specimenBarcode = null;
            obj ['specimenBarcode'] = specimenBarcode;

            //alert(stored_or_destroyed);




            json.push(obj)
            var newSpecimenJSONObject = {"MriSpecimenDetails": json};
            //alert(JSON.stringify(newSpecimenJSONObject));


            $.ajax({
                type: "POST",
                url: 'test_request_progress_controller/insertSpecimen',
                dataType: 'JSON',
                data: {'mri_specimen': newSpecimenJSONObject},
                success: function (output) {
                    alert("Successfully Inserted!");
                    location.reload();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError);
                }
            });
        });


        $('#datetimepicker1').datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            dateonly: true


        });

        $('#datetimepicker2').datepicker({
            changeMonth: true,
            changeYear: true,
            dateonly: true,
            dateFormat: 'yyyy-mm-dd'
        });

        $('#addSpecimen').click(function () {
            var requestIDs = "";
            $('#tbl_internal_requests').find('input[type="checkbox"]:checked').each(function () {
                var row = $(this).closest('tr').attr('id');
                if (requestIDs == "")
                {
                    requestIDs = row;
                } else {
                    requestIDs = requestIDs + ", " + row;
                }

            });
            $('#ReqID').text(requestIDs);
        });
        
        $(document).on('click', '#print_tab1', function(){ 
            var docprint = window.open("about:HIS", "_blank");
            var oTable = document.getElementById("right_contents"); 
            var img1 = document.getElementById("img_1");
            var img2 = document.getElementById("img_2");
            var img3 = document.getElementById("img_3");
            var img4 = document.getElementById("img_4");
            
            docprint.document.open();
            docprint.document.write('<html><head><title>Test Request Order</title>');
            docprint.document.write('</head><style>.dataTables_length,.dataTables_filter,.dataTables_info,.dataTables_paginate { display: none;}</style>');
            docprint.document.write('<body onLoad="self.print()">');
            docprint.document.write('<div><div>');
            //docprint.document.write("<img src=\"http://localhost/Others/PRi/lims_new/index.php/test_request_progress_controller/barcode/15\">");
            //docprint.document.write(patientName.parentNode.innerHTML);
            //docprint.document.write(oTable.parentNode.innerHTML);
            docprint.document.write(img1.innerHTML);
            docprint.document.write(img2.innerHTML);
             docprint.document.write('<div></div>');
            docprint.document.write(img3.innerHTML);
            docprint.document.write(img4.innerHTML);
            
            docprint.document.write('</div></div>');
            docprint.document.write('</body></html>');
            docprint.document.close();
            docprint.print();
            docprint.close();
        });
        
        $('#pdf').click(function(){
         printDiv();
         function printDiv() {
              var printContents = $(".right_contents").html();
              var originalContents = document.body.innerHTML;
              document.body.innerHTML = printContents;
              window.print();
              document.body.innerHTML = originalContents;
         }
        });

    })
</script>
<!--
<div class="row">                                        
                                        <div class="col-sm-2">  <Img src = "http://localhost/Others/PRi/lims_new/assets/img/user2-160x160.jpg"/>
                                aaa             <Img src = "<?php
                                            if ($specimen_maxID[0] != null) {                                                
                                                /* $url = SITE_URL();?>/mri_specimen_barcode_generate/barcode/<?php echo $code ; */
                                                echo SITE_URL(); ?>/test_request_progress_controller/barcode/<?php
                                                     echo $specBarcodeID;
                                                     //  $NewUrl = urldecode($url);
                                                     //  echo $NewUrl;
                                                 }
                                                 ?>" >
                                                 
                                        </div>
                                        <div class="col-sm-2"> 
                                            <Img src = "<?php
                                            if ($specimen_maxID[0] != null) {                                                
                                                /* $url = SITE_URL();?>/mri_specimen_barcode_generate/barcode/<?php echo $code ; */
                                                echo SITE_URL(); ?>/test_request_progress_controller/barcode/<?php
                                                     echo $specBarcodeID;
                                                     //  $NewUrl = urldecode($url);
                                                     //  echo $NewUrl;
                                                 }
                                                 ?>" >
                                                 
                                        </div> 
                                    </div> 
                                    <div class="row">                                        
                                        <div class="col-sm-2"> 
                                            <Img src = "<?php
                                            if ($specimen_maxID[0] != null) {                                                
                                                /* $url = SITE_URL();?>/mri_specimen_barcode_generate/barcode/<?php echo $code ; */
                                                echo SITE_URL(); ?>/test_request_progress_controller/barcode/<?php
                                                     echo $specBarcodeID;
                                                     //  $NewUrl = urldecode($url);
                                                     //  echo $NewUrl;
                                                 }
                                                 ?>" >
                                                
                                        </div>
                                        <div class="col-sm-2"> 
                                            <Img src = "<?php
                                            if ($specimen_maxID[0] != null) {                                                
                                                /* $url = SITE_URL();?>/mri_specimen_barcode_generate/barcode/<?php echo $code ; */
                                                echo SITE_URL(); ?>/test_request_progress_controller/barcode/<?php
                                                     echo $specBarcodeID;
                                                     //  $NewUrl = urldecode($url);
                                                     //  echo $NewUrl;
                                                 }
                                                 ?>" >
                                                
                                        </div> 
                                    </div>
-->
 
 <!--
                                   <div class="row">                                        
                                        <div class="col-sm-6" id="img_1">  
                                            <Img src = "<?php 
                                                echo BASE_URL('/assets/img/barcode.jpg')                                                     
                                                 ?>" >
                                            <p style="text-align: center"><?php echo $specBarcodeID ?></p>    
                                        </div>
<!--                                        <div class="col-sm-6" id="img_2"> 
                                            <Img src = "<?php 
                                                echo BASE_URL('/assets/img/barcode.jpg')                                                     
                                                 ?>" >
                                                 
                                        </div> -->
                                    </div> 
                                    <div class="row">                                        
<!--                                        <div class="col-sm-6" id="img_3"> 
                                            <Img src = "<?php 
                                                echo BASE_URL('/assets/img/barcode.jpg')                                                     
                                                 ?>" >
                                                
                                        </div>-->
<!--                                        <div class="col-sm-6" id="img_4"> 
                                            <Img src = "<?php 
                                                echo BASE_URL('/assets/img/barcode.jpg')                                                     
                                                 ?>" >
                                                
                                        </div> -->
                                    </div> 
 -->