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
                    <ol class="breadcrumb">
                      <li><a href="<?= base_url('admin/data_cob') ?>"><i class="fa fa-book"> Combat</i></a></li>
                      <li class="active"><i class="fa fa-pencil"> Edit Combat</i></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Combat Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <?= $this->session->flashdata('msg')  ?>
                                    </div>
                                    <?= form_open('admin/edit_cob/' . $site->SiteName , ['id' => 'edit'])  ?>
                                        <div class="form-group">
                                            <label>Site ID</label>
                                            <input class="form-control" type="text" name="Site_ID" value="<?= $site->Site_ID ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Site Name</label>
                                            <input class="form-control" type="text" name="SiteName" value="<?= $site->SiteName  ?>" disabled="">
                                        </div>
                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input class="form-control" type="number" name="Longitude" value="<?= $site->Longitude ?>" step="any" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input class="form-control" type="number" name="Latitude" value="<?= $site->Latitude ?>" step="any" required>
                                        </div>
                                        <input onclick="edit_data()"  type="submit" class="btn btn-success" name="edit" value="Save">
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

        <script type="text/javascript">
            function edit_data(){
                $('#edit').submit();
            }

        </script>