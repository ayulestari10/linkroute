<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Form</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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
                                    <?= form_open('Home/insert_site')  ?>
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
                            File Site Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>File input</label>
                                            <input type="file">
                                        </div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
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