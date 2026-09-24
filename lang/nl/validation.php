<?php

/*
|--------------------------------------------------------------------------
| Validation Language Lines
|--------------------------------------------------------------------------
|
| Only the rules this app uses. When adding a validation rule to a request,
| add its message here too (TranslationsTest guards this).
|
*/

return [
    'confirmed' => ':Attribute bevestiging komt niet overeen.',
    'email'     => ':Attribute is geen geldig e-mailadres.',
    'in'        => ':Attribute is ongeldig.',
    'min'       => [
        'string' => ':Attribute moet minimaal :min tekens zijn.',
    ],
    'numeric'   => ':Attribute moet een nummer zijn.',
    'required'  => ':Attribute is verplicht.',
    'string'    => ':Attribute moet een tekst zijn.',
    'url'       => ':Attribute moet een geldig URL zijn.',
];
