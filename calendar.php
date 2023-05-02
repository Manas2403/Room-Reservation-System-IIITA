<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Room Reservation System IIITA</title>
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <script src="_js/modernizr.js"></script>
    <link rel="icon" type="image/png" href="images/iiita.png" />
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css" />
    <?php
    include("controller/fetchList.php");
    session_start();
    ?>
    <style>
    #calendar {
        max-width: 1100px;
        margin: 100px auto;
    }

    .header__overlay-close {
        position: absolute;
        display: block;
        width: 45px;
        height: 45px;
        top: 21px;
        left: 50%;
        margin-left: -23px;
        font: 0/0 a;
        text-shadow: none;
        color: transparent;
    }

    .header__overlay-close::before,
    .header__overlay-close::after {
        content: "";
        position: absolute;
        display: inline-block;
        width: 2px;
        height: 20px;
        top: 12px;
        left: 22px;
        background-color: #000000;
    }

    .header__overlay-close::before {
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .header__overlay-close::after {
        -webkit-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }

    .header__nav-wrap {
        display: inline-block;
    }

    .header__nav-wrap a {
        color: rgba(0, 0, 0, 0.6);
    }

    .header__nav-wrap .header__nav-heading {
        font-family: "Nunito Sans", sans-serif;
        font-weight: 800;
        font-size: 1.5rem;
        line-height: 1.2;
        color: #111860;
        text-transform: uppercase;
        letter-spacing: 0.3rem;
        margin-top: 8.4rem;
        text-align: center;
    }

    .header__nav-wrap .header__nav-heading,
    .header__nav-wrap .close-mobile-menu {
        display: none;
    }

    .header__nav {
        list-style: none;
        margin: 0;
        padding: 0;
        font-family: "Nunito Sans", sans-serif;
        font-weight: 600;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 2px;
        line-height: 78px;
    }

    .header__nav li {
        display: inline-block;
        position: relative;
        padding: 0 1.5rem;
    }

    .header__nav li.has-children {
        padding-right: 3.3rem;
    }

    .header__nav li a {
        display: block;
        color: rgba(0, 0, 0, 0.6);
        -webkit-transition: color 0.3s ease-in-out;
        transition: color 0.3s ease-in-out;
    }

    .header__nav li.has-children>a::after {
        border-bottom: 1px solid rgba(0, 0, 0, 0.5);
        border-right: 1px solid rgba(0, 0, 0, 0.5);
        content: "";
        display: block;
        height: 5px;
        width: 5px;
        margin-top: -3px;
        pointer-events: none;
        position: absolute;
        right: 1.8rem;
        top: 50%;
        -webkit-transform-origin: 66% 66%;
        -ms-transform-origin: 66% 66%;
        transform-origin: 66% 66%;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .header__nav li:hover li,
    .header__nav li:focus li {
        background: transparent;
    }

    .header__nav li:hover>a,
    .header__nav li:focus>a {
        color: #000000;
    }

    .header__nav li.current>a {
        color: #fad02c;
    }

    .header__nav li ul {
        position: absolute;
        top: 100%;
        left: 0;
        font-size: 15px;
        font-weight: 400;
        margin: 0;
        padding: 1.8rem 0;
        background: white;
        border-radius: 0 0 3px 3px;
        z-index: 500;
        -webkit-transform: translate3d(0, 15px, 0);
        -ms-transform: translate3d(0, 15px, 0);
        transform: translate3d(0, 15px, 0);
        -webkit-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
        opacity: 0;
        visibility: hidden;
    }

    .header__nav li ul ul {
        position: absolute;
        top: 0;
        left: 100%;
        left: calc(100% + 1px);
        border-radius: 0 0 3px 3px;
        padding-top: 1.2rem;
    }

    .header__nav li ul li {
        display: block;
        text-align: left;
        padding: 0;
        margin: 0;
        min-height: 33px;
        width: 100%;
    }

    .header__nav li ul li a {
        display: block;
        white-space: nowrap;
        padding: 7.5px 3rem 7.5px 2rem;
        font-family: "Nunito Sans", sans-serif;
        text-transform: none;
        letter-spacing: 0;
        line-height: 18px;
        color: #fad02c;
    }

    .header__nav li ul li a:hover,
    .header__nav li ul li a:focus {
        color: #fad02c;
    }

    .header__nav li:hover>ul {
        border-radius: 1rem;
        opacity: 1;
        visibility: visible;
        -webkit-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    /* ------------------------------------------------------------------- 
            * responsive:
            * header
            * ------------------------------------------------------------------- */
    @media only screen and (max-width: 1200px) {
        .header__logo {
            left: 30px;
        }

        .header__logo img {
            width: 60px;
            height: 60px;
        }

        .header__search-trigger {
            right: 30px;
        }

        .header__nav {
            font-size: 11px;
        }

        .header__nav>li {
            padding: 0 1rem;
        }

        .header__nav>li.has-children {
            padding-right: 2.3rem;
        }

        .header__nav>li.has-children>a::after {
            right: 1.2rem;
        }
    }

    @media only screen and (max-width: 1000px) {
        .header__logo {
            left: 20px;
        }

        .header__search-trigger {
            right: 20px;
        }
    }

    @media only screen and (max-width: 900px) {
        .header__logo {
            left: 50%;
            -webkit-transform: translate3d(-50%, 0, 0);
            -ms-transform: translate3d(-50%, 0, 0);
            transform: translate3d(-50%, 0, 0);
        }

        .header__logo img {
            width: 60px;
            height: 60px;
        }

        .header__search-trigger {
            right: 30px;
        }

        .header__search-trigger::before {
            display: none;
        }

        .header__search-form::after {
            font-size: 1.5rem;
        }

        .header__search-form input[type="search"] {
            max-width: none;
            width: 75%;
            font-size: 4.2rem;
        }

        .header__toggle-menu {
            display: block;
        }

        .header__nav-wrap {
            background-color: #ffffff;
            margin: 0;
            border: none;
            opacity: 0;
            visibility: hidden;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 600;
            overflow-y: auto;
        }

        .header__nav-wrap .header__nav-heading,
        .header__nav-wrap .close-mobile-menu {
            display: block;
        }

        .header__nav {
            margin: 6rem 7rem 3rem 7rem;
            font-family: "Nunito Sans", sans-serif;
            font-weight: 400;
            font-size: 18px;
            text-transform: none;
            letter-spacing: 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .header__nav>li {
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .header__nav>li a {
            line-height: 60px;
            color: #000000;
        }

        .header__nav li {
            display: block;
            padding: 0;
            text-align: left;
        }

        .header__nav li ul {
            display: none;
            position: static;
            background-color: transparent;
            padding: 0 0 1.8rem 0;
            -webkit-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
            opacity: 1;
            visibility: visible;
            -webkit-transition: none !important;
            transition: none !important;
        }

        .header__nav li.has-children>a::after {
            top: 27px;
            border-bottom: 1px solid #000000;
            border-right: 1px solid #000000;
        }

        .header__nav li.has-children>a.sub-menu-is-open::after {
            -webkit-transform: rotate(225deg);
            -ms-transform: rotate(225deg);
            transform: rotate(225deg);
        }

        .header__nav li:hover>a,
        .header__nav li:focus>a {
            color: #111860;
        }

        .header__nav li.current>a {
            color: #111860;
            font-weight: 700;
        }

        .header__nav li ul li a {
            padding: 7.5px 1.5rem 7.5px 1.5rem;
            color: black;
        }

        .header__nav li ul li a:hover,
        .header__nav li ul li a:focus {
            color: #111860;
        }

        body.nav-wrap-is-visible {
            overflow: hidden;
        }

        .nav-wrap-is-visible .header__nav-wrap {
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            opacity: 1;
            visibility: visible;
        }
    }

    @media only screen and (max-width: 800px) {
        .header__nav {
            margin: 6rem 6rem 3rem 6rem;
        }
    }

    @media only screen and (max-width: 600px) {
        .header__logo img {
            width: 60px;
            height: 60px;
        }

        .header__search-form input[type="search"] {
            font-size: 3.4rem;
        }

        .header__nav {
            font-size: 17px;
        }
    }

    @media only screen and (max-width: 400px) {
        .header__logo img {
            width: 60px;
            height: 60px;
        }

        .header__search-form input[type="search"] {
            font-size: 2.6rem;
        }

        .header__nav {
            margin: 6rem 4.2rem 3rem 4.2rem;
        }
    }

    /* ------------------------------------------------------------------- 
            * ## main navigation on large screens
            * ------------------------------------------------------------------- */
    @media only screen and (min-width: 901px) {

        .header__nav li.has-children:hover>a::after,
        .header__nav li.has-children:focus>a::after {
            -webkit-transform: rotate(225deg);
            -ms-transform: rotate(225deg);
            transform: rotate(225deg);
        }

        .header__nav li ul {
            display: block !important;
        }
    }

    .s-content__entry-nav {
        margin-top: 12rem;
        margin-bottom: 6rem;
        padding: 6.6rem 0 9rem;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .s-content__entry-nav::before {
        content: "";
        display: block;
        height: 100%;
        width: 1px;
        background-color: rgba(0, 0, 0, 0.1);
        position: absolute;
        left: 50%;
        top: 0;
    }

    .s-content__nav span {
        display: block;
        font-family: "Nunito Sans", sans-serif;
        font-weight: 600;
        font-size: 1.4rem;
        line-height: 1.5;
        text-transform: uppercase;
        letter-spacing: 0.25rem;
        color: rgba(0, 0, 0, 0.5);
        margin-bottom: 1.2rem;
    }

    .s-content__nav a {
        font-family: "Libre Baskerville", serif;
        font-weight: 700;
        font-size: 3rem;
        line-height: 1.5;
        color: #000000;
    }

    .s-content__nav a:hover,
    .s-content__nav a:focus {
        color: #111860;
    }

    .s-content__prev,
    .s-content__next {
        width: 50%;
    }

    .s-content__prev {
        float: left;
        text-align: right;
        padding: 0 60px 0 20px;
    }

    .s-content__next {
        float: right;
        padding: 0 20px 0 60px;
    }

    /* ------------------------------------------------------------------- 
            * responsive:
            * blog styles and blog components
            * ------------------------------------------------------------------- */
    @media only screen and (max-width: 1200px) {
        .entry__header {
            padding: 0 6rem;
        }

        .entry__author-name,
        .entry__author-desc {
            float: none;
            width: auto;
            padding: 0;
        }

        .s-content__entry-nav .s-content__nav {
            max-width: 1200px;
        }
    }

    @media only screen and (max-width: 1000px) {
        .entry__header {
            padding: 0 5rem;
        }
    }

    @media only screen and (max-width: 900px) {

        .entry__media,
        .entry__header {
            padding-left: 15px;
            padding-right: 15px;
        }

        .s-content__nav a {
            font-size: 2.8rem;
        }
    }

    @media only screen and (max-width: 800px) {
        .entry__media {
            margin-bottom: 6rem;
        }

        .entry__author {
            padding: 3.6rem 3.5rem 3.6rem 12rem;
        }

        .entry__author img {
            width: 6rem;
            height: 6rem;
            left: 3.5rem;
        }

        .entry__taxonomies>div {
            float: none;
            width: auto;
            padding-right: 0;
        }

        .entry__taxonomies>div:first-child {
            margin-bottom: 3rem;
        }

        .s-content__entry-nav {
            padding: 6.6rem 0 4.8rem;
        }

        .s-content__entry-nav::before {
            display: none;
        }

        .s-content__entry-nav .s-content__nav {
            max-width: 550px;
        }

        .s-content__prev,
        .s-content__next {
            width: 100%;
            float: none;
            padding: 0;
            text-align: left;
            margin-bottom: 3rem;
            text-align: center;
        }
    }

    @media only screen and (max-width: 600px) {

        .entry__media,
        .entry__header {
            padding-left: 10px;
            padding-right: 10px;
        }

        .entry__media {
            margin-bottom: 4.8rem;
        }

        .entry__header-meta {
            font-size: 1.35rem;
        }

        .entry__header-meta li {
            display: block;
        }

        .entry__author {
            text-align: center;
            padding: 4.2rem 4rem;
        }

        .entry__author img {
            position: static;
        }

        .entry__author-name {
            margin-top: 1.2rem;
        }

        .s-content__entry-nav .s-content__nav {
            max-width: 460px;
        }

        .s-content__nav span {
            font-size: 1.35rem;
        }

        .s-content__nav a {
            font-size: 2.8rem;
        }
    }

    @media only screen and (max-width: 500px) {
        .s-content__entry-nav {
            margin-top: 9rem;
        }

        .s-content__entry-nav .s-content__nav {
            max-width: 400px;
        }

        .s-content__nav a {
            font-size: 2.6rem;
        }
    }

    @media only screen and (max-width: 400px) {

        .entry__media,
        .entry__header {
            padding-left: 0;
            padding-right: 0;
        }

        .entry__author {
            padding: 3.6rem 2.5rem;
        }

        .s-content__nav a {
            font-size: 2.4rem;
        }
    }

    .s-header {
        background-color: #ffffff;
        text-align: center;
        height: 78px;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
    }

    /* -------------------------------------------------------------------
            * ## header logo
            * ------------------------------------------------------------------- */
    .header__logo {
        display: inline-block;
        margin: 3px 0 0 0;
        padding: 0;
        z-index: 501;
        position: absolute;
        top: 50%;
        left: 40px;
    }

    .header__logo a {
        display: block;
        outline: 0;
        border: none;
        margin: 0;
        padding: 0;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
        -webkit-transform: translate3d(0, -50%, 0);
        -ms-transform: translate3d(0, -50%, 0);
        transform: translate3d(0, -50%, 0);
    }

    .header__logo img {
        width: 60px;
        height: 60px;
    }

    /* -------------------------------------------------------------------
* ## header search trigger
* ------------------------------------------------------------------- */
    .header__search-trigger {
        height: 18px;
        min-width: 18px;
        background-image: url(../images/icons/icon-search.svg);
        background-repeat: no-repeat;
        background-position: right center;
        background-size: contain;
        -webkit-transform: translate3d(0, -50%, 0);
        -ms-transform: translate3d(0, -50%, 0);
        transform: translate3d(0, -50%, 0);
        position: absolute;
        top: 50%;
        right: 50px;
    }

    .header__search-trigger::before {
        font-family: "Nunito Sans", sans-serif;
        font-weight: 600;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 2px;
        line-height: 18px;
        content: "Search";
        display: block;
        color: #000000;
        float: left;
        padding-right: 33px;
    }

    /* ------------------------------------------------------------------- 
* ## header-search
* ------------------------------------------------------------------- */
    .header__search {
        display: block;
        text-align: center;
        background-color: #ffffff;
        opacity: 0;
        visibility: hidden;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
        z-index: 900;
    }

    .header__search-form {
        width: 100%;
        -webkit-transform: translate3d(0, -50%, 0);
        -ms-transform: translate3d(0, -50%, 0);
        transform: translate3d(0, -50%, 0);
        position: absolute;
        top: 50%;
    }

    .header__search-form label {
        color: #000000;
    }

    .header__search-form::after {
        content: "Press Enter to begin your search.";
        display: block;
        letter-spacing: 0.6px;
        font-size: 1.6rem;
        margin-top: 3rem;
        text-align: center;
        color: rgba(0, 0, 0, 0.5);
    }

    .header__search-form input[type="search"] {
        background-color: transparent;
        color: #000000;
        height: auto;
        width: 100%;
        font-family: "Nunito Sans", sans-serif;
        font-weight: 700;
        font-size: 6rem;
        line-height: 1.5;
        border: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1) !important;
        max-width: 680px;
        padding-top: 0.6rem !important;
        padding-bottom: 0.6rem !important;
        margin: 0 auto;
        text-align: center;
    }

    .header__search-form input[type="search"]::-webkit-input-placeholder {
        /* WebKit, Blink, Edge */
        color: #000000;
    }

    .header__search-form input[type="search"]:-moz-placeholder {
        /* Mozilla Firefox 4 to 18 */
        color: #000000;
        opacity: 1;
    }

    .header__search-form input[type="search"]::-moz-placeholder {
        /* Mozilla Firefox 19+ */
        color: #000000;
        opacity: 1;
    }

    .header__search-form input[type="search"]:-ms-input-placeholder {
        /* Internet Explorer 10-11 */
        color: #000000;
    }

    .header__search-form input[type="search"]::-ms-input-placeholder {
        /* Microsoft Edge */
        color: #000000;
    }

    .header__search-form input[type="search"]::placeholder {
        /* Most modern browsers support this now. */
        color: #000000;
    }

    .header__search-form input[type="search"].placeholder {
        color: #000000 !important;
    }

    .header__search-form input[type="search"]:focus {
        outline: none;
    }

    .header__search-form input[type="submit"] {
        display: none;
    }

    body.search-is-visible {
        overflow: hidden;
    }

    .search-is-visible .header__search {
        opacity: 1;
        visibility: visible;
    }

    /* ------------------------------------------------------------------- 
* ## header-toggle
* ------------------------------------------------------------------- */
    .header__toggle-menu {
        display: none;
        width: 40px;
        height: 40px;
        -webkit-transform: translate3d(0, -50%, 0);
        -ms-transform: translate3d(0, -50%, 0);
        transform: translate3d(0, -50%, 0);
        position: absolute;
        top: 50%;
        left: 20px;
    }

    .header__toggle-menu span {
        display: block;
        width: 22px;
        height: 2px;
        margin-top: -1px;
        background-color: #000000;
        -webkit-transition: background 0.2s ease-in-out;
        transition: background 0.2s ease-in-out;
        font: 0/0 a;
        text-shadow: none;
        color: transparent;
        position: absolute;
        right: 9px;
        top: 50%;
        bottom: auto;
        left: auto;
    }

    .header__toggle-menu span::before,
    .header__toggle-menu span::after {
        content: "";
        width: 100%;
        height: 100%;
        background-color: inherit;
        position: absolute;
        left: 0;
    }

    .header__toggle-menu span::before {
        top: -8px;
    }

    .header__toggle-menu span::after {
        bottom: -8px;
    }

    /* -------------------------------------------------------------------
* ## main navigation
* ------------------------------------------------------------------- */
    .header__nav-wrap {
        display: inline-block;
    }

    .header__nav-wrap a {
        color: rgba(0, 0, 0, 0.6);
    }

    .header__nav-wrap .header__nav-heading {
        font-family: "Nunito Sans", sans-serif;
        font-weight: 800;
        font-size: 1.5rem;
        line-height: 1.2;
        color: #111860;
        text-transform: uppercase;
        letter-spacing: 0.3rem;
        margin-top: 8.4rem;
        text-align: center;
    }

    .header__nav-wrap .header__nav-heading,
    .header__nav-wrap .close-mobile-menu {
        display: none;
    }

    .header__nav {
        list-style: none;
        margin: 0;
        padding: 0;
        font-family: "Nunito Sans", sans-serif;
        font-weight: 600;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 2px;
        line-height: 78px;
    }

    .header__nav li {
        display: inline-block;
        position: relative;
        padding: 0 1.5rem;
    }

    .header__nav li.has-children {
        padding-right: 3.3rem;
    }

    .header__nav li a {
        display: block;
        color: rgba(0, 0, 0, 0.6);
        -webkit-transition: color 0.3s ease-in-out;
        transition: color 0.3s ease-in-out;
    }

    .header__nav li.has-children>a::after {
        border-bottom: 1px solid rgba(0, 0, 0, 0.5);
        border-right: 1px solid rgba(0, 0, 0, 0.5);
        content: "";
        display: block;
        height: 5px;
        width: 5px;
        margin-top: -3px;
        pointer-events: none;
        position: absolute;
        right: 1.8rem;
        top: 50%;
        -webkit-transform-origin: 66% 66%;
        -ms-transform-origin: 66% 66%;
        transform-origin: 66% 66%;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .header__nav li:hover li,
    .header__nav li:focus li {
        background: transparent;
    }

    .header__nav li:hover>a,
    .header__nav li:focus>a {
        color: #000000;
    }

    .header__nav li.current>a {
        color: #fad02c;
    }

    .header__nav li ul {
        position: absolute;
        top: 100%;
        left: 0;
        font-size: 15px;
        font-weight: 400;
        margin: 0;
        padding: 1.8rem 0;
        background: white;
        border-radius: 0 0 3px 3px;
        z-index: 500;
        -webkit-transform: translate3d(0, 15px, 0);
        -ms-transform: translate3d(0, 15px, 0);
        transform: translate3d(0, 15px, 0);
        -webkit-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
        opacity: 0;
        visibility: hidden;
    }

    .header__nav li ul ul {
        position: absolute;
        top: 0;
        left: 100%;
        left: calc(100% + 1px);
        border-radius: 0 0 3px 3px;
        padding-top: 1.2rem;
    }

    .header__nav li ul li {
        display: block;
        text-align: left;
        padding: 0;
        margin: 0;
        min-height: 33px;
        width: 100%;
    }

    .header__nav li ul li a {
        display: block;
        white-space: nowrap;
        padding: 7.5px 3rem 7.5px 2rem;
        font-family: "Nunito Sans", sans-serif;
        text-transform: none;
        letter-spacing: 0;
        line-height: 18px;
        color: #fad02c;
    }

    .header__nav li ul li a:hover,
    .header__nav li ul li a:focus {
        color: #fad02c;
    }

    .header__nav li:hover>ul {
        border-radius: 1rem;
        opacity: 1;
        visibility: visible;
        -webkit-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    /* ------------------------------------------------------------------- 
* responsive:
* header
* ------------------------------------------------------------------- */
    @media only screen and (max-width: 1200px) {
        .header__logo {
            left: 30px;
        }

        .header__logo img {
            width: 60px;
            height: 60px;
        }

        .header__search-trigger {
            right: 30px;
        }

        .header__nav {
            font-size: 11px;
        }

        .header__nav>li {
            padding: 0 1rem;
        }

        .header__nav>li.has-children {
            padding-right: 2.3rem;
        }

        .header__nav>li.has-children>a::after {
            right: 1.2rem;
        }
    }

    @media only screen and (max-width: 1000px) {
        .header__logo {
            left: 20px;
        }

        .header__search-trigger {
            right: 20px;
        }
    }

    @media only screen and (max-width: 900px) {
        .header__logo {
            left: 50%;
            -webkit-transform: translate3d(-50%, 0, 0);
            -ms-transform: translate3d(-50%, 0, 0);
            transform: translate3d(-50%, 0, 0);
        }

        .header__logo img {
            width: 60px;
            height: 60px;
        }

        .header__search-trigger {
            right: 30px;
        }

        .header__search-trigger::before {
            display: none;
        }

        .header__search-form::after {
            font-size: 1.5rem;
        }

        .header__search-form input[type="search"] {
            max-width: none;
            width: 75%;
            font-size: 4.2rem;
        }

        .header__toggle-menu {
            display: block;
        }

        .header__nav-wrap {
            background-color: #ffffff;
            margin: 0;
            border: none;
            opacity: 0;
            visibility: hidden;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 600;
            overflow-y: auto;
        }

        .header__nav-wrap .header__nav-heading,
        .header__nav-wrap .close-mobile-menu {
            display: block;
        }

        .header__nav {
            margin: 6rem 7rem 3rem 7rem;
            font-family: "Nunito Sans", sans-serif;
            font-weight: 400;
            font-size: 18px;
            text-transform: none;
            letter-spacing: 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .header__nav>li {
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .header__nav>li a {
            line-height: 60px;
            color: #000000;
        }

        .header__nav li {
            display: block;
            padding: 0;
            text-align: left;
        }

        .header__nav li ul {
            display: none;
            position: static;
            background-color: transparent;
            padding: 0 0 1.8rem 0;
            -webkit-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
            opacity: 1;
            visibility: visible;
            -webkit-transition: none !important;
            transition: none !important;
        }

        .header__nav li.has-children>a::after {
            top: 27px;
            border-bottom: 1px solid #000000;
            border-right: 1px solid #000000;
        }

        .header__nav li.has-children>a.sub-menu-is-open::after {
            -webkit-transform: rotate(225deg);
            -ms-transform: rotate(225deg);
            transform: rotate(225deg);
        }

        .header__nav li:hover>a,
        .header__nav li:focus>a {
            color: #111860;
        }

        .header__nav li.current>a {
            color: #111860;
            font-weight: 700;
        }

        .header__nav li ul li a {
            padding: 7.5px 1.5rem 7.5px 1.5rem;
            color: black;
        }

        .header__nav li ul li a:hover,
        .header__nav li ul li a:focus {
            color: #111860;
        }

        body.nav-wrap-is-visible {
            overflow: hidden;
        }

        .nav-wrap-is-visible .header__nav-wrap {
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            opacity: 1;
            visibility: visible;
        }
    }

    @media only screen and (max-width: 800px) {
        .header__nav {
            margin: 6rem 6rem 3rem 6rem;
        }
    }

    @media only screen and (max-width: 600px) {
        .header__logo img {
            width: 60px;
            height: 60px;
        }

        .header__search-form input[type="search"] {
            font-size: 3.4rem;
        }

        .header__nav {
            font-size: 17px;
        }
    }

    @media only screen and (max-width: 400px) {
        .header__logo img {
            width: 60px;
            height: 60px;
        }

        .header__search-form input[type="search"] {
            font-size: 2.6rem;
        }

        .header__nav {
            margin: 6rem 4.2rem 3rem 4.2rem;
        }
    }
    </style>
</head>

<body id="top">
    <header class="s-header header">
        <div class="header__logo">
            <a class="logo" href="facultyhome.php">
                <img src="images/iiita.png" alt="Homepage" />
            </a>
        </div>

        <a class="header__toggle-menu" href="#0" title="Menu" style="text-decoration: none"><span>Menu</span></a>
        <nav class="header__nav-wrap">
            <h2 class="header__nav-heading h6">Navigate to</h2>

            <ul class="header__nav">
                <?php
                if ($_SESSION['userType'] != 3) {
                    if ($_SESSION['userType'] == 2) {
                        echo "<li><a href='facultyhome.php'  style='text-decoration:none'>Home</a></li>
                <li class='has-children'>
                    <a href='#0' style='text-decoration:none'>Booking</a>
                    <ul class='sub-menu'>
                        <li><a href='facultynewbookings.php' style='text-decoration:none'>New Booking</a></li>
                        <li><a href='facultyCancelBookings.php' style='text-decoration:none'>Cancel Booking</a></li>
                    </ul>
                </li>";
                    } else {
                        echo "<li><a href='adminhome.php'  style='text-decoration:none'>Home</a></li>
                        <li class='has-children'>
                            <a href='#0' style='text-decoration:none'>Booking</a>
                            <ul class='sub-menu'>
                                <li><a href='facultynewbookings.php' style='text-decoration:none'>New Booking</a></li>
                                <li><a href='adminCancelBookings.php' style='text-decoration:none'>Cancel Booking</a></li>
                            </ul>
                        </li>";
                    }
                } ?>
                <li><a href="bookinglog.php" title="" style="text-decoration:none">Booking Log</a></li>
                <li class="current"><a href="calendar.php" title="" style="text-decoration:none">Calendar</a></li>
                <?php
                if ($_SESSION['userType'] == 1) {
                    echo "<li class='has-children'>
                    <a href='#0' title=''style='text-decoration:none'>Adding</a>
                    <ul class='sub-menu'>
                        <li><a href='addDepartment.php'style='text-decoration:none'>Department</a></li>
                    <li><a href='addCourse.php'style='text-decoration:none'>Course</a></li>
                        <li><a href='addRoom.php'style='text-decoration:none'>Room</a></li>
                        <li><a href='addLocation.php'style='text-decoration:none'>Location</a></li>
                    </ul>
                </li>";
                }
                ?>
                <li class="has-children" style="vertical-align:middle">
                    <a href="#0" title="" style="text-decoration:none"><img src="./images/person-circle.svg"
                            width="32" /></a>
                    <ul class="sub-menu">
                        <li><a href="profile.php" style="text-decoration:none">Profile</a></li>
                        <li><a href="controller/logout.php" style="text-decoration:none">Logout</a></li>
                    </ul>
                </li>
            </ul>

            <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>
        </nav>
    </header>

    <div id="calendar"></div>
    <script src="_js/jquery-3.2.1.min.js"></script>
    <script src="_js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.43/moment-timezone-with-data-10-year-range.min.js">
    </script>
    <script src="./js/calendar.js"></script>

</body>

</html>