<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'         => 'Le champ :attribute doit être accepté.',
    'accepted_if'      => 'Le champ :attribute doit être accepté quand :other est :value.',
    'active_url'       => "Le champ :attribute n'est pas une URL valide.",
    'after'            => 'Le champ :attribute doit être une date postérieure au :date.',
    'after_or_equal'   => 'Le champ :attribute doit être une date postérieure ou égale au :date.',
    "alpha"            => "Le champ :attribute doit seulement contenir des lettres.",
    "alpha_dash"       => "Le champ :attribute doit seulement contenir des lettres, des chiffres et des tirets.",
    "alpha_num"        => "Le champ :attribute doit seulement contenir des chiffres et des lettres.",
    'array'            => 'Le champ :attribute doit être un tableau.',
    "before"           => "Le champ :attribute doit être une date antérieure au :date.",
    'before_or_equal'  => 'The :attribute must be a date before or equal to :date.',
    "between"          => [
        "numeric" => "La valeur de :attribute doit être comprise entre :min et :max.",
        "file"    => "Le fichier :attribute doit avoir une taille entre :min et :max kilobytes.",
        "string"  => "Le texte :attribute doit avoir entre :min et :max caractères.",
        'array'   => 'Le tableau :attribute doit avoir entre :min et :max objets.',
    ],
    'boolean'          => 'le champ :attribute doit être vrai ou faux.',
    "confirmed"        => "Le champ de confirmation :attribute ne correspond pas.",
    'current_password' => 'The password is incorrect.',
    "date"             => "Le champ :attribute n'est pas une date valide.",
    'date_equals'      => 'Le champ :attribute doit être une date égale à :date.',
    "date"             => "Le champ :attribute n'est pas une date valide.",
    'declined'         => 'Le champ :attribute doit être décliné.',
    'declined_if'      => 'Le champ :attribute doit être décliné quand :other est :value.',
    "different"        => "Les champs :attribute et :other doivent être différents.",
    "digits"           => "Le champ :attribute doit avoir :digits chiffres.",
    "digits_between"   => "Le champ :attribute doit avoir entre :min and :max chiffres.",
    'dimensions'       => "Le champ :attribute a des dimensions d'image non valides.",
    'distinct'         => 'Le champ :attribute a des valeurs dupliqué.',
    "email"            => "Le format du champ :attribute est invalide.",
    'ends_with'        => "le champ :attribute doit finir avec l'une des valeurs suivantes: :values.",
    'enum'             => 'Le champ :attribute sélectionné est invalide.',
    "exists"           => "Le champ :attribute sélectionné est invalide.",
    'file' => 'Le champ :attribute doit être un fichier.',
    'filled' => 'Le champ :attribute doit avoir une valeur.',
    'gt' => [
        'numeric' => 'Le champ :attribute doit être plus grand que :value.',
        'file' => 'Le champ :attribute doit être plus grand que :value kilobytes.',
        'string' => 'Le champ :attribute doit être plus grand que :value characters.',
        'array' => 'Le champ :attribute doit avoir plus que :value items.',
    ],
    'gte' => [
        'numeric' => 'Le champ :attribute doit être plus grand ou égale à :value.',
        'file' => 'Le champ :attribute doit être plus grand ou égale à :value kilobytes.',
        'string' => 'Le champ :attribute doit être plus grand ou égale à :value characters.',
        'array' => 'Le champ :attribute doit avoir :value items ou plus.',
    ],
    'image' => 'Le champ :attribute doit être une image.',
    'in' => 'Le champ :attribute selectionné est invalide.',
    'in_array' => "Le champ :attribute n'existe pas dans :other.",
    'integer' => 'Le champ :attribute doit être un entier.',
    'ip' => 'Le champ :attribute doit être une adresse IP valide.',
    'ipv4' => 'Le champ :attribute doit être une adresse IPv4 valide.',
    'ipv6' => 'Le champ :attribute doit être une adresse IPv6 valide.',
    'json' => 'Le champ :attribute doit être une chaine JSON valide.',
    'lt' => [
        'numeric' => 'Le champ :attribute doit être plus petit que :value.',
        'file' => 'Le champ :attribute doit être plus petit que :value kilobytes.',
        'string' => 'Le champ :attribute doit être plus petit que :value characters.',
        'array' => 'Le champ :attribute doit avoir moins de :value items.',
    ],
    'lte' => [
        'numeric' => 'Le champ :attribute doit être plus petit ou égale a :value.',
        'file' => 'Le champ :attribute doit être plus petit ou égale a :value kilobytes.',
        'string' => 'Le champ :attribute doit être plus petit ou égale a :value characters.',
        'array' => 'Le champ :attribute ne doit pas avoir moins :value items.',
    ],
    'mac_address' => 'Le champ :attribute doit être une adresse MAC valide.',
    'max' => [
        'numeric' => 'Le champ :attribute ne doit pas être plus grand que :max.',
        'file' => 'Le champ :attribute ne doit pas être plus grand que :max kilobytes.',
        'string' => 'Le champ :attribute ne doit pas être plus grand que :max characters.',
        'array' => 'Le champ :attribute ne doit pas avoir plus de :max items.',
    ],
    'mimes' => 'Le champ :attribute doit être un fichier de type: :values.',
    'mimetypes' => 'Le champ :attribute doit être un fichier de type: :values.',
    'min' => [
        'numeric' => "Le champ :attribute doit être d'au moins :min.",
        'file' => "Le champ :attribute doit être d'au moins :min kilobytes.",
        'string' => "Le champ :attribute doit être d'au moins :min characters.",
        'array' => 'Le champ :attribute doit avoir au moins :min items.',
    ],
    'multiple_of' => 'Le champ :attribute doit être un multiple de :value.',
    'not_in' => 'Le champ selected :attribute est invalide.',
    'not_regex' => 'Le champ :attribute format est invalide.',
    'numeric' => 'Le champ :attribute doit être un nombre.',
    'password' => 'Le mot de passe est incorrecte.',
    'present' => 'Le champ :attribute doit être présent.',
    'prohibited' => 'Le champ :attribute est interdit.',
    'prohibited_if' => 'Le champ :attribute est interdit quand :other est :value.',
    'prohibited_unless' => 'Le champ :attribute est interdit a moins que :other est dans :values.',
    'prohibits' => "Le champ :attribute interdit :other d'être présent.",
    'regex' => 'Le format de :attribute est invalidz.',
    'required' => 'Le champ :attribute est requit.',
    'required_array_keys' => 'Le champ :attribute doit contenir des entrées pour: :values.',
    'required_if' => 'Le champ :attribute est requit quand :other est :value.',
    'required_unless' => 'Le champ :attribute est requit à moins que :other est dans :values.',
    'required_with' => 'Le champ :attribute est requit quand :values est présent.',
    'required_with_all' => 'Le champ :attribute est requit quand :values sont présent.',
    'required_without' => "Le champ :attribute est requit quand :values n'est pas présent.",
    'required_without_all' => 'Le champ :attribute est requit quand aucun :values sont présent.',
    'same' => 'Le champ :attribute et :other doivent correspondre.',
    'size' => [
        'numeric' => 'Le champ :attribute doit être de :size.',
        'file' => 'Le champ :attribute doit être :size kilobytes.',
        'string' => 'Le champ :attribute doit être :size characters.',
        'array' => 'Le champ :attribute doit contenir :size items.',
    ],
    'starts_with' => "Le champ :attribute doit commencer avec l'une des valeurs suivantes: :values.",
    'string' => 'Le champ :attribute doit être une chaine.',
    'timezone' => 'Le champ :attribute doit être une timezone valide.',
    'unique' => 'Le champ :attribute est déjà prit.',
    'uploaded' => "l'envoit de :attribute a échoué.",
    'url' => 'Le champ :attribute doit être un URL valide.',
    'uuid' => 'Le champ :attribute doit être un UUID valide.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
