<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pencapaian Tugas</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 20px;
            background: #fff;
            color: #333;
            position: relative;
            text-align: center;
        }
        .header {
            margin-bottom: 20px;
        }
        .summary {
            text-align: left;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .certification {
            text-align: center;
            margin-top: 30px;
            font-size: 18px;
            font-weight: bold;
        }
        .note {
            position: absolute;
            bottom: 10px;
            right: 20px;
            font-size: 12px;
            color: gray;
            font-style: italic;
        }
    </style>
</head>
<body>
    @php
        $totalUsers = count($userRankings);
        $currentUserRank = array_search(Auth::user()->id, array_column($userRankings->toArray(), 'user_id')) + 1;
        $currentUserName = Auth::user()->name;
        $topRankings = array_slice($userRankings->toArray(), 0, 5);
        $topTasks = collect($histories)->sortBy('end_at')->take(5);
    @endphp

    <div class="header">
        <h2>Nama Pengguna: {{ $currentUserName }}</h2>
        <h3>Peringkat: {{ $currentUserRank }} dari {{ $totalUsers }} pengguna</h3>
    </div>

    <div class="summary">
        <p><strong>Total Tugas Selesai:</strong> {{ $totalTasks }}</p>
        <p><strong>Tepat Waktu:</strong> {{ $totalOnTime }}</p>
        <p><strong>Terlambat:</strong> {{ $totalLate }}</p>
    </div>

    <h3>Top 5 Peringkat Pengguna</h3>
    <table>
        <thead>
            <tr>
                <th>Peringkat</th>
                <th>Nama Pengguna</th>
                <th>Total Tugas Selesai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topRankings as $index => $rank)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $rank['user_name'] ?? 'User ' . ($index + 1) }}</td>
                    <td>{{ $rank['total_completed'] ?? rand(1, 50) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Top 5 Tugas Paling Cepat Selesai</h3>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Tugas</th>
                <th>Mulai</th>
                <th>Batas Waktu</th>
                <th>Selesai</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topTasks as $index => $history)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $history->task->name ?? 'Tugas ' . ($index + 1) }}</td>
                    <td>{{ $history->task->created_at->format('Y-m-d') ?? '2025-01-0' . ($index + 1) }}</td>
                    <td>{{ $history->task->deadline ?? '2025-02-0' . ($index + 1) }}</td>
                    <td>{{ $history->end_at ?? '2025-01-0' . ($index + 1) }}</td>
                    <td style="color: {{ ($history->end_at ?? now()) <= ($history->task->deadline ?? now()) ? 'green' : 'red' }}; font-weight: bold;">
                        {{ ($history->end_at ?? now()) <= ($history->task->deadline ?? now()) ? 'Tepat Waktu' : 'Terlambat' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="certification">
        <p>Disertifikasi oleh : M CODE (Todo App)</p>
        <p>Founder : Marcell Fia Dinata</p>
    </div>

    <div class="note">
        Aplikasi ini dibuat untuk keperluan Uji Kompetensi Keahlian 2025 Rekayasa Perangkat Lunak
    </div>
</body>
</html>
