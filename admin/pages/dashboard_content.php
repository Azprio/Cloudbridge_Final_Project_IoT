<?php
$url1=$_SERVER['REQUEST_URL'];
header("Refresh: 5; URL=$url1");
?>
<?php
require '../classes/application.php';
$obj_app = new Application();
$query_result=$obj_app->select_all_sensor();
$sensor=mysqli_fetch_assoc($query_result);

?>


                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="index.html">Home</a> 
                            <i class="icon-angle-right"></i>
                        </li>
                        <li><a href="#">Dashboard</a></li>
                    </ul>

                    <div class="row-fluid">

                        <div class="span2 statbox purple" onTablet="span6" onDesktop="span2">
                            
                            <div class="number"><?php echo $sensor['hum']; ?>%</i></div>
                            
                            <div class="footer">
                                <p> Humidity in Percentage</p>
                            </div>	
                        </div>
                        <div class="span2 statbox green" onTablet="span6" onDesktop="span2">
                            
                            <div class="number"><?php echo $sensor['temp']; ?>C</i></div>
                            
                            <div class="footer">
                                <p> Temperature in Celsius</p>
                            </div>
                        </div>
                        <div class="span2 statbox blue noMargin" onTablet="span6" onDesktop="span2">
                           
                            <div class="number"><?php echo $sensor['fern']; ?>F</i></div>
                            
                            <div class="footer">
                                <p> Temperature in Fahrenheit</p>
                            </div>
                        </div>
                        <div class="span2 statbox yellow" onTablet="span6" onDesktop="span2">
                            
                            <div class="number"><?php echo $sensor['lpg']; ?>%</div>
                            
                            <div class="footer">
                                <p> LPG Gas in Percentage</p>
                            </div>
                        </div>	
                        
                        
                        <div class="span2 statbox pink" onTablet="span6" onDesktop="span2">
                            
                            <div class="number"><?php echo $sensor['smk']; ?>%</div>
                            
                            <div class="footer">
                                <p> Smoke in Percentage</p>
                            </div>
                        </div>

                    </div>		

                    

                    <div class="row-fluid hideInIE8 circleStats">

                        <div class="span2" onTablet="span4" onDesktop="span2">
                            <div class="circleStatsItemBox purple">
                                <div class="header">Humidity</div>
                                <span class="percent">percent</span>
                                <div class="circleStat">
                                    <input type="text" value="<?php echo $sensor['hum']; ?>" class="whiteCircle" />
                                </div>		
                                <div class="footer">
                                    <span class="unit"></span>	
                                </div>
                            </div>
                        </div>

                        <div class="span2" onTablet="span4" onDesktop="span2">
                            <div class="circleStatsItemBox green">
                                <div class="header">Temperature</div>
                                <span class="percent">Celsius</span>
                                <div class="circleStat">
                                    <input type="text" value="<?php echo $sensor['temp']; ?>" class="whiteCircle" />
                                </div>		
                                <div class="footer">
                                    <span class="unit"></span>	
                                </div>
                            </div>
                        </div>

                        <div class="span2" onTablet="span4" onDesktop="span2">
                            <div class="circleStatsItemBox noMargin">
                                <div class="header">Temperature</div>
                                <span class="percent">Fahrenheit</span>
                                <div class="circleStat">
                                    <input type="text" value="<?php echo $sensor['fern']; ?>" class="whiteCircle" />
                                </div>		
                                <div class="footer">
                                    <span class="unit"></span>	
                                </div>
                            </div>
                        </div>

                        <div class="span2" onTablet="span4" onDesktop="span2">
                            <div class="circleStatsItemBox yellow">
                                <div class="header">LPG Gas</div>
                                <span class="percent">percent</span>
                                <div class="circleStat">
                                    <input type="text" value="<?php echo $sensor['lpg']; ?>" class="whiteCircle" />
                                </div>		
                                <div class="footer">
                                    <span class="unit"></span>	
                                </div>
                            </div>
                        </div>

                        <div class="span2" onTablet="span4" onDesktop="span2">
                            <div class="circleStatsItemBox pink">
                                <div class="header">Smoke</div>
                                <span class="percent">percent</span>
                                <div class="circleStat">
                                    <input type="text" value="<?php echo $sensor['smk']; ?>" class="whiteCircle" />
                                </div>		
                                <div class="footer">
                                    <span class="unit"></span>	
                                </div>
                            </div>
                        </div>

                        

                    </div>		

                    
