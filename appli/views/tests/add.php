<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"/>
        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1>
                    Créer un test
                    <a href="<?php echo base_url().'tests/'; ?>" class="btn btn-default pull-right" role="button">Retour aux tests</a>
                </h1>
                <hr/>
            </div>
            <?php if(isset($success)){ ?>
                <div class="row">
                    <div class="alert alert-success" role="alert">Test bien créé! :)</div>
                </div>
            <?php } ?>

            <?php echo form_open_multipart('tests/add'); ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group col-md-12">
                          <label for="titre">Titre du test</label>
                          <input type="text" name="titre" class="form-control" id="titre" placeholder="Titre du test...">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group col-md-12">
                          <label for="Categorie">Categorie</label>
                          <select name="categorie"  class="form-control">
                              <option value="Front office">Front Office</option>
                              <option value="Back office">Back Office</option>
                          </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group col-md-12">
                          <label for="explication">Descriptif du test</label>
                          <textarea name="explication" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="help-block">
                            <span class="small">Vous pouvez ajouter plusieurs photos, une par une.</span>
                        </div>
                        <input class="custom-file-input" name="images[]" type="file" multiple>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group col-md-12 pull-right">
                            <button type="submit" class="btn btn-default pull-right">Créer</button>
                        </div>
                    </div>
                </div>
            <?php echo  form_close(); ?>
        </div>
    </body>
</html>