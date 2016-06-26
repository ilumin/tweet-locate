<?php

$app->get('/', 'PageAction:main');
$app->get('/search', 'SearchAction:search');
