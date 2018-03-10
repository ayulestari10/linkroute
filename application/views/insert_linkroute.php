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
                      <li><a href="<?= base_url('admin/linkroute') ?>"><i class="fa fa-book"> Link Route</i></a></li>
                      <li class="active"><i class="fa fa-pencil"> Insert Link Route</i></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <!-- Message Box untuk site yang salah -->
                <?php  
                    $duplikat       = $this->session->flashdata('duplikat');
                    $id_tidak_ada   = $this->session->flashdata('id_tidak_ada');
                    $baris_id       = $this->session->flashdata('baris_id');
                    $jmlh_data      = $this->session->flashdata('arr_data');

                    // $this->session->unset_userdata('duplikat');
                    // $this->session->unset_userdata('id_tidak_ada');
                    // $this->session->unset_userdata('arr_data');

                ?>
                <?php if(isset($duplikat) || isset($id_tidak_ada)): ?>
                    <!-- Modal -->

                        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">     
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Link Route Data</h4>
                              </div>
                              <div class="modal-body">
                                    <h4>Total Data <?= count($jmlh_data)-1 ?></h4>
                                    <!-- <h5><?= (count($jmlh_data) - 1) - count($duplikat) ?> data without duplicate data successfully saved.</h5> -->

                                    <?php if($duplikat != NULL && $id_tidak_ada == NULL): ?>
                                        <h5><?= (count($jmlh_data) - 1) - count($duplikat) ?> data successfully saved.</h5>
                                        <h5 class="text-danger"><?= count($duplikat) ?> duplicate data failed to be saved.</h5>

                                    <?php elseif($id_tidak_ada != NULL && $duplikat == NULL): ?>
                                        <h5><?= (count($jmlh_data) - 1) - count($baris_id) ?> data successfully saved.</h5>
                                        <h5 class="text-danger"><?= count($baris_id) ?> data failed to be saved due to id doesn't exist on the Site Table.</h5>

                                    <?php elseif($id_tidak_ada != NULL && $duplikat != NULL): ?>
                                        <h5><?= (count($jmlh_data) - 1) - count($baris_id)- count($duplikat) ?> data successfully saved.</h5>
                                        <h5 class="text-danger"><?= count($baris_id) + count($duplikat) ?> data failed to be saved due to id doesn't exist on the Site Table and duplicate data.</h5>

                                    <?php elseif($duplikat == NULL && $id_tidak_ada == NULL): ?>
                                        <h5><?= (count($jmlh_data) - 1) ?> data successfully saved.</h5>
                                    <?php endif; ?>

                                    <?php if($duplikat != NULL): ?>
                                    <br>
                                    <h4>Duplicate Data</h4>
                                   
                                         <table  class="table table-striped table-bordered table-hover table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Site ID</th>
                                                    <th>Band</th>
                                                    <th>NE ID</th>
                                                    <th>FE ID</th>
                                                    <th>HOP ID Detail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($duplikat as $row): ?>
                                                <tr>
                                                    <td><?= $row['Site_ID'] ?></td>
                                                    <td><?= $row['SysID'] ?></td>
                                                    <td><?= $row['NE_ID'] ?></td>
                                                    <td><?= $row['FE_ID'] ?></td>
                                                    <td><?= $row['HOP_ID_DETAIL'] ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>

                                    <?php if($id_tidak_ada != NULL): ?>
                                    <br>
                                    <h4>Data failed to save, because that id doesn't exist on the Site Table.</h4>
                                        
                                        <ul>
                                            <?php for($i=0; $i <count($id_tidak_ada); $i++): ?>
                                            <li><?= $id_tidak_ada[$i] ?></li>
                                            <?php endfor; ?>
                                        </ul>
                                         
                                    <?php endif; ?>
                                    
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
                            Link Route Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <?= $this->session->flashdata('msg')  ?>
                                    </div>
                                    <?= form_open('admin/insert_linkroute', ['id' => 'add_form'])  ?>
                                        <div class="form-group">
                                            <label>Site ID</label>
                                            <input class="form-control" type="text" name="Site_ID" list="data_siteid" autocomplete="off" required>
                                            <datalist id="data_siteid">
                                                <?php foreach ($site2 as $row): ?>
                                                <option value="<?= $row->Site_ID ?>">
                                                <?php endforeach;  ?>
                                            </datalist>
                                        </div>
                                        <div>
                                            <?= $this->session->flashdata('msg2')  ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Band</label>
                                            <input class="form-control" type="text" name="Band" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Near End ID</label>
                                            <input class="form-control" type="text" name="NE_ID" list="data_neid" autocomplete="off" required>
                                            <datalist id="data_neid">
                                                <?php foreach ($site2 as $row): ?>
                                                <option value="<?= $row->Site_ID ?>">
                                                <?php endforeach;  ?>
                                            </datalist>
                                        </div>
                                        <div>
                                            <?= $this->session->flashdata('msg3')  ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Far End ID</label>
                                            <input class="form-control" type="text" name="FE_ID" list="data_feid" autocomplete="off" required>
                                            <datalist id="data_feid">
                                                <?php foreach ($site2 as $row): ?>
                                                <option value="<?= $row->Site_ID ?>">
                                                <?php endforeach;  ?>
                                            </datalist>
                                        </div>
                                        <div>
                                            <?= $this->session->flashdata('msg4')  ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Hop ID Detail</label>
                                            <input class="form-control" type="text" name="HOP_ID_DETAIL" required>
                                        </div>
                                        <input type="submit" class="btn btn-success" name="save" value="Save" onclick="save_data()">
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
                            Upload CSV Link Route File
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div style="margin-top: 2%; margin-bottom: 2%;">
                                        <?= $this->session->flashdata('msgUpload') ?>
                                    </div>
                                </div>
                                <div style="padding-left: 330px">
                                    <button type="button" class="btn btn-info btn-sm" onclick="download_linkrouteTemplate()">Download Template <i class="fa fa-download"></i></button>
                                </div>
                            </div>

                            <?= form_open_multipart('admin/insertCSV_Linkroute', ['id' => 'upload']) ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Upload File</label> <span class="text-danger"> * the file format should be csv</span>
                                        <input type="file" name="file" style="margin: 2% 0% 4% 0%;">
                                    </div>
                                    <input type="submit" class="btn btn-success" value="Upload" name="uploadcsv" onclick="uploadCSV()">
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

            function save_data(){
                $('#add_form').submit();
            }
            function uploadCSV(){
                $('#upload').submit();
            }
            function download_linkrouteTemplate(){
                window.location = '<?= base_url('admin/download_linkroute') ?>';
            }
        </script>