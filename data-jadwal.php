<?php
// DATA MAPEL
$mapel = [
    'BI' => ['nama' => 'Bahasa Indonesia', 'tarif' => 30000],
    'ENG' => ['nama' => 'Bahasa Inggris', 'tarif' => 35000],
    'MD' => ['nama' => 'Mandarin', 'tarif' => 40000]
];

// DATA JADWAL
$jadwal = [
    '08:00' => [
        'Senin' => ['mapel' => 'BI'],
        'Selasa' => null,
        'Rabu' => null,
        'Kamis' => null,
        'Jumat' => null
    ],
    '10:00' => [
        'Senin' => ['mapel' => 'ENG'],
        'Selasa' => null,
        'Rabu' => null,
        'Kamis' => null,
        'Jumat' => null
    ]
];