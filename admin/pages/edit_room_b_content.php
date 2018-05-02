<?php
$switch_id = $_GET['id'];
$query_result=$ob_sup_admin->select_all_room_b_info_by_id($switch_id);
$room_b_info=mysqli_fetch_assoc($query_result);

if(isset($_POST['btn'])){
    $message=$ob_sup_admin->update_all_room_b_info_by_id($switch_id);
}

?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Switch Info [ Room B ]</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h2 style="color: green; "><?php if(isset($message)) { echo $message; }?></h2>
        <div class="box-content">
            <form class="form-horizontal" action="" method="post">
                <fieldset>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Institute</label>
                        <div class="controls">
                            <input type="text" name="switch_description" value="<?php echo $room_b_info['switch_description']; ?>" class="span6 typeahead" id="typeahead"> 
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">GPIO No (1 - 40)</label>
                        <div class="controls">
                            <input type="number" name="gpio" value="<?php echo $room_b_info['gpio']; ?>" class="span6 typeahead" id="typeahead"> 
                        </div>
                    </div>
                   
                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Update Switch Info</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div><!--/row-->

