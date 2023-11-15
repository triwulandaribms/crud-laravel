<?php

return[
'snappy' => [
    'pdf' => [
        'enabled' => true,
        'binary' => env('WKHTMLTOPDF_BINARY', '/usr/local/bin/wkhtmltopdf'), 
        'options' => [],
    ],
],
];
