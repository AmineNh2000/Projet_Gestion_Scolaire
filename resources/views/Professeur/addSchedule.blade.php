<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Timetable Storage Form</title>
    <style>

        .form-group {
            margin-bottom: 1rem;
        }

        img {
            width: 30px;
        }

        /* Responsive Styles */
        @media (max-width: 756px) {
            input.form-control,
            select.form-control {
                font-size: 12px;
                height: 30px;
            }
            
            .container {
                width: 100%;
            }
            
            img {
                width: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Timetable Storage Form</h2>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Classe">Classe</label>
                    <select class="form-control" id="Classe" name="Classe" required>
                        <!-- Add options for Classe -->
                        <option value="class1">Class 1</option>
                        <option value="class2">Class 2</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Course">Course</label>
                    <select class="form-control" id="Course" name="Course" required>
                        <!-- Add options for Course -->
                        <option value="course1">Course 1</option>
                        <option value="course2">Course 2</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Module">Module</label>
                    <select class="form-control" id="Module" name="Module" required>
                        <!-- Add options for Module -->
                        <option value="module1">Module 1</option>
                        <option value="module2">Module 2</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
            </div>
        </div>
        <form action="" method="post">
            @csrf
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Room</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select class="form-control" name="day" required>
                                    <option value="monday">Monday</option>
                                    <option value="tuesday">Tuesday</option>
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                    <option value="saturday">Saturday</option>
                                    <option value="sunday">Sunday</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="start_time"
                                    placeholder="e.g., 10:00 AM" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="end_time" placeholder="e.g., 11:30 AM"
                                    required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="room" required>
                            </td>
                            <td>

                                <button type="button" class="btn rounded-pill" onclick="addRow()">
                                    <img src="{{ asset('assets/icons/add.png') }}">
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function addRow() {
            var table = document.querySelector('table tbody');
            var newRow = table.insertRow(table.rows.length);
            var days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

            for (var i = 0; i < 4; i++) {
                var cell = newRow.insertCell(i);
                if (i === 0) {
                    var select = document.createElement('select');
                    select.className = 'form-control';
                    select.name = 'day';
                    days.forEach(function(day) {
                        var option = document.createElement('option');
                        option.value = day.toLowerCase();
                        option.text = day;
                        select.appendChild(option);
                    });
                    cell.appendChild(select);
                } else {
                    var input = document.createElement('input');
                    input.type = 'text';
                    input.className = 'form-control';
                    input.name = (i === 1) ? 'start_time' : (i === 2) ? 'end_time' : 'room';
                    input.placeholder = (i === 1) ? 'e.g., 10:00 AM' : (i === 2) ? 'e.g., 11:30 AM' : '';
                    input.required = true;
                    cell.appendChild(input);
                }
            }

            var deleteButtonCell = newRow.insertCell(4);
            var deleteButton = document.createElement('button');
            deleteButton.type = 'button';
            deleteButton.className = 'btn btn-outline-danger rounded-pill';
            deleteButton.innerHTML = '<img src="{{ asset('assets/icons/delete.png') }}" >';

            deleteButton.onclick = function() {
                table.deleteRow(newRow.rowIndex-1);
            };
            deleteButtonCell.appendChild(deleteButton);
        }
    </script>
</body>

</html>
