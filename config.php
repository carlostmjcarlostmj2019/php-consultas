<?php

// config.php
foreach (glob(__DIR__."/classes/*.php") as $filename) {
    require_once $filename;
}

