<div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">New Patient</h3>
        </div><!-- /.box-header -->

        <div class="box-body">


            <div class="panel panel-default">
                <div class="panel-heading clickable">
                    Patients List         
                </div>
                <div class="panel-body" >
                    <table id="tbl_patients" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Patient ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender </th>
                                <th>NIC/Passport</th>
                                <th>Visit</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody id="tbody_patients_list">
                            <?php
                            foreach ($all_patient_result as $row) {

                                $patientID = $row->patientId;
                                $patientName = $row->name;
                                $bday = date("Y-m-d", $row->birthday / 1000);

                                //$age = date_diff($bday,$today,TRUE);
                                $gender = $row->sex;
                                $nic = $row->nic;


                                echo " <tr id='$patientID'>";
                                echo " <td > " . $patientID . "</td>";
                                echo " <td > " . $patientName . "</td>";
                                echo " <td > " . $bday . "</td>";
                                echo " <td > " . $gender . "</td>";
                                echo " <td > " . $nic . "</td>";

                                echo "<td><p data-placement='top' data-toggle='tooltip' title='Edit'><button class='btn btn-success btn-xs btn_new_visit' data-title='New Visit' data-toggle='modal' data-target='#new_visit' ><span class='glyphicon glyphicon-plus'></span></button></p></td>";
                                echo "<td><p data-placement='top' data-toggle='tooltip' title='Edit'><button class='btn btn-primary btn-xs btn_edit' data-title='Edit' data-toggle='modal' data-target='#edit' ><span class='glyphicon glyphicon-pencil'></span></button></p></td>";
                                echo "<td><p data-placement='top' data-toggle='tooltip' title='Delete'><button class='btn btn-danger btn-xs btn_delete' data-title='Delete' data-toggle='modal' data-target='#delete' ><span class='glyphicon glyphicon-trash'></span></button></p></td>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>


            <form class="form-horizontal" role="form" method="POST">
                <div class="panel panel-default">


                    <div class="panel-heading clickable">
                        Add New Patient           
                    </div>
                    <div class="panel-body" >
                        <div class="form-group col-lg-12">

                            <div class="row col-sm-12 form-horizontal" style="text-align: center" >                                    


                                <div class="form-group">
                                    <label for="patient_name" class="col-sm-2 control-label">Patient Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="patient_name" name="patient_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="patient_birthday" class="col-sm-2 control-label">Birthday</label>
                                    <div class="col-sm-4">
                                        <div class='input-group' >
                                            <input  type="date" class="form-control" id="patient_birthday" name="patient_birthday">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="patient_gender" class="col-sm-2 control-label">Gender</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div id="radioBtn" class="btn-group">
                                                <a class="btn btn-primary btn-small active" data-toggle="patient_gender" data-title="M">   Male   </a>
                                                <a class="btn btn-primary btn-small notActive" data-toggle="patient_gender" data-title="F">  Female  </a>
                                            </div>
                                            <input type="hidden" name="patient_gender" id="patient_gender">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="patient_nic" class="col-sm-2 control-label">NIC/Passport</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="patient_nic" name="patient_nic">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="patient_type" class="col-sm-2 control-label">Patient Type</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">

                                            <div id="radioBtn_type" class="btn-group">
                                                <a class="btn btn-primary btn-small notActive" data-toggle="patient_type" data-title="External Patient">   External Patient   </a>
                                                <a class="btn btn-primary btn-small notActive" data-toggle="patient_type" data-title="Internal Patient">  Internal Patient  </a>
                                            </div>
                                            <input type="hidden" name="patient_type" id="patient_type">

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id="Hospital_Patient_Panel" class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Patient Hospital Details
                                        </div>
                                        <div class="panel-body">
                                            <div class="row col-sm-12"> 
                                                <div class="form-group">
                                                    <label for="patient_hospital" class="col-sm-2 control-label">Hospital</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="patient_hospital" placeholder="Search Hospital" name="patient_hospital" list="hospital_datalist" autocomplete="off"/>
                                                        <datalist id="hospital_datalist"></datalist>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="patient_ward" class="col-sm-2 control-label">Ward</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="patient_ward" name="patient_ward">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="patint_bht" class="col-sm-2 control-label">B.H.T. No</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="patint_bht" name="patint_bht">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>




                            </div>
                            <div id="Internal_Patient_Panel" class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Patient Contact Details
                                        </div>
                                        <div class="panel-body">
                                            <div class="row col-sm-12"> 
                                                <div class="form-group">
                                                    <label for="patient_address" class="col-sm-2 control-label">Address</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="patient_address" name="patient_address">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="patient_contac1" class="col-sm-2 control-label">Contact No 1</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="patient_contac1" name="patient_contac1">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="patient_contac2" class="col-sm-2 control-label">Contact No 2</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="patient_contac2" name="patient_contac2">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>




                            </div>


                            <div class="row">
                                <div class="col-xs-12">
                                    <hr style="border:1px dashed #dddddd;">
                                </div>
                                <div class="col-xs-2">

                                    <button id="btn_insert_patient" type="button" class="btn btn-primary btn-block">Insert Patient</button>

                                </div>    
                                <div class="col-xs-2">


                                    <button id="btn_clear" type="button" class="btn btn-warning btn-block">Clear</button>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div> 

    </div>
</div>

<!--Modal for Edit Patient-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Edit Patient Detail</h4>
            </div>
            <div class="modal-body col-sm-12">
                <div class="row col-sm-12 form-horizontal"  >                                    
                    <div class="form-group">
                        <label for="patient_id_edit" class="col-sm-3 control-label">Patient ID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="patient_id_edit" name="patient_id_edit" readonly="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="patient_name_edit" class="col-sm-3 control-label">Patient Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="patient_name_edit" name="patient_name_edit">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="patient_birthday_edit" class="col-sm-3 control-label">Birthday</label>
                        <div class="col-sm-6">
                            <div class='input-group' >
                                <input  type="date" class="form-control" id="patient_birthday_edit" name="patient_birthday_edit">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="patient_gender_edit" class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <div id="radioBtn_edit" class="btn-group">
                                    <a class="btn btn-primary btn-small" data-toggle="patient_gender_edit" data-title="M">   Male   </a>
                                    <a class="btn btn-primary btn-small" data-toggle="patient_gender_edit" data-title="F">  Female  </a>
                                </div>
                                <input type="hidden" name="patient_gender_edit" id="patient_gender_edit">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="patient_nic_edit" class="col-sm-3 control-label">NIC/Passport</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="patient_nic_edit" name="patient_nic_edit">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="patient_type_edit" class="col-sm-3 control-label">Patient Type</label>
                        <div class="col-sm-8">
                            <div class="input-group">

                                <div id="radioBtn_type_edit" class="btn-group">
                                    <a class="btn btn-primary btn-small notActive" data-toggle="patient_type_edit" data-title="External Patient">   External Patient   </a>
                                    <a class="btn btn-primary btn-small notActive" data-toggle="patient_type_edit" data-title="Internal Patient">  Internal Patient  </a>
                                </div>
                                <input type="hidden" name="patient_type_edit" id="patient_type_edit">

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">


                        <div class="panel-heading clickable">
                            Edit Contact          
                        </div>
                        <div class="panel-body" >
                            <div class="form-group">
                                <label for="patient_address-edit" class="col-sm-3 control-label">Address</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="patient_address-edit" name="patient_address-edit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="patient_contac1-edit" class="col-sm-3 control-label">Contact No 1</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="patient_contac1-edit" name="patient_contac1-edit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="patient_contac2-edit" class="col-sm-3 control-label">Contact No 2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="patient_contac2-edit" name="patient_contac2-edit">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-warning btn-lg" id = "btn_patient_update" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
            </div>
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>



<!-- new copy-->

<!--Modal for Edit Patient-->
<div class="modal fade1" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Edit Patient Detail</h4>
            </div>
            <div class="modal-body col-sm-12">
                <div class="row col-sm-12 form-horizontal"  >                                    
                    <div class="form-group">
                        <label for="patient_id_edit" class="col-sm-3 control-label">Patient ID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="patient_id_edit" name="patient_id_edit" readonly="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="patient_name_edit" class="col-sm-3 control-label">Patient Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="patient_name_edit" name="patient_name_edit">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="patient_birthday_edit" class="col-sm-3 control-label">Birthday</label>
                        <div class="col-sm-6">
                            <div class='input-group' >
                                <input  type="date" class="form-control" id="patient_birthday_edit" name="patient_birthday_edit">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="patient_gender_edit" class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <div id="radioBtn_edit" class="btn-group">
                                    <a class="btn btn-primary btn-small" data-toggle="patient_gender_edit" data-title="M">   Male   </a>
                                    <a class="btn btn-primary btn-small" data-toggle="patient_gender_edit" data-title="F">  Female  </a>
                                </div>
                                <input type="hidden" name="patient_gender_edit" id="patient_gender_edit">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="patient_nic_edit" class="col-sm-3 control-label">NIC/Passport</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="patient_nic_edit" name="patient_nic_edit">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="patient_type_edit" class="col-sm-3 control-label">Patient Type</label>
                        <div class="col-sm-8">
                            <div class="input-group">

                                <div id="radioBtn_type_edit" class="btn-group">
                                    <a class="btn btn-primary btn-small notActive" data-toggle="patient_type_edit" data-title="External Patient">   External Patient   </a>
                                    <a class="btn btn-primary btn-small notActive" data-toggle="patient_type_edit" data-title="Internal Patient">  Internal Patient  </a>
                                </div>
                                <input type="hidden" name="patient_type_edit" id="patient_type_edit">

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">


                        <div class="panel-heading clickable">
                            Edit Contact          
                        </div>
                        <div class="panel-body" >
                            <div class="form-group">
                                <label for="patient_address-edit" class="col-sm-3 control-label">Address</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="patient_address-edit" name="patient_address-edit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="patient_contac1-edit" class="col-sm-3 control-label">Contact No 1</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="patient_contac1-edit" name="patient_contac1-edit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="patient_contac2-edit" class="col-sm-3 control-label">Contact No 2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="patient_contac2-edit" name="patient_contac2-edit">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-warning btn-lg"  style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
            </div>
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>

<!--Modal for Add new hospital Visit-->
<div class="modal fade" id="new_visit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Add New Hospital Visit</h4>
            </div>
            <div class="modal-body col-sm-12">

                <div class="form-group">
                    <label for="patient_hospital" class="col-sm-3 control-label">Hospital</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="patient_hospital" placeholder="Search Hospital" name="patient_hospital" list="hospital_datalist" autocomplete="off"/>
                        <datalist id="hospital_datalist"></datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label for="patient_ward" class="col-sm-3 control-label">Ward</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="patient_ward" name="patient_ward">
                    </div>
                </div>
                <div class="form-group">
                    <label for="patint_bht" class="col-sm-3 control-label">B.H.T. No</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="patint_bht" name="patint_bht">
                    </div>
                </div>

            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-warning btn-lg" id="btn_add_hos_visit" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
            </div>
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>

<!--Modal for Patient Delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
                <div>
                    <label id="delete_patient_id">-</label>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-success" id ="btn_patient_delete" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
            </div>
        </div>
        <!-- /.modcdal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>

<style>
    #radioBtn .notActive{
        color: #3276b1;
        background-color: #fff;
    }
    #radioBtn_type .notActive{
        color: #3276b1;
        background-color: #fff;
    }
    #radioBtn_edit .notActive{
        color: #3276b1;
        background-color: #fff;
    }
    #radioBtn_type_edit .notActive{
        color: #3276b1;
        background-color: #fff;
    }

    body { font-size: 140%; }
