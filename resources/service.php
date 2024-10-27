<?php

/*
 * This file is part of the ricbra/discogs-bundle,
 * Forked by AnssiAhola/php-discogs-api,
 * Forked by calliostro/php-discogs-api,
 * and then forked by me, w3spi5/php-discogs-api.
 *
 * Initial copyright. The actual version follow same rights, see below.
 *
 * (c) Richard van den Brand <richard@vandenbrand.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    'baseUrl' => 'https://api.discogs.com/',
    'operations' => [
        'getArtist' => [
            'httpMethod' => 'GET',
            'uri' => 'artists/{id}',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'id' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ]
            ]
        ],
        'getArtistReleases' => [
            'httpMethod' => 'GET',
            'uri' => 'artists/{id}/releases',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'id' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ],
                'sort' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'sort_order' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'per_page' => [
                    'type' => 'integer',
                    'location' => 'query',
                    'required' => false
                ],
                'page' => [
                    'type' => 'integer',
                    'location' => 'query',
                    'required' => false
                ]
            ]
        ],
        'search' => [
            'httpMethod' => 'GET',
            'uri' => 'database/search',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'q' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'type' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'title' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'release_title' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'credit' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'artist' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'anv' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'label' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'genre' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'style' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'country' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'year' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'format' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'catno' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'barcode' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'track' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'submitter' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'contributor' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'per_page' => [
                    'type' => 'integer',
                    'location' => 'query',
                    'required' => false
                ],
                'page' => [
                    'type' => 'integer',
                    'location' => 'query',
                    'required' => false
                ]
            ]
        ],
        'getRelease' => [
            'httpMethod' => 'GET',
            'uri' => 'releases/{id}',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'id' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ],
                'curr_abbr' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ]
            ]
        ],
        'getReleaseRating' => [
            'httpMethod' => 'GET',
            'uri' => 'releases/{release_id}/rating',
            'summary' => 'Retrieves the community release rating average and count. ALready included into release object.',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'release_id' => [
                    'type' => 'number',
                    'location' => 'uri',
                    'required' => true,
                ]
            ]
        ],
        'getReleaseStats' => [
            'httpMethod' => 'GET',
            'uri' => 'releases/{release_id}/stats',
            'summary' => 'Retrieves the release\'s "have" and "want" counts. Don\'t work, returns is_offensive:false always. This is already included in community in the release object. See here : https://www.discogs.com/forum/thread/865093.',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'release_id' => [
                    'type' => 'number',
                    'location' => 'uri',
                    'required' => true,
                ]
            ]
        ],
        'getMaster' => [
            'httpMethod' => 'GET',
            'uri' => 'masters/{id}',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'id' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ]
            ]
        ],
        'getMasterVersions' => [
            'httpMethod' => 'GET',
            'uri' => 'masters/{id}/versions',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'id' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ],
                'per_page' => [
                    'type' => 'integer',
                    'location' => 'query',
                    'required' => false
                ],
                'page' => [
                    'type' => 'integer',
                    'location' => 'query',
                    'required' => false
                ]
            ]
        ],
        'getLabel' => [
            'httpMethod' => 'GET',
            'uri' => 'labels/{id}',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'id' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ]
            ]
        ],
        'getLabelReleases' => [
            'httpMethod' => 'GET',
            'uri' => 'labels/{id}/releases',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'id' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ],
                'per_page' => [
                    'type' => 'integer',
                    'location' => 'query',
                    'required' => false
                ],
                'page' => [
                    'type' => 'integer',
                    'location' => 'query',
                    'required' => false
                ]
            ]
        ],
        'getOAuthIdentity' => [
            'httpMethod' => 'GET',
            'uri' => 'oauth/identity',
            'responseModel' => 'GetResponse',
        ],
        'getProfile' => [
            'httpMethod' => 'GET',
            'uri' => 'users/{username}',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'username' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ],
            ],
        ],
        'getInventory' => [
            'httpMethod' => 'GET',
            'uri' => 'users/{username}/inventory',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'username' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ],
                'status' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'sort' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'sort_order' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'per_page' => [
                    'type' => 'integer',
                    'location' => 'query',
                    'required' => false
                ],
                'page' => [
                    'type' => 'integer',
                    'location' => 'query',
                    'required' => false
                ]
            ]
        ],
        'addInventory' => [
            'summary' => 'Upload a CSV of listings to add to your inventory.',
            'httpMethod' => 'POST',
            'uri' => 'inventory/upload/add',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'upload' => [
                    'type' => 'any',
                    'location' => 'multipart',
                    'required' => true
                ]
            ]
        ],
        'deleteInventory' => [
            'summary' => 'Upload a CSV of listings to delete from your inventory.',
            'httpMethod' => 'POST',
            'uri' => 'inventory/upload/delete',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'upload' => [
                    'type' => 'any',
                    'location' => 'multipart',
                    'required' => true
                ]
            ]
        ],
        'getOrder' => [
            'httpMethod' => 'GET',
            'uri' => 'marketplace/orders/{order_id}',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'order_id' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ]
            ]
        ],
        'getOrders' => [
            'httpMethod' => 'GET',
            'uri' => 'marketplace/orders',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'status' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'sort' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'sort_order' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'created_before' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'created_after' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'archived' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ]
            ]
        ],
        'changeOrder' => [
            'httpMethod' => 'POST',
            'uri' => 'marketplace/orders/{order_id}',
            'summary' => 'Edit the data associated with an order.',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'order_id' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ],
                'status' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
                'shipping' => [
                    'type' => 'number',
                    'location' => 'json',
                    'required' => false,
                ]
            ]
        ],
        'getOrderMessages' => [
            'httpMethod' => 'GET',
            'uri' => 'marketplace/orders/{order_id}/messages',
            'summary' => 'Returns a list of the order’s messages with the most recent first.',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'order_id' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ]
            ]
        ],
        'addOrderMessage' => [
            'httpMethod' => 'POST',
            'uri' => 'marketplace/orders/{order_id}/messages',
            'summary' => 'Adds a new message to the order’s message log.',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'order_id' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ],
                'message' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
                'status' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ]
            ]
        ],
        'createListing' => [
            'httpMethod' => 'POST',
            'uri' => '/marketplace/listings',
            'summary' => 'Create a Marketplace listing.',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'release_id' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true
                ],
                'condition' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
                'sleeve_condition' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
                'price' => [
                    'type' => 'number',
                    'location' => 'json',
                    'required' => true,
                ],
                'comments' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
                'allow_offers' => [
                    'type' => 'boolean',
                    'location' => 'json',
                    'required' => false,
                ],
                'status' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
                'external_id' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
                'location' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
                'weight' => [
                    'type' => 'number',
                    'location' => 'json',
                    'required' => false,
                ],
                'format_quantity' => [
                    'type' => 'number',
                    'location' => 'json',
                    'required' => false,
                ]
            ]
        ],
        'changeListing' => [
            'httpMethod' => 'POST',
            'uri' => '/marketplace/listings/{listing_id}',
            'summary' => 'Change a Marketplace listing.',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'listing_id' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
                'condition' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
                'sleeve_condition' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
                'price' => [
                    'type' => 'number',
                    'location' => 'json',
                    'required' => false,
                ],
                'comments' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
                'allow_offers' => [
                    'type' => 'boolean',
                    'location' => 'json',
                    'required' => false,
                ],
                'status' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
                'external_id' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
                'location' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
                'weight' => [
                    'type' => 'number',
                    'location' => 'json',
                    'required' => false,
                ],
                'format_quantity' => [
                    'type' => 'number',
                    'location' => 'json',
                    'required' => false,
                ],
            ],
        ],
        'deleteListing' => [
            'httpMethod' => 'DELETE',
            'uri' => 'marketplace/listings/{listing_id}',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'listing_id' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ]
            ]
        ],
        'getCollectionFolders' => [
            'httpMethod' => 'GET',
            'uri' => 'users/{username}/collection/folders',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'username' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ]
            ]
        ],
        'createCollectionFolder' => [
          'httpMethod' => 'POST',
          'uri' => 'users/{username}/collection/folders',
          'summary' => 'Create a new folder in a user\'s collection (Authentication as the collection owner is required.).',
          'responseModel' => 'GetResponse',
          'parameters' => [
              'username' => [
                'type' => 'string',
                'location' => 'uri',
                'required' => true
              ],
              'name' => [
                  'type' => 'string',
                  'location' => 'json',
                  'required' => false,
              ]
          ]
        ],
        'getCollectionFolder' => [
            'httpMethod' => 'GET',
            'uri' => 'users/{username}/collection/folders/{folder_id}',
            'summary' => 'Retrieve metadata about a folder in a user\'s collection. If folder_id is not 0, authentication as the collection owner is required.',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'username' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ],
                'folder_id' => [
                    'type' => 'number',
                    'location' => 'uri',
                    'required' => true
                ],
            ]
        ],
        'editCollectionFolder' => [
          'httpMethod' => 'POST',
          'uri' => 'users/{username}/collection/folders/{folder_id}',
          'summary' => 'Edit a folder\'s metadata. Folders 0 and 1 cannot be renamed. Authentication as the collection owner is required.',
          'responseModel' => 'GetResponse',
          'parameters' => [
              'username' => [
                  'type' => 'string',
                  'location' => 'uri',
                  'required' => true
              ],
              'folder_id' => [
                  'type' => 'number',
                  'location' => 'uri',
                  'required' => true,
              ]
          ]
        ],
        'deleteCollectionFolder' => [
          'httpMethod' => 'DELETE',
          'uri' => 'users/{username}/collection/folders/{folder_id}',
          'summary' => 'Delete a folder from a user\'s collection. A folder must be empty before it can be deleted. Authentication as the collection owner is required.',
          'responseModel' => 'GetResponse',
          'parameters' => [
              'username' => [
                  'type' => 'string',
                  'location' => 'uri',
                  'required' => true
              ],
              'folder_id' => [
                  'type' => 'number',
                  'location' => 'uri',
                  'required' => true,
              ]
          ]
        ],
        'getCollectionItemsByFolder' => [
            'httpMethod' => 'GET',
            'uri' => 'users/{username}/collection/folders/{folder_id}/releases',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'username' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ],
                'folder_id' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ],
                'per_page' => [
                    'type' => 'integer',
                    'location' => 'query',
                    'required' => false
                ],
                'page' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'sort' => [
                    // label, artist, title, catno, format, rating, added, year
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
                'sort_order' => [
                    // asc or desc
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ],
            ]
        ],
        'addReleaseToCollectionFolder' => [
          'httpMethod' => 'POST',
          'uri' => 'users/{username}/collection/folders/{folder_id}/releases/{release_id}',
          'summary' => 'Add a release to a folder in a user\'s collection. The folder_id must be non-zero, you can use 1 for "Uncategorized". Authentication as the collection owner is required.',
          'responseModel' => 'GetResponse',
          'parameters' => [
              'username' => [
                  'type' => 'string',
                  'location' => 'uri',
                  'required' => true
              ],
              'folder_id' => [
                  'type' => 'number',
                  'location' => 'uri',
                  'required' => true,
              ],
              'release_id' => [
                  'type' => 'number',
                  'location' => 'uri',
                  'required' => true,
              ]
          ]
        ],
        'getWantlist' => [
            'httpMethod' => 'GET',
            'uri' => 'users/{username}/wants',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'username' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ],
                'per_page' => [
                    'type' => 'integer',
                    'location' => 'query',
                    'required' => false
                ],
                'page' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false
                ]
            ]
        ],
        'getUserLists' => [
            'httpMethod' => 'GET',
            'uri' => 'users/{username}/lists',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'username' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ],
                'per_page' => [
                  'type' => 'integer',
                  'location' => 'query',
                  'required' => false
                ],
                'page' => [
                  'type' => 'string',
                  'location' => 'query',
                  'required' => false
                ]
            ]
        ],
        'getLists' => [
            'httpMethod' => 'GET',
            'uri' => 'lists/{list_id}',
            'responseModel' => 'GetResponse',
            'parameters' => [
                'list_id' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true
                ]
            ]
        ]
    ],
    'models' => [
        'GetResponse' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json'
            ],
        ],
    ]
];
