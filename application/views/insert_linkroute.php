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
                            Link Route Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <?= $this->session->flashdata('msg')  ?>
                                    </div>
                                    <?= form_open('home/insert_linkroute')  ?>
                                        <div class="form-group">
                                            <label>Site ID</label>
                                            <input class="form-control" type="text" name="Site_ID" required>
                                        </div>
                                        <div>
                                            <?= $this->session->flashdata('msg2')  ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Band</label>
                                            <input class="form-control" type="text" name="Band" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Site Name</label>
                                            <input class="form-control" type="text" name="Site_Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Near End ID</label>
                                            <input class="form-control" type="text" name="NE_ID" required>
                                        </div>
                                        <div>
                                            <?= $this->session->flashdata('msg3')  ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Near End Name</label>
                                            <input class="form-control" type="text" name="NE_Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Far End ID</label>
                                            <input class="form-control" type="text" name="FE_ID" required>
                                        </div>
                                        <div>
                                            <?= $this->session->flashdata('msg4')  ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Far End Name</label>
                                            <input class="form-control" type="text" name="FE_Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Hop ID Detail</label>
                                            <input class="form-control" type="text" name="HOP_ID_DETAIL" required>
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
                                    <?= form_open('')  ?>
                                        <div class="form-group">
                                            <label>File input</label>
                                            <input type="file" name="file">
                                        </div>
                                        <input type="submit" class="btn btn-success" name="uploadCSV" value="Save">
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
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->