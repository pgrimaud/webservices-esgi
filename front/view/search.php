<div class="row">

    <div class="col-md-3">
        <form method="post" action="" class="control-form" id="form-create-review">
            <div class="form-group">
                <label for="search-continent" class="control-label">
                    Continent
                </label>
                <select class="form-control" id="search-continent" name="search-continent">
                    <option value=""></option>
                </select>
            </div>
            <div class="form-group">
                <label for="search-country" class="control-label">
                    Country
                </label>
                <select class="form-control" id="search-country" name="search-country">
                    <option value=""></option>
                </select>
            </div>
            <div class="form-group">
                <label for="search-town" class="control-label">
                    Town
                </label>
                <select class="form-control" id="search-town" name="search-town">
                    <option value=""></option>
                </select>
            </div>
        </form>
        <div class="span10" style="margin-top: 32px;">
            <a class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-add-emplacement">
                Or add an emplacement
            </a>
        </div>
    </div>
    
    <div class="col-md-7 col-md-offset-2">
        <div class="row">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <h2>Abidjan Airport</h2>
                        <address class="text-muted">
                            123 Avenue de l'Indépendance
                        </address>
                    </div>
                    <div class="row">
                        <div class="text-warning">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </div>
                        <div class="pull-right">
                            <span class="label label-default">
                                2 reviews
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <p class="small">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non lorem arcu. Nullam vehicula viverra cursus. Aliquam non laoreet lectus. Suspendisse in euismod diam, vitae sollicitudin neque. Nullam molestie mi eu ante fringilla, in dapibus purus eleifend. Morbi malesuada porta nisl. Proin sed urna eu libero varius blandit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin sit amet augue at metus rutrum semper. Sed a faucibus libero.
                    </p>
                </div>
            </div>
        </div>
        
        <hr>
        
        <div class="row">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <h2>Abidjan Airport</h2>
                        <address class="text-muted">
                            123 Avenue de l'Indépendance
                        </address>
                    </div>
                    <div class="row">
                        <div class="text-warning">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </div>
                        <div class="pull-right">
                            <span class="label label-default">
                                2 reviews
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <p class="small">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non lorem arcu. Nullam vehicula viverra cursus. Aliquam non laoreet lectus. Suspendisse in euismod diam, vitae sollicitudin neque. Nullam molestie mi eu ante fringilla, in dapibus purus eleifend. Morbi malesuada porta nisl. Proin sed urna eu libero varius blandit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin sit amet augue at metus rutrum semper. Sed a faucibus libero.
                    </p>
                </div>
            </div>
        </div>
        
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="modal-add-emplacement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModalLabel">Or add an emplacement</h3>
      </div>
      <div class="modal-body">
            <form method="post" action="" class="control-form" id="form-create-place">
                <div class="form-group">
                    <label for="continent" class="control-label">
                        Continent
                    </label>
                    <select class="form-control" id="continent" name="continent">
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="country" class="control-label">
                        Country
                    </label>
                    <select class="form-control" id="country" name="country">
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="town" class="control-label">
                        Town
                    </label>
                    <select class="form-control" id="town" name="town">
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description" class="control-label">
                        Description of the place
                    </label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" id="form-create-place-submit">Add the place</button>
      </div>
    </div>
  </div>
</div>