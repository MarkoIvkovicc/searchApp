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
        <?php endif; ?>
    </div>
    <h1>Search Engine</h1>

    <div id="search">
        <label for="info"></label>
        <form method="get" action="/result">
            <input type="text" name="search" placeholder="Search Users" id="searchInput"> <br>
            <select name="types" id="searchSelect">
                <option value="front">Front End Developer</option>
                <option value="back">Back End Developer</option>
            </select> <br>
            <button type="submit" id="searchBtn">SUBMIT</button>
        </form>
    </div>


</body>