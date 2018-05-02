<?php
require '../classes/application.php';
$obj_app=new Application();
$query_result=$obj_app->select_all_contact_info();
$contact_info=  mysqli_fetch_assoc($query_result);

if(isset($_POST['btn'])){
    $message=$ob_sup_admin->update_contact_info_by_id();
}
?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit contact Info Form</h2>
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
                        <label class="control-label" for="typeahead">Father's Name</label>
                        <div class="controls">
                            <input type="text" name="father_name" value="<?php echo $contact_info['father_name']; ?>"class="span6 typeahead" id="typeahead"> 
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Mother's Name</label>
                        <div class="controls">
                            <input type="text" name="mother_name" value="<?php echo $contact_info['mother_name']; ?>" class="span6 typeahead" id="typeahead"> 
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Present Address</label>
                        <div class="controls">
                            <input type="text" name="present_address" value="<?php echo $contact_info['present_address']; ?>" class="span6 typeahead" id="typeahead"> 
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Permanent Address</label>
                        <div class="controls">
                            <input type="text" name="permanent_address" value="<?php echo $contact_info['permanent_address']; ?>" class="span6 typeahead" id="typeahead"> 
                        </div>
                    </div>
                     <div class="control-group">
                        <label class="control-label" for="typeahead">Email</label>
                        <div class="controls">
                            <input type="email" name="email_address" value="<?php echo $contact_info['email_address']; ?>"class="span6 typeahead" id="typeahead"> 
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Phone Number</label>
                        <div class="controls">
                            <input type="text" name="phone_number" value="<?php echo $contact_info['phone_number']; ?>" class="span6 typeahead" id="typeahead"> 
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Website</label>
                        <div class="controls">
                            <input type="text" name="website" value="<?php echo $contact_info['website']; ?>" class="span6 typeahead" id="typeahead"> 
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Skype</label>
                        <div class="controls">
                            <input type="text" name="skype" value="<?php echo $contact_info['skype']; ?>" class="span6 typeahead" id="typeahead"> 
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Facebook Profile Link</label>
                        <div class="controls">
                            <input type="text" name="facebook" value="<?php echo $contact_info['facebook']; ?>" class="span6 typeahead" id="typeahead"> 
                        </div>
                    </div>
                   
                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Update Contact Info</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div><!--/row-->