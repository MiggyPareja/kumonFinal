<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <a href="{{ route('Students.index') }}">Students</a>
    <a href="{{ route('Transactions.index') }}">Transactions</a>
    <a href="">Teachers</a>
    <a href="">Reports</a>
    <a href="">Log Out</a>

    <a href="{{route('Dashboard.create')}}">Generate Due</a>

    <h2>Students Due</h2>

    <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Balance</th>
                <th>Month Of</th>
                <th>No. of Months</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($studentsDue as $student)
            <tr>
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->balance }}</td>
                <td>{{ $student->month_of }}</td>
                <td>{{$student->no_of_months}}}</td>
                <td>
                    <a href="{{route('Transactions.index')}}">Add Transaction</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
