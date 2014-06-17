<?php if(sizeof($data['emplacements']) > 0): ?>		
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
		<?php else: ?>
			<div class="alert alert-warning">
				No places
			</div>
		<?php endif; ?>