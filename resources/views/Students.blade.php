<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
    <script src="{{ asset('js/student.js') }}"></script>

</head>
<body>
    <h2>Welcome to Students</h2>
    <a href="{{route('Dashboard.index')}}">Dashboard</a>

    <form action="{{ route('Students.store') }}" method="POST">
        @csrf
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>

        <label for="student_subject">Student Subject:</label>
        <select name="student_subject" id="student_subject">
            <option value="Math">Math</option>
            <option value="Reading">Reading</option>
            <option value="Math & Reading">Math & Reading</option>
        </select> <br> <br>

         <label for="grade_level">Grade Level:</label>
        <select name="grade_level" id="grade_level">
            <option value="PK3">PK3</option>
            <option value="PK2">PK2</option>
            <option value="PK1">PK1</option>
            <option value="P1">P1</option>
            <option value="P1">P1</option>
            <option value="P2">P2</option>
            <option value="P3">P3</option>
            <option value="P4">P4</option>
            <option value="P5">P5</option>
            <option value="P6">P6</option>
            <option value="P7">P7</option>
            <option value="P8">P8</option>
            <option value="P9">P9</option>
            <option value="P10">P10</option>
            <option value="P11">P11</option>
            <option value="P12">P12</option>
            <option value="P13">P13</option>
        </select> <br> <br>

        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="C">C</option>
            <option value="A">A</option>
        </select> <br> <br>

        <label for="enroll_date">Enroll Date:</label>
        <input type="date" id="enroll_date" name="enroll_date" required><br><br>


        <label for="payment_date">Payment Date:</label>
        <input type="date" id="payment_date" name="payment_date" required><br><br>
        {{-- Should be automatic 25th of the month --}}

        <label for="amount_tbp">Amount to be Paid:</label>
        <input type="number" id="amount_tbp" name="amount_tbp" required readonly><br><br>
        {{-- Should be automatic based on student subject/level --}}

        <button type="submit">Add Student</button>
    </form>

    {{-- Table --}}
     <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Full Name</th>
                    <th>Subject</th>
                    <th>Enroll Date</th>
                    <th>Amount To be paid</th>
                    <th>Status</th>
                    <th>Grade Level</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($studentView as $student)
                    <tr>
                        <td>{{ $student->student_id }}</td>
                        <td>{{ $student->last_name}},{{$student->first_name}}</td>
                        <td>{{ $student->student_subject }}</td>
                        <td>{{ $student->enroll_date }}</td>
                        <td>{{ $student->amount_tbp }}</td>
                        <td>{{ $student->status }}</td>
                        <td>{{ $student->grade_level }}</td>
                        <td>
                            <a href="{{route('Transactions.index')}}">Add Transaction</a>
                            <a href="">Edit Student</a>
                            <a href="">Archive Student</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>
