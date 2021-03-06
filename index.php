<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <link rel="stylesheet" href="frontend/css/main.css">
</head>
<body>

<?php require './vendor/autoload.php'; ?>
<?php $c = new \App\Controller\UserController; ?>

<div class="wrapper">
    <div class="wrapper__form">
        <form action="entry.php" class="form">
            <h3 class="form__title">Add user</h3>
            <div class="form__group">
                <label for="role" class="form__label">Select role</label>
                <select name="role" id="role" class="form__select">
                    <?php /** @var \App\Model\UserRole $role */ ?>
                    <?php foreach ($c->getRoles() as $role): ?>
                        <option value="<?php echo $role->getId(); ?>">
                            <?php echo $role->getRoleName(); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form__group">
                <label for="username" class="form__label">Username</label>
                <input type="text" id="username" name="username" class="form__input" required>
            </div>
            <input type="submit" class="form__submit" value="add">
        </form>
    </div>
    <div class="wrapper__table">
        <table class="table greyGridTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
            </tr>
            </thead>
            <tbody>
            <?php /** @var \App\Model\User $user */ ?>
            <?php foreach ($c->getUsers() as $user): ?>
                <tr>
                    <td><?php echo $user->getId(); ?></td>
                    <td><?php echo $user->getUsername(); ?></td>
                    <td><?php echo $user->getRole()->getRoleName(); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="frontend/js/main.js"></script>

</body>
</html>