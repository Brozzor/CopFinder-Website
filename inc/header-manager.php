<?php 

?>
<nav class="navbar navbar-transparent navbar-absolute navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="https://cop-finder.com"><img src="/img/logo/logo.png" alt="cop-finder-logo" class="light-logo mb-1" style="width: 203px;" /></a>
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
                    <a class="nav-link" href="main.php">
                        HOME
                    </a>
                </li>
                <?php if ($user['state'] >= '1') { ?>
                <li class="nav-item">
                    <a class="nav-link" href="affiliate.php">
                        AFFILIATE
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="repayment.php">
                        REPAYMENT
                    </a>
                </li>
                <?php } if($user['state'] >= '2'){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="staff.php">
                        STAFF
                    </a>
                </li>
                <?php } if($user['state'] >= '3'){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">
                        ADMIN
                    </a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="/contact.php">
                        CONTACT
                    </a>
                </li>

                <hr class="vertical">
                <li class="nav-item">
                    <a class="btn supreme-btn nav-supreme" href="logout.php">
                         LOGOUT
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>