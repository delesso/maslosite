<?php
session_start();
require_once __DIR__ . '/config/db.php';
foreach ($products as &$product) {
    if (!empty($product['image_path'])) {
        $full_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $product['image_path'];
        if (!file_exists($full_path)) {
            $product['image_path'] = null;
        }
    }
}
unset($product);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles1.css">
    <title>AVT-ZAP</title>
</head>

<body>
    <header class="header">
        <div class="header__inner container ">
            <div class="header__info">
                <ul class="header__info-list">
                    <li class="header__info-item">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 0C6.12297 0 2.96875 3.15422 2.96875 7.03125C2.96875 8.34117 3.3316 9.61953 4.01832 10.7286L9.59977 19.723C9.70668 19.8953 9.89504 20 10.0976 20C10.0992 20 10.1007 20 10.1023 20C10.3066 19.9984 10.4954 19.8905 10.6003 19.7152L16.0395 10.6336C16.6883 9.54797 17.0312 8.30231 17.0312 7.03125C17.0312 3.15422 13.877 0 10 0ZM15.0338 10.032L10.0887 18.2885L5.01434 10.1112C4.44273 9.18805 4.13281 8.12305 4.13281 7.03125C4.13281 3.80039 6.76914 1.16406 10 1.16406C13.2309 1.16406 15.8633 3.80039 15.8633 7.03125C15.8633 8.09066 15.5738 9.12844 15.0338 10.032Z" fill="white" />
                            <path d="M10 3.51562C8.06148 3.51562 6.48438 5.09273 6.48438 7.03125C6.48438 8.95738 8.03582 10.5469 10 10.5469C11.9884 10.5469 13.5156 8.93621 13.5156 7.03125C13.5156 5.09273 11.9385 3.51562 10 3.51562ZM10 9.38281C8.7009 9.38281 7.64844 8.32684 7.64844 7.03125C7.64844 5.73891 8.70766 4.67969 10 4.67969C11.2923 4.67969 12.3477 5.73891 12.3477 7.03125C12.3477 8.30793 11.3197 9.38281 10 9.38281Z" fill="white" />
                        </svg>
                        <a href="" class="header__info-link">Ваш город: Москва</a>
                    </li>
                    <li class="header__info-item">
                        <a href="" class="header__info-link">Информация</a>
                    </li>
                    <li class="header__info-item">
                        <a href="" class="header__info-link">Сотрудничество</a>
                    </li>
                </ul>
            </div>
            <nav class="header__menu">
                <ul class="header__menu-list">
                    <li class="header__menu-item">
                        <a href="" class="header__menu-link">Доставка</a>
                    </li>
                    <li class="header__menu-item">
                        <a href="" class="header__menu-link">О магазине</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="content">
        <section class="section container">
            <div class="store-info">
                <div class="store-info__item">
                    <img src="./image/logo.png" alt="">
                    <div class="store-info-title">
                        <h2>AVT-ZAP</h2>
                        <p>Интернет-магазин запчастей<br> для АКПП</p>
                    </div>
                </div>
                <div class="store-info__item">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1_448)">
                            <path d="M16 0C7.16343 0 0 7.16343 0 16C0 24.8365 7.16343 31.9999 16 31.9999C24.8365 31.9999 31.9999 24.8365 31.9999 16C31.9906 7.16738 24.8326 0.00944196 16 0ZM16 29.7142C8.42578 29.7142 2.28569 23.5742 2.28569 16C2.28569 8.42578 8.42578 2.28569 16 2.28569C23.5742 2.28569 29.7142 8.42578 29.7142 16C29.7061 23.5708 23.5708 29.7061 16 29.7142Z" fill="#0F2438" />
                            <path d="M16 5.71436C15.3688 5.71436 14.8571 6.22603 14.8571 6.85723V14.8573H6.85714C6.22594 14.8573 5.71426 15.3689 5.71426 16.0001C5.71426 16.6313 6.22594 17.1429 6.85714 17.1429H16C16.6312 17.1429 17.1428 16.6313 17.1428 16.0001V6.85723C17.1428 6.22603 16.6312 5.71436 16 5.71436Z" fill="#0F2438" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1_448">
                                <rect width="32" height="32" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <p>Мы работаем: будни - 9:00-21:00<br>сб. - 10:00-15:00</p>
                </div>
                <div class="store-info__item">
                    <svg width="24" height="32" viewBox="0 0 24 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 0C5.79675 0 0.75 5.04675 0.75 11.25C0.75 13.3459 1.33056 15.3913 2.42931 17.1658L11.3596 31.5568C11.5307 31.8325 11.8321 32 12.1562 32C12.1587 32 12.1611 32 12.1636 32C12.4906 31.9974 12.7926 31.8248 12.9605 31.5443L21.6632 17.0138C22.7013 15.2768 23.25 13.2837 23.25 11.25C23.25 5.04675 18.2033 0 12 0ZM20.0541 16.0511L12.142 29.2616L4.02294 16.1779C3.10838 14.7009 2.6125 12.9969 2.6125 11.25C2.6125 6.08063 6.83063 1.8625 12 1.8625C17.1694 1.8625 21.3813 6.08063 21.3813 11.25C21.3813 12.9451 20.9181 14.6055 20.0541 16.0511Z" fill="#0F2438" />
                    </svg>
                    <p>Невский пр-т, д. 45</p>
                </div>
                <div class="store-info__item">

                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1_464)">
                            <path d="M6.0015 0H5.9985C2.69025 0 0 2.691 0 6C0 7.3125 0.423 8.529 1.14225 9.51675L0.3945 11.7458L2.70075 11.0085C3.6495 11.637 4.78125 12 6.0015 12C9.30975 12 12 9.30825 12 6C12 2.69175 9.30975 0 6.0015 0Z" fill="#4CAF50" />
                            <path d="M9.49276 8.47264C9.34801 8.88139 8.77351 9.22039 8.31526 9.31939C8.00176 9.38614 7.59226 9.43939 6.21376 8.86789C4.45051 8.13739 3.31501 6.34564 3.22651 6.22939C3.14176 6.11314 2.51401 5.28064 2.51401 4.41964C2.51401 3.55864 2.95126 3.13939 3.12751 2.95939C3.27226 2.81164 3.51151 2.74414 3.74101 2.74414C3.81526 2.74414 3.88201 2.74789 3.94201 2.75089C4.11826 2.75839 4.20676 2.76889 4.32301 3.04714C4.46776 3.39589 4.82026 4.25689 4.86226 4.34539C4.90501 4.43389 4.94776 4.55389 4.88776 4.67014C4.83151 4.79014 4.78201 4.84339 4.69351 4.94539C4.60501 5.04739 4.52101 5.12539 4.43251 5.23489C4.35151 5.33014 4.26001 5.43214 4.36201 5.60839C4.46401 5.78089 4.81651 6.35614 5.33551 6.81814C6.00526 7.41439 6.54826 7.60489 6.74251 7.68589C6.88726 7.74589 7.05976 7.73164 7.16551 7.61914C7.29976 7.47439 7.46551 7.23439 7.63426 6.99814C7.75426 6.82864 7.90576 6.80764 8.06476 6.86764C8.22676 6.92389 9.08401 7.34764 9.26026 7.43539C9.43651 7.52389 9.55276 7.56589 9.59551 7.64014C9.63751 7.71439 9.63751 8.06314 9.49276 8.47264Z" fill="#FAFAFA" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1_464">
                                <rect width="12" height="12" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <a href="/">
                        <p>Напишите нам в WhatsApp</p>
                    </a>
                </div>
                <div class="store-info__item">
                    <a>+7 383 291 92 86</a>
                </div>
            </div>
            <div class="store-menu">
                <div class="store-menu__inner">
                    <div class="store-menu__catalog">
                        <button class="button store-menu__button">
                            <svg width="20" height="13" viewBox="0 0 20 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="20" height="3" fill="white" />
                                <rect y="5" width="20" height="3" fill="white" />
                                <rect y="10" width="20" height="3" fill="white" />
                            </svg>
                            <p>Каталог</p>
                        </button>
                    </div>
                    <form action="" class="store-menu__search">
                        <input type="search" name="" id="" placeholder="Поиск по наименованию или артикулу">
                        <button type="submit">Найти</button>
                    </form>
                    <div class="store-menu__menu">
                        <ul class="store-menu__list">
                            <li class="store-menu__item">
                            <?php if(isset($_SESSION['user']) && !empty($_SESSION['user']['name'])): ?>
        <div class="user-info">
            <span><?= htmlspecialchars($_SESSION['user']['name']) ?></span>
            <a href="auth/logout.php" class="logout-link">Выйти</a>
        </div>
    <?php else: ?>
                                    <a href="#" class="store-menu__item-inner" id="loginLink">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.8005 13.4877C15.6534 13.4877 17.2577 12.8232 18.569 11.5119C19.8798 10.2009 20.5446 8.59683 20.5446 6.74365C20.5446 4.89111 19.88 3.2868 18.5688 1.97537C17.2575 0.664581 15.6532 0 13.8005 0C11.9473 0 10.3432 0.664581 9.0322 1.97559C7.72119 3.28659 7.0564 4.8909 7.0564 6.74365C7.0564 8.59683 7.72119 10.2011 9.0322 11.5121C10.3436 12.8229 11.9479 13.4877 13.8005 13.4877ZM10.1926 3.13577C11.1985 2.12982 12.3786 1.64084 13.8005 1.64084C15.2221 1.64084 16.4024 2.12982 17.4086 3.13577C18.4145 4.14194 18.9037 5.3222 18.9037 6.74365C18.9037 8.16553 18.4145 9.34558 17.4086 10.3517C16.4024 11.3579 15.2221 11.8469 13.8005 11.8469C12.379 11.8469 11.199 11.3577 10.1926 10.3517C9.18643 9.34579 8.69723 8.16553 8.69723 6.74365C8.69723 5.3222 9.18643 4.14194 10.1926 3.13577Z" fill="#0F2438" />
                        <path d="M25.6008 21.5307C25.563 20.9851 25.4865 20.3899 25.3739 19.7614C25.2603 19.1283 25.114 18.5297 24.9388 17.9826C24.7576 17.4171 24.5117 16.8587 24.2073 16.3236C23.8918 15.7682 23.521 15.2845 23.1048 14.8866C22.6697 14.4702 22.1369 14.1355 21.5208 13.8913C20.9069 13.6484 20.2265 13.5254 19.4987 13.5254C19.2128 13.5254 18.9364 13.6426 18.4026 13.9902C18.074 14.2045 17.6897 14.4523 17.2607 14.7263C16.894 14.9601 16.3971 15.179 15.7833 15.3773C15.1845 15.571 14.5766 15.6693 13.9763 15.6693C13.3764 15.6693 12.7685 15.571 12.1693 15.3773C11.5562 15.1792 11.0591 14.9603 10.6929 14.7266C10.268 14.455 9.88348 14.2072 9.55002 13.99C9.0166 13.6424 8.74017 13.5251 8.45435 13.5251C7.72632 13.5251 7.04614 13.6484 6.4324 13.8915C5.81674 14.1353 5.28375 14.47 4.84818 14.8868C4.43204 15.285 4.06119 15.7684 3.74588 16.3236C3.44189 16.8587 3.1958 17.4169 3.01465 17.9828C2.83969 18.5299 2.69336 19.1283 2.57971 19.7614C2.46692 20.3891 2.39066 20.9844 2.35284 21.5313C2.31567 22.066 2.29688 22.6225 2.29688 23.1848C2.29688 24.6464 2.76151 25.8296 3.67773 26.7023C4.58264 27.5634 5.77979 28 7.23605 28H20.7182C22.1741 28 23.3712 27.5634 24.2763 26.7023C25.1928 25.8303 25.6574 24.6466 25.6574 23.1845C25.6572 22.6204 25.6382 22.0639 25.6008 21.5307ZM23.145 25.5135C22.5471 26.0826 21.7532 26.3592 20.718 26.3592H7.23605C6.20062 26.3592 5.4068 26.0826 4.80908 25.5137C4.22269 24.9555 3.93771 24.1935 3.93771 23.1848C3.93771 22.6601 3.95502 22.1421 3.98962 21.6447C4.02338 21.1568 4.09238 20.6209 4.1947 20.0513C4.29575 19.4889 4.42435 18.961 4.5773 18.4831C4.72406 18.0249 4.92422 17.5712 5.17245 17.1341C5.40936 16.7175 5.68195 16.3601 5.98273 16.0722C6.26407 15.8028 6.61868 15.5823 7.03653 15.417C7.42297 15.264 7.85727 15.1803 8.32874 15.1677C8.3862 15.1982 8.48853 15.2566 8.6543 15.3647C8.99161 15.5845 9.3804 15.8353 9.81021 16.1098C10.2947 16.4187 10.9189 16.6977 11.6647 16.9384C12.4271 17.1849 13.2047 17.3101 13.9765 17.3101C14.7483 17.3101 15.5261 17.1849 16.2881 16.9386C17.0345 16.6974 17.6585 16.4187 18.1436 16.1093C18.5835 15.8282 18.9614 15.5847 19.2987 15.3647C19.4645 15.2568 19.5668 15.1982 19.6243 15.1677C20.0959 15.1803 20.5302 15.264 20.9169 15.417C21.3345 15.5823 21.6891 15.803 21.9705 16.0722C22.2713 16.3599 22.5439 16.7173 22.7808 17.1343C23.0292 17.5712 23.2296 18.0251 23.3761 18.4829C23.5293 18.9614 23.6581 19.4891 23.7589 20.0511C23.8611 20.6217 23.9303 21.1579 23.964 21.645V21.6454C23.9988 22.1408 24.0164 22.6586 24.0166 23.1848C24.0164 24.1937 23.7314 24.9555 23.145 25.5135Z" fill="#0F2438" />
                    </svg>
                    <p>Войти</p>
                    </a>
                    <?php endif; ?>
                </li>
                <li class="store-menu__item">
                    <a href="/" class="store-menu__item-inner">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 26.4422C13.6014 26.4422 13.217 26.2978 12.9175 26.0355C11.7864 25.0464 10.6959 24.1169 9.73372 23.297L9.7288 23.2928C6.90792 20.8889 4.47198 18.8129 2.77709 16.7679C0.882475 14.4817 0 12.3141 0 9.94606C0 7.64534 0.788908 5.52279 2.22125 3.96911C3.67068 2.39706 5.6595 1.53125 7.82201 1.53125C9.43828 1.53125 10.9185 2.04224 12.2214 3.04989C12.8789 3.55853 13.4749 4.18103 14 4.90713C14.5253 4.18103 15.1211 3.55853 15.7788 3.04989C17.0817 2.04224 18.5619 1.53125 20.1782 1.53125C22.3404 1.53125 24.3295 2.39706 25.7789 3.96911C27.2113 5.52279 27.9999 7.64534 27.9999 9.94606C27.9999 12.3141 27.1177 14.4817 25.2231 16.7677C23.5282 18.8129 21.0925 20.8887 18.272 23.2923C17.3081 24.1135 16.2159 25.0445 15.0822 26.0359C14.7829 26.2978 14.3984 26.4422 14 26.4422ZM7.82201 3.17144C6.12307 3.17144 4.56234 3.84948 3.42693 5.0808C2.27465 6.33071 1.63998 8.05849 1.63998 9.94606C1.63998 11.9377 2.38018 13.7188 4.03982 15.7213C5.64391 17.657 8.02986 19.6902 10.7924 22.0446L10.7976 22.0488C11.7633 22.8719 12.8582 23.805 13.9976 24.8014C15.1439 23.8031 16.2404 22.8685 17.2082 22.0441C19.9705 19.6898 22.3563 17.657 23.9603 15.7213C25.6198 13.7188 26.36 11.9377 26.36 9.94606C26.36 8.05849 25.7253 6.33071 24.573 5.0808C23.4378 3.84948 21.8769 3.17144 20.1782 3.17144C18.9336 3.17144 17.7909 3.56707 16.782 4.34722C15.8828 5.04278 15.2565 5.92205 14.8893 6.53728C14.7004 6.85366 14.368 7.0425 14 7.0425C13.6319 7.0425 13.2995 6.85366 13.1107 6.53728C12.7437 5.92205 12.1173 5.04278 11.218 4.34722C10.209 3.56707 9.06636 3.17144 7.82201 3.17144Z" fill="#0F2438" />
                        </svg>
                        <p>Избранное</p>
                    </a>
                </li>
                <li class="store-menu__item">
                    <a href="/" class="store-menu__item-inner">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1_492)">
                                <path d="M10.6415 20.9294C8.69207 20.9294 7.10614 22.5154 7.10614 24.4648C7.10614 26.4141 8.69207 28.0001 10.6415 28.0001C12.5908 28.0001 14.1768 26.4141 14.1768 24.4648C14.1768 22.5154 12.5908 20.9294 10.6415 20.9294ZM10.6415 25.8789C9.86156 25.8789 9.22735 25.2446 9.22735 24.4648C9.22735 23.6849 9.86156 23.0507 10.6415 23.0507C11.421 23.0507 12.0556 23.6849 12.0556 24.4648C12.0556 25.2446 11.4214 25.8789 10.6415 25.8789Z" fill="#0F2438" stroke="white" stroke-width="0.3" />
                                <path d="M21.1062 20.9294C19.1568 20.9294 17.5709 22.5154 17.5709 24.4648C17.5709 26.4141 19.1568 28.0001 21.1062 28.0001C23.0556 28.0001 24.6415 26.4141 24.6415 24.4648C24.6415 22.5154 23.0556 20.9294 21.1062 20.9294ZM21.1062 25.8789C20.3263 25.8789 19.6921 25.2446 19.6921 24.4648C19.6921 23.6849 20.3263 23.0507 21.1062 23.0507C21.8861 23.0507 22.5203 23.6849 22.5203 24.4648C22.5203 25.2446 21.8861 25.8789 21.1062 25.8789Z" fill="#0F2438" stroke="white" stroke-width="0.3" />
                                <path d="M27.2391 6.90559C27.0376 6.65245 26.7322 6.50506 26.409 6.50506H7.83814L6.87405 1.6327C6.78956 1.20597 6.45302 0.874023 6.02487 0.795547L1.7825 0.0177841C1.20522 -0.0886374 0.653703 0.293572 0.547992 0.869812C0.442282 1.44605 0.823726 1.99861 1.40002 2.10432L4.9332 2.75198L8.04567 18.4837C8.14395 18.9804 8.57986 19.3385 9.0861 19.3385H23.9344C24.4282 19.3385 24.8564 18.9981 24.9677 18.5162L27.4424 7.80427C27.5152 7.48927 27.4403 7.15836 27.2391 6.90559ZM23.0908 17.2174H9.95716L8.25775 8.6266H25.0751L23.0908 17.2174Z" fill="#0F2438" stroke="white" stroke-width="0.3" />
                            </g>
                            <defs>
                                <clipPath id="clip0_1_492">
                                    <rect width="28" height="28" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p>Корзина</p>
                    </a>
                </li>
                </ul>
                </div>
            </div>
            </div>

        </section>
        <section class="section container">
            <div class="banner">
                <div class="banner__inner">
                    <div class="banner__item">
                        <div class="banner__body banner__body-padding">
                            <div class="banner__title">Сцепление в сборе</div>
                            <div class="banner__price">14, 499,99₽</div>
                            <button class="banner__button button" id="addToCartBtn" type="submit">
                                <img src="/image/korz-small.svg" alt="" srcset="">
                                <p>В корзину</p>
                            </button>
                        </div>
                        <div class="banner__img">
                            <img src="./image/spen.png" alt="" width="417" height="356">
                        </div>
                    </div>
                    <div class="banner__list">
                        <div class="banner__item">
                            <img src="./image/myfta.png" alt="" srcset="">
                            <div class="banner__body">
                                <div class="banner__title">Обгонная муфта<br>
                                    гидротрансформатор</div>
                                <div class="banner__price">4 430₽ <span>5 430₽</span></div>
                                <button class="banner__button button" id="addToCartBtn" type="submit">
                                    <img src="/image/korz-small.svg" alt="" srcset="">
                                </button>
                            </div>
                        </div>
                        <div class="banner__item">
                            <img src="./image/frik.png" alt="" srcset="">
                            <div class="banner__body">
                                <div class="banner__title">Комплект фрикцион<br>ных дисков</div>
                                <div class="banner__price">4 430₽ <span>5 430₽</span></div>
                                <button class="banner__button button" id="addToCartBtn" type="submit">
                                    <img src="/image/korz-small.svg" alt="" srcset="">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section container">
            <div class="offers">
                <h3 class="offers__header-title">Мы предлогаем купить</h3>
                <div class="offers-card">
                    <div class="offers-card-item">
                        <div class="offers-card__title">
                            <h3>Масла</h3>
                            <div class="offers-card__subtitle">
                                <p>Трансмиссионное масло;<br>
                                    присалка в масло акпп</p>
                            </div>
                        </div>
                        <div class="offers-card__image">
                            <img src="./image/maslo.png" alt="" width="154" height="202">
                        </div>
                    </div>
                    <div class="offers-card-item">
                        <div class="offers-card__title">
                            <h3>Фильтры</h3>
                            <div class="offers-card__subtitle">
                                <p>Масляный фильтр;<br>
                                    фильтр воздушный</p>
                            </div>
                        </div>
                        <div class="offers-card__image">
                            <img src="./image/filter.png" alt="" width="154" height="202">
                        </div>
                    </div>
                    <div class="offers-card-item">
                        <div class="offers-card__title">
                            <h3>Радиаторы</h3>
                            <div class="offers-card__subtitle">
                                <p>Дополнительные<br>
                                    радиаторы</p>
                            </div>
                        </div>
                        <div class="offers-card__image">
                            <img src="./image/radiato.png" alt="" width="154" height="202">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section container">
            <div class="catalog">
                <button class="catalog__button button">
                    Подборки товаров
                </button>
                <div class="catalog__card">
                <?php foreach ($products as $product): ?>
        <div class="catalog__card-item">
            <?php if (!empty($product['image_path'])): ?>
                <img src="/<?= htmlspecialchars($product['image_path']) ?>" 
                     alt="<?= htmlspecialchars($product['name']) ?>">
            <?php endif; ?>
            <div class="catalog__card-title">
                <p><?= htmlspecialchars($product['name']) ?></p>
            </div>
            <div class="catalog__card-price">
                <?= number_format($product['price'], 2, '.', ' ') ?>₽
                <?php if (!empty($product['old_price'])): ?>
                    <span><?= number_format($product['old_price'], 2, '.', ' ') ?>₽</span>
                <?php endif; ?>
            </div>
            <button class="catalog__card-button button add-to-cart" data-product-id="<?= $product['id'] ?>">
                <img src="/image/korz-small.svg" alt="">
                <p>В корзину</p>
            </button>
        </div>
    <?php endforeach; ?>
