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

    {{-- <a href="{{route('Dashboard.create')}}">Generate Due</a> --}}

    <h2>Students Due</h2>

    <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Amount to be Paid</th>
                <th>Balance</th>
                <th>Month Of</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($studentsDue as $student)
            <tr>
                <td><a href="">{{ $student->student_id }}-{{ $student->last_name }},{{ $student->first_name }}</a></td>
                <td>{{$student->amount_tbp}}</td>
                <td>{{ $student->balance }}</td>
                <td>{{ \Carbon\Carbon::parse($student->month_of)->format('F Y') }}</td>
                <td>
                    <a href="{{route('Dashboard.pass',['student_id' => $student->student_id, 'payment_month' => $student->month_of, 'payment_amount' => $student->balance])}}">Add Transaction</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
