<h2>Create User</h2>
<form action="<?php echo BASE_URL; ?>/user/store" method="POST">
    <label>Name:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <button type="submit">Create</button>
</form>