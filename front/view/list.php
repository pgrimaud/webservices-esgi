<div class="row">

    <div class="col-md-4">
        <h1 class="text-primary">Abidjan Airport</h1>
        <address class="text-muted">
            <strong>123 Avenue de l'Indépendance</strong>
            <p>
                Abidjan&mdash;Côte d'Ivoire
            </p>
        </address>
        <div class="col-md-12">
            <div class="pull-left text-warning" style="font-size: 2em;">
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
        <div class="col-md-12" style="margin-top: 32px;">
            <div class="thumbnail">
                <div id="map-canvas"></div>
                <a class="btn btn-block btn-success" data-toggle="modal" data-target="#modal-write-review">
                    Share your review !
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-7 col-md-offset-1">
        <div class="row">
            <h2>Review from de Michel Dupont</h2>
            <div class="text-warning">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
            </div>
            <div class="col-md-10" style="margin-top: 16px;">
                <p class="small">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non lorem arcu. Nullam vehicula viverra cursus. Aliquam non laoreet lectus. Suspendisse in euismod diam, vitae sollicitudin neque. Nullam molestie mi eu ante fringilla, in dapibus purus eleifend. Morbi malesuada porta nisl. Proin sed urna eu libero varius blandit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin sit amet augue at metus rutrum semper. Sed a faucibus libero.
                </p>
                <p class="small">
                    Maecenas eu elit vitae tortor pretium volutpat in eget nibh. Cras euismod odio augue, eu sollicitudin magna posuere et. Sed at mi adipiscing, dictum leo vel, rutrum velit. Nam dignissim dictum neque. Aliquam bibendum rhoncus aliquet. Morbi fringilla sit amet massa eget porta. Morbi egestas ultricies orci eu sagittis. 
                </p>
            </div>
        </div>
        
        <hr>
        
        <div class="row">
            <h2>Review from Michel Dupont</h2>
            <div class="text-warning">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
            </div>
            <div class="col-md-10" style="margin-top: 16px;">
                <p class="small">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non lorem arcu. Nullam vehicula viverra cursus. Aliquam non laoreet lectus. Suspendisse in euismod diam, vitae sollicitudin neque. Nullam molestie mi eu ante fringilla, in dapibus purus eleifend. Morbi malesuada porta nisl. Proin sed urna eu libero varius blandit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin sit amet augue at metus rutrum semper. Sed a faucibus libero.
                </p>
                <p class="small">
                    Maecenas eu elit vitae tortor pretium volutpat in eget nibh. Cras euismod odio augue, eu sollicitudin magna posuere et. Sed at mi adipiscing, dictum leo vel, rutrum velit. Nam dignissim dictum neque. Aliquam bibendum rhoncus aliquet. Morbi fringilla sit amet massa eget porta. Morbi egestas ultricies orci eu sagittis. 
                </p>
            </div>
        </div>
        
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