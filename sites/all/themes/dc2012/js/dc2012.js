(function ($) {

  // Function to slabtext the H1 headings
  function slabTextHeadlines() {
    $(".slabme, h2.slabme").slabText();
  };
  // Called one second after the onload event for the demo (as I'm hacking the fontface load event a bit here)
  // you should really use google WebFont loader events (or something similar) for better control
  $(window).load(function() {
    setTimeout(slabTextHeadlines, 10);
  });

}(jQuery));
