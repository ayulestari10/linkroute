<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Form</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Site Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <?= $this->session->flashdata('msg')  ?>
                                    </div>
                                    <?= form_open('Home/edit_site/' . $site->Site_ID)  ?>
                                        <div class="form-group">
                                            <label>Site ID</label>
                                            <input class="form-control" type="text" name="Site_ID" value="<?= $site->Site_ID ?>" disabled="">
                                        </div>
                                        <div class="form-group">
                                            <label>Site Name</label>
                                            <input class="form-control" type="text" name="SiteName" value="<?= $site->SiteName  ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input class="form-control" type="text" name="Longitude" value="<?= $site->Longitude ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input class="form-control" type="text" name="Latitude" value="<?= $site->Latitude ?>" required>
                                        </div>
                                        <input type="submit" class="btn btn-success" name="edit" value="Save">
                                    <?= form_close()  ?>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->