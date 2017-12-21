<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Site Table <button onclick="location.href='<?= base_url('home/insert_site')  ?>'" type="button" class="btn btn-success btn-circle"></a><i class="fa fa-plus"></i></button></h1>
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
                            <div class="row">
                                <div class="col-lg-12">
                                    <?= $this->session->flashdata('msg'); ?>
                                </div>
                            </div>

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Site ID</th>
                                        <th>Site Name</th>
                                        <th>Longitude</th>
                                        <th>Latitude</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($site as $row): ?>
                                    <tr>
                                        <td><?= $row->Site_ID ?></td>
                                        <td><?= $row->SiteName ?></td>
                                        <td><?= $row->Longitude ?></td>
                                        <td><?= $row->Latitude ?></td>
                                        <td>
                                            <a href="<?= base_url('Home/edit_site/' . $row->Site_ID)  ?>" class="btn btn-info btn-circle"><i class="fa fa-pencil-square-o"></i></a>
                                            <button onclick="delete_site('<?= $row->Site_ID ?>')" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>
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

    <script type="text/javascript">
        function delete_site(Site_ID) {
            $.ajax({
                url: '<?= base_url('home/site') ?>',
                type: 'POST',
                data: {
                    Site_ID: Site_ID,
                    delete: true
                },
                success: function() {
                    window.location = '<?= base_url('home/site') ?>';
                }
            });
        }
    </script>