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
                      <li><a href="<?= base_url('admin/site') ?>"><i class="fa fa-book"> Site</i></a></li>
                      <li class="active"><i class="fa fa-pencil"> Insert Site</i></li>
                    </ol>
                </div>
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
                                    <?= form_open('admin/insert_site')  ?>
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
                                            <input type="text" class="form-control" name="Longitude" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input type="text" class="form-control" name="Latitude" required>
                                        </div>
                                        <input type="submit" class="btn btn-success" name="save" value="Save">
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
                            </div>

                            <?= form_open_multipart('admin/insertCSV_Site') ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Upload File</label> <span class="text-danger"> * the file format should be csv</span>
                                        <input type="file" name="file" style="margin: 2% 0% 4% 0%;">
                                    </div>
                                    <input type="submit" class="btn btn-success" value="Upload" name="uploadcsv">
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