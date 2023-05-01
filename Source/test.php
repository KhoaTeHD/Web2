<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400|Raleway:300);
    .btn-11:before,
    .btn-11:after {
      z-index: -1;
    }
    #theAtrongHoverMauTim{
      text-decoration: none;
      line-height: 24px;
      color: black;
      text-align: center;
    }




    /*cái ở dưới là để select tới element có clas="btn-..."*/ 
    [class^=btn-] {
      position: relative;
      display: block;
      overflow: hidden;
      width: 100%;
      height: 24px;
      max-width: 250px;
      text-transform: uppercase;
      border: 1px solid currentColor;
    }

    @-webkit-keyframes criss-cross-left {
      0% {
        left: -20px;
      }

      50% {
        left: 50%;
        width: 20px;
        height: 20px;
      }

      100% {
        left: 50%;
        width: 375px;
        height: 375px;
      }
    }

    @keyframes criss-cross-left {
      0% {
        left: -20px;
      }

      50% {
        left: 50%;
        width: 20px;
        height: 20px;
      }

      100% {
        left: 50%;
        width: 375px;
        height: 375px;
      }
    }

    @-webkit-keyframes criss-cross-right {
      0% {
        right: -20px;
      }

      50% {
        right: 50%;
        width: 20px;
        height: 20px;
      }

      100% {
        right: 50%;
        width: 375px;
        height: 375px;
      }
    }

    @keyframes criss-cross-right {
      0% {
        right: -20px;
      }

      50% {
        right: 50%;
        width: 20px;
        height: 20px;
      }

      100% {
        right: 50%;
        width: 375px;
        height: 375px;
      }
    }

    .btn-11 {
      position: relative;
      color: #674FA2;
    }

    .btn-11:before,
    .btn-11:after {
      position: absolute;
      top: 50%;
      content: "";
      width: 20px;
      height: 20px;
      background-color: #674FA2;
      border-radius: 50%;
    }

    .btn-11:before {
      left: -20px;
      transform: translate(-50%, -50%);
    }

    .btn-11:after {
      right: -20px;
      transform: translate(50%, -50%);
    }

    .btn-11:hover {
      color: #fff;
    }

    .btn-11:hover:before {
      -webkit-animation: criss-cross-left 0.8s both;
      animation: criss-cross-left 0.8s both;
      -webkit-animation-direction: alternate;
      animation-direction: alternate;
    }

    .btn-11:hover:after {
      -webkit-animation: criss-cross-right 0.8s both;
      animation: criss-cross-right 0.8s both;
      -webkit-animation-direction: alternate;
      animation-direction: alternate;
    }
  </style>
</head>

<body>
  <div style="display: flex;width: 180px;height: 33px;"><a id="theAtrongHoverMauTim" class="btn-11" href="#">Collision</a></div>
  
</body>

</html>