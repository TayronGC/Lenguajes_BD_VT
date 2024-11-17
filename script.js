document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('expense-form');
    const expenseList = document.getElementById('expense-list');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const description = form.description.value;
        const category = form.category.value;
        const amount = form.amount.value;

        const listItem = document.createElement('li');
        listItem.className = 'list-group-item';
        listItem.textContent = `${description} - ${category} - $${amount}`;

        expenseList.appendChild(listItem);

        form.reset();
    });
});
