<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <?php $username  = $this->session->userdata('name');?>
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets'); ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>
                <?php  echo $username?>
                </p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?php echo base_url(); ?>dashboard_controller">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
             
            <!--        <li>
                      <a href="<?php echo base_url(); ?>new_test_controller">
                          <i class="fa fa-plus"></i> <span>New Lab Test</span>
                      </a>
                    </li>-->
            <li>
                <a href="<?php echo base_url(); ?>new_test_request_controller">
                    <i class="fa fa-plus"></i> <span>New Lab Test Request</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>patient_controller_1">
                    <i class="fa fa-users"></i> <span>Patient Handling</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>test_request_progress_controller">
                    <i class="fa fa-sort-amount-asc"></i> <span>Request Progress</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Sample Manager</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <!-- <li><a href="<?php echo base_url(); ?>mri_specimen_info_add_bulk"><i class="fa fa-circle-o"></i>Add Sample Information</a></li> -->
                    <li><a href="<?php echo base_url(); ?>mri_specimen_barcode_generate"><i class="fa fa-circle-o"></i>Specimen Barcode Generation</a></li>
                    <li><a href="<?php echo base_url(); ?>mri_specimen_categorize"><i class="fa fa-circle-o"></i>Categrize Samples</a></li>
                    <li><a href="<?php echo base_url(); ?>mri_specimen_info_search"><i class="fa fa-circle-o"></i>Sample Information</a></li>
                    
                </ul>
            </li>
            
            
            <li>
                <a href="#">
                      <i class="fa fa-edit"></i> <span>Report</span>
                      <i class="fa fa-angle-left pull-right"></i>
                </a>                
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>mri_binary_results">Viorology</a></li>
                    <li><a href="<?php echo base_url(); ?>mri_binary_results/report">Report</a></li>
                    <li><a href="<?php echo base_url(); ?>userRoles_controller">xxx</a></li>
                </ul>
            </li>

            <li>
                <a href="#">
                      <i class="fa fa-edit"></i> <span>Admin</span>
                      <i class="fa fa-angle-left pull-right"></i>
                </a>                
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>Employee_Controller">Employee Management</a></li>
                    <li><a href="<?php echo base_url(); ?>department_controller">Department Management</a></li>
                    <li><a href="<?php echo base_url(); ?>userRoles_controller"><span>User Management</span></a></li>
                    <li>
                    <a href="<?php echo base_url(); ?>mri_test_fields"> <i class="fa fa-circle-o"></i>Laboratory Test Management 
                    </a></li>
                <li><a href="<?php echo base_url(); ?>Mri_specimen_type"><i class="fa fa-circle-o"></i>Add SpecimenType</a></li>
            
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
