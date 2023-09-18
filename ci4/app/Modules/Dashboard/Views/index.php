<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            Module: <strong>Dashboard</strong>
            <hr />
            <ul>
                <?php foreach ($dashboards ?? [] as $key => $dashboard) : ?>
                    <li><?= $dashboard->id ?>: <?= $dashboard->title ?? '{title}' ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>