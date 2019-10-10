<style>
    <?php include 'views/css/style.css'; ?>
</style>

<body>
    <div align="right" style="font-size: 1.4em; padding: 20px;">
        <a href="/" style="padding-right: 25px;">HOME</a>
        <a href="/login">LOGIN</a>
    </div>
    <h1>Registration Page</h1>
    <form method="post" action="" style="text-align: center">
        <table align="center">
            <tr>
                <td>Type</td>
                <td id="tdSelect">
                    <select name="type" id="type" onchange="showProgLang(this)" required>
                        <option value="" disabled selected>Please Select</option>
                        <option value="FrontEnd">Front End Developer</option>
                        <option value="BackEnd">Back End Developer</option>
                    </select >
                    <select name="progLang" id="progLang" style="display: none" onchange="showFramework(this)" required>
                        <option value="" disabled selected id="default">Please Select</option>
                        <option value="Angular" id="Angular" style="display: none">Angular</option>
                        <option value="React" id="React" style="display: none">React</option>
                        <option value="Vue" id="Vue" style="display: none">Vue</option>
                        <option value="Php" id="Php" style="display: none">Php</option>
                        <option value="NodeJs" id="NodeJs" style="display: none">NodeJs</option>
                    </select> <br>
                    <select name="framework" id="framework" style="display: none" onchange="showSubFramework(this)">
                        <option value="" disabled selected id="default">Please Select</option>
                        <option value="AngularJs" id="AngularJs" style="display: none">AngularJs</option>
                        <option value="Angular2" id="Angular2" style="display: none">Angular2</option>
                        <option value="ReactNative" id="ReactNative" style="display: none">React native</option>
                        <option value="Symfony" id="Symfony" style="display: none">Symfony</option>
                        <option value="Laravel" id="Laravel" style="display: none">Laravel</option>
                        <option value="Express" id="Express" style="display: none">Express</option>
                        <option value="NestJs" id="NestJs" style="display: none">NestJs</option>
                    </select>
                    <select name="subFramework" id="subFramework" style="display: none">
                        <option value="" disabled selected id="default">Please Select</option>
                        <option value="Silex" id="Silex" style="display: none">Silex</option>
                        <option value="Lumen" id="Lumen" style="display: none">Lumen</option>
                    </select>
                    <span class="error"><?= $type_err; ?></span>
                    <span class="error"><?= $progLang_err; ?></span>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" placeholder="Email" required>
                    <span class="error"><?= $email_err; ?></span></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" placeholder="Name" required>
                    <span class="error"><?= $name_err; ?></span></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="text" name="password" placeholder="Password" required>
                    <span class="error"><?= $password_err; ?></span></td>
            </tr>
            <tr>
                <td>Re-enter Password:</td>
                <td><input type="text" name="re-password" placeholder="Re-enter Password" required>
                    <span class="error"><?= $repassword_err; ?></span>
                    <span class="error"><?= $invalidPass; ?></span></td>
            </tr>
            <tr style="text-align: center">
                <td colspan="2"><span class="error"><?= $empty_err; ?></span><br>
                    <button name="submit" type="submit">SUBMIT</button></td>
            </tr>
        </table>
    </form>
</body>

<script>
    function showProgLang(type) {
        document.getElementById('progLang').style.display = 'inline';
        document.getElementById('progLang').value = document.getElementById('default').value;
        document.getElementById('framework').style.display = 'none';
        document.getElementById('subFramework').style.display = 'none';
        if (type.value == "FrontEnd") {
            document.getElementById('Angular').style.display = 'inline';
            document.getElementById('React').style.display = 'inline';
            document.getElementById('Vue').style.display = 'inline';
            document.getElementById('Php').style.display = 'none';
            document.getElementById('NodeJs').style.display = 'none';
        } else if (type.value == "BackEnd") {
            document.getElementById('Angular').style.display = 'none';
            document.getElementById('React').style.display = 'none';
            document.getElementById('Vue').style.display = 'none';
            document.getElementById('Php').style.display = 'inline';
            document.getElementById('NodeJs').style.display = 'inline';
        }
    }

    function showFramework(progLang) {
        document.getElementById('framework').style.display = 'inline';
        document.getElementById('framework').value = document.getElementById('default').value;
        document.getElementById('subFramework').style.display = 'none';
        if (progLang.value == "Angular") {
            document.getElementById('AngularJs').style.display = 'inline';
            document.getElementById('Angular2').style.display = 'inline';
            document.getElementById('ReactNative').style.display = 'none';
            document.getElementById('Symfony').style.display = 'none';
            document.getElementById('Laravel').style.display = 'none';
            document.getElementById('Express').style.display = 'none';
            document.getElementById('NestJs').style.display = 'none';
        } else if (progLang.value == "React") {
            document.getElementById('AngularJs').style.display = 'none';
            document.getElementById('Angular2').style.display = 'none';
            document.getElementById('ReactNative').style.display = 'inline';
            document.getElementById('Symfony').style.display = 'none';
            document.getElementById('Laravel').style.display = 'none';
            document.getElementById('Express').style.display = 'none';
            document.getElementById('NestJs').style.display = 'none';
        } else if (progLang.value == "Vue") {
            document.getElementById('framework').style.display = 'none';
        } else if (progLang.value == "Php") {
            document.getElementById('AngularJs').style.display = 'none';
            document.getElementById('Angular2').style.display = 'none';
            document.getElementById('ReactNative').style.display = 'none';
            document.getElementById('Symfony').style.display = 'inline';
            document.getElementById('Laravel').style.display = 'inline';
            document.getElementById('Express').style.display = 'none';
            document.getElementById('NestJs').style.display = 'none';
        } else if (progLang.value == "NodeJs") {
            document.getElementById('AngularJs').style.display = 'none';
            document.getElementById('Angular2').style.display = 'none';
            document.getElementById('ReactNative').style.display = 'none';
            document.getElementById('Symfony').style.display = 'none';
            document.getElementById('Laravel').style.display = 'none';
            document.getElementById('Express').style.display = 'inline';
            document.getElementById('NestJs').style.display = 'inline';
        }
    }

    function showSubFramework(framework) {
        if (framework.value == "Symfony") {
            document.getElementById('subFramework').style.display = 'inline';
            document.getElementById('Silex').style.display = 'inline';
        } else if (framework.value == "Laravel") {
            document.getElementById('subFramework').style.display = 'inline';
            document.getElementById('Lumen').style.display = 'inline';
        }
    }
</script>