    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Form</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                      <li><a href="<?= base_url('admin/data_site') ?>"><i class="fa fa-book"> Site</i></a></li>
                      <li class="active"><i class="fa fa-pencil"> Insert Site</i></li>
                    </ol>
                </div>
            </div>



            <style type="text/css">
                .salah{
                    width: 500px;
                }
            </style>

            <div class="row">
                <!-- Message Box untuk site yang salah -->
                <?php  
                    $salah      = $this->session->flashdata('salah');
                    $jmlh_data  = $this->session->flashdata('arr_data');
                ?>
                <?php if(isset($salah)): ?>
                    <!-- Modal -->
                        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Site Data</h4>
                              </div>
                              <div class="modal-body">
                                    <h4>Total Data <?= count($jmlh_data)-1 ?></h4>
                                    <h5><?= (count($jmlh_data) - 1) - count($salah)  ?> data successfully saved.</h5>
                                    <h5><?= count($salah) ?> data failed to be saved due to duplicate data.</h5>
                                    <br>
                                    <h4>Duplicate Data</h4>
                                   
                                         <table  class="table table-striped table-bordered table-hover table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Site ID</th>
                                                    <th>Site Name</th>
                                                    <th>Longitude</th>
                                                    <th>Latitude</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($salah as $row): ?>
                                                <tr>
                                                    <td><?= $row['Site_ID'] ?></td>
                                                    <td><?= $row['SiteName'] ?></td>
                                                    <td><?= $row['Longitude'] ?></td>
                                                    <td><?= $row['Latitude'] ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    
                              </div>
                              <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Ignore</button>
                              </div>
                            </div><!-- /.modal-content -->
                          </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                <?php endif; ?>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Site Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <?= $this->session->flashdata('msg')  ?>
                                    </div>
                                    <?= form_open('admin/insert_site', ['id' => 'tambah_baris'])  ?>
                                        <div class="form-group">
                                            <label>Site ID</label>
                                            <input type="text" class="form-control" name="Site_ID" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Site Name</label>
                                            <input type="text" class="form-control" name="SiteName" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input type="number" step="any" class="form-control" name="Longitude" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input type="number" step="any" class="form-control" name="Latitude" required>
                                        </div>
                                        <input onclick="submit_data()" type="submit" class="btn btn-success" name="save" value="Save">
                                    <?= form_close()  ?>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Upload CSV Site File
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div style="margin-top: 2%; margin-bottom: 2%;">
                                        <?= $this->session->flashdata('msgUpload') ?>
                                    </div>
                                </div>
                                <div style="padding-left: 330px">
                                    <button type="button" class="btn btn-info btn-sm" onclick="download_siteTemplate()">Download Template <i class="fa fa-download"></i></button>
                                </div>
                            </div>

                            <?= form_open_multipart('admin/insertCSV_Site', ['id' => 'upload']) ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Upload File</label> <span class="text-danger"> * the file format should be csv</span>
                                        <input type="file" name="file" style="margin: 2% 0% 4% 0%;">
                                    </div>
                                    <input onclick="uploadCSV()" type="submit" class="btn btn-success" value="Upload" name="uploadcsv" id="myButton" data-loading-text="Loading..." autocomplete="off">
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                            <?= form_close() ?>

                         </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

        
        <script type="text/javascript">
            $( document ).ready( function(){
                $('#myModal').modal();
            } );

            function submit_data(){
                $('#tambah_baris').submit();
            }
            function uploadCSV(){
                $('#upload').submit();
            }
            function download_siteTemplate(){
                window.location = '<?= base_url('admin/download_site') ?>';
            }

            $('#myButton').on('click', function () {
                var $btn = $(this).button('loading')
                // business logic...
                $btn.button('reset')
            })
        </script>