<?php

return [

    'form' => [

        'avatar' => [
            'label' => 'Անձնանկար',
        ],

        'email' => [
            'label' => 'Էլ․հասցե',
        ],

        'isAdmin' => [
            'label' => 'Ադմինիստրատո՞ր է',
            'helpMessage' => 'Ադմինիստրատորները կարող են մուտք գործել բոլոր տեղեր և կառավարել այլ օգտվողների:',
        ],

        'isUser' => [
            'label' => 'Աշխատակի՞ց է',
        ],

        'name' => [
            'label' => 'Անուն',
        ],

        'password' => [

            'fieldset' => [

                'label' => [
                    'create' => 'Գաղտնաբառ',
                    'edit' => 'Ստեղծել նոր գաղտնաբառ',
                ],

            ],

            'fields' => [

                'password' => [
                    'label' => 'Գաղտնաբառ',
                ],

                'passwordConfirmation' => [
                    'label' => 'Հաստատել գաղտնաբառը',
                ],

            ],

        ],

        'roles' => [
            'label' => 'Կոչում',
            'placeholder' => 'Ընտրեք կոչում',
        ],

    ],

    'table' => [

        'columns' => [

            'email' => [
                'label' => 'Էլ․հասցե',
            ],

            'name' => [
                'label' => 'Անուն',
            ],

        ],

        'filters' => [

            'administrators' => [
                'label' => 'Ադմինիստրատորներ',
            ],

        ],

    ],

];
