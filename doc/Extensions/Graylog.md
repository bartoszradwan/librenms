source: Extensions/Graylog.md
# Graylog integration

We have simple integration for Graylog, you will be able to view any logs from within LibreNMS that have been parsed by the syslog input from within
Graylog itself. This includes logs from devices which aren't in LibreNMS still, you can also see logs for a specific device under the logs section
for the device.

Graylog itself isn't included within LibreNMS, you will need to install this separately either on the same infrastructure as LibreNMS or as a totally
standalone appliance.

Config is simple, here's an example:

```php
$config['graylog']['server']   = 'http://127.0.0.1';
$config['graylog']['port']     = 12900;
$config['graylog']['username'] = 'admin';
$config['graylog']['password'] = 'admin';
$config['graylog']['version']  = '2.1';
```

> Since Graylog 2.1, the default API path is /api/

If you are running a version earlier than Graylog then please set `$config['graylog']['version']` to the version 
number of your Graylog install.

If you have altered the default uri for your Graylog setup then you can override the default of `/api/` using 
`$config['graylog']['base_uri'] = '/somepath/';`
