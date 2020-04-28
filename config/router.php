<?php

$routes = [
        // Home page
        'index' => [
            'name' => 'index',
            'controller' => 'Index',
            'action' => 'index'
        ],


        // Login page
        'login' => [
            'name' => 'login',
            'controller' => 'Login',
            'action' => 'index'
        ],
        'auth' => [
            'name' => 'login',
            'controller' => 'Login',
            'action' => 'auth'
        ],
        'loguot' => [
            'name' => 'index',
            'controller' => 'Login',
            'action' => 'loguot'
        ],


        // Register page
        // 'register' => [
        //     'name' => 'register',
        //     'controller' => 'Register',
        //     'action' => 'index'
        // ],
        // 'registerUser' => [
        //     'name' => 'register',
        //     'controller' => 'Register',
        //     'action' => 'registerUser'
        // ],


        //About me
        'about' => [
            'name' => 'about',
            'controller' => 'About',
            'action' => 'index'
        ],


        //Add my skills
        'add_skills' => [
            'name' => 'add_skills',
            'controller' => 'AddSkills',
            'action' => 'index'
        ],
        'insert_skills' => [
            'name' => 'insert_skills',
            'controller' => 'AddSkills',
            'action' => 'insert'
        ],


        //Edit my skills
        'edit_skills' => [
            'name' => 'edit_skills',
            'controller' => 'EditSkills',
            'action' => 'index'
        ],
        'update_skills' => [
            'name' => 'edit_skills',
            'controller' => 'EditSkills',
            'action' => 'update'
        ],
        'select_skill' => [
            'name' => 'edit_skills',
            'controller' => 'EditSkills',
            'action' => 'select_skill'
        ],

        //Delete my skills
        'delete_skills' => [
            'name' => 'delete_skills',
            'controller' => 'DeleteSkills',
            'action' => 'index'
        ],
        'destroy_skills' => [
            'name' => 'destroy_skills',
            'controller' => 'DeleteSkills',
            'action' => 'destroy'
        ],

        //Сhange information about me
        'change_about_me' => [
            'name' => 'change_about_me',
            'controller' => 'ChangeAboutMe',
            'action' => 'index'
        ],
        'edit_about_me' => [
            'name' => '',
            'controller' => 'ChangeAboutMe',
            'action' => 'edit_about_me'
        ],


        // application
        'application' => [
            'name' => 'application',
            'controller' => 'Application',
            'action' => 'index'
        ],
        'send_application' => [
            'name' => '',
            'controller' => 'Application',
            'action' => 'send_application'
        ], 

        // my works
        'my_works' => [
            'name' => 'my_works',
            'controller' => 'MyWorks',
            'action' => 'index'
        ],
    ];