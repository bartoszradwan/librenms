<?php

$_sysObjectId = trim(snmp_get($device, "sysObjectID.0", "-OQvn", "SNMPv2-MIB"), '"');

if (strstr($_sysObjectId, '.1.3.6.1.4.1.259.10.1.22.101')) {
    #ES3528MV2
    $version = trim(snmp_get($device, "swOpCodeVer.1", "-OQv", "ES3528MV2-MIB"), '"');
    $hardware = "Edge-Core " . trim(snmp_get($device, "swProdName.0", "-OQv", "ES3528MV2-MIB"), '"');
    $hostname = trim(snmp_get($device, "sysName.0", "-OQv", "SNMPv2-MIB"), '"');
} elseif (strstr($_sysObjectId, '.1.3.6.1.4.1.259.6.10.94')) {
    #ES3528M
    $version = trim(snmp_get($device, "swOpCodeVer.1", "-OQv", "ES3528MO-MIB"), '"');
    $hardware = "Edge-Core " . trim(snmp_get($device, "swProdName.0", "-OQv", "ES3528MO-MIB"), '"');
    $hostname = trim(snmp_get($device, "sysName.0", "-OQv", "SNMPv2-MIB"), '"');
}
