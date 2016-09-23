<?php

if (!$os) {
    if (strstr($sysObjectId, '.1.3.6.1.4.1.259.6.10.94') || strstr($sysObjectId, '.1.3.6.1.4.1.259.10.1.22.101')) {
        $os = 'edge-core';
    }
}