</style>

<script>

    $('document').ready(function () {

        $('#tbl_patients').dataTable();

        var sel_gender = null;
        var tog_gender = null;
        var sel_type = null;
        var tog_type = null;

        var sel_gender_edit = null;
        var tog_gender_edit = null;
        var sel_type_edit = null;
        var tog_type_edit = null;
        $('#Internal_Patient_Panel').hide();
        $('#Hospital_Patient_Panel').hide();

        //Radiobtns gender
        $('#radioBtn a').on('click', function () {
            sel_gender = $(this).data('title');
            tog_gender = $(this).data('toggle');
            $('#' + tog_gender).prop('value', sel_gender);

            $('a[data-toggle="' + tog_gender + '"]').not('[data-title="' + sel_gender + '"]').removeClass('active').addClass('notActive');
            $('a[data-toggle="' + tog_gender + '"][data-title="' + sel_gender + '"]').removeClass('notActive').addClass('active');
        })
        //Radiobtn patient type
        $('#radioBtn_type a').on('click', function () {
            //alert("HIiiii");
            sel_type = $(this).data('title');
            tog_type = $(this).data('toggle');

            //alert(tog_type);

            $('#' + tog_type).prop('value', sel_type);
            $('a[data-toggle="' + tog_type + '"]').not('[data-title="' + sel_type + '"]').removeClass('active').addClass('notActive');
            $('a[data-toggle="' + tog_type + '"][data-title="' + sel_type + '"]').removeClass('notActive').addClass('active');
            if (sel_type == "External Patient")
            {
                $('#Hospital_Patient_Panel').show();
                $('#Internal_Patient_Panel').hide();
            } else if (sel_type == "Internal Patient")
            {
                $('#Internal_Patient_Panel').show();
                $('#Hospital_Patient_Panel').hide();
            }
        })

        //Radiobtns gender
        $('#radioBtn_edit a').on('click', function () {
            sel_gender_edit = $(this).data('title');
            tog_gender_edit = $(this).data('toggle');
            $('#' + tog_gender).prop('value', sel_gender);

            $('a[data-toggle="' + tog_gender_edit + '"]').not('[data-title="' + sel_gender_edit + '"]').removeClass('active').addClass('notActive');
            $('a[data-toggle="' + tog_gender_edit + '"][data-title="' + sel_gender_edit + '"]').removeClass('notActive').addClass('active');
        })
        //Radiobtn patient type
        $('#radioBtn_type_edit a').on('click', function () {
            //alert("HIiiii");
            sel_type_edit = $(this).data('title');
            tog_type_edit = $(this).data('toggle');

            //alert(tog_type);

            $('#' + tog_type_edit).prop('value', sel_type_edit);
            $('a[data-toggle="' + tog_type_edit + '"]').not('[data-title="' + sel_type_edit + '"]').removeClass('active').addClass('notActive');
            $('a[data-toggle="' + tog_type_edit + '"][data-title="' + sel_type_edit + '"]').removeClass('notActive').addClass('active');
            //            if (sel_type_edit == "External Patient")
            //            {
            //                $('#Hospital_Patient_Panel').show();
            //                $('#Internal_Patient_Panel').hide();
            //            } else if (sel_type == "Internal Patient")
            //            {
            //                $('#Internal_Patient_Panel').show();
            //                $('#Hospital_Patient_Panel').hide();
            //            }
        })

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
        $.ajax({
            type: "GET",
            url: 'hospital_controller/GetAllHospitals', dataType: 'json',
            success: function (output) {
                $('#hospital_datalist').empty();
                $.each(output, function (key, val) {

                    var viewHospital = val['hospitalName'] + " - " + val['location'];
                    //alert(viewHospital);
                    $('#hospital_datalist').append("<option id= '" + val['hospitalId'] + "' value='" + viewHospital + "'>");

                });

            }
        });

        $('#btn_insert_patient').click(function () {
            if (tog_type == null) {
                alert("Please Selcct Patient Type!");
            } else {
                var json = [];
                var obj = {};

                var patient_name = $('#patient_name').val();
                var patient_bday = $('#patient_birthday').val();
                var patient_gender = sel_gender;
                var patient_nic = $('#patient_nic').val();
                var patient_type = sel_type;

                obj ['PatientName'] = patient_name;
                obj ['PatientBday'] = patient_bday;
                obj ['PatientGender'] = patient_gender;
                obj ['PatientNic'] = patient_nic;
                obj ['PatientType'] = patient_type;


                var hospitalSearch = null;
                var patient_hospital_id = null;

                var patient_ward = null
                var patient_bht = null;

                var patient_address = null
                var patient_contact1 = null;
                var patient_contact2 = null;


                if (patient_type == "External Patient") {
                    hospitalSearch = $('#patient_hospital').val();
                    patient_hospital_id = $('#hospital_datalist').find('option[value="' + hospitalSearch + '"]').attr('id');

                    patient_ward = $('#patient_ward').val();
                    patient_bht = $('#patint_bht').val();

                    obj ['PatientHospital'] = patient_hospital_id;
                    obj ['PatientWard'] = patient_ward;
                    obj ['PatientBht'] = patient_bht;

                } else if (patient_type == "Internal Patient") {
                    patient_address = $('#patient_address').val();
                    patient_contact1 = $('#patient_contac1').val();
                    patient_contact2 = $('#patient_contac2').val();

                    obj ['PatientAddress'] = patient_address;
                    obj ['PatientContact1'] = patient_contact1;
                    obj ['PatientContact2'] = patient_contact2;
                }

                json.push(obj)
                var newPatientJSONObject = {"NewPatient": json};
                //   alert(JSON.stringify(newPatientJSONObject));

                $.ajax({
                    type: "POST",
                    url: 'Patient_Controller_1/InsertNewPatient',
                    data: {'patient': newPatientJSONObject}, success: function (output) {
                        alert("Successfully Inserted!");
                    }
                });
                ;
            }
        });

        $('.btn_edit').click(function () {
            var row_id = $(this).closest('tr').attr('id');
            //$('#tbl_employee_workin tr').remove();
            var patient_name = $(this).closest("tr").find('td:eq(1)').text();
            var patient_age = $(this).closest("tr").find('td:eq(2)').text();
            var patient_gender = $(this).closest("tr").find('td:eq(3)').text();
            var patient_nic = $(this).closest("tr").find('td:eq(4)').text();

            $('#patient_id_edit').val(row_id);
            $('#patient_name_edit').val(patient_name);
            $('#patient_birthday_edit').val(patient_age);
            $('#patient_nic_edit').val(patient_nic);

            if (patient_gender == " M") {
                alert(patient_gender);
                $('a[data-title="M"]').addClass('active');
                $('a[data-title="F"]').addClass('notActive');
            }
            else if (patient_gender == " F") {

                $('a[data-title="F"]').addClass('active');
                $('a[data-title="M"]').addClass('notActive');
            }

        });


        $('#btn_patient_delete').click(function () {

            var row_id = $(this).closest('tr').attr('id');
            alert("Successfully deleted");
        });

        $('#btn_patient_update  ').click(function () {

            var row_id = $(this).closest('tr').attr('id');
            alert("Successfully Updated");
        });

        $('#btn_add_hos_visit').click(function () {

            var row_id = $(this).closest('tr').attr('id');
            alert("Successfully Added");
        });
    })
</script>
