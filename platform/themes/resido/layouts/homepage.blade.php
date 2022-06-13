<?php

session_start();

if (empty($_SESSION['count'])) {
    $_SESSION['count'] = 1;
    ?>
@include(Theme::getThemeNamespace('layouts.splash'))
<?php
} else {
    $_SESSION['count']++;

?>
{!! Theme::partial('header') !!}

<div id="app">
    <div id="ismain-homes">
        {!! Theme::content() !!}
    </div>
</div>

{!! Theme::partial('footer') !!}

<?php }?>


