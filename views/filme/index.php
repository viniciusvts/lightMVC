<h1>Filme index</h1>
<?php
foreach ($_REQUEST['filmes'] as $filme) {
    foreach ($filme as $key => $value) {
        echo '<p>' . $key . ': ' . $value . '</p>';
    }
}