</div>
                </div>
            </div>
        </section>

        <div class="notification" id="notification">
            <div class="notification-content">
                Товар добавлен в корзину<br>
                <span class="product-name">Перейдите в корзину</span>
            </div>
        </div>
        <div class="modal" id="authModal">
  <div class="modal-content">
    <span class="close">&times;</span>
    
    <div class="auth-tabs">
      <button class="tab-btn active" data-tab="login">Вход</button>
      <button class="tab-btn" data-tab="register">Регистрация</button>
    </div>
    
    <div id="login" class="auth-form active">
    <h3>Вход в аккаунт</h3>
    <?php if(isset($_SESSION['login_error'])): ?>
        <div class="alert alert-error" style="position: static; margin-bottom: 15px;">
            <?= $_SESSION['login_error']; unset($_SESSION['login_error']); ?>
        </div>
    <?php endif; ?>
      <form action="auth/login.php" method="POST">
        <div class="form-group">
          <label for="loginEmail">Email</label>
          <input type="email" id="loginEmail" name="email" required>
        </div>
        <div class="form-group">
          <label for="loginPassword">Пароль</label>
          <input type="password" id="loginPassword" name="password" required>
        </div>
        <button type="submit" class="button">Войти</button>
      </form>
    </div>
    
    <div id="register" class="auth-form">
      <h3>Создать аккаунт</h3>
      <form action="auth/register.php" method="POST">
        <div class="form-group">
          <label for="regName">Имя</label>
          <input type="text" id="regName" name="name" required>
        </div>
        <div class="form-group">
          <label for="regEmail">Email</label>
          <input type="email" id="regEmail" name="email" required>
        </div>
        <div class="form-group">
          <label for="regPassword">Пароль</label>
          <input type="password" id="regPassword" name="password" required>
        </div>
        <div class="form-group">
          <label for="regConfirmPassword">Подтвердите пароль</label>
          <input type="password" id="regConfirmPassword" name="confirm_password" required>
        </div>
        <button type="submit" class="button">Зарегистрироваться</button>
      </form>
    </div>
  </div>
</div>

<?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-error">
        <?= $_SESSION['error'] ?>
        <?php unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<?php if(isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['success'] ?>
        <?php unset($_SESSION['success']); ?>
    </div>
<?php endif; ?>

    </main>

    <script src="script.js"></script>
</body>

</html>