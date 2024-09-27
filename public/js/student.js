document.addEventListener("DOMContentLoaded", function () {
    const subjectSelect = document.getElementById("student_subject");
    const gradeSelect = document.getElementById("grade_level");
    const amountInput = document.getElementById("amount_tbp");
    const balanceInput = document.getElementById("balance"); // Reference to the balance input
    const paymentDateInput = document.getElementById("payment_date");

    // Function to calculate the amount
    function calculateAmount() {
        const subject = subjectSelect.value;
        const grade = gradeSelect.value;
        let amount = 0;

        const isPrimary = [
            "PK3",
            "PK2",
            "PK1",
            "P1",
            "P2",
            "P3",
            "P4",
            "P5",
            "P6",
        ].includes(grade);
        const isSecondary = [
            "P7",
            "P8",
            "P9",
            "P10",
            "P11",
            "P12",
            "P13",
        ].includes(grade);

        if (subject === "Math" || subject === "Reading") {
            if (isPrimary) {
                amount = 2000;
            } else if (isSecondary) {
                amount = 2150;
            }
        } else if (subject === "Math & Reading") {
            if (isPrimary) {
                amount = 2000 * 2;
            } else if (isSecondary) {
                amount = 2150 * 2;
            }
        }

        amountInput.value = amount.toFixed(2);
        balanceInput.value = amount.toFixed(2); // Update balance to match the new amount
    }

    // Function to set the payment date to the 25th of the next month, with explicit time set to avoid timezone issues
    function setNextMonthPaymentDate() {
        const today = new Date();
        const nextMonth = new Date(
            today.getFullYear(),
            today.getMonth() + 1,
            25
        );
        nextMonth.setHours(12, 0, 0, 0);

        const formattedDate = nextMonth.toISOString().split("T")[0];
        paymentDateInput.value = formattedDate;
    }

    subjectSelect.addEventListener("change", calculateAmount);
    gradeSelect.addEventListener("change", calculateAmount);

    calculateAmount(); // Initial calculation on page load
    setNextMonthPaymentDate(); // Set initial payment date
});
