<?php
/*
 * This file is part of the Kudaping.
 *
 * (c) Chibuzo Ebubechi Miracle <miraclechibuzo@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
return [
    /**
     * The email address associated with your kuda business account
     */
    'emailAddress'=>env('KUDA_EMAIL_ADDRESS'),
    /**
     * api key generated from your kuda business count
     */
    'apiKey'=>env('KUDA_API_KEY'),
    /**
     * live or test
     */
    'environment'=>env('KUDA_ENVIRONMENT', 'live'),
    /**
     * prefix for generated transaction references
     */
    'transactionPrefix'=>env('KUDA_TRANSACTION_REFERENCE_PREFIX', 'kuda'),
    /**
     * kudaping cache key
     */
    'cacheKey'=>env('KUDA_CACHE_KEY', 'kudaping_cache'),
    /**
     * Live url
     */
    'liveUrl'=>env('KUDA_LIVE_URL', 'https://kuda-openapi.kuda.com/v2.1'),
    /**
     * Test url
     */
    'testUrl'=>env('KUDA_TEST_URL', 'https://kuda-openapi-uat.kudabank.com/v2.1'),
];
