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
                            Edit Link Route
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?= form_open('Home/edit_linkroute/' . $row->Site_ID  . '_' . $row->SysID . '_' . $row->NE_ID . '_' . $row->FE_ID)  ?>
                                        <div class="form-group">
                                            <label>Site ID</label>
                                            <input class="form-control" type="text" name="Site_ID" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Band</label>
                                            <input class="form-control" type="text" name="Band" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Near End ID</label>
                                            <input class="form-control" type="text" name="NE_ID" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Far End ID</label>
                                            <input class="form-control" type="text" name="FE_ID" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Hop ID Detail</label>
                                            <input class="form-control" type="text" name="HOP_ID_DETAIL" value="" required>
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