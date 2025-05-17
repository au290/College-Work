<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
        th {
            background-color: #d3d3d3; 
        }
    </style>
</head>
<body>

<?php
$students = [
    [
        'No' => 1,
        'Nama' => 'Ridho',
        'MataKuliah' => [
            ['MataKuliah' => 'Penrograman I', 'SKS' => 2],
            ['MataKuliah' => 'Prakükum Penrograman I', 'SKS' => 1],
            ['MataKuliah' => 'Pengantar Lingkungan Lahan Basah', 'SKS' => 2],
            ['MataKuliah' => 'Arsitektur Komputer', 'SKS' => 3],
        ],
    ],
    [
        'No' => 2,
        'Nama' => 'Raina',
        'MataKuliah' => [
            ['MataKuliah' => 'Basis Data I', 'SKS' => 2],
            ['MataKuliah' => 'Prakükum Basis Data I', 'SKS' => 1],
            ['MataKuliah' => 'Kalkulus', 'SKS' => 3],
        ],
    ],
    [
        'No' => 3,
        'Nama' => 'Tono',
        'MataKuliah' => [
            ['MataKuliah' => 'Rekayasa Perangkat Lumak', 'SKS' => 3],
            ['MataKuliah' => 'Analisis dan Perancangan Sistem', 'SKS' => 3],
            ['MataKuliah' => 'Komputasi Avran', 'SKS' => 3],
            ['MataKuliah' => 'Keeradasan Bisnis', 'SKS' => 3],
        ],
    ],
];

foreach ($students as &$student) {
    $total = 0;
    foreach ($student['MataKuliah'] as $mk) {
        $total += $mk['SKS'];
    }
    $student['Total SKS'] = $total;
    $student['Keterangan'] = ($total < 7) ? 'Revisi KRS' : 'Tidak Revisi';
}

echo "<table>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Mata Kullah diambil</th>
    <th>SKS</th>
    <th>Total SKS</th>
    <th>Keterangan</th>
</tr>";

foreach ($students as $student) {
    $rowCount = 0;
    foreach ($student['MataKuliah'] as $mk) {
        echo "<tr>";
        if ($rowCount === 0) {
            $color = ($student['Keterangan'] === 'Revisi KRS') ? 'red' : 'green';
            echo "<td>{$student['No']}</td>
                  <td>{$student['Nama']}</td>
                  <td>{$mk['MataKuliah']}</td>
                  <td>{$mk['SKS']}</td>
                  <td>{$student['Total SKS']}</td>
                <td style='background-color: $color; color: black; font-weight: bold;'>{$student['Keterangan']}</td>";
        } else {
            echo "<td></td>
                  <td></td>
                  <td>{$mk['MataKuliah']}</td>
                  <td>{$mk['SKS']}</td>
                  <td></td>
                  <td></td>";
        }
        $rowCount++;
        echo "</tr>";
    }
}


echo "</table>";
?>

</body>
</html>