 <div class="hero-unit-table">   
<div class="col-sm-9 padding-right"> 
                            <div class="charts_container">
                                <div class="chart_container">
                                     <div class="alert alert-info">Graph of Products with highest Quantity</div>  
                                    <canvas id="chartCanvas1" width="1100" height="400">
                                        Your web-browser does not support the HTML 5 canvas element.
                                    </canvas>

                                </div>
                            </div>
        </div>
                         

						 <script type="application/javascript">

                                var chart1 = new AwesomeChart('chartCanvas1');


                                chart1.data = [
                                <?php
                                $query = mysql_query("select * from products") or die(mysql_error());
                                while ($row = mysql_fetch_array($query)) {
                                    ?>
                                    <?php echo $row['quantity'] . ','; ?>	
                                <?php }; ?>
                                ];

                                chart1.labels = [
                                <?php
                                $query = mysql_query("select * from products") or die(mysql_error());
                                while ($row = mysql_fetch_array($query)) {
                                    ?>
                                    <?php echo "'" . $row['name'] . "'" . ','; ?>	
                                <?php }; ?>
                                ];
                                chart1.colors = ['#006CFF', '#FF6600', '#34A038', '#945D59', '#93BBF4', '#F493B8'];
                                chart1.randomColors = true;
                                chart1.animate = true;
                                chart1.animationFrames = 30;
                                chart1.draw();


                               
                            </script>


                        </div>
