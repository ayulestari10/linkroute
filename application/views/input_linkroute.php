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
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Site ID</label>
                                            <input class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Band</label>
                                            <input class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Site Name</label>
                                            <input class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Near End ID</label>
                                            <input class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Near End Name</label>
                                            <input class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Far End ID</label>
                                            <input class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Far End Name</label>
                                            <input class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Hop ID Detail</label>
                                            <input class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </form>
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
                            <?= form_open_multipart('home/insertCSV') ?>
                            <div class="row">
                                <div class="col-lg-12">
                                <div><?= $this->session->flashdata('msg') ?></div>
                                    <form role="form">
                                        <div class="form-group">
                                            <label>File input</label>
                                            <input type="file" name="file">
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