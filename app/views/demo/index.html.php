<?php

$this->title('MongoDB Aggregation Demo');
$this->styles('<link href="/css/bootstrap.min.css" rel="stylesheet">');
$this->styles('<link href="/css/bootstrap-responsive.min.css" rel="stylesheet">');
$this->styles('<link href="/css/theme.css" rel="stylesheet">');
$this->scripts('<script type="text/javascript" src="/js/jquery.min.js"></script>');
$this->scripts('<script type="text/javascript" src="/js/d3.v2.min.js"></script>');

?>

<div class="container-fluid">
    <div class="span12">
        <h1>EUR/GDP Exchange Rates</h1>
        <p><button id="button" class="darkblue active" onclick="toggle()">Pause</button></p>
        <div id="chart"></div>
    </div>
</div>

<script type="text/javascript" src="/js/site.js"></script>
