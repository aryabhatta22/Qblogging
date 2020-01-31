<!DOCTYPE html>
<html>
<head>
  <title>home page</title>
   <meta name="viewport" content="width=device-width, intial-scale=1.0"> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="queries.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <header>
        <nav>
            <div class="row">
                <ul class="main-nav">
                    <li><a href="#feeds">Feeds</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>

            </div>
        </nav>
        <div class="hero-text-box">
            <h1>QBlogging</h1><br><h3>Promoting quality blogging</h3>
            <a class="btn btn-full" href="#">Login</a>
            <a class="btn btn-ghost" href="#">Signup</a>


        </div>

    </header>

    <section class="section-features" id="feeds">
        
<!-- post slideshow -->

<div class="slideshow-container">
    <div class="mySlides"> 
      <p class="author">- John Keats</p>
      <p class="time">12:00:00</p>
        
      <span id="more"><q>I love you the more in that I believe you had liked me for my own sake and for nothing else</q></span>
    </div>

    <div class="mySlides">
        <p class="author">- Ernest Hemingway</p>
        <p class="time">2:00:00</p>
        
        <span id="more"><q>But man is not made for defeat. A man can be destroyed but not defeated.</q></span>
    </div>

    <div class="mySlides">
        <p class="author">- Thomas A. Edison</p>
        <p class="time">2:00:00</p>
        
        <span id="more"><q>I have not failed. I've just found 10,000 ways that won't work.</q></span>
    </div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>

</div>

<div class="dot-container">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
   <script>
      var slideIndex = 1;
      showSlides(slideIndex);

      function plusSlides(n) 
      {
        showSlides(slideIndex += n);
      }

      function currentSlide(n) 
      {
        showSlides(slideIndex = n);
      }

      function showSlides(n) 
      {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
      }
    
</script> 

    </section>
    <section class="section-features">
        <div class="row">
            <h2>About Us.</h2>
            <p class="long-copy">
                QBlogging refers to the "quality blogging". It integrate the experience of blogging and research into one capsule. <br> The experience of blogging and research enchance with the addition of security.


            </p>
        </div>


        
    </section>
    <section class="section-form">
        <div class="row">
            <h2>We're happy to hear from you</h2>
        </div>
        <div class="row">
            <form method="post" action="#" class="contact-form">
                <div class="row">
                    <div class="col span-1-of-3">
                        <label for="name">Name</label>
                    </div>
                    <div class="col spa-2-of-3">
                        <input type="text" name="Name" id="name" placeholder="Your Name" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col span-1-of-3">
                        <label for="email">Email</label>
                    </div>
                    <div class="col spa-2-of-3">
                        <input type="email" name="email" id="email" placeholder="Your email" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col span-1-of-3">
                        <label>How did you find us?</label>
                    </div>
                    <div class="col spa-2-of-3">
                        <select name="find-us" id="find-us">
                            <option value="friends" selected>Friends</option>
                            <option value="search"> Search Engine</option>
                            <option value="ad">Advertisment</option>
                            <option value="other">Other way</option>
                        </select>
                    </div>

                </div>


                <div class="row">
                    <div class="col span-1-of-3">
                        <label>Drop us a line</label>
                    </div>
                    <div class="col spa-2-of-3">
                        <textarea name="message" placeholder="Your message"></textarea>
                    </div>

                </div>

                <div class="row">
                    <div class="col span-1-of-3">
                        <label>&nbsp;</label>
                    </div>
                    <div class="col spa-2-of-3">
                        <input type="submit" value="send it!">
                    </div>

                </div>

            </form>
        </div>
    </section>


</body>
</html>