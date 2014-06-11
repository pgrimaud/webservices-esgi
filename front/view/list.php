<div class="row">

    <div class="col-md-4">
        <h1 class="text-primary"><?php echo $data['emplacement']['title']; ?></h1>
        <address class="text-muted">
            <?php if (! empty($data['emplacement']['address'])) : ?>
            <strong><?php $data['emplacement']['address']; ?></strong>
            <?php endif; ?>
            <p>
                <?php echo $data['emplacement']['town']; ?>
                &mdash;
                <?php echo $data['emplacement']['country']; ?>
            </p>
        </address>
        <div class="col-md-12">
            <div class="pull-left text-warning" style="font-size: 2em;">
            <?php for ($i = 1; $i <= 5; $i ++) : ?>
                <?php if ($i <= $data['emplacement']['rate']) : ?>
                <span class="glyphicon glyphicon-star"></span>
                <?php else : ?>
                <span class="glyphicon glyphicon-star-empty"></span>
                <?php endif; ?>
            <?php endfor; ?>
            </div>
            <div class="pull-right">
                <span class="label label-default">
                    <?php if ($data['emplacement']['reviews'] === 0) : ?>
                    no review yet
                    <?php elseif ($data['emplacement']['reviews'] === 1) : ?>
                    1 review
                    <?php else : ?>
                    <?php echo $data['emplacement']['reviews']; ?> reviews
                    <?php endif; ?>
                </span>
            </div>
        </div>
        <div class="col-md-12" style="margin-top: 32px;">
            <div class="thumbnail">
                <div id="map-canvas" data-longitude="<?php echo $data['emplacement']['longitude']; ?>" data-latitude="<?php echo $data['emplacement']['latitude']; ?>"></div>
                <a class="btn btn-block btn-success" data-toggle="modal" data-target="#modal-write-review">
                    Share your review !
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-7 col-md-offset-1">
    <?php foreach ($data['reviews'] as $review) : ?>
        <div class="row">
            <h2>Review from de <?php echo $review['from']; ?></h2>
            <div class="text-warning">
            <?php for ($i = 1; $i <= 5; $i ++) : ?>
                <?php if ($i <= $review['rate']) : ?>
                <span class="glyphicon glyphicon-star"></span>
                <?php else : ?>
                <span class="glyphicon glyphicon-star-empty"></span>
                <?php endif; ?>
            <?php endfor; ?>
            </div>
            <div class="col-md-10" style="margin-top: 16px;">
                <?php if (! empty($review['content'])) : ?>
                <p class="small">
                    <?php echo $review['content']; ?>
                </p>
                <?php endif; ?>
            </div>
        </div>
        <hr>
    <?php endforeach; ?>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="modal-write-review" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModalLabel">Share your review !</h3>
      </div>
      <div class="modal-body">
            <form method="post" action="" class="control-form" id="form-create-review">
                <input type="hidden" name="place_id" id="place_id" value="1">
                <div class="form-group">
                    <label for="name" class="control-label">
                        Your name
                    </label>
                    <textarea class="form-control" id="name" name="name"></textarea>
                </div>
                <div class="form-group">
                    <label for="note" class="control-label">
                        Your note
                    </label>
                    <select class="form-control" id="note" name="note">
                        <option value=""></option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="review" class="control-label">
                        Your review
                    </label>
                    <textarea class="form-control" id="review" name="review"></textarea>
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" id="form-create-review-submit">Share my review</button>
      </div>
    </div>
  </div>
</div>