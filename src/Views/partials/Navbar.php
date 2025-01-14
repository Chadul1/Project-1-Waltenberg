<!-- Dark Themed Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/Week-1-Project-Waltenberg/public/">Trust Your Gut</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto">
                    <?php if (! isset($_SESSION['user']) ?? false) : ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/Week-1-Project-Waltenberg/public/register">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/Week-1-Project-Waltenberg/public/login">Login</a>
                        </li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['user']) ?? false) : ?>
                        <li class="nav-item">
                            <form action="/Week-1-Project-Waltenberg/public/logout" method="POST">
                                <input type="hidden" name="_method" value="DELETE" />
                                <button  class="nav-link">
                                    <a class="text-white" style="text-decoration: none;">Log Out</a>
                                </button>
                            </form>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                            <a class="nav-link text-white" href="/Week-1-Project-Waltenberg/public/settings">Settings</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>