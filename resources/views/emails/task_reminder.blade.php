<!DOCTYPE html>
<html>
<head>
    <title>Reminder Tugas</title>
</head>
<body>
    <h2>Halo, ini pengingat tugas Anda!</h2>
    <p>Berikut adalah daftar tugas yang mendekati deadline:</p>
    <ul>
        @foreach ($tasks as $task)
            <li>
                <strong>{{ $task->name }}</strong> - 
                Deadline: {{ \Carbon\Carbon::parse($task->deadline)->format('d-m-Y') }}
            </li>
        @endforeach
    </ul>    
    <p>Jangan lupa untuk menyelesaikannya tepat waktu!</p>
</body>
</html>
