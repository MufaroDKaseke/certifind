<?php

// Load Environment Variables
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

// Constants
define('PROVIDER_CATEGORIES', [
  [
    'icon' => 'bi bi-heart-pulse',
    'display_name' => 'Health',
    'name' => 'healthcare'
  ],
  [
    'icon' => 'bi bi-bank',
    'display_name' => 'Legal',
    'name' => 'legal'
  ],
  [
    'icon' => 'bi bi-book',
    'display_name' => 'Education',
    'name' => 'education'
  ],
  [
    'icon' => 'bi bi-alarm',
    'display_name' => 'Emergency',
    'name' => 'emergency'
  ],
  [
    'icon' => 'bi bi-tools',
    'display_name' => 'Trade',
    'name' => 'trade'
  ],
  [
    'icon' => 'bi bi-briefcase',
    'display_name' => 'Business',
    'name' => 'business'
  ]
]);
