<?php
/**
 * Author: Pascal.benzonana@cpnv.ch
 * Project  : snowUser.php
 * Created  : 04.03.2019 - 22:13
 *
 * Last update :    [18.02.2019 pba]
 *                  [modele.php splitted]
 * Git source  :    [link]
 */

$title="Snows";

ob_start();
$rows=0; // Column count
?>

<article>
    <header>
        <h2> Nos snows</h2>
        <div class="yox-view">

            <?php foreach ($snows as $row => $snow) : ?>
                <?php $row++; ?>
                <?php if ($row%4) : // tests to have 4 items / line ?>
                    <div class="row-fluid">
                    <ul class="thumbnails">
                    <?php $row=0;?>
                <?php endif ?>

                <li class="span3">
                    <div class="thumbnail">
                    <a href="view/content/images/<?= $snow['code']; ?>.jpg" target="blank"><img src="<?= $snow['photo']; ?>" alt="<?= $snow['code']; ?>" ></a>
                        <div class="caption">
                            <h3><a href="index.php?action=snow&code=<?= $snow['code']; ?>"><?= $snow['code']; ?></a></h3>
                            <p><strong>Marque : </strong><?= $snow['brand']; ?></p>
                            <p><strong>Modèle : </strong><?= $snow['model']; ?></p>
                            <p><strong>Longueur : </strong><?= $snow['snowLength']; ?> cm</p>
                            <p><strong>Prix :</strong> CHF <?= $snow['dailyPrice']; ?>.- / jour</p>
                            <p><strong>Disponibilité : </strong><?= $snow['qtyAvailable']; ?></p>
                            <?php if ($snow['active']) :?>
                                <p><a href="index.php?action=snowLeasingRequest&code=<?= $snow['code']; ?>" class="btn btn-primary">Louer ce snow</a></p>
                            <?php else : ?>
                                <p><a class="btn btn-danger" disabled="disabled">Plus en location</a></p>
                            <?php endif ?>
                        </div>
                    </div>
                </li>

                <?php if ($row%4) :?>
                    </ul>
                    </div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    </header>
</article>
<hr/>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>