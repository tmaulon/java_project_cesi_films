<header style="padding: 20px 0;display: flex;justify-content: space-between;align-items: center;">
    <img src="https://upload.wikimedia.org/wikipedia/commons/0/08/Netflix_2015_logo.svg" alt="Logo Movies" height="50px" style="margin: 20px">
    <h1>
        <small class="text-muted"> Fiche du film : </small><?=$movie[0]->getTitle(); ?>
    </h1>
</header>
<section class="movies_section">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titre original du film</th>
            <th scope="col">Titre français du film</th>
            <th scope="col">Année de production</th>
            <th scope="col">Directeur</th>
            <th scope="col">Score</th>
        </tr>
        </thead>
        <tbody>
            <tr scope="row">
                <th>
                    <?=$movie[0]->getId()?>
                </th>
                <td>
                    <a href="/movies/<?=$movie[0]->getId()?>" title="Voir la fiche du film <?=$movie[0]->getTitle()?>">
                        <?=$movie[0]->getTitle()?>
                    </a>
                </td>
                <td>
                    <a href="/movies/<?=$movie[0]->getId()?>" title="Voir la fiche du film <?=$movie[0]->getTitleFr()?>">
                        <?=$movie[0]->getTitleFr()?>
                    </a>
                </td>
                <td>
                    <?=$movie[0]->getYear()?>
                </td>
                <td>
                    <?=$movie[0]->getDirectorId()?>
                </td>
                <td>
                    <?=$movie[0]->getScore()?>
                </td>
                <td>
                    <a href="/movies/update/<?=$movie[0]->getId()?>" title="Modifier la fiche du film <?=$movie[0]->getTitleFr()?>">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</section>


