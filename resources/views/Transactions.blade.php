<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transactions</title>
</head>
<body>
    <h2>Welcome to Transactions</h2>
    <a href="{{route('Dashboard.index')}}">Dashboard</a>

    <form action="{{ route('Transactions.store') }}" method="POST">
        @csrf

        <label for="student_id">Student:</label>
        <select name="student_id" id="student_id">
            <option value="" disabled selected>Select Student</option>
            @foreach($students as $student)
                <option value="{{ $student->student_id }}">{{ $student->student_id }} - {{ $student->last_name }} , {{$student->first_name}}</option>
            @endforeach
        </select>
        <br><br>

        <label for="">Payment fot the Month of:</label>
        <input type="text"> <br><br>

        <label for="date_of_payment">Date of Payment</label>
        <input type="date" name="date_of_payment" id="date_of_payment" required><br><br>

        <label for="payment_method">Payment Method</label>
        <select name="payment_method" id="payment_method">
            <option value="Cash">Cash</option>
            <option value="GCash1">GCash1</option>
            <option value="GCash2">GCash2</option>
            <option value="BDO">BDO</option>
            <option value="BPI">BPI</option>
        </select><br><br>

        <label for="teacher">Teacher</label>
        <input type="text" name="teacher" id="teacher" required><br><br>

        <label for="reference_number">Reference Number</label>
        <input type="number" name="reference_number" id="reference_number" required> <br><br>

        <label for="or_number">OR Number</label>
        <input type="text" name="or_number" id="or_number"> <br><br>

        <label for="payment_amount">Payment Amount:</label>
        <input type="number" id="payment_amount" name="payment_amount" required><br><br>

        <label for="">Payment Due:</label>
        <input type="text" name="" id=""> <br><br>

        <label for="remarks">Remarks</label>
        <textarea name="remarks" id="remarks" cols="30" rows="10"></textarea><br><br>

        <button type="submit">Add Transaction</button>
    </form>

    {{-- Table --}}

    <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student</th>
                    <th>Date of Payment</th>
                    <th>Payment Method</th>
                    <th>Teacher</th>
                    <th>Reference Number</th>
                    <th>OR Number</th>
                    <th>Payment Amount</th>
                    <th>Remarks</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->student_id }}</td>
                        <td>{{ $transaction->date_of_payment }}</td>
                        <td>{{ $transaction->payment_method }}</td>
                        <td>{{ $transaction->teacher }}</td>
                        <td>{{ $transaction->reference_number }}</td>
                        <td>{{ $transaction->or_number }}</td>
                        <td>{{ $transaction->payment_amount }}</td>
                        <td>{{ $transaction->remarks }}</td>
                        <td>
                            <a href="">Edit Transaction</a>
                            <a href="">Archive Transaction</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>
