<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>General Dashboard &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <link rel="stylesheet" href="<?= base_url()?>node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">  
  <!-- CSS Libraries -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
    
      <?php $this->load->view('include/header.php')?>

      <?php $this->load->view('include/sidebar.php')?>

      <div class="main-content">
        <section class="section">
          <div class="section-header">
          <h1>Dashboard</h1>
          </div>
          <h1 class="section-title">Wellcome to Si DOKU</h1>
                  <div class="alert alert-primary">
                      <div class="alert-title">Founder</div>
                      Si Doku Corporation.
                    </div>
                  <div class="card-body">
                    <ul class="card-card-warning">
                      <li class="media">
                        <img class="rounded-circle mr-1" src="assets/img/pp1.jpg" alt="Generic ">
                        <div class="media-body">
                          <h5 class="mt-0 mb-1">M.Faiz Fahmi</h5>
                          <p></p>
                        </div>
                      </li>
                      <li class="media my-4">
                        <img class="rounded-circle mr-2" src="assets/img/dd.jpg" alt="Generic">
                        <div class="media-body">
                          <h5 class="mt-0 mb-1">Dimas Adi Nugroho</h5>
                          <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus oringilla. Donec lacinia congue felis in faucibus.</p>
                        </div>
                      </li>
                      <li class="media">
                      <img alt="image" src="assets/img/adit1.png" class="rounded-circle mr-1">
                        <div class="media-body">
                          <h5 class="mt-0 mb-1">Indra Noor Rohman</h5>
                          <p class="mb-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus oringilla. Donec lacinia congue felis in faucibus.</p>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                </div>
                  </div>
                  <div class="card-body">
                    <h5> </h5>
                  </div>
                </div>  
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>
    
        <?php $this->load->view('include/footer.php')?>

</div>
</div>
    </div>
  </div>

 
<script src="<?= base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url()?>assets/js/stisla.js"></script>

<!-- Template JS File -->
  <script src="<?= base_url()?>node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url()?>node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url()?>node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url()?>assets/js/scripts.js"></script>
  <script src="<?= base_url()?>assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url()?>assets/js/page/modules-datatables.js"></script>
  <script type="text/javascript">
    var table;
    $(document).ready(function() {
 
        //datatables
        table = $('#table').DataTable({ 
 
            "processing": true, 
            "serverSide": true,  
            "order": [], 
            "ajax": {
                "url": "<?= base_url()?>Kecamatan/datakecamatan",
                "type": "POST"
            },
 
             
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
 
        });
 
    });
 
</script>
</body>
</html>
</body>
</html>


