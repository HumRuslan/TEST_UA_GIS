<div class="row">
    <div class="col-md-6 mx-auto ">
    <form action="" method="POST">
        <div class="card-header">
            <h4 class="card-title text-center">ДОБАВИТЬ ПОСТ</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="comment">ПОСТ</label>
                <textarea name="post" id="post" rows="5" class="form-control"><?=$model->post?></textarea>
            </div>
        </div>
        <div>
            <button type="submit" class="btn w-100 btn-secondary">ДОБАВИТЬ ПОСТ</button>
        </div>
        </form>
    </div>
</div>