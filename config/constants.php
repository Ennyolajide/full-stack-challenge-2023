<?php

return [
    'roles' => [
        'admin' => [
            'manage-users',
            'view-referrals',
            'add-referrals',
        ],
        'supervisor' => [
            'view-referrals',
            'add-referrals',
        ],
        'executive' => [
            'view-referrals',
            'add-comments',
        ],
    ],
    'permissions' => [
        'manage-users',
        'view-referrals',
        'add-referrals',
        'add-comments',
    ]
];