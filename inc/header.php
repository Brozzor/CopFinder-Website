<nav class="navbar navbar-transparent navbar-absolute navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="https://cop-finder.com/<?= LANG_UTIL_LOWER; ?>/"><img src="/img/logo/logo.png" alt="cop-finder-logo" class="light-logo mb-1" style="width: 203px;" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto mb-1">
                <li class="nav-item">
                    <a class="nav-link" href="/<?= LANG_UTIL_LOWER; ?>/droplist/latest">
                        Droplist
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/<?= LANG_UTIL_LOWER; ?>/faq">
                        FAQ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/<?= LANG_UTIL_LOWER; ?>/contact">
                        CONTACT
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/<?= LANG_UTIL_LOWER; ?>/videos">
                        VIDEOS
                    </a>
                </li>

                <div class="vertical"></div>
                <li class="nav-item">
                    <a class="btn supreme-btn nav-supreme" href="/<?= LANG_UTIL_LOWER; ?>/#offers">
                        <i class="fa fa-shopping-cart"></i> <?= TXT_BUY_NOW; ?>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 10px">
                    <img width="35" src="/img/flags/<?= LANG_UTIL_LOWER; ?>.png" alt="<?= LANG_UTIL_LOWER; ?> flags" >
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width: 30px">
                        <a class="dropdown-item" href="/en/">
                            <img class="flags" src="/img/flags/en.png" alt="English">
                        </a>
                        <a class="dropdown-item" href="/fr/">
                            <img class="flags" src="/img/flags/fr.png" alt="Français">
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>