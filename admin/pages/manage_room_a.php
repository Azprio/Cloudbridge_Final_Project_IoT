<?php
require '../classes/application.php';
$obj_app = new Application();
$query_result=$obj_app->select_all_room_a_info();

require '../classes/external.php';
$obj_ext = new External();


if(isset($_POST['btn'])){
    $message=$ob_sup_admin->add_room_a_info($_POST);
}

if (isset($_GET['status'])) {
    $switch_id = $_GET['id'];
    $gpio = $_GET['pin'];
    if ($_GET['status'] == 'switch_off') {
            system("gpio -g mode $gpio out");
            system("gpio -g write $gpio 1");
        $message = $ob_sup_admin->switch_off_room_a_by_id($switch_id);
           $obj_ext->temporary_gpio_off($gpio);
    } else if ($_GET['status'] == 'switch_on') {
            system("gpio -g mode $gpio out");
            system("gpio -g write $gpio 0");
        $message = $ob_sup_admin->switch_on_room_a_by_id($switch_id);
            $obj_ext->temporary_gpio_on($gpio);

    } else if ($_GET['status'] == 'delete') {
        $message = $ob_sup_admin->delete_room_a_info($switch_id);
    }
}

?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Switch Form</h2>
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
                        <label class="control-label" for="typeahead">Switch Description </label>
                        <div class="controls">
                            <input type="text" name="switch_description" required class="span6 typeahead" id="typeahead"> 
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Raspberry GPIO Number (1 - 40) </label>
                        <div class="controls">
                            <input type="number" name="gpio" required class="span6 typeahead" id="typeahead"> 
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Switch Default Status </label>
                        <div class="controls">
                            <select id="selectError3" name="switch_status">
                                <option>---Select Default Status---</option>
                                <option value="1">ON</option>
                                <option value="0">OFF</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Add Switch in Room A</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div><!--/row-->






<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>List of Switches in Room A</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Switch Description</th>
                        <th>Raspberry GPIO Number [1 - 40]</th>
                        <th>Current Status</th>
                        <th>Action</th>
                        <th>Edit / Delete</th>
                    </tr>
                </thead>   
                <tbody>
<?php while ($room_a_info = mysqli_fetch_assoc($query_result)) { ?>
                        <tr>
                            <td class="center"><?php echo $room_a_info['switch_description']; ?></td>
                            <td class="center"><?php echo $room_a_info['gpio']; ?></td>
                            <td class="center">
                            <?php
                                if($room_a_info['switch_status']==1){
                                ?>
                                <?php echo 'Switch is ON now'?>
                                <?php
                                }
                                else{
                                ?>
                                 <?php echo 'Switch is OFF now'?>
                                <?php
                                }
                                ?>
                                
                            </td>
                            <td class="center"><?php
                                if($room_a_info['switch_status']==1){
                                ?>
                                <a class="btn btn-success" href="?status=switch_off&&id=<?php echo $room_a_info['switch_id']; ?>&&pin=<?php echo $room_a_info['gpio']; ?>" title="Turn it Off">
                                    <i class="halflings-icon white arrow-down"></i>  
                                </a>
                                <?php
                                }
                                else{
                                ?>
                                <a class="btn btn-danger" href="?status=switch_on&&id=<?php echo $room_a_info['switch_id']; ?>&&pin=<?php echo $room_a_info['gpio']; ?>" title="Turn it on">
                                    <i class="halflings-icon white arrow-up"></i>  
                                </a>
                                <?php
                                }
                                ?>
                            </td>

                            <td class="center">
                                
                                <a class="btn btn-info" href="edit_room_a.php?id=<?php echo $room_a_info['switch_id'];?>">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                                <a class="btn btn-danger" href="?status=delete&&id=<?php echo $room_a_info['switch_id'] ?>" title="Delete it" onclick="return check_delete()">
                                    <i class="halflings-icon white trash"></i> 
                                </a>
                            </td>
                        </tr>
<?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->

</div>
