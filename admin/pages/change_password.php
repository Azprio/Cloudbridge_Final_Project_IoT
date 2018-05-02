<?php
if(isset($_POST['btn'])) {
        require '../classes/admin.php';
        $obj_admin=new Admin();
        $message=$obj_admin->change_admin_password($_POST);
    }
?>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Your Header Info Form</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h2 style="color: green; "><?php if (isset($message)) {
    echo $message;
} ?></h2>
        <div class="box-content">
            <form class="form-horizontal" action="" method="post">
                <fieldset>
                     <div class="control-group">
                        <label class="control-label" for="typeahead">Old Password </label>
                        <div class="controls">
                            <input type="text" name="old_password" value="" class="span6 typeahead" id="typeahead"> 
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Provide New Password </label>
                        <div class="controls">
                            <input type="text" name="new_password" value="" class="span6 typeahead" id="typeahead"> 
                        </div>
                    </div>
                   
                    
                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Update Login Password</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div><!--/row-->
