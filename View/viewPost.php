<?php $this->title = strip_tags($post['title']); ?>

    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 articleBlog">
            <div>
                <h2><?= strip_tags($post['title']); ?></h2>
                <p class="articleContent">
                    <?= $post['content']; ?>
                </p>
                <h5> Le <em><?= $post['publication_date_fr']; ?></em>  Par <strong><?= strip_tags($post['author']); ?></strong></h5>
            </div>
        </div>
        <div class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10  listeCom">
            <?php
            foreach($comments as $com): ?>
            <div class="comment">
                <div>
                    <h3><?= strip_tags($com['author']); ?></h3>
                    <h5> Le <em><?= $com['comment_date_fr']; ?></em></h5>
                    <p>
                        <?= nl2br(strip_tags($com['comment'])); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
 <?php endforeach;?>