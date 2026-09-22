<?php

/*
 * Traduções das regras de validação em uso no sistema.
 * Qualquer regra não listada aqui cai automaticamente no idioma de
 * reserva (APP_FALLBACK_LOCALE), então basta acrescentar as novas
 * regras conforme as telas do sistema forem criadas.
 */

return [
    'confirmed' => 'A confirmação de :attribute não confere.',
    'current_password' => 'A senha informada está incorreta.',
    'email' => 'Informe um e-mail válido.',
    'lowercase' => 'O campo :attribute deve conter apenas letras minúsculas.',
    'max' => [
        'string' => 'O campo :attribute não pode ter mais de :max caracteres.',
        'numeric' => 'O campo :attribute não pode ser maior que :max.',
    ],
    'min' => [
        'string' => 'O campo :attribute deve ter no mínimo :min caracteres.',
        'numeric' => 'O campo :attribute deve ser no mínimo :min.',
    ],
    'numeric' => 'O campo :attribute deve ser um número.',
    'required' => 'O campo :attribute é obrigatório.',
    'string' => 'O campo :attribute deve ser um texto.',
    'unique' => 'Este :attribute já está em uso.',

    'attributes' => [
        'email' => 'e-mail',
        'name' => 'nome',
        'password' => 'senha',
        'current_password' => 'senha atual',
    ],
];
