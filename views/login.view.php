<style>
    <?php include "views/css/style.css"; ?>
</style>

<body>
    <div align="right" style="font-size: 1.4em; padding: 20px;">
        <?php if (isset($_SESSION['loginUser']) == false) : ?>
            <a href="/" style="padding-right: 25px;">HOME</a>
            <a href="/register">REGISTER</a>
        <?php elseif (isset($_SESSION['loginUser']) == true) : ?>
            <a href="logout" style="padding-right: 25px;">LOGOUT</a>
            <a href="/" style="padding-right: 25px;">HOME</a>
        <?php endif; ?>
    </div>
<?php $error=''; ?>
    <h1>Login Page</h1>
    <form method="post" action="/loginUser" style="text-align: center">
        <table align="center">
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" placeholder="Email"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="text" name="password" placeholder="Password"></td>
            </tr>
            <tr style="text-align: center" >
                <td colspan="2"><button name="submit" type="submit">SUBMIT</button></td>
            </tr>
        </table>
        <?= $error; ?>
    </form>
</body>