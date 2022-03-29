        <!-- testimonials js starts  -->
       

        <script>
          var slideIndex = 1;
          showSlides(slideIndex);
          
          function plusSlides(n) {
            showSlides(slideIndex += n);
          }
          
          function currentSlide(n) {
            showSlides(slideIndex = n);
          }
          
          function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            
            slides[slideIndex-1].style.display = "block";  
          }
          </script>
        <!-- testimonials js ends -->

        
        <!-- Jquery and Boostrap JavaScript -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- Font Awesome JS -->
        <script type="text/javascript" src="js/all.min.js"></script>
        <script src="js/all.min.js"></script>
        <script src="https://kit.fontawesome.com/bca2cb55c2.js" crossorigin="anonymous"></script>

    <!-- Student Ajax Call JavaScript -->
        <script type="text/javascript" src="js/ajaxrequest.js"></script>
          
    </body>
</html>