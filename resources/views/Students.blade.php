<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Welcome to Students</h2>
    <a href="{{route('Dashboard.index')}}">Dashboard</a>

    <form action="{{ route('Students.store') }}" method="POST">
        @csrf
        <label for="student_name">Student Name:</label>
        <input type="text" id="student_name" name="student_name" required><br><br>

        <label for="student_subject">Student Subject:</label>
        <select name="student_subject" id="student_subject">
            <option value="Math">Math</option>
            <option value="Reading">Reading</option>
            <option value="Math & Reading">Math & Reading</option>
        </select> <br> <br>

        <label for="student_id">Student ID:</label>
        <input type="number" id="student_id" name="student_id" required><br><br>

        <label for="enroll_date">Enroll Date:</label>
        <input type="date" id="enroll_date" name="enroll_date" required><br><br>

        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="C">C</option>
            <option value="A">A</option>
        </select> <br> <br>

        <label for="payment_date">Payment Date:</label>
        <input type="date" id="payment_date" name="payment_date" required><br><br>
        {{-- Should be automatic 25th of the month --}}

        <label for="grade_level">Grade Level:</label>
        <select name="grade_level" id="grade_level">
            <option value="PK-3">PK-3</option>
        </select> <br> <br>

        <label for="amount_tbp">Amount to be Paid:</label>
        <input type="number" step="0.01" id="amount_tbp" name="amount_tbp" required><br><br>
        {{-- Should be automatic based on student subject/level --}}
        
        <button type="submit">Add Student</button>
    </form>
</body>
</html>
