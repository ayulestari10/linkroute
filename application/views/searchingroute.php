    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Searching Route</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-5">
                    <?= $this->session->flashdata('msg')  ?>
                </div>
            </div>
            <?= form_open('admin/find_searching') ?>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Site</label>
                            <input type="text" name="input_site" class="form-control" list="datalist1" autocomplete="off" required>
                            <datalist id="datalist1">
                                <?php foreach ($site1 as $row): ?>
                                <option value="<?= $row->Site_ID ?>">
                                <?php endforeach;  ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Band</label>
                            <select class="form-control" name="band" required>
                                <option value=""></option>
                                <option value="MD">2G(MD)</option>
                                <option value="MG">2G(MG)</option>
                                <option value="MM">2G(MM)</option>
                                <option value="MW">3G</option>
                                <option value="ML">4G</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group" style="padding: 12%; margin-left: -15%; position: absolute;">
                            <input type="submit" name="cari" value="Search" class="btn btn-info">
                        </div>
                    </div>
                </div>
            <?= form_close() ?>

            <?php if(isset($site) && isset($site2)): ?>
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
                                            <?php foreach ($site as $row): ?>
                                                <tr>   
                                                    <td><?= $row->NE_ID ?></td>  
                                                    <td><?= $row->NE_Longitude ?></td>  
                                                    <td><?= $row->NE_Latitude ?></td>  
                                                </tr>
                                            <?php endforeach;  ?>
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
                                                <?php foreach ($site as $row): ?>
                                                <tr>     
                                                    <td><?= $row->FE_ID ?></td>  
                                                    <td><?= $row->FE_Longitude ?></td>     
                                                    <td><?= $row->FE_Latitude ?></td>
                                                </tr>
                                                <?php endforeach;  ?>
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
                                                <?php foreach ($site2 as $row): ?>           
                                                <tr >
                                                    <td><?= $row->Site_ID ?></td>  
                                                    <td><?= $row->Longitude ?></td>
                                                    <td><?= $row->Latitude ?></td>
                                                </tr>
                                                <?php endforeach; ?>                                            
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
        <?php endif; ?>
            </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->