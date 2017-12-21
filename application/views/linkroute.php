      
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Link Route Table <button onclick="location.href='<?= base_url('home/insert_linkroute')  ?>'" type="button" class="btn btn-success btn-circle"><i class="fa fa-plus"></i></button></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Site ID</th>
                                        <th>Site Name</th>
                                        <th>Band</th>
                                        <th>NE ID</th>
                                        <th>NE Name</th>
                                        <th>FE ID</th>
                                        <th>FE Name</th>
                                        <th>HOP ID DEATIL</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach ($site as $row): ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $row->Site_ID ?></td>
                                        <td><?= $row->Site_Name ?></td>
                                        <td><?= $row->SysID ?></td>
                                        <td><?= $row->NE_ID ?></td>
                                        <td><?= $row->NE_Name ?></td>
                                        <td><?= $row->FE_ID ?></td>
                                        <td><?= $row->FE_Name ?></td>
                                        <td><?= $row->HOP_ID_DETAIL ?></td>
                                        <td>
                                            <a href="<?= base_url('Home/edit_linkroute/' . $row->id)  ?>" class="btn btn-info btn-circle"><i class="fa fa-pencil-square-o"></i></a>
                                            <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->