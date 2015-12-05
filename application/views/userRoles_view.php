<div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">New Patient</h3>
        </div><!-- /.box-header -->

        <div class="box-body">


            <div class="panel panel-default">
                <div class="panel-heading clickable">
                    User Roles List         
                </div>
                <div class="panel-body" >
                    <table id="tbl_patients" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Role ID</th>
                                <th>Role Name</th>
                                <th>Edit</th>
                             
                            </tr>
                        </thead>

                        <tbody id="tbody_userRoles_list">
                            <?php
                            foreach ($all_userRoles_result as $row) {

                                $roleId = $row->roleId;
                                $roleName = $row->roleName;
                                
                                echo " <tr id='$roleId'>";
                                echo " <td > " . $roleId . "</td>";
                                echo " <td > " . $roleName . "</td>";

                                echo "<td><p data-placement='top' data-toggle='tooltip' title='Edit'><button class='btn btn-primary btn-xs btn_edit' data-title='Edit' data-toggle='modal' data-target='#edit' ><span class='glyphicon glyphicon-pencil'></span></button></p></td>";
                               // echo "<td><p data-placement='top' data-toggle='tooltip' title='Delete'><button class='btn btn-danger btn-xs btn_delete' data-title='Delete' data-toggle='modal' data-target='#delete' ><span class='glyphicon glyphicon-trash'></span></button></p></td>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>


            <form id="form_ur" class="form-horizontal" role="form" method="POST">
                <div class="panel panel-default">


                    <div class="panel-heading clickable">
                        Add New User Roles           
                    </div>
                    <div class="panel-body" >
                        <div class="form-group col-lg-12">

                            <div class="row col-sm-12 form-horizontal" style="text-align: center" >                                    


                                <div class="form-group">
                                    <label for="role_name" class="col-sm-2 control-label">Role Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="role_name" name="role_name">
                                    </div>
                                </div>
                                
                            </div>
                            
                                                 
                            <div class="row">
                                <div class="col-xs-12">
                                    <hr style="border:1px dashed #dddddd;">
                                </div>
                                <div class="col-xs-2">

                                    <button id="btn_insert_userRole" type="button" class="btn btn-primary btn-block">Insert User Role</button>

                                </div>    
                                 
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div> 

    </div>
</div>

<!--Edit UserRole-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Edit User Roles</h4>
            </div>
            <div class="modal-body col-sm-12">
                <div class="row col-sm-12 form-horizontal"  >                                    
                    <div class="form-group">
                        <label for="role_id_edit" class="col-sm-3 control-label">Role ID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="role_id_edit" name="role_id_edit" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="role_name_edit" class="col-sm-3 control-label">Role Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="role_name_edit" name="role_name_edit">
                        </div>
                    </div>                  
                </div>
            </div>
            <div class="modal-footer ">
                <button id="btn_update_userRole" type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
            </div>
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>

<script>
    
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
        $(document).ready(function () {
            $('.panel-heading span.clickable').click();
            $('.panel div.clickable').click();
        });
        
           //  <!--Model for insert new user role-->
                 
                $('#btn_insert_userRole').click(function () {
                     //alert("TEST!");
                var json = [];
                var obj = {};

                var role_name = $('#role_name').val();
                
                obj ['roleName'] = role_name;
               
                json.push(obj)
                var newUserRolesJSONObject = {"NewUserRole": json};
                //alert(JSON.stringify(newEmployeeJSONObject));

                $.ajax({
                    type: "POST",
                    url: 'userRoles_Controller/InsertNewUserRoles',
                    data: {'userRoles': newUserRolesJSONObject}, success: function (output) {
                        alert("User role added!");
                        document.getElementById("form_ur").reset();
                    }
                });
                
               // $(".form_ur")[0].reset();
          
        });
        
        //<!--Load to Edit employee-->
         $('.btn_edit').click(function () {
            var row_id = $(this).closest('tr').attr('id');
            var role_name = $(this).closest("tr").find('td:eq(1)').text();

            $('#role_id_edit').val(row_id);
            $('#role_name_edit').val(role_name);
            
            
        });
        
        //  <!--Model for edit user role-->
                 
                $('#btn_update_userRole').click(function () {
                     //alert("TEST!");
                var json = [];
                var obj = {};

                var role_id = $('#role_id_edit').val();
                var role_name = $('#role_name_edit').val();
           
                obj ['roleId'] = role_id;
                obj ['roleName'] = role_name;
               
                //json.push(obj)
                var updatedUserRolesJSONObject = {obj};
                //alert(JSON.stringify(newEmployeeJSONObject));

                $.ajax({
                    type: "POST",
                    url: 'userRoles_Controller/UpdateUserRoles',
                    data: {'userRoles': updatedUserRolesJSONObject}, success: function (output) {
                        alert("Successfully Updated!");
                    }
                });
          
        });
        
        
        
        
</script>