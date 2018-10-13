<?php
return [
    // https://example.dev/document
    'route' => 'document',

    'title' => config('app.name').' application',

    'description' => 'API Documentation Version 1.0',

    'version' => 'v 1.0',

    'author' => 'John Doe',

    // Make the string empty to hide the webpage
    'author_webpage' => '#',

    // Make the string empty to hide the webpage
    'forum_webpage' => 'https://support.lorum.ipsum/forums',

    'license' => 'Unlicensed',

    // Make the string empty to hide the webpage
    'license_webpage' => '',

    // Make the array empty to hide the requirements
    'requirements' => [
        'Code Editing Software (eg: Visual Studio Code, Sublime Text or Atom)',
        'Web Browser for testing (eg: Google Chrome or Mozilla Firefox)',
        'FTP Tool to upload files to Server (eg: <a href="https://panic.com/transmit/" target="_blank">Transmit</a>)',
    ]
];
