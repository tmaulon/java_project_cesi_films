<?php
if(isset($_POST['movieUpdateFormSubmit']))
{
    /*var_dump($_POST['movieUpdateFormSubmit']);*/
          $title = $_POST["title"];
          $title_fr = $_POST["title_fr"];
          $score = $_POST["score"];
          $year = $_POST["year"];
          $filmDirectorId = $_POST["filmDirectorId"];
          if ( !empty($title) ) {
              $movie->setTitle($title);
          }
          if ( !empty($title_fr) ) {
              $movie->setTitleFr($title_fr);
          }
          if ( !empty($score) ) {
              $movie->setScore($score);
          }
          if ( !empty($year) ) {
              $movie->setYear($year);
          }
          if ( !empty($filmDirectorId) ) {
              $movie->setDirectorId($filmDirectorId);
          }
}
?>
<header style="padding: 20px 0;display: flex;justify-content: space-between;align-items: center;">
    <img src="https://upload.wikimedia.org/wikipedia/commons/0/08/Netflix_2015_logo.svg" alt="Logo Movies" height="50px" style="margin: 20px">
    <h1>
        <small class="text-muted"> Editer le film : </small><?=$movie[0]->getTitle(); ?>
    </h1>
</header>
<section>
    <form action="/movies/update/<?=$movie[0]->getId();?>" method="post" id="movieUpdateForm">
        <fieldset>
            <div class="row">
                <div class="form-group col-sm-5">
                    <label for="title">Titre original du film</label>
                    <input required type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp" placeholder="<?=$movie[0]->getTitle(); ?>">
                    <small id="titleHelp" class="form-text text-muted">Veuillez renseigner le titre original du film.</small>
                </div>
                <div class="form-group col-sm-5">
                    <label for="title_fr">Titre français du film</label>
                    <input required type="text" class="form-control" name="title_fr" id="title_fr" aria-describedby="title_frHelp" placeholder="<?=$movie[0]->getTitleFr(); ?>">
                    <small id="title_frHelp" class="form-text text-muted">Veuillez renseigner le titre français du film.</small>
                </div>
                <div class="form-group col-sm-2">
                    <label for="score">Score</label>
                    <input required type="number" min="0" max="10" value="<?=$movie[0]->getScore(); ?>" step="0.1" class="form-control" name="score" id="score" aria-describedby="scoreHelp">
                    <small id="scoreHelp" class="form-text text-muted">Veuillez renseigner le score au box-office.</small>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="year">Année de production du film</label>
                    <input required type="number" class="form-control" name="year" id="year" aria-describedby="yearHelp" placeholder="<?=$movie[0]->getYear(); ?>">
                    <small id="yearHelp" class="form-text text-muted">Veuillez renseigner l'année de production du film.</small>
                </div>
                <div class="form-group col-sm-6">
                    <label for="filmDirectorId">Réalisateur</label>
                    <input required type="text" class="form-control" name="filmDirectorId" id="filmDirectorId" aria-describedby="filmDirectorIdHelp" placeholder="<?=$movie[0]->getDirectorId(); ?>">
                    <small id="filmDirectorIdHelp" class="form-text text-muted">Veuillez renseigner le réalisateur du film.</small>
                </div>
            </div>
            <button type="submit" name="movieUpdateFormSubmit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>
</section>
<!--<script>
    document.getElementById('movieUpdateForm').addEventListener('submit', (e)=> e.preventDefault());
</script>-->

