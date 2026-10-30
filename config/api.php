<?php

return [
    // список допустимых токенов из .env
    'tokens' => array_values(array_filter(array_map(
        'trim',
        explode(',', env('API_TOKENS', ''))
    ))),
];