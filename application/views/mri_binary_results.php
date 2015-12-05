<?php
/**
 * Created by PhpStorm.
 * User: Dushyantha
 * Date: 11/7/15
 * Time: 8:01 AM
 */
?>
<style>
#searchbar{
    padding: 5px;
}
.well {
    border-radius: 0px;
}
.has-error {
    border-color: #A94442;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.075) inset;
}
.has-success {
    border-color: #3C763D;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.075) inset;
}
</style>
<div class="col-md-12">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Test Results</h3>
        </div>
        <div class="box-body">

            <div class="row" id="searchbar">
                <div class="col-md-12 well bg-light-blue">

                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa  fa-calendar-o"></i></span>
                            <input type="text" id="start_date" class="date-picker form-control" placeholder="Start Date"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa  fa-calendar-o"></i></span>
                            <input type="text" id="end_date" class="date-picker form-control" placeholder="End Date"/>
                        </div>
                    </div>
                    <div class="col-md-2 text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default"><i class="fa fa-angle-left"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-angle-right"></i></button>
                        </div>
                        <label>1-50</label>
                    </div>
                    <div class="col-md-2">
                        <select id="fieldText" class="form-control">
                            <option value="request_id">ID</option>
                            <option value="name">Patient Name</option>
                            <option value="nic">Patient NIC</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="byId" placeholder="Search Text" class="form-control"/>
                    </div>

                </div>
            </div>
            <div id="message"></div>
            <div id="loading" style="display:none;margin-bottom: 5px;"><img src="<?php echo(base_url('assets/img/table_loading.gif')); ?>"></div>
            <div style="clear: both;" id="otable"></div>

        </div><!-- /.box-body -->
    </div>
</div>

<script type="text/javascript">

    $( document ).ready(function() {
        ajaxFetch();

        $('#byId').keyup(function(){
            ajaxSearch('request_id',$(this).val());
        });

        $("#start_date").keyup(function(){
            if($("#start_date").val()=='' || $("#end_date").val()==''){
                ajaxFetch();
            }
        });

        $("#end_date").keyup(function(){
            if($("#start_date").val()=='' || $("#end_date").val()==''){
                ajaxFetch();
            }
        });

        $('.date-picker').datepicker(
        {
            format: "yyyy-mm-dd"
        })
            .on('changeDate', function(e) {
                if($("#start_date").val()!='' && $("#end_date").val()!=''){
                    ajaxFetchPeriodical();
                }
            });
    });

    $(document).on("click","#save-bundle",function(){
        $("#loading").show();
        $(".values").each(function() {
            var selectEv = $(this);
            if($(this).val()!=null && $(this).val()!=''){
                var value = $(this).val();
                var id = $(this).data('id');
                console.log(id+" | "+value);
                $.ajax({
                    method: "POST" ,
                    url: "<?php echo base_url('mri_binary_results/addSingleResult'); ?>",
                    data: {"id":id,"value":value},
                    dataType: "JSON"
                })
                    .done(function( data ) {

                        if(data.success==true) {
                            selectEv.addClass('has-success');
                            $("#message").html(str);
                            setTimeout(function() {
                                $("#message").fadeOut('slow');
                            }, 1000);
                        } else {
                            selectEv.addClass('has-error');
                        }
                        ajaxFetch();
                    });
            }
        });
        $("#loading").hide();
    });

    $(document).on("click",".single-save",function(){
        $("#loading").show();
        var value = $(this).closest('tr').find('.values').val();
        if(value!= null && value!=''){
            var id = $(this).data('id');
            console.log(id+" | "+value)
            $.ajax({
                method: "POST" ,
                url: "<?php echo base_url('mri_binary_results/addSingleResult'); ?>",
                data: {"id":id,"value":value},
                dataType: "JSON"
            })
                .done(function( data ) {
                    setTimeout(function() {
                        $("#loading").hide();
                    }, 1000);
                    if(data.success==true) {
                        var str = '<div class="alert alert-success alert-dismissable">'
                            + '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'
                            + 'Successfully saved one record.</div>';
                        $("#message").html(str);
                        setTimeout(function() {
                            $("#message").fadeOut('slow');
                        }, 1000);
                    }
                    ajaxFetch();
                });
        } else {
            setTimeout(function() {
                $("#loading").hide();
            }, 1000);
            alert("Please select a value");
        }
    });

    function ajaxFetch() {
        $("#loading").show();
        $.ajax({
            method: "POST" ,
            url: "<?php echo base_url('mri_binary_results/getTestReqests'); ?>",
            data: {"test":"test"},
            dataType: "JSON"
        })
            .done(function( data ) {
                setTimeout(function() {
                    $("#loading").hide();
                }, 1000);
                displayResults(data);
            });
    }

    function ajaxFetchPeriodical() {
        $("#loading").show();
        $.ajax({
            method: "POST" ,
            url: "<?php echo base_url('mri_binary_results/getTestReqests'); ?>",
            data: {"start_date":$("#start_date").val(),"end_date":$("#end_date").val()},
            dataType: "JSON"
        })
            .done(function( data ) {
                setTimeout(function() {
                    $("#loading").hide();
                }, 1000);
                displayResults(data);
            });
    }

    function ajaxSearch(field,text) {
        $("#loading").show();
        $.ajax({
            method: "POST" ,
            url: "<?php echo base_url('mri_binary_results/getTestReqests'); ?>",
            data: {"test":"test" },
            dataType: "JSON"
        })
            .done(function( data ) {
                setTimeout(function() {
                    $("#loading").hide();
                }, 1000);
                formatJson($('#fieldText').val(),text,data);
            });
    }

    function displayResults(obj) {
        var str = '<table class="table table-hover table-bordered">'
                        + '<tbody><tr>'
                        + '<th>ID</th>'
                        + '<th>Patient</th>'
                        + '<th>Date</th>'
                        + '<th>Priority</th>'
                        + '<th>Test Type</th>'
                        + '<th style="width: 150px;">Result</th>'
                        + '<th>Actions</th>'
                        + '</tr>';
        var hasData=false;
        $.each(obj, function(x, val) {
            var d = new Date(val.test_request_date);
            var dStr = d.getFullYear() + ' - ' + (d.getMonth()+1) + ' - ' + d.getDate();
            str += '<tr>';
            str += '<td>'+val.request_id+'</td>';
            str += '<td>'+val.name+'</td>';
            str += '<td>'+dStr+'</td>';
            str += '<td>'+val.test_priority+'</td>';
            str += '<td>'+val.test_full_name+'</td>';
            str += '<td><select data-id="'+val.test_request_id+'" class="values form-control" name="'+val.request_id+'"><option value="" disabled selected hidden>Please Choose</option><option value="0">Negative</option><option value="1">Positive</option></select></td>';
            str += '<td><button type="button" data-id="'+val.test_request_id+'" class="btn btn-block btn-primary single-save">Save</button></td></tr>';
            hasData = true;
        });
        if(hasData)
            str += '<tr><td colspan="7"><button class="btn btn-success" id="save-bundle">Save All Selected Results</button></td></tr>';
        str += '</tbody></table>';

        $('#otable').html(str);
    }

    function formatJson(field,text,obj) {
        var regex = new RegExp(text, "i");
        var sField = field;
        var jObj = [];
        $.each(obj, function(key, val){
            if ((val[sField].search(regex) != -1)) {
                jObj.push(val);
            }
        });
        displayResults(jObj);
    }
</script>