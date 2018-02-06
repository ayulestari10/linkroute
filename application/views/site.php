<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Site Table <button onclick="tambah_site()" type="button" class="btn btn-success btn-circle"></a><i class="fa fa-plus"></i></button></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Site Table
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
                                            <button onclick="mengubah_site('<?= $row->Site_ID ?>')" class="btn btn-info btn-circle"><i class="fa fa-pencil-square-o"></i></button>
                                            <button onclick="hapus_site('<?= $row->Site_ID ?>')" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>
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
        function tambah_site(){
          window.location = '<?= base_url('admin/insert_site') ?>';
        }

        function mengubah_site(Site_ID){
          window.location = '<?= base_url('admin/edit_site/') ?>' + Site_ID;
        }

        function hapus_site(Site_ID) {
            
            swal({
              title: 'Apakah anda yakin untuk menghapus data?',
              text: "Setiap Site ID yang diapus akan menghapus link route yang memiliki Site ID itu!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya',
              cancelButtonText: 'Batal',
              confirmButtonClass: 'btn btn-success',
              cancelButtonClass: 'btn btn-danger',
              buttonsStyling: false,
              reverseButtons: true
            }).then((result) => {
              if (result.value) {
                $.ajax({
                    url: '<?= base_url('admin/delete_site') ?>',
                    type: 'POST',
                    data: {
                        Site_ID: Site_ID,
                        delete: true
                    },
                    success: function() {
                      //window.location = '<?= base_url('admin/delete_site') ?>';
                    }
                });

                swal({
                  type: 'success',
                  title: 'Data berhasil dihapus!',
                  showConfirmButton: false,
                  timer: 1500
                })

                window.location = '<?= base_url('admin/data_site') ?>';
              } 

              else if (result.dismiss === 'cancel') {
                swal(
                  'Dibatalkan',
                  'Data anda aman! :)',
                  'error'
                )
              }
            }) 
        }

        function delete_all_site(){         

              swal({
                title: 'Apakah anda yakin untuk menghapus semua data?',
                text: "Data link route akan terhapus semua!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
              }).then((result) => {
                if (result.value) {
                  window.location = '<?= base_url('admin/delete_all_site') ?>';
                  swal(
                    'Data berhasil dihapus!',
                    '',
                    'success'
                  )
                // result.dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                  swal(                    
                    'Dibatalkan',
                    'Data anda aman! :)',
                    'error'
                  )
                }
              })
        }
    </script>