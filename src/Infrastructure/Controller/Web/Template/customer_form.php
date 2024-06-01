<?= isset($viewModel["message"]) ? $viewModel["message"] : "" ?>

<hr>

<?php require_once "customer_list.php"; ?>

<hr>

<form action="/web/customer/new" method="POST">
<label for="first-name">
    First name
    <input type="text" id="first-name" name="firstName">
</label>

<label for="last-name">
    Last name
    <input type="text" id="last-name" name="lastName">
</label>

<label for="email">
    E-mail
    <input type="text" id="email" name="email">
</label>

<button type="submit">Submit</button>
</form>
