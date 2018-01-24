<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Form</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                      <li><a href="<?= base_url('admin/linkroute') ?>"><i class="fa fa-book"> Link Route</i></a></li>
                      <li class="active"><i class="fa fa-pencil"> Edit Link Route</i></li>
                    </ol>
                </div>
            </div>

             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Linkroute List To Edit
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="mainTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Site ID</th>
                                        <th>Band</th>
                                        <th>NE ID</th>
                                        <th>FE ID</th>
                                        <th>HOP ID DEATIL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach ($all_site as $row): ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $row->Site_ID ?></td>
                                        <td><?= $row->SysID ?></td>
                                        <td><?= $row->NE_ID ?></td>
                                        <td><?= $row->FE_ID ?></td>
                                        <td><?= htmlentities($row->HOP_ID_DETAIL) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Link Route
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div><?= $this->session->flashdata('msg') ?></div>
                                    
                                    <?= form_open('admin/edit_linkroute/'. $site->id)  ?>
                                        <div class="form-group">
                                            <label>ID</label>
                                            <input type="text" name="id" class="form-control" value="<?= $site->id ?>" disabled="">
                                        </div>
                                        <div class="form-group">
                                            <label>Site ID</label>
                                            <input class="form-control" type="text" name="Site_ID" value="<?= $site->Site_ID ?>" list="data_siteid" autocomplete="off" required>
                                            <datalist id="data_siteid">
                                                <?php foreach ($site2 as $row): ?>
                                                <option value="<?= $row->Site_ID ?>">
                                                <?php endforeach;  ?>
                                            </datalist>
                                        </div>
                                        <div class="form-group">
                                            <label>Band</label>
                                            <input class="form-control" type="text" name="Band" value=" <?= $site->SysID ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Near End ID</label>
                                            <input class="form-control" type="text" name="NE_ID" value="<?= $site->NE_ID ?>" list="data_neid" autocomplete="off" required>
                                            <datalist id="data_neid">
                                                <?php foreach ($site2 as $row): ?>
                                                <option value="<?= $row->Site_ID ?>">
                                                <?php endforeach;  ?>
                                            </datalist>
                                        </div>
                                        <div class="form-group">
                                            <label>Far End ID</label>
                                            <input class="form-control" type="text" name="FE_ID" value="<?= $site->FE_ID ?>" list="data_feid" autocomplete="off" required>
                                            <datalist id="data_feid">
                                                <?php foreach ($site2 as $row): ?>
                                                <option value="<?= $row->Site_ID ?>">
                                                <?php endforeach;  ?>
                                            </datalist>
                                        </div>
                                        <div class="form-group">
                                            <label>Hop ID Detail</label>
                                            <input class="form-control" type="text" name="HOP_ID_DETAIL" value="<?= $site->HOP_ID_DETAIL ?>" required>
                                        </div>
                                        <input type="submit" class="btn btn-success" name="edit" value="Edit">
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