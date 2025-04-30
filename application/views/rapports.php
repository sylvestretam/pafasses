<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 fts title">ASSESSMENT</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">ASSESSMENT</a></li>
                        <li class="breadcrumb-item active">ASSESSOR</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- report section -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Prestataires</h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label></label>
                                <select class="form-control font-weight-bold" id="select-provider-rep"
                                    style="font-size:large">
                                    <option selected disabled>Choisissez un Prestataire </option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Recap Evaluation </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Activités</th>
                                        <th>Evaluateurs</th>
                                        <th>Evaluations terminés</th>
                                        <th>Rate</th>
                                    </tr>
                                </thead>
                                <tbody id="tab-recap-report">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-12 text-center pt-4">
                                    <form action="./?action=rapports_doc" target="_blank" method="post">
                                        <input type="text" name="provider_id" id="txt_provider" class="invisible">
                                        <button class="btn btn-default bg-teal">IMPRIMER LES RAPPORTS</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>