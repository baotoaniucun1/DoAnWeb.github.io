

<header class="header" role="banner">
    <nav class="navUser">

        <ul class="navUser-section navUser-section--alt">


            <li class="navUser-item navUser-item--account">
                <a class="navUser-action" href="Login.php">Sign in</a>
                <span class="navUser-or">or</span>
                <a class="navUser-action" href="Register.php">Register</a>
            </li>
        </ul>

    </nav>

    <h1 class="header-logo header-logo--center">
        <a href="index.html">
            <span class="header-logo-text">Chích Chòe Shop</span>
        </a>
    </h1>

    <div class="navPages-container" id="menu" data-menu="" aria-hidden="true">
        <nav class="navPages">
            <div class="navPages-quickSearch">
                <div class="container">
                    <!-- snippet location forms_search -->
                    <form class="form" action="http://cornerstone-light-demo.mybigcommerce.com/search.php">
                        <fieldset class="form-fieldset">
                            <div class="form-field">
                                <label class="is-srOnly" for="search_query">Search</label>
                                <input class="form-input" data-search-quick="" name="search_query"
                                       id="search_query" data-error-message="Search field cannot be empty."
                                       placeholder="Search the store" autocomplete="off">
                            </div>
                        </fieldset>
                    </form>
                    <section class="quickSearchResults" data-bind="html: results"></section>
                </div>
            </div>
            <ul class="navPages-list">
                <li class="navPages-item">
                    <a class="navPages-action has-subMenu" href="http://cornerstone-light-demo.mybigcommerce.com/shop-all/garden/"
                       data-collapsible="navPages-19" aria-controls="navPages-19" aria-expanded="false">
                        Garden <i class="icon navPages-action-moreIcon" aria-hidden="true">
                            <svg>
                                <use xlink:href="#icon-chevron-down"></use>
                            </svg>
                        </i>
                    </a>
                    <div class="navPage-subMenu" id="navPages-19" aria-hidden="true" tabindex="-1">
                        <ul class="navPage-subMenu-list">
                            <li class="navPage-subMenu-item">
                                <a class="navPage-subMenu-action navPages-action" href="http://cornerstone-light-demo.mybigcommerce.com/shop-all/garden/">
                                    All
                                    Garden
                                </a>
                            </li>
                            <li class="navPage-subMenu-item">
                                <a class="navPage-subMenu-action navPages-action" href="http://cornerstone-light-demo.mybigcommerce.com/garden/bath/">Bath</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="navPages-item">
                    <a class="navPages-action" href="http://cornerstone-light-demo.mybigcommerce.com/all/">All</a>
                </li>
                <li class="navPages-item">
                    <a class="navPages-action" href="http://cornerstone-light-demo.mybigcommerce.com/shop-all/kitchen/">Kitchen</a>
                </li>
                <li class="navPages-item">
                    <a class="navPages-action" href="http://cornerstone-light-demo.mybigcommerce.com/shop-all/publications/">Publications</a>
                </li>
                <li class="navPages-item">
                    <a class="navPages-action" href="http://cornerstone-light-demo.mybigcommerce.com/shop-all/utility/">Utility</a>
                </li>
                <li class="navPages-item navPages-item-page">
                    <a class="navPages-action" href="http://cornerstone-light-demo.mybigcommerce.com/journal/">Journal</a>
                </li>
                <li class="navPages-item navPages-item-page">
                    <a class="navPages-action" href="http://cornerstone-light-demo.mybigcommerce.com/our-story/">
                        Our
                        Story
                    </a>
                </li>
                <li class="navPages-item navPages-item-page">
                    <a class="navPages-action" href="http://cornerstone-light-demo.mybigcommerce.com/contact-us/">
                        Contact
                        Us
                    </a>
                </li>
                <li class="navPages-item navPages-item-page">
                    <a class="navPages-action" href="http://cornerstone-light-demo.mybigcommerce.com/shipping-returns/">
                        Shipping
                        &amp; Returns
                    </a>
                </li>
            </ul>
            <ul class="navPages-list navPages-list--user">
                <li class="navPages-item">
                    <a class="navPages-action" href="http://cornerstone-light-demo.mybigcommerce.com/giftcertificates.php">
                        Gift
                        Certificates
                    </a>
                </li>
                <li class="navPages-item">
                    <a class="navPages-action" href="http://cornerstone-light-demo.mybigcommerce.com/login.php">
                        Sign
                        in
                    </a>
                    or <a class="navPages-action" href="http://cornerstone-light-demo.mybigcommerce.com/login.php?action=create_account">Register</a>
                </li>
                <li class="navPages-item">
                    <ul class="socialLinks socialLinks--alt">
                        <li class="socialLinks-item">
                            <a class="icon icon--twitter" href="https://twitter.com/Bigcommerce"
                               target="_blank">
                                <svg>
                                    <use xlink:href="#icon-twitter"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="socialLinks-item">
                            <a class="icon icon--facebook" href="https://www.facebook.com/Bigcommerce/"
                               target="_blank">
                                <svg>
                                    <use xlink:href="#icon-facebook"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="socialLinks-item">
                            <a class="icon icon--pinterest" href="https://www.pinterest.com/bigcommerce/"
                               target="_blank">
                                <svg>
                                    <use xlink:href="#icon-pinterest"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="socialLinks-item">
                            <a class="icon icon--instagram" href="https://www.instagram.com/bigcommerce/?hl=en"
                               target="_blank">
                                <svg>
                                    <use xlink:href="#icon-instagram"></use>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</header>
