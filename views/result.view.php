<style>
    <?php include 'views/css/style.css' ?>
</style>
<?php $n = 0; ?>
<body>
    <div align="right" style="font-size: 1.4em; padding: 20px;">
        <?php if (isset($_SESSION['loginUser']) == false) : ?>
            <?php header('Location: /login'); ?>
        <?php elseif (isset($_SESSION['loginUser']) == true) : ?>
            <a href="/" style="padding-right: 25px;">HOME</a>
            <a href="logout" style="padding-right: 25px;">LOGOUT</a>
        <?php endif; ?>
    </div>

    <h1 style="font-size: 2.6em;">Result Page</h1>

    <div id="searchName">
        <table class="tableResult">
            <tr>
                <th class="a">Name</th>
                <th class="a">Email</th>
            </tr>
            <?php foreach ($row as $date) : ?>
                <tr>
                    <td><?= $date->name; ?></td>
                    <td><?= $date->email; ?></td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>

    <div id="searchType">
        <ul id="result">
            <li><span class="caret">Result</span>
                <ul class="nested">
                <?php if ($frontEnd > 0) : ?>
                    <li><span class="caret">Front End Developer (<?= $frontEnd; ?>)</span>
                        <ul class="nested">
                            <?php if ($angular > 0) : ?>
                                <li><span class="caret">Angular (<?= $angular; ?>)</span>
                                    <ul class="nested">
                                        <?php if ($angularJs > 0) : ?>
                                            <li>AngularJS (<?= $angularJs; ?>)</li>
                                        <?php endif; if ($angular2 > 0) : ?>
                                            <li>Angular2 (<?= $angular2; ?>)</li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                            <?php endif; if ($react > 0) : ?>
                                <li><span class="caret">React (<?= $react; ?>)</span>
                                    <ul class="nested">
                                        <?php if ($reactNative > 0) : ?>
                                            <li>React Native (<?= $reactNative; ?>)</li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                            <?php endif; if ($vue > 0) : ?>
                                <li>Vue (<?= $vue; ?>)</li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; if ($backEnd > 0) : ?>
                    <li><span class="caret">Back End Developer (<?= $backEnd; ?>)</span>
                        <ul class="nested">
                            <?php if ($php > 0) : ?>
                                <li><span class="caret">Php (<?= $php; ?>)</span>
                                    <ul class="nested">
                                        <?php if ($symfony > 0) : ?>
                                            <li><span class="caret">Symfony (<?= $symfony; ?>)</span>
                                                <ul class="nested">
                                                    <?php if ($silex > 0) : ?>
                                                        <li>Silex (<?= $silex; ?>)</li>
                                                    <?php endif; ?>
                                                </ul>
                                            </li>
                                        <?php endif; if ($laravel > 0) : ?>
                                            <li><span class="caret">Laravel (<?= $laravel; ?>)</span>
                                                <ul class="nested">
                                                    <?php if ($lumen > 0) : ?>
                                                        <li>Lumen (<?= $lumen; ?>)</li>
                                                    <?php endif; ?>
                                                </ul>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                            <?php endif; if ($nodeJs > 0) : ?>
                                <li><span class="caret">NodeJs (<?= $nodeJs; ?>)</span>
                                    <ul class="nested">
                                        <?php if ($express > 0) : ?>
                                            <li>Express (<?= $express; ?>)</li>
                                        <?php endif; if ($nestJs > 0) : ?>
                                            <li>NestJs (<?= $nestJs; ?>)</li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                </ul>
            </li>
        </ul>
    </div>
</body>

<script>
    var toggler = document.getElementsByClassName("caret");
    var i;

    for (i = 0; i < toggler.length; i++) {
        toggler[i].addEventListener("click", function() {
            this.parentElement.querySelector(".nested").classList.toggle("active");
            this.classList.toggle("caret-down");
        });
    }
</script>