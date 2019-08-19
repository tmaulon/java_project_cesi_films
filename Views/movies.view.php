<header style="padding: 20px 0;display: flex;justify-content: space-between;align-items: center;">
    <img src="https://upload.wikimedia.org/wikipedia/commons/0/08/Netflix_2015_logo.svg" alt="Logo Movies" height="50px" style="margin: 20px">
    <h1>
        Movies
        <small class="text-muted"> List</small>
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
                <th scope="col">
                    <a href="/movies/create" title="Ajouter un film">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($movies as $key => $value):?>
            <tr scope="row">
                <th>
                     <?=$value->getId()?>
                </th>
                <td>
                    <a href="/movies/<?=$value->getId()?>" title="Voir la fiche du film <?=$value->getTitle()?>">
                        <?=$value->getTitle()?>
                    </a>
                </td>
                <td>
                    <a href="/movies/<?=$value->getId()?>" title="Voir la fiche du film <?=$value->getTitleFr()?>">
                        <?=$value->getTitleFr()?>
                    </a>
                </td>
                <td>
                    <?=$value->getYear()?>
                </td>
                <td>
                    <?=$value->getDirectorId()?>
                </td>
                <td>
                    <?=$value->getScore()?>
                </td>
                <td>
                    <a href="/movies/update/<?=$value->getId()?>" title="Modifier la fiche du film <?=$value->getTitleFr()?>">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

