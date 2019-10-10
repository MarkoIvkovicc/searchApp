<style>
    <?php include 'views/css/style.css' ?>
</style>

<body>
    <div align="right" style="font-size: 1.4em; padding: 20px;">
        <?php if (isset($_SESSION['loginUser']) == false) : ?>
            <a href="login" style="padding-right: 25px;">LOGIN</a>
            <a href="register">REGISTER</a>
            <style>
                input[name=search] { pointer-events: none}
                label[for=info]:before {content: '*Login First';
                    color: red;}
            </style>
        <?php elseif (isset($_SESSION['loginUser']) == true) : ?>
            <a href="logout" style="padding-right: 25px;">LOGOUT</a>
        <?php $disable = false; endif; ?>
    </div>
    <h1>Search Engine</h1>

    <div id="search">
        <label for="info"></label>
        <form method="post" action="/result">
            <input type="text" name="search" placeholder="Type Name Or Email" id="searchInput">
            <span class="error" style="text-align: center; padding: 0px; margin: 0px;">
                <?= $search_err; ?> <?= $empty_err; ?></span><br>
            <select name="type" id="searchSelect">
                <option value="" selected disabled>Please Select Type</option>
                <option value="FrontEnd">Front End Developer</option>
                <option value="BackEnd">Back End Developer</option>
            </select>
            <span class="error" style="text-align: center; padding: 0px; margin: 0px;">
                <?= $type_err; ?></span><br>
            <?php if ($disable == false) : ?>
                <button name="submit" type="submit" id="searchBtn">SUBMIT</button>
            <?php endif; ?>
        </form>
    </div>


</body>