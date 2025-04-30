<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> ADMIN <small>DASBOARD</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Layout</a></li>
                        <li class="breadcrumb-item active">Top Navigation</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class='card'>
                        <div class="card-header">
                            <h3 class='card-title text-center'> Ajouter un Evaluateur </h3>
                        </div>
                        <div class='card-body'>
                            <form action="<?= base_url() ?>index.php/admin/save_assessor" method='POST'>
                                <div class="row my-2">
                                    <div class="col-4 form-group">
                                        <label> Email : </label>
                                        <input type="text" class="form-control" name="email" required>
                                    </div>

                                    <div class="col-8 form-group">
                                        <label for="inputName">Nom et Prénom(s):</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>

                                    <div class="col-4 form-group">
                                        <label for="inputName">Fonction :</label>
                                        <input type="text" class="form-control" name="job" required>
                                    </div>

                                </div>

                                <div class="row my-2">
                                    <div class="col-4 mx-auto">
                                        <button type="submit"
                                            class="btn btn-outline-primary btn-block btn-flat font-weight-bold"> <i
                                                class='fas fa-upload'></i> ENREGISTER </button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>


</div>