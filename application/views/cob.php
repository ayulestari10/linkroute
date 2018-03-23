<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Combat Table <button onclick="tambah_siteCob()" type="button" class="btn btn-success btn-circle"></a><i class="fa fa-plus"></i></button></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Combat Table
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?= $this->session->flashdata('msg5'); ?>
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
                                            <!-- <a href="<?= base_url('admin/edit_site/' . $row->Site_ID)  ?>" class="btn btn-info btn-circle"><i class="fa fa-pencil-square-o"></i></a> -->
                                            <button onclick="mengubah_siteCob('<?= $row->SiteName ?>')" class="btn btn-info btn-circle"><i class="fa fa-pencil-square-o"></i></button>
                                            <button onclick="hapus_siteCob('<?= $row->SiteName ?>')" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->                       
                    <button onclick="delete_all_site()" class="btn btn-danger btn-md" style="margin-bottom: 4%;"> Delete All Data</button>
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
        function tambah_siteCob(){
          window.location = '<?= base_url('admin/insert_cob') ?>';
        }

        function mengubah_siteCob(SiteName){
          window.location = '<?= base_url('admin/edit_cob/') ?>' + SiteName;
        }

        function edit(siteName) {
            $.ajax({
                url: '<?= base_url('admin/data_cob') ?>',
                type: 'POST',
                data: {
                    siteName: siteName,
                    edit: true
                },
                success: function(response) {
                    window.location = '<?= base_url('admin/data_cob') ?>'
                },
                error: function(e) {
                    console.log(e.responseText);
                }
            });
        }

        function hapus_siteCob(SiteName) {
            
            swal({
              title: 'Are you sure to delete data?',
              text: "",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes',
              cancelButtonText: 'Cancel',
              confirmButtonClass: 'btn btn-success',
              cancelButtonClass: 'btn btn-danger',
              buttonsStyling: false,
              reverseButtons: true
            }).then((result) => {
              if (result.value) {
                $.ajax({
                    url: '<?= base_url('admin/delete_cob') ?>',
                    type: 'POST',
                    data: {
                        SiteName: SiteName,
                        delete: true
                    },
                    success: function() {
                      //window.location = '<?= base_url('admin/delete_cob') ?>';
                    }
                });

                swal({
                  type: 'success',
                  title: 'Data successfully deleted!',
                  showConfirmButton: false,
                  timer: 1500
                })

                window.location = '<?= base_url('admin/delete_cob') ?>';
              } 

              else if (result.dismiss === 'cancel') {
                swal(
                  'Canceled!',
                  'Your data is safe! :)',
                  'error'
                )
              }
            }) 
        }

        function delete_all_site(){         

              swal({
                title: 'Are you sure to delete all data?',
                text: "",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
              }).then((result) => {
                if (result.value) {
                  window.location = '<?= base_url('admin/delete_all_cob') ?>';
                  swal(
                    'Data successfully deleted!',
                    '',
                    'success'
                  )
                // result.dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                  swal(                    
                    'Canceled!',
                    'Your data is safe! :)',
                    'error'
                  )
                }
              })
        }
    </script>