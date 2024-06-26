<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kalender</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            @if($background = \App\Models\Setting::where('key', 'dashboard_background')->first())
                background: url('{{ asset('storage/' . $background->value) }}') no-repeat center center fixed;
                background-size: cover;
            @else
                background: url("https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhNBdEQclaDpdc14GSFbviCnwIFwGODtRrOzlJgqJ-B8gS5QSaNvklHQzdGDdNzfRvt1zQ7DzhBWWIM3Q7NFdR3mp8b8La2k6GzogKU8mS7CUo0jV8Spzvmt_w8kHstTUOfu2x6xWC5JQgk/s1600/Slider-2-Menara_Pandang-BanjarmasinTourism.jpg") no-repeat center center fixed;
                background-size: cover;
            @endif
            box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.7);
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
        .note-card {
            border: 1px solid #dddddd;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            background-color:  #ffffff;
        }
        .note-card h5 {
            color: #333333;
        }
        .note-card p {
            color: #555555;
        }
        .navbar {
            margin-bottom: 20px;
        }
        #mySidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }
        #mySidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }
        #mySidebar a:hover {
            color: #f1f1f1;
        }
        #mySidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }
        #main {
            transition: margin-left 0.5s;
            padding: 16px;
        }
        .navbar-toggler-icon {
            background-color: #fff;
        }
        input.form-control {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        textarea.form-control {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h1, h3, h4 {
            color: white;
        }
        label {
            background-color: white;
            padding: 10px;
            border-radius: 10px;
            font-weight: bold;
        }
        .calendar {
            width: 100%;
            margin: 20px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #dddddd;
        }
        .calendar-header h2 {
            margin: 0;
        }
        .calendar-body {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }
        .calendar-day, .calendar-weekday {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100px;
            border: 1px solid #dddddd;
            border-radius: 5px;
            background: #f1f1f1;
            position: relative;
        }
        .calendar-weekday {
            background: #333;
            color: white;
            height: 50px;
        }
        .calendar-day.empty {
            background: white;
            border: none;
        }
        .calendar-day .day-number {
            font-size: 18px;
            font-weight: bold;
        }
        .calendar-day .day-note {
            font-size: 14px;
            color: #555;
            margin-top: 5px;
        }
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 60px; 
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="{{ route('dashboard.index') }}">Home</a>
        <a href="{{ route('profile.show') }}">Profil</a>
        <a href="{{ route('calender') }}">Kalender</a>
        <a href="{{ route('quests.index') }}">Quest</a>
        <a href="{{ route('notes.index') }}">List Catatan</a>
        <a href="{{ route('tasks.index') }}">List Tugas</a>
        <a href="{{ route('settings.index') }}">Setting</a>
    </div>

    <div id="main">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <span class="navbar-toggler-icon" onclick="openNav()"></span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="{{ route('calender') }}">Kalender</a>
                        @can('admin')
                        <a class="nav-link" href="{{ route('dashboard.showDataPengguna') }}">Data Pengguna</a>
                        @endcan
                    </div>
                </div>
                <div class="text-end d-flex align-items-center">
                    <div class="user me-3">
                        Halo, {{ Auth::user()->name }}
                    </div>
                    <div class="logout">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

    <div class="container mt-3">
        <div class="calendar">
            <div class="calendar-header">
                <button onclick="previousMonth()">&#8249;</button>
                <h2 id="calendar-month-year"></h2>
                <button onclick="nextMonth()">&#8250;</button>
            </div>
            <div class="calendar-body">
                <div class="calendar-weekday">Minggu</div>
                <div class="calendar-weekday">Senin</div>
                <div class="calendar-weekday">Selasa</div>
                <div class="calendar-weekday">Rabu</div>
                <div class="calendar-weekday">Kamis</div>
                <div class="calendar-weekday">Jumat</div>
                <div class="calendar-weekday">Sabtu</div>
            </div>
            <div class="calendar-body" id="calendar-days"></div>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h4>Tambahkan Keterangan</h4>
            <form id="noteForm">
                <input type="hidden" id="noteDate">
                <div class="mb-3">
                    <label for="noteContent" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="noteContent" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <script>
        const calendarElement = document.getElementById('calendar-days');
        const calendarMonthYear = document.getElementById('calendar-month-year');
        const modal = document.getElementById("myModal");
        const span = document.getElementsByClassName("close")[0];
        const noteForm = document.getElementById("noteForm");
        const noteDate = document.getElementById("noteDate");
        const noteContent = document.getElementById("noteContent");

        const months = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        let currentMonth = new Date().getMonth();
        let currentYear = new Date().getFullYear();
        let notes = {};

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        noteForm.onsubmit = function(event) {
            event.preventDefault();
            const date = noteDate.value;
            const note = noteContent.value;

            fetch('/calender/notes', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ date: date, note: note })
            })
            .then(response => response.json())
            .then(data => {
                notes[date] = note;
                modal.style.display = "none";
                renderCalendar(currentMonth, currentYear);
            });
        }

        function fetchNotes() {
            fetch('/calender/notes')
                .then(response => response.json())
                .then(data => {
                    notes = {};
                    data.forEach(note => {
                        notes[note.date] = note.note;
                    });
                    renderCalendar(currentMonth, currentYear);
                });
        }

        function renderCalendar(month, year) {
            calendarElement.innerHTML = '';
            const firstDay = (new Date(year, month)).getDay();
            const daysInMonth = 32 - new Date(year, month, 32).getDate();

            calendarMonthYear.textContent = `${months[month]} ${year}`;

            for (let i = 0; i < firstDay; i++) {
                const dayElement = document.createElement('div');
                dayElement.classList.add('calendar-day', 'empty');
                calendarElement.appendChild(dayElement);
            }

            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('div');
                dayElement.classList.add('calendar-day');
                dayElement.innerHTML = `<div class="day-number">${day}</div>`;

                const date = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;

                if (notes[date]) {
                    dayElement.innerHTML += `<div class="day-note">${notes[date]}</div>`;
                }

                dayElement.addEventListener('click', () => {
                    noteDate.value = date;
                    noteContent.value = notes[date] || '';
                    modal.style.display = "block";
                });

                calendarElement.appendChild(dayElement);
            }
        }

        function previousMonth() {
            currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
            currentYear = (currentMonth === 11) ? currentYear - 1 : currentYear;
            fetchNotes();
        }

        function nextMonth() {
            currentMonth = (currentMonth === 11) ? 0 : currentMonth + 1;
            currentYear = (currentMonth === 0) ? currentYear + 1 : currentYear;
            fetchNotes();
        }

        document.addEventListener('DOMContentLoaded', function() {
            fetchNotes();
        });
    </script>
<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
