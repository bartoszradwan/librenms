<?php
/*
   * LibreNMS module to Graph Transcoder Resources in a Cisco Voice Router
   *
   * Copyright (c) 2015 Aaron Daniels <aaron@daniels.id.au>
   *
   * This program is free software: you can redistribute it and/or modify it
   * under the terms of the GNU General Public License as published by the
   * Free Software Foundation, either version 3 of the License, or (at your
   * option) any later version.  Please see LICENSE.txt at the top level of
   * the source code distribution for details.
   */

if ($device['os_group'] == "cisco") {
    // Total
    $total = snmpwalk_cache_oid_num($device, "1.3.6.1.4.1.9.9.86.1.7.1.0", null);
    $total = $total['1.3.6.1.4.1.9.9.86.1.7.1.0'][''];

    if (isset($total) && ($total != "") && ($total != 0)) {
        // Available
        $available = snmpwalk_cache_oid_num($device, "1.3.6.1.4.1.9.9.86.1.7.2.0", null);
        $available = $available['1.3.6.1.4.1.9.9.86.1.7.2.0'][''];

        // Active
        $active = $total - $available;

        $rrd_def = array(
            'DS:total:GAUGE:600:0:U',
            'DS:active:GAUGE:600:0:U'
        );

        $fields = array(
            'total'  => $total,
            'active' => $active,
        );

        $tags = compact('rrd_def');
        dat_update($device, 'cisco-iosxcode', $tags, $fields);

        $graphs['cisco-iosxcode'] = true;
        echo (" Cisco IOS Transcoder ");
    }
    unset($rrd_def, $total, $active, $available, $fields, $tags);
}
