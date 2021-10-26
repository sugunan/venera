<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('common/html_head') ?>

    <!-- fonts -->
    <link rel="stylesheet" href="<?php echo base_url("/theme/oct/fonts/md-fonts/css/materialdesignicons.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("/theme/oct/fonts/font-awesome-4.7.0/css/font-awesome.min.css"); ?>">
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo base_url("/theme/oct/libs/animate.css/animate.min.css"); ?>">

    <!-- data table -->
    <link rel="stylesheet" href="<?php echo base_url("/theme/oct/libs/tables-datatables/dist/datatables.min.css"); ?>">
     <!-- jquery-loading -->
     <link rel="stylesheet" href="<?php echo base_url("/theme/oct/libs/jquery-loading/dist/jquery.loading.min.css"); ?>">
    <!-- octadmin main style -->
    <link id="pageStyle" rel="stylesheet" href="<?php echo base_url("/theme/oct/css/style.css"); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body class="app sidebar-fixed aside-menu-off-canvas aside-menu-hidden header-fixed">
<?= $this->include('common/header') ?>
    <!-- end header -->

    <div class="app-body">
        <div class="sidebar" id="sidebar">
            <?= $this->include('common/left_bar') ?>
        </div>
        <!-- end sidebar -->

        <main class="main">
            <!-- Breadcrumb -->
            <?= $this->include('common/breadcrumb') ?>         


            <div class="container-fluid">

                
                <div class="animated fadeIn">

                    <div class="clearfix">
                        <div class="float-left">
                            <h3 class="text-theme">Ledger List</h3>
                            <p>A ledger is a collection of accounts in which account transactions are recorded.</p>
                        </div>
                        <!-- float-left -->
                        <div class="float-right">
                            <a href="<?php echo base_url("/ledger/add_edit/0"); ?>" class="btn btn-theme btn-round">
                                <i class="mdi mdi-plus"></i> ADD NEW</a>
                            <a href="" class="btn btn-theme btn-round">
                                <i class="mdi mdi-refresh"></i> REFRESH</a>
                        </div>
                    </div>
                    <!-- end clearfix -->
                    
                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="card card-accent-theme">
                                <div class="card-body">
                                    <table id="exampleTableSearch" class="display table table-hover table-striped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Group</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Group</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                        if(isset($list_all) && is_array($list_all))
                                        {
                                            foreach($list_all as $val){
                                        ?>
                                            <tr>
                                                <td><?php echo $val['ledger']; ?></td>
                                                <td><?php echo $val['code']; ?></td>
                                                <td><?php echo $val['acc_group']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url("/ledger/add_edit/" . $val['id']); ?>" class="badge badge-pill badge-primary"><i class="mdi mdi-pencil"></i> EDIT</a>
                                                    <span data-url="<?php echo base_url("/ledger/delete/" . $val['id']); ?>" class="pointer alert-confirm badge badge-pill badge-danger"><i class="mdi mdi-close"></i> DELETE</span>
                                                </td>
                                            </tr>
                                        <?php 
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->



                    </div>
                    <!-- end row -->

                </div>
                <!-- end animated fadeIn -->
            </div>
            <!-- end container-fluid -->
        </main>
        <!-- end main -->

        <?= $this->include('common/aside') ?>
        <!-- end aside -->

    </div>
    <!-- end app-body -->
    
    <?= $this->include('common/footer') ?>

    <?= $this->include('common/html_footer') ?>

    <!--datatables -->
    <script src="<?php echo base_url("/theme/oct/libs/tables-datatables/dist/datatables.min.js"); ?>"></script>

    <!-- datatable examples -->
    <script src="<?php echo base_url("/theme/oct/js/table-datatable-example.js"); ?>"></script>

    <!--Alertify js -->
    <script src="<?php echo base_url("/theme/oct/libs/Alertify/js/alertify.js"); ?>"></script>

    <script>
        $(function () {
            $('.alert-confirm').click(function () {
                var delUrl = $( this ).attr( "data-url" );
                alertify.confirm("This action can't be reversed. Are you sure to delete this entity and associated records?", function () {
                    alertify.logPosition("top right");
                    alertify.success("Deleting the record");
                    window.location.href = delUrl;
                }, function () {
                    alertify.logPosition("top right");
                    alertify.error("Canceled the delete operation");
                });
            });
        });
    </script>
</body>

</html>