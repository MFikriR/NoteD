<!-- resources/views/quest.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quest Management</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Your Quests</h1>
        <!-- Daftar quest -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>EXP</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quests as $quest)
                    <tr>
                        <td>{{ $quest->title }}</td>
                        <td>{{ $quest->description }}</td>
                        <td>{{ $quest->due_date }}</td>
                        <td>{{ $quest->completed ? 'Completed' : 'In Progress' }}</td>
                        <td>{{ $quest->exp }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
