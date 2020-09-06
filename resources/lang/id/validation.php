<?php

return [

  /*
    |---------------------------------------------------------------------------------------
    | Baris Bahasa untuk Validasi
    |---------------------------------------------------------------------------------------
    |
    | Baris bahasa berikut ini berisi standar pesan kesalahan yang digunakan oleh
    | kelas validasi. Beberapa aturan mempunyai multi versi seperti aturan 'size'.
    | Jangan ragu untuk mengoptimalkan setiap pesan yang ada di sini.
    |
    */
  'accepted' => 'Data :attribute harus diterima.',
  'active_url' => 'Data :attribute bukan URL yang valid.',
  'after' => 'Data :attribute harus tanggal setelah :date.',
  'after_or_equal' => 'Data :attribute harus berupa tanggal setelah atau sama dengan tanggal :date.',
  'alpha' => 'Data :attribute hanya boleh berisi huruf.',
  'alpha_dash' => 'Data :attribute hanya boleh berisi huruf, angka, dan strip.',
  'alpha_num' => 'Data :attribute hanya boleh berisi huruf dan angka.',
  'array' => 'Data :attribute harus berupa sebuah array.',
  'before' => 'Data :attribute harus tanggal sebelum :date.',
  'before_or_equal' => 'Data :attribute harus berupa tanggal sebelum atau sama dengan tanggal :date.',
  'between' => [
    'numeric' => 'Data :attribute harus antara :min dan :max.',
    'file' => 'Data :attribute harus antara :min dan :max kilobytes.',
    'string' => 'Data :attribute harus antara :min dan :max karakter.',
    'array' => 'Data :attribute harus antara :min dan :max item.',
  ],
  'boolean' => 'Data :attribute harus berupa true atau false',
  'confirmed' => 'Konfirmasi :attribute tidak cocok.',
  'date' => 'Data :attribute bukan tanggal yang valid.',
  'date_format' => 'Data :attribute tidak cocok dengan format :format.',
  'different' => 'Data :attribute dan :other harus berbeda.',
  'digits' => 'Data :attribute harus berupa angka :digits.',
  'digits_between' => 'Data :attribute harus antara angka :min dan :max.',
  'dimensions' => ':attribute tidak memiliki dimensi gambar yang valid.',
  'distinct' => 'Data :attribute memiliki nilai yang duplikat.',
  'email' => 'Data :attribute harus berupa alamat surel yang valid.',
  'exists' => 'Data :attribute yang dipilih tidak valid.',
  'file' => ':attribute harus berupa sebuah berkas.',
  'filled' => 'Data :attribute harus memiliki nilai.',
  'image' => 'Data :attribute harus berupa gambar.',
  'in' => 'Data :attribute yang dipilih tidak valid.',
  'in_array' => 'Data :attribute tidak terdapat dalam :other.',
  'integer' => 'Data :attribute harus merupakan bilangan bulat.',
  'ip' => 'Data :attribute harus berupa alamat IP yang valid.',
  'ipv4' => 'Data :attribute harus berupa alamat IPv4 yang valid.',
  'ipv6' => 'Data :attribute harus berupa alamat IPv6 yang valid.',
  'json' => 'Data :attribute harus berupa JSON string yang valid.',
  'max' => [
    'numeric' => 'Data :attribute seharusnya tidak lebih dari :max.',
    'file' => 'Data :attribute seharusnya tidak lebih dari :max kilobytes.',
    'string' => 'Data :attribute seharusnya tidak lebih dari :max karakter.',
    'array' => 'Data :attribute seharusnya tidak lebih dari :max item.',
  ],
  'mimes' => 'Data :attribute harus dokumen berjenis : :values.',
  'mimetypes' => 'Data :attribute harus dokumen berjenis : :values.',
  'min' => [
    'numeric' => 'Data :attribute harus minimal :min.',
    'file' => 'Data :attribute harus minimal :min kilobytes.',
    'string' => 'Data :attribute harus minimal :min karakter.',
    'array' => 'Data :attribute harus minimal :min item.',
  ],
  'not_in' => 'Data :attribute yang dipilih tidak valid.',
  'numeric' => 'Data :attribute harus berupa angka.',
  'present' => 'Data :attribute wajib ada.',
  'regex' => 'Format Data :attribute tidak valid.',
  'required' => 'Data :attribute wajib diisi.',
  'required_if' => 'Data :attribute wajib diisi bila :other adalah :value.',
  'required_unless' => 'Data :attribute wajib diisi kecuali :other memiliki nilai :values.',
  'required_with' => 'Data :attribute wajib diisi bila terdapat :values.',
  'required_with_all' => 'Data :attribute wajib diisi bila terdapat :values.',
  'required_without' => 'Data :attribute wajib diisi bila tidak terdapat :values.',
  'required_without_all' => 'Data :attribute wajib diisi bila tidak terdapat ada :values.',
  'same' => 'Data :attribute dan :other harus sama.',
  'size' => [
    'numeric' => 'Data :attribute harus berukuran :size.',
    'file' => 'Data :attribute harus berukuran :size kilobyte.',
    'string' => 'Data :attribute harus berukuran :size karakter.',
    'array' => 'Data :attribute harus mengandung :size item.',
  ],
  'string' => 'Data :attribute harus berupa string.',
  'timezone' => 'Data :attribute harus berupa zona waktu yang valid.',
  'unique' => 'Data :attribute sudah ada sebelumnya.',
  'uploaded' => 'Data :attribute gagal diunggah.',
  'url' => 'Format Data :attribute tidak valid.',
  /*
    |---------------------------------------------------------------------------------------
    | Baris Bahasa untuk Validasi Kustom
    |---------------------------------------------------------------------------------------
    |
    | Di sini Anda dapat menentukan pesan validasi kustom untuk atribut dengan menggunakan
    | konvensi "attribute.rule" dalam penamaan baris. Hal ini membuat cepat dalam
    | menentukan spesifik baris bahasa kustom untuk aturan atribut yang diberikan.
    |
    */
  'custom' => [
    'attribute-name' => [
      'rule-name' => 'custom-message',
    ],
  ],
  /*
    |---------------------------------------------------------------------------------------
    | Kustom Validasi Atribut
    |---------------------------------------------------------------------------------------
    |
    | Baris bahasa berikut digunakan untuk menukar atribut 'place-holders'
    | dengan sesuatu yang lebih bersahabat dengan pembaca seperti Alamat Surel daripada
    | "surel" saja. Ini benar-benar membantu kita membuat pesan sedikit bersih.
    |
    */
  'attributes' => [],
];
