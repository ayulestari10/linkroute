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
                                    <?= form_open('Home/edit_linkroute')  ?>
                                        <div class="form-group">
                                            <label>ID</label>
                                            <input type="text" name="id" class="form-control" value="$site->id" disabled="">
                                        </div>
                                        <div class="form-group">
                                            <label>Site ID</label>
                                            <select class="form-control" >
                                                <option value=""></option>
                                                <?php foreach ($site as $row): ?>
                                                    <option value="<?= $row->Site_ID ?>"><?= $row->Site_ID  ?></option>
                                                <?php endforeach;  ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Site ID</label>
                                            <input class="form-control" type="text" name="Site_ID" value=" $site->Site_ID" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Band</label>
                                            <input class="form-control" type="text" name="Band" value=" $site->SysID" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Near End ID</label>
                                            <input class="form-control" type="text" name="NE_ID" value="$site->NE_ID" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Far End ID</label>
                                            <input class="form-control" type="text" name="FE_ID" value="$site->FE_ID" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Hop ID Detail</label>
                                            <input class="form-control" type="text" name="HOP_ID_DETAIL" value="$site->HOP_ID_DETAIL" required>
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