<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "news_comment"
 *
 * Auto generated by Extension Builder 2016-09-21
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
    'title' => 'DRC News Comment',
    'description' => 'This extension allows user to post comment on particular news, rate the comments, reply to the comments, searching comments and sorting of comments. There are various typoscript settings available to manage the extension.There is also one user friendly backend module is available to manage comments. This extension is compatible only with News system Extension.',
    'category' => 'plugin',
    'author' => 'DRC Systems India PVT.LTD.',
    'author_email' => 'info@drcsystems.com',
    'state' => 'beta',
    'internal' => '',
    'uploadfolder' => 'false',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.8',
    'constraints' => array(
        'depends' => array(
            'typo3' => '7.6.0-7.6.99',
            'news' => '5.1.0 ',
        ),
        'conflicts' => array(
        ),
        'suggests' => array(
        ),
    ),
);
