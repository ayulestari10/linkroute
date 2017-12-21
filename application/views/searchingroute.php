    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Searching Route</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <?= form_open('Home/SearchingRoute') ?>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Site</label>
                            <input type="text" name="input_site" class="form-control" list="datalist1">
                            <datalist id="datalist1">
                                <?php foreach ($site as $row): ?>
                                <option value="<?= $row->Site_ID ?>">
                                <?php endforeach;  ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Band</label>
                            <select class="form-control" name="band" id="">
                                <option value=""></option>
                                <option value="2G">2G</option>
                                <option value="3G">3G</option>
                                <option value="4G">4G</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group" style="padding: 14%; margin-left: -20%; position: absolute;">
                            <!-- <button class="btn btn-info"><i class="fa fa-search"></i> Cari</button> -->
                            <input type="submit" name="cari" value="Search" class="btn btn-info">
                        </div>
                    </div>
                </div>
            <?= form_close() ?>

            <div class="row" style="margin-top: 5%;">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Searching Route
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <style type="text/css">
                                tr,th,table,td{text-align: center;}
                            </style>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Near End</th>
                                                </tr>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Longitude</th>
                                                    <th>Latitude</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>   
                                                    <td>MGR001</td>  
                                                    <td>108.28</td>  
                                                    <td>-2.86489</td>  
                                                </tr>
                                                <tr>   
                                                    <td>MGR001</td>  
                                                    <td>108.28</td>  
                                                    <td>-2.86489</td>
                                                </tr>
                                                <tr>   
                                                    <td>MGR001</td>  
                                                    <td>108.28</td>  
                                                    <td>-2.86489</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>

                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Far End</th>
                                                </tr>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Longitude</th>
                                                    <th>Latitude</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>     
                                                    <td>MGR003</td>  
                                                    <td>108.168</td>     
                                                    <td>-2.97053</td>
                                                </tr>
                                                <tr>    
                                                    <td>MGR003</td>  
                                                    <td>108.168</td>     
                                                    <td>-2.97053</td>
                                                </tr>
                                                <tr> 
                                                    <td>MGR003</td>  
                                                    <td>108.168</td>     
                                                    <td>-2.97053</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>


                            </div> 
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->

                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Sites
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <th >Site ID</th>
                                                <th >Longitude</th>
                                                <th >Latitude</th>
                                            </thead>
                                            <tbody>                                            
                                                <tr >
                                                    <td>MGR001</td>  
                                                    <td>108.28</td>
                                                    <td>-2.86489</td>
                                                </tr>                                            
                                                <tr >
                                                    <td>MGR001</td>  
                                                    <td>108.28</td>
                                                    <td>-2.86489</td>
                                                </tr>                                            
                                                <tr >
                                                    <td>MGR001</td>  
                                                    <td>108.28</td>
                                                    <td>-2.86489</td>
                                                </tr>                                            
                                                <tr >
                                                    <td>MGR001</td>  
                                                    <td>108.28</td>
                                                    <td>-2.86489</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->

            </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->