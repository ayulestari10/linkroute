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
                      <li><a href="<?= base_url('admin/data_cob') ?>"><i class="fa fa-book"> Combat</i></a></li>
                      <li class="active"><i class="fa fa-pencil"> Insert Combat</i></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Combat Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <?= $this->session->flashdata('msg')  ?>
                                    </div>
                                    <?= form_open('admin/insert_cob', ['id' => 'tambah_baris'])  ?>
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
                            Upload CSV Combat File
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div style="margin-top: 2%; margin-bottom: 2%;">
                                        <?= $this->session->flashdata('msgUpload') ?>
                                    </div>
                                </div>
                                <div style="padding-left: 330px">
                                    <button type="button" class="btn btn-info btn-sm" onclick="download_cobTemplate()">Download Template <i class="fa fa-download"></i></button>
                                </div>
                            </div>

                            <?= form_open_multipart('admin/insertCSV_Cob', ['id' => 'upload']) ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Upload File</label> <span class="text-danger"> * the file format should be csv</span>
                                        <input type="file" name="file" style="margin: 2% 0% 4% 0%;">
                                    </div>
                                    <input onclick="uploadCSV()" type="submit" class="btn btn-success" value="Upload" name="uploadcsv">
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
            function submit_data(){
                $('#tambah_baris').submit();
            }
            function uploadCSV(){
                $('#upload').submit();
            }
            function download_cobTemplate(){
                window.location = '<?= base_url('admin/download_cob') ?>';
            }
        </script>