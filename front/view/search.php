<div class="row">

    <div class="col-md-3">
        <form method="post" action="" class="control-form" id="form-create-review">
            <div class="form-group">
                <label for="search-continent" class="control-label">
                    Continent
                </label>
                <select class="form-control" id="search-continent" name="search-continent" onchange="loadCountries($(this, 'option:selected').val())">
                    <option value="">&mdash;&nbsp;&nbsp;Select a continent&nbsp;&nbsp;&mdash;</option>
                <?php foreach ($data['search']['continent'] as $continentId => $continentName) : ?>
                    <option value="<?php echo $continentId; ?>">
                        <?php echo $continentName; ?>
                    </option>
                <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group" id="countries-div">
                <label for="search-country" class="control-label">
                    Country
                </label>
                <select class="form-control" id="search-country" name="search-country" disabled="disabled">
                    <option value="">
                        &mdash;&nbsp;&nbsp;Select a country&nbsp;&nbsp;&mdash;
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="search-town" class="control-label">
                    Town
                </label>
                <select class="form-control" id="search-town" name="search-town" disabled="disabled">
                    <option value="">
                        &mdash;&nbsp;&nbsp;Select a town&nbsp;&nbsp;&mdash;
                    </option>
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
    <?php foreach ($data['emplacements'] as $emplacement) : ?>
        <div class="row">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <h2><?php echo $emplacement['title']; ?></h2>
                        <?php if (! empty($emplacement['address'])) : ?>
                        <address class="text-muted">
                            <?php echo $emplacement['address']; ?>
                        </address>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="text-warning">
                        <?php for ($i = 1; $i <= 5; $i ++) : ?>
                            <?php if ($i <= $emplacement['rate']) : ?>
                            <span class="glyphicon glyphicon-star"></span>
                            <?php else : ?>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <?php endif; ?>
                        <?php endfor; ?>
                        </div>
                        <div class="pull-right">
                            <span class="label label-default">
                                <?php if ($emplacement['reviews'] === 0) : ?>
                                no review yet
                                <?php elseif ($emplacement['reviews'] === 1) : ?>
                                1 review
                                <?php else : ?>
                                <?php echo $emplacement['reviews']; ?> reviews
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <?php if (! empty($emplacement['description'])) : ?>
                    <p class="small">
                        <?php echo $emplacement['description']; ?>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <hr>
    <?php endforeach; ?>
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