<?php
include_once('navbar.php');
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Programming Blog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="main.css">
  <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
  <script src="script.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="./Js/jquery.scrollUp.min.js"></script>
  <script>
    $(document).ready(function() {
      var target = $(location).attr("hash");
      var offset = ($(this).attr('data-offset') ? $(this).attr('data-offset') : 0);
      $('body,html').animate({
        scrollTop: $(target).offset().top - offset
      }, 800);
    });

    function loginalert()
    {
      alert("Please Login to Continue");
    }
  </script>
</head>

<body>

  <div class="container-fluid con">
    <div class="content">
      <p>Welcome to Programming Blog</p>
      <div class="wrapper">
        <div class="static-txt">Let's Learn</div>
        <ul class="dynamic-txts">
          <li><span>C</span></li>
          <li><span>C++</span></li>
          <li><span>Java</span></li>
          <li><span>Javascript</span></li>
          <li><span>Php</span></li>
          <li><span>Linux</span></li>
          <li><span>Python</span></li>
          <li><span>Web Development</span></li>
        </ul>
      </div>
      <h6><br>Confused on which course to take? I have got you
        covered. Browse courses and find out the best course
        for you. Its free! this is my attempt to teach
        basics and those coding techniques to people in
        short time which took me ages to learn.
        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
        Nihil, sint minus veniam sapiente culpa accusamus
        corrupti maxime rem libero fugiat voluptates! Architecto
        saepe, eos odio quasi nostrum harum quibusdam quae
        velit quam, itaque doloribus nesciunt nobis iusto deserunt
        consectetur! Assumenda consectetur labore deleniti
        voluptas?</h6><br>
      <a href="#">Explore Courses</a>
    </div>
    <div class="images">
      <img src="images/logo.jpg" width="100%" height="100%" alt="">
    </div>
  </div>
  <div class="feedback">
    <p><a href="feedback.php">Feedback</a></p>
  </div>
  <div id="about" class="mt-4">
    <div class="w-50 container">
      <p class="mt-5 ft text-center"><span class="a">A</span>bout Us
      </p>
    </div>
    <div class="container-fluid about">
      <div class="d-flex aboutimg">
        <img src="images/about.png" class="w-100">
      </div>
      <div class="container-sm abouttext">
        <p class="">
        Welcome to our programming blog! We are a team of developers and programmers who are passionate about sharing
        our knowledge and experience with others. Our website is dedicated to providing helpful articles, tutorials, and
        resources for programmers of all levels. Whether you're a beginner just starting out or an experienced developer
        looking to expand your skills, you'll find valuable information on our site. We cover a wide range of
        programming languages and technologies, including Python, JavaScript, C++, and more. Our goal is to help you
        become a better programmer and advance in your career. Thanks for visiting and happy coding!<br><br>

        In addition to our articles and tutorials, we also offer code snippets, sample projects, and exercises to help
        you practice and apply what you learn. We believe that hands-on experience is the best way to truly understand
        and master a new skill or concept. Our blog is constantly updated with new content, so be sure to check back
        often for the latest tips, tricks, and best practices.<br><br>

        We also have a community section where our readers can ask questions, share their own experiences and learn from
        other programmers. We believe that learning and sharing knowledge is a two-way street, and our community is a
        perfect platform for that.<br><br>

        We understand the importance of staying up-to-date with the latest trends and developments in the industry, so
        we also cover the latest news, updates and releases in the programming world.<br><br>

        We're excited to have you as a part of our community and we look forward to helping you improve your programming
        skills. If you have any suggestions for topics you'd like to see covered on our blog, please feel free to
        contact us. Thanks for visiting and we hope to see you again soon!
        </p>
      </div>
    </div>
  </div>

  <!-- features page -->
  <div id="features" class="container-fluid">
    <div class="w-50 container">
      <p class="mt-5 ft text-center"><span class="a">F</span>eatures
      </p>
    </div>
    <div class="features">
      <div class="fcard">
        <div class="imgbox">
          <img src="images/bulb.png" height="120px" width="120px">
        </div>
        <div class="titlebox">
          <h4> Easy to learn</h4>
        </div>
        <div class="contentbox">
          <p>Our website is designed to be easy to learn for users of
            all levels. We understand that learning to code can be
            intimidating for some people, so we strive to make our
            website as intuitive we've put a lot of thought into making it easy to
            navigate and find the information you need. you can be
            sure that you'll have a smooth learning experience and
            you'll be able to understand the concept and apply them
            easily.</p>
        </div>
      </div>
      <div class="fcard">
        <div class="imgbox">
          <img src="images/bulb.png" height="120px" width="120px">
        </div>
        <div class="titlebox">
          <h4>Attempt Quiz</h4>
        </div>
        <div class="contentbox">
          <p>Welcome to our quiz! Test your coding knowledge and see where you stand among your peers. Get ready to tackle questions on various programming languages and concepts. Brush up on your syntax and logic, and let's see how far you can go! Good luck!!</p>
        </div>
      </div>
      <div class="fcard">
        <div class="imgbox">
          <img src="images/bulb.png" height="120px" width="120px">
        </div>
        <div class="titlebox">
          <h4>Query Solution</h4>
        </div>
        <div class="contentbox">
          <p>Welcome to our programming solutions page!We are dedicated to providing you with the best resources for improving your skills and reaching your goals. Whether you're a beginner looking to start as devloper or an experienced software devloper we provide knowledge which you want.</p>
        </div>
      </div>
      <div class="fcard">
        <div class="imgbox">
          <img src="images/bulb.png" height="120px" width="120px">
        </div>
        <div class="titlebox">
          <h4>Get Projects</h4>
        </div>
        <div class="contentbox">
          <p>we are proud to offer a wide range of high-quality programming projects for learning various languages and implement them in real time projects.Browse our projects to see examples of what you learn so far and see how you can create project by your self and be experts of what what you learn.</p>
        </div>
      </div>
      <div class="fcard">
        <div class="imgbox">
          <img src="images/bulb.png" height="120px" width="120px">
        </div>
        <div class="titlebox">
          <h4 style="margin:5% 0px 10px 0px;">Improve Problem Solving
            Skill</h4>
        </div>
        <div class="contentbox">
          <p> As a programmer, you know that finding the right solution to a technical issue can be a challenge.So here we provid solutions for your programming errors.We believe in making programming accessible and easy to understand, and we're dedicated to helping you find the solutions you need.We are happy to help you in finding solutions to problems, improving coding skills.</p>
        </div>
      </div>
      <div class="fcard">
        <div class="imgbox">
          <img src="images/bulb.png" height="120px" width="120px">
        </div>
        <div class="titlebox">
          <h4>User-friendly interface</h4>
        </div>
        <div class="contentbox">
          <p>The goal of a user-friendly interface is to reduce the learning curve for new users, minimize the risk of user error, and increase overall satisfaction of learners.A user-friendly interface can greatly improve the user experience on a programming site, making it easier for developers to find the information they need.</p>
        </div>
      </div>
      </section>
    </div>

    <!-- Course Details -->
    <section id="courses">
      <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
      <div class="w-50 container">
        <p class="mt-5 ft text-center"><span class="a">C</span>ourses
        </p>
      </div>
      <div class="cards">
        <div class="card">
          <!-- <h2 class="card-title">C</h2> -->
          <div class="h-50 d-flex justify-content-center p-3">
            <img src="images/html.png" class="mt-2" alt="">
          </div>
          <div class="px-4 py-2 text-wrap text-truncate">
            <p>HTML, or Hypertext Markup Language, is the standard
              markup language used to create web pages. It provides
              the structure and layout for the content that is
              displayed on a website. HTML consists of a series of
              elements, each represented by a tag, that define the
              different parts of a web page.</p>
          </div>
          <div class="text-center set">
            <a href="#">Learn HTML<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right icons" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
              </svg></a>
          </div>
          <p class="card-desc">HTML stands for Hypertext Markup
            Language, and it is the standard markup language used to
            create web pages. HTML consists of a series of elements
            and tags that can be used to structure and format the
            content of a web page, such as headings, paragraphs,
            images, and links. HTML documents are rendered by web
            browsers, which interpret the HTML code and display the
            content on the screen. HTML was first developed in the
            late 1980s and has evolved over time with the release of
            new versions, with the latest being HTML5.</p>
        </div>
        <div class="card">
          <!-- <h2 class="card-title">C</h2> -->
          <div class="h-50 d-flex justify-content-center p-3">
            <img src="images/css.png" class="mt-2" alt="">
          </div>
          <div class="px-4 py-2 text-wrap text-truncate">
            <p>CSS stands for Cascading Style Sheets, and it is a
              stylesheet language used to describe the presentation of
              a document written in a markup language. CSS allows
              developers to separate the presentation of a document
              from its structure, which is defined using HTML or other
              markup languages.</p>
          </div>
          <div class="text-center set">
            <a href="#">Learn CSS<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right icons" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
              </svg></a>
          </div>
          <p class="card-desc">CSS stands for Cascading Style Sheets,
            and it is a stylesheet language used to describe the
            presentation of a document written in a markup language.
            CSS allows developers to separate the presentation of a
            document from its structure, which is defined using HTML
            or other markup languages. With CSS, developers can
            control the layout, colors, fonts, and other visual
            elements of a web page. CSS can be applied to HTML
            documents, as well as XML and SVG documents. CSS was first
            introduced in 1996 and has since evolved with the release
            of new versions such as CSS2 and CSS3. CSS can be added to
            HTML documents using a link tag in the head section or by
            using inline styles.</p>
        </div>
        <div class="card">
          <!-- <h2 class="card-title">C</h2> -->
          <div class="h-50 d-flex justify-content-center p-3">
            <img src="images/js.png" class="mt-2" alt="">
          </div>
          <div class="px-4 py-2 text-wrap  text-truncate">
            <p>JavaScript is a programming language that is primarily
              used to create interactive and dynamic effects on
              websites. It is a client-side scripting language, which
              means it runs on the user's computer or device, rather
              than on a server. JavaScript can be used to add
              interactivity to web pages, such as form validation.</p>
          </div>
          <div class="text-center set">
            <a href="#">Learn Javascript<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right icons" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
              </svg></a>
          </div>
          <p class="card-desc">JavaScript is a programming language
            that is primarily used to create interactive and dynamic
            effects on websites. It is a client-side scripting
            language, which means it runs on the user's computer or
            device, rather than on a server. JavaScript can be used to
            add interactivity to web pages, such as form validation,
            image sliders, and pop-up windows. It can also be used to
            create full-fledged web applications. JavaScript code can
            be added to HTML documents using a script tag, and it can
            manipulate the content and structure of a web page using
            the Document Object Model (DOM). JavaScript was first
            created in 1995 and is now one of the most popular
            programming languages in the world.</p>
        </div>
        <div class="card">
          <!-- <h2 class="card-title">C</h2> -->
          <div class="h-50 d-flex justify-content-center p-3">
            <img src="images/jquery.png" alt="">
          </div>
          <div class="px-4 py-2 text-wrap text-truncate">
            <p>jQuery is a fast, small, and feature-rich JavaScript
              library. It is designed to simplify the process of
              writing JavaScript code, and makes it easier to navigate
              and manipulate the Document Object Model (DOM) of an
              HTML page. jQuery provides a number of useful methods
              and functions for performing common tasks.</p>
          </div>
          <div class="text-center set">
            <a href="#">Learn Jquery<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right icons" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
              </svg></a>
          </div>
          <p class="card-desc">jQuery is a fast, small, and
            feature-rich JavaScript library. It is designed to
            simplify the process of writing JavaScript code, and makes
            it easier to navigate and manipulate the Document Object
            Model (DOM) of an HTML page. jQuery provides a number of
            useful methods and functions for performing common tasks
            such as selecting elements, handling events, and making
            AJAX requests. It also provides a wide range of plugins
            and extensions that can be used to add additional
            functionality to a website. jQuery was first released in
            2006 and quickly gained popularity due to its ease of use
            and extensive documentation.</p>
        </div>

        <div class="card">
          <!-- <h2 class="card-title">C</h2> -->
          <div class="h-50 d-flex justify-content-center p-3">
            <img src="images/c.png" class="imgset" alt="">
          </div>
          <div class="px-4 py-2 text-wrap text-truncate">
            <p>C is a general-purpose, high-level programming language
              that was first developed in the early 1970s by Dennis
              Ritchie at Bell Labs. C is considered a middle-level
              language,One of the key features of C is its emphasis on
              minimalism and efficiency. C programs are typically
              closer to the machine language of a computer.</p>
          </div>
          <div class="text-center set">
            <a href="http://localhost/Programming_blog/course.php?sid=1">Learn C<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right icons" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
              </svg></a>
          </div>
          <p class="card-desc">C is a general-purpose, high-level
            programming language that was first developed in the early
            1970s by Dennis Ritchie at Bell Labs. C is considered a
            middle-level language,One of the key features of C is its
            emphasis on minimalism and efficiency. C programs are
            typically closer to the machine language of a computer,
            which makes them more efficient and faster, however, this
            also makes it more complex to write and understand.
            C is a procedural language, which means that it follows a
            top-down approach in program design and it's based on the
            concept of functions and procedures. C provides a rich set
            of built-in operators and data types, and it allows for
            direct manipulation of memory.



          </p>
        </div>
        <div class="card">
          <!-- <h2 class="card-title">C</h2> -->
          <div class="h-50 d-flex justify-content-center p-3">
            <img src="images/c++.png" class="imgset" alt="">
          </div>
          <div class="px-4 py-2 text-wrap text-truncate">
            <p>C++ is an extension of the C programming language,
              developed by Bjarne Stroustrup in 1983 at Bell Labs. It
              is an object-oriented, high-level programming language
              that provides many features that are not present in C,
              such as classes, objects, polymorphism, and templates.
            </p>
          </div>
          <div class="text-center set">
            <a href="#">Learn C++<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right icons" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
              </svg></a>
          </div>
          <p class="card-desc">C++ is an extension of the C
            programming language, developed by Bjarne Stroustrup in
            1983 at Bell Labs. It is an object-oriented, high-level
            programming language that provides many features that are
            not present in C, such as classes, objects, polymorphism,
            and templates.
            One of the main features of C++ is its ability to support
            Object-Oriented Programming (OOP) concepts like classes,
            objects, inheritance, encapsulation and polymorphism,
            which allows for the creation of complex and modular
            programs. C++ also provides support for both low-level
            memory management and high-level abstractions, making it a
            versatile language for a wide range of applications.</p>
        </div>
        <div class="card">
          <!-- <h2 class="card-title">C</h2> -->
          <div class="h-50 d-flex justify-content-center p-3">
            <img src="images/java.png" alt="">
          </div>
          <div class="px-4 py-2 text-wrap text-truncate">
            <p>Java is a general-purpose, high-level programming
              language that was first developed by James Gosling at
              Sun Microsystems (now owned by Oracle) in the mid-1990s.
              It is an object-oriented language, similar to C++, but
              with some additional features such as automatic memory
              management.</p>
          </div>
          <div class="text-center set">
            <a href="#">Learn Java<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right icons" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
              </svg></a>
          </div>
          <p class="card-desc">Java is a general-purpose, high-level
            programming language that was first developed by James
            Gosling at Sun Microsystems (now owned by Oracle) in the
            mid-1990s. It is an object-oriented language, similar to
            C++, but with some additional features such as automatic
            memory management and built-in support for multithreading.
            One of the key features of Java is its "write once, run
            anywhere" principle, which means that Java code can be
            written once and executed on any platform that supports
            Java. This is made possible by the Java Virtual Machine
            (JVM), which interprets Java bytecode and runs it on the
            target platform.</p>
        </div>
        <div class="card">
          <!-- <h2 class="card-title">C</h2> -->
          <div class="h-50 d-flex justify-content-center p-3">
            <img src="images/PHP.png" width="100%" alt="">
          </div>
          <div class="px-4 py-2 text-wrap text-truncate">
            <p>PHP stands for Hypertext Preprocessor, and it is a
              server-side scripting language used for creating dynamic
              web pages. PHP code is executed on the server, and the
              resulting HTML is sent to the client's browser to be
              rendered. PHP was originally created in 1995 by Rasmus
              Lerdorf.</p>
          </div>
          <div class="text-center set">
            <a href="#">Learn Php<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right icons" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
              </svg></a>
          </div>
          <p class="card-desc">PHP stands for Hypertext Preprocessor,
            and it is a server-side scripting language used for
            creating dynamic web pages. PHP code is executed on the
            server, and the resulting HTML is sent to the client's
            browser to be rendered. PHP was originally created in 1995
            by Rasmus Lerdorf, and it has evolved over time with the
            release of new versions.
            PHP is particularly well-suited for creating dynamic web
            pages and web applications, as it allows developers to
            easily interact with databases, create cookies and
            sessions, and handle form data. PHP also has a large
            number of built-in functions that can be used for common
            tasks such as string manipulation, date and time handling,
            and file manipulation.</p>
        </div>

        <div class="card">
          <!-- <h2 class="card-title">C</h2> -->
          <div class="h-50 d-flex justify-content-center p-3">
            <img src="images/python.png" alt="">
          </div>
          <div class="px-4 py-2 text-wrap text-truncate">
            <p>Python is a high-level, interpreted, general-purpose
              programming language that was first developed in the
              late 1980s by Guido van Rossum. Python is known for its
              simple and easy-to-read syntax, which makes it a popular
              choice for beginners and experienced developers alike.
            </p>
          </div>
          <div class="text-center set">
            <a href="#">Learn Python<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right icons" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
              </svg></a>
          </div>
          <p class="card-desc">Python is a high-level, interpreted,
            general-purpose programming language that was first
            developed in the late 1980s by Guido van Rossum. Python is
            known for its simple and easy-to-read syntax, which makes
            it a popular choice for beginners and experienced
            developers alike.
            One of the key features of Python is its versatility and
            wide range of applications. It is used in many different
            fields such as web development, data analysis, artificial
            intelligence, scientific computing, and education. Python
            also has a vast collection of libraries and frameworks
            that can be used for specific tasks, such as NumPy and
            SciPy for scientific computing, or Django and Flask for
            web development.</p>
        </div>
        <div class="card">
          <!-- <h2 class="card-title">C</h2> -->
          <div class="h-50 d-flex justify-content-center p-3">
            <img src="images/linux.png" alt="">
          </div>
          <div class="px-4 py-2 text-wrap text-truncate">
            <p>Linux is a free and open-source operating system based
              on the Unix operating system. It was first developed in
              1991 by Linus Torvalds, a student at the University of
              Helsinki in Finland. Linux is known for its stability,
              security, and flexibility, and it is widely used in a
              variety of settings, including servers and mobile
              devices.</p>
          </div>
          <div class="text-center set">
            <a href="#">Learn Linux<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right icons" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
              </svg></a>
          </div>
          <p class="card-desc">Linux is a free and open-source
            operating system based on the Unix operating system. It
            was first developed in 1991 by Linus Torvalds, a student
            at the University of Helsinki in Finland. Linux is known
            for its stability, security, and flexibility, and it is
            widely used in a variety of settings, including servers,
            desktops, and mobile devices.
            One of the key features of Linux is its open-source
            nature, which means that the source code is freely
            available for anyone to use, modify, and distribute. This
            has led to the development of many different Linux
            distributions, or "distros," each with their own set of
            features and tools. Some of the most popular Linux distros
            include Ubuntu, Debian, and Red Hat.

          </p>
        </div>

      </div>
      <Section Class="Main-Container" id="package">
      <Div Class="Card-Container">
        <Div Class="Pricing-Card Card-01">
          <Div Class="Pricing">
            <Div Class="Price">
              <Span>₹99</Span>
            </Div>
            <P>1 Month</P> <Span Class="Type">Basic</Span>
          </Div>
          <Div Class="Card-Body">
            <Div Class="Top-Shape"></Div>
            <Div Class="Card-Content">
              <Ul>
                <Li Class="Active">languages like c++,java,php etc. <I Class="Uil Uil-Check-Circle"></I></Li>
                <Li Class="Active">live projects <I Class="Uil Uil-Check-Circle"></I></Li>
                <Li Class="Disabled">Query preference <I Class="Uil Uil-Times-Circle"></I></Li>
              </Ul>
              <?php
      if(isset($_SESSION['id']))
      {
        $uid = $_SESSION['id'];
        echo '<a href="payment.php?invc=99"><Button Class="Buy-Btn">Buy Now</Button></a>';
      }
      else{ 
        echo '<a href="#package" onclick="loginalert()"><Button Class="Buy-Btn">Buy Now</Button></a>';
      }
      ?>
            </Div>
          </Div>
          <Div Class="Ribbon"></Div>
        </Div>
        <Div Class="Pricing-Card Card-02">
          <Div Class="Pricing">
            <Div Class="Price"><Span>₹349</Span> </Div>
            <P>6 Month</P> <Span Class="Type">Pro</Span>
          </Div>
          <Div Class="Card-Body">
            <Div Class="Top-Shape"></Div>
            <Div Class="Card-Content">
              <Ul>
                <Li Class="Active">languages like c++,java,php etc. <I Class="Uil Uil-Check-Circle"></I></Li>
                <Li Class="Active">live projects <I Class="Uil Uil-Check-Circle"></I></Li>
                <Li Class="Disabled">Query preference <I Class="Uil Uil-Times-Circle"></I></Li>
                </Ul>
                <?php
      if(isset($_SESSION['id']))
      {
        $uid = $_SESSION['id'];
        echo '<a href="payment.php?invc=349"><Button Class="Buy-Btn">Buy Now</Button></a>';
      }
      else{ 
        echo '<a href="#package" onclick="loginalert()"><Button Class="Buy-Btn">Buy Now</Button></a>';
      }
      ?>
            </Div>
          </Div>
          <Div Class="Ribbon"></Div>
        </Div>
        <Div Class="Pricing-Card Card-03">
          <Div Class="Pricing">
            <Div Class="Price"><Span>₹559</Span> </Div>
            <P>12 Month</P> <Span Class="Type">Premium</Span>
          </Div>
          <Div Class="Card-Body">
            <Div Class="Top-Shape"></Div>
            <Div Class="Card-Content">
              <Ul>
                <Li Class="Active">languages like c++,java,php etc. <I Class="Uil Uil-Check-Circle"></I></Li>
                <Li Class="Active">live projects <I Class="Uil Uil-Check-Circle"></I></Li>
                <Li Class="Disabled">Query preference <I Class="Uil Uil-Times-Circle"></I></Li>
              </Ul>
              <?php
      if(isset($_SESSION['id']))
      {
        $uid = $_SESSION['id'];
        echo '<a href="payment.php?invc=559"><Button Class="Buy-Btn">Buy Now</Button></a>';
      }
      else{ 
        echo '<a href="#package" onclick="loginalert()"><Button Class="Buy-Btn">Buy Now</Button></a>';
      }
      ?>
            </Div>
          </Div>
          <Div Class="Ribbon"></Div>
        </Div>
      </Div>
    </Section>

    <!-- contact related data  -->


    <div id="contact" class="container conform text-dark">
      <div class="row z-5">
        <div class="w-50 container">
          <p class="mt-5 ft text-center text-white"><span class="a">C</span>ontact us
          </p>
        </div>
      </div>
      <div class="row">
        <h4 style="text-align:center;" class="text-white">We'd love
          to hear from you!</h4>
      </div>
      <form method="post" action="Contact_data.php">
        <div class="row input-container">
          <div class="col-md-6 col-sm-12">
            <div class="styled-input">
              <input class="rounded-3" type="text" pattern="[a-zA-Z]{1,15}" maxlength="15" name="fname" required />
              <label class="text-dark">First Name</label>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="styled-input" style="float:right;">
              <input class="rounded-3" pattern="[a-zA-Z]{1,15}" maxlength="15" type="text" name="lname" required />
              <label class="text-dark">Last Name</label>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="styled-input wide">
              <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="rounded-3" name="email" type="email" required oninvalid="alert('Please Enter Valid E-mail');" />
              <label class="text-dark">Email</label>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="styled-input wide">
              <textarea class="rounded-3" name="message" maxlength="300" required></textarea>
              <label class="text-dark">Message</label>
            </div>
          </div>
          <div class="col-xs-12 cbutton">
            <div class="submit-btn"><input class="rounded-3 p-2" type="submit" value="Send Message" name="submit" /></div>
          </div>
        </div>
      </form>
    </div>



    <script type="text/javascript">
      burger = document.querySelector('.burger');
      navbar = document.querySelector('.navbar');
      rightnav = document.querySelector('.right-nav');
      navlist = document.querySelector('.nav-list');

      burger.addEventListener('click', () => {
        navlist.classList.toggle('v-class');
        rightnav.classList.toggle('v-class');
        navbar.classList.toggle('h-resp');

      })
    </script>
</body>

</Html>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<!-- <div class="container d-flex justify-content-center align-items-center p-4">
        <img src="/images/bg1.jpg" width="1000px" height="600px">
        <div class="text">Programming Blog</div>
    </div> -->