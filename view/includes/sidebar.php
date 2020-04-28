    <div id="sidebar">
        <div class="inner">


            <!-- Menu -->
            <nav id="menu">
                <header class="major">
                    <h2>Menu</h2>
                </header>
                <ul>
                    <li><a href="/">Homepage</a></li>
                    <li><a href="/about">About me</a></li>
                    <li><a href="/my_works">My Works</a></li>
                    
                    <?php
                        if(isset($_SESSION['active'])){
                    ?>
                        <li><a href="/add_skills">Add my skills</a></li>
                        <li><a href="/edit_skills">Edit my skills</a></li>
                        <li><a href="/delete_skills">Delete my skills</a></li>

                        <li><a href="/change_about_me">Сhange information about me</a></li>
                    <?php
                        } else {
                    ?>
                        <li><a href="/login">Login</a></li>
                    <?php
                        }
                    ?>

                </ul>
            </nav>

            

            <?php if(isset($_SESSION['active'])) { ?> 
                <form method="POST" action="/loguot">
                <p>Hello, <?php echo $_SESSION['user_login']; ?>!!!</p>
                    <input type="hidden" name="is_activ" value="1">
                    <button type="submit">Exit</button>
                </form>
            <?php } ?>

        
            <!-- Section -->
            <section>
                <header class="major">
                    <h2>Contact</h2>
                </header>
                <ul class="contact">
                    <li class="icon solid fa-envelope"><a href="#">dmytroyakimyk@gmail.com</a></li>
                    <li class="icon solid fa-phone">(+380) 095-341-7774</li>
                    <li class="icon solid fa-home">67 Mikhail Lomonosov Street,<br />
                        Kyiv, 03169</li>
                </ul>

                <?php if(!isset($_SESSION['active'])) { ?> 
                    <button type="button">
                        <a href="/application">Write me</a>
                    </button>
                <?php } ?>
                
            </section>

            <!-- Footer -->
            <footer id="footer">
                <p class="copyright">© <a href="/">My Portfolio</a> 2019 | All rights reserved.</p>
            </footer>

        </div>
    </div>