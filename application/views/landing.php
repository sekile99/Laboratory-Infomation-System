<!DOCTYPE html>
<html>

<head>
    <title>Laboratory Information System</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico');  ?>">
    <style type="text/css">
    html {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: 'Open Sans', 'Helvetica Neue', Helvetica, sans-serif;
        font-size: 100%;
        line-height: 1.45;
        color: #141414;
    }

    a {
        text-decoration: none;
    }

    a:hover {
        text-decoration: none;
    }

    img {
        max-width: 100%;
    }

    .btn {
        display: inline-block;
        margin: 1rem 0;
        color: white;
        font-weight: 500;
        font-size: 1.3rem;
        background: #1c262b;
        letter-spacing: .02em;
        border: none;
        border-radius: 5px;
        padding: .8rem 1rem .9rem;
        text-shadow: 0 1px rgba(0, 0, 0, 0.3);
        box-shadow: 0 0 2px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 43.75em) {
        .btn {
            padding: .5rem .7rem .6rem;
            font-size: 1rem;
        }
    }

    .btn:hover {
        background: #26343a;
        color: #fff;
    }

    .btn:focus,
    .btn:active,
    .btn:focus:active {
        background: #12181c;
        border-color: #12181c;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.5) inset;
    }

    .container {
        margin: 0 auto;
        width: 90%;
        max-width: 900px;
    }

    header {
        color: white;
        background: #1c262b;
        padding: 1rem 0;
        /* Top padding for the DIT logo*/
        text-align: center;
        position: relative;
        z-index: 1;
        overflow: hidden;
    }

    @media (max-width: 43.75em) {
        header {
            padding: 2rem 0;
        }
    }

    header h1 {
        font-size: 3rem;
        margin: 0 0 1rem;
    }

    @media (max-width: 43.75em) {
        header h1 {
            font-size: 2rem;
        }
    }

    header h2 {
        font-weight: 300;
        font-size: 1.5rem;
        margin: 0 0 1rem;
    }

    @media (max-width: 43.75em) {
        header h2 {
            font-size: 1.5rem;
        }
    }

    section {
        background: #fff;
        color: #1c262b;
        padding: 3.5rem 0;
    }

    @media (max-width: 43.75em) {
        section {
            padding: 2rem 0;
        }
    }

    section.section--primary {
        background: #1c262b;
        color: #fff;
    }

    section.section--primary--alt {
        background: #424c52;
        color: #fff;
    }

    section.section--primary--light {
        background: rgba(28, 38, 43, 0.1);
    }

    section.section--grey {
        background: #1c262b;
        color: #fff;
    }

    section.section--grey--light {
        background: #29363e;
        color: #fff;
    }

    section h3 {
        text-align: center;
        font-size: 2rem;
        font-weight: 300;
        margin: 0 0 1rem;
    }

    @media (max-width: 43.75em) {
        section h3 {
            font-size: 1.5rem;
        }
    }

    section li {
        font-size: 1.2rem;
        font-weight: 300;
    }

    section p {
        font-size: 1.2rem;
        font-weight: 300;
    }

    .col,
    .col-7,
    .col-3,
    .col-5 {
        margin: 0 1.5%;
        display: inline-block;
        vertical-align: top;
    }

    .col-7 {
        width: 64%;
    }

    @media (max-width: 43.75em) {
        .col-7 {
            width: 100%;
            margin: 0;
        }
    }

    .col-3 {
        width: 29%;
    }

    @media (max-width: 43.75em) {
        .col-3 {
            width: 100%;
            margin: 0;
        }
    }

    .col-5 {
        width: 30%;
    }

    @media (max-width: 34.375em) {
        .col-5 {
            width: 60%;
            margin: 0;
        }
    }

    .details {
        text-align: left;
    }

    .details h3 {
        font-size: 2rem;
        text-align: left;
    }

    @media (max-width: 43.75em) {
        .details-img--ball {
            height: 200px;
            width: auto;
            margin: 0 auto;
        }
    }

    .features {
        text-align: center;
        padding: 1rem;
    }

    .features:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    @media (max-width: 43.75em) {
        .features {
            width: 100%;
            margin: 0;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .features:last-child {
            border: none;
        }
    }

    .features i {
        font-size: 4rem;
        margin: 0 0 2rem 0;
    }

    @media (max-width: 43.75em) {
        .features i {
            font-size: 1.5rem;
            width: 2rem;
            text-align: center;
            margin: 0 0 1rem 0;
            float: left;
        }
    }

    .features p {
        margin: 0 0 1rem 0;
        font-size: 1rem;
    }

    @media (max-width: 43.75em) {
        .features p {
            margin-left: 3rem;
        }
    }

    blockquote {
        position: relative;
        margin: 0;
        padding: 0;
        text-align: center;
    }

    blockquote:before {
        display: inline-block;
        color: #1c262b;
        font-size: 2rem;
        content: '\201C';
    }

    blockquote p {
        margin: 0;
        display: inline;
        font-size: 1.5rem;
    }

    @media (max-width: 43.75em) {
        blockquote p {
            font-size: 1.2rem;
        }
    }

    blockquote cite {
        font-size: 1rem;
        display: block;
        margin: .5rem 0 0 1.2rem;
        text-style: italic;
    }

    @media (max-width: 43.75em) {
        blockquote cite {
            font-size: .8rem;
        }
    }

    blockquote cite:before {
        content: '–';
    }

    footer {
        background: #2d2b2a;
        color: #fff;
        padding: 2rem 0;
        text-align: center;
        font-size: .8rem;
        color: rgba(255, 255, 255, 0.4);
    }

    footer ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    footer ul li {
        display: inline-block;
    }

    footer ul li a {
        display: block;
        padding: .4rem .7rem;
        font-size: .9rem;
        text-decoration: none;
        color: rgba(255, 255, 255, 0.7);
    }

    footer ul li a:hover {
        color: white;
    }

    .text--center {
        text-align: center;
    }

    .text--left {
        text-align: left;
    }

    .bg-image {
        background: #1c262b;
        text-align: center;
        position: relative;
        z-index: 1;
        overflow: hidden;
    }

    .bg-image:before {
        content: '';
        display: block;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        background: #333 url("<?php echo base_url('assets/images/lab.jpg'); ?>") no-repeat top center;
        background-size: cover;
        background-attachment: fixed;
        -webkit-filter: blur(5px);
        filter: blur(5px);
        opacity: .8;
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }

    .bg-image.bg-image-2:before {
        opacity: .5;
        background-image: url("<?php echo base_url('assets/images/lab.jpg'); ?>");
        background-position: center center;
    }
    </style>
</head>

<body>
    <header class="bg-image">
        <img src="<?php echo base_url('assets/images/dit.jpg'); ?>">
        <div class="container">
            <h1>Laboratory Information System</h1>
            <h3>for</h3>
            <h2>Laboratory Technician | Lecturers | Students</h2>
            <a href="<?php echo base_url('login'); ?>" class="btn btn-transparent">Learn More</a>
        </div>
    </header>

    <section class="section--primary--alt">
        <div class="container">
            <h3>OBJECTIVES</h3>
            <p>The aim of this project is to develop a department computerized information information system for
                managing laboratory, information, facilities and chemicals.</p>
        </div>
    </section>

    <section class="section--primary--alt bg-image bg-image-2">
        <div class="container text--center">
            <h3>SIGNIFICANCE OF THIS PROJECT</h3>
            <div class="col-5 text--left">
                <ul>
                    <li>proper arrangement of facilities and chemicals for all laboratory users.</li>
                    <li>increase the quality and focus of keeping all material facilities, equipment and chemicals in
                        check.</li>
                    <li>Increases operation efficiency of department.</li>
                </ul>
            </div>
            <div class="col-5 text--left">
                <ul>
                    <li>keep track of the information and time for every laboratory requirements embedded and rooted
                        from the laboratory.</li>
                    <li>Prevent corrective maintenance.</li>
                </ul>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>All rights reserved &copy; 2020</p>
        </div>
    </footer>
</body>

</html>