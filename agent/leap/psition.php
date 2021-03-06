<!DOCTYPE HTML>
<html>
<head>
  <script src="//js.leapmotion.com/leap-0.6.4.js"></script>
  <script src="//js.leapmotion.com/leap-plugins-0.1.10.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <style>
    body {
      font-size: 1.5em;
      line-height: 2em;
    }

    #cursor {
      width: 60px;
      height: 60px;
      position: fixed;
      margin-left: -50px;
      margin-top: -50px;
      z-index: 910;
      opacity: 0.9;

      background: black;
      border-radius: 100%;
      background: -webkit-radial-gradient(100px 100px, circle, #5cabff, #000);
      background: -moz-radial-gradient(100px 100px, circle, #5cabff, #000);
      background: radial-gradient(100px 100px, circle, #5cabff, #000);
    }
    .buttonWrap{
      text-align: center;
      margin-top: 200px;
    }
    button{
      padding: 1em;
      margin: auto;
    }
  </style>

</head>
<body>


  <div id="output" class="output"></div>
  <div id="cursor"></div>


  <div class="buttonWrap">
    <button>Hover Me!</button>
  </div>

  <script type="text/javascript">
    window.cursor = $('#cursor');
    window.output = $('#output');

    Leap.loop({hand: function(hand){

      var screenPosition = hand.screenPosition(hand.palmPosition);

      var outputContent = "x: " + (screenPosition[0].toPrecision(4)) + 'px' +
             "        <br/>y: " + (screenPosition[1].toPrecision(4)) + 'px' +
             "        <br/>z: " + (screenPosition[2].toPrecision(4)) + 'px';


      // hide and show the cursor in order to get second-topmost element.
      cursor.hide();
      var el = document.elementFromPoint(
          hand.screenPosition()[0],
          hand.screenPosition()[1]
      );
      cursor.show();

      if (el){
        outputContent += '<br>Topmost element: '+ el.tagName + ' #' + el.id +  ' .' + el.className;
      }

      output.html(outputContent);

      cursor.css({
        left: screenPosition[0] + 'px',
        top:  screenPosition[1] + 'px'
      });

    }})
    .use('screenPosition', {
      scale: 1
    });
  </script>

</body>
</html>