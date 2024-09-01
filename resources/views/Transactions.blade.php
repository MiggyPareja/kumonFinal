<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Welcome to Transactions</h2>
    <a href="{{route('Dashboard.index')}}">Dashboard</a>

    <form action="{{ route('Transactions.store') }}" method="POST">
        @csrf

        <label for="student_id">Student ID:</label>
        <input type="text" name="student_id" id="student_id" required> <br><br>

        <label for="date_of_payment">Date of Payment</label>
        <input type="date" name="date_of_payment" id="date_of_payment" required><br><br>

        <label for="payment_method">Payment Method</label>
        <select name="payment_method" id="payment_method">
            <option value="Cash">Cash</option>
            <option value="GCash">GCash</option>
            <option value="Bank">Bank</option>
        </select><br><br>

        <label for="teacher">Teacher</label>
        <input type="text" name="teacher" id="teacher" required><br><br>

        <label for="reference_number">Reference Number</label>
        <input type="number" name="reference_number" id="reference_number" required> <br><br>

        <label for="payment_amount">Payment Amount:</label>
        <input type="number" id="payment_amount" name="payment_amount" required><br><br>

        <label for="remarks">Remarks</label>
        <textarea name="remarks" id="remarks" cols="30" rows="10"></textarea><br><br>

        <button type="submit">Add Transaction</button>
    </form>
</body>
</html>
