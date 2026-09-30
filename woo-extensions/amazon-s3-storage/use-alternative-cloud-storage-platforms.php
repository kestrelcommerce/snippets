<?php

/**
 * Since v3.0.5, Amazon S3 Storage for WooCommerce provides experimental support for alternative cloud storage platforms.
 * These platforms need to be compatible with the AWS S3 API, such as Backblaze B2, DigitalOcean Spaces, Wasabi, etc.
 *
 * CLOUDFLARE R2 USERS: do not use this snippet. Since v3.3.0 Cloudflare R2 is supported natively: go to
 * WooCommerce » S3 storage, choose "Cloudflare R2" as the cloud service provider and enter your endpoint there.
 *
 * BEFORE USING THIS SNIPPET: go to WooCommerce » S3 storage and set the cloud service provider to
 * "User defined (experimental)", then save. The filters below are only applied with that setting.
 *
 * The following snippet is for Backblaze B2, based on https://www.backblaze.com/docs/cloud-storage-use-the-aws-sdk-for-php-with-backblaze-b2
 * However, it should work consistently with other providers (the region and endpoint URL values will differ).
 * For DigitalOcean Spaces, see https://docs.digitalocean.com/products/spaces/how-to/use-aws-sdks/
 * For Wasabi, see https://docs.wasabi.com/docs/what-are-the-service-urls-for-wasabi-s-different-storage-regions
 * Other providers may have similar documentation, contact their support to share information on their S3 compatibility.
 *
 * Since the regions in these platforms may not be the same as AWS, it may be necessary to specify region and bucket in shortcodes.
 */

// List of allowed values in the filter return value below: 'backblaze', 'digitalocean', 'wasabi'
add_filter( 'woocommerce_amazon_s3_client_cloud_service', fn() => 'backblaze' );

// NOTE: Replace strings between angle brackets `<...>` with your own values.
// For Backblaze B2, the region is part of your bucket's S3 endpoint (for example `us-west-004` in `s3.us-west-004.backblazeb2.com`).
add_filter( 'woocommerce_amazon_s3_client_args', function( $args ) {
    return array_merge( $args, [
        'region'      => '<insert your backblaze region here>',
        'endpoint'    => 'https://s3.<insert your backblaze region here>.backblazeb2.com',
        'credentials' => [
            'key'    => '<insert your backblaze application key ID here>',
            'secret' => '<insert your backblaze application key here>'
        ],
    ] );
} );

// Uncomment the following for additional troubleshooting if enabling debug mode in plugin settings isn't helpful.
// add_filter( 'woocommerce_amazon_s3_client_debug_mode', '__return_true' );
