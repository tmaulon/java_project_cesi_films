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
                <th scope="col">Titre du film</th>
                <th scope="col">Année de production</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($movies as $key => $value): ?>
            <tr scope="row">
                <th>
                     <?=$value['id']?>
                </th>
                <td>
                    <a href="/movies/<?=$value['id']?>" title="Voir la fiche du film <?=$value['title']?>">
                        <?=$value['title']?>
                    </a>
                </td>
                <td>
                    <?=$value['year']?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

