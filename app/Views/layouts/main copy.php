<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | <?= $title ?></title>
  <link rel="icon" type="image/x-icon" href="images/logo-unpra.jpeg">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="template/all.min.css">
  <link rel="stylesheet" href="template/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="template/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="template/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="template/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?= $this->include("partials/header") ?>

    <?= $this->include("partials/nav") ?>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $title ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Admin</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <?= $this->renderSection("content") ?>

          </div>
        </div>
      </div>
    </div>
    <?= $this->include("partials/footer") ?>
  </div>

  <script src="template/jquery.min.js"></script>
  <script src="template/bootstrap.bundle.min.js"></script>
  <script src="template/jquery.dataTables.min.js"></script>
  <script src="template/dataTables.bootstrap4.min.js"></script>
  <script src="template/dataTables.responsive.min.js"></script>
  <script src="template/responsive.bootstrap4.min.js"></script>
  <script src="template/dataTables.buttons.min.js"></script>
  <script src="template/buttons.bootstrap4.min.js"></script>
  <script src="template/jszip.min.js"></script>
  <script src="template/pdfmake.min.js"></script>
  <script src="template/vfs_fonts.js"></script>
  <script src="template/buttons.html5.min.js"></script>
  <script src="template/buttons.print.min.js"></script>
  <script src="template/buttons.colVis.min.js"></script>
  <script src="template/adminlte.min.js"></script>
  <script src="template/demo.js"></script>
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>