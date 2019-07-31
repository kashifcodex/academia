<html>
<head>
    <title>Personality</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <![endif]-->
</head>

<body class="home-page">

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading" >
            <h3 class="panel-title" style="text-align:center;" id="quizHeading">Personality and Career Finding test</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10" id="quiz">

                    <div class="row" >
                        <h4 id="question" >1. I am artistic, imaginative, original, impulsive, and independent.</h4>

                        <div class="col-sm-4">
                            <input type="radio" name="option" id="radio1" value="2" class="radio" />
                            <label for="radio1" class="quiz-option">Agree </label>
                        </div>

                        <div class="col-sm-4">
                            <input type="radio" name="option" id="radio2" value="1" class="radio" />
                            <label for="radio2" class="quiz-option">Neutral</label>
                        </div>

                        <div class="col-sm-4">
                            <input type="radio" name="option" id="radio3" value="0" class="radio" />
                            <label for="radio3" class="quiz-option">Disgree</label>
                        </div>

                    </div>
                    <br />

                    <div class="row">
                        <div class="col-lg-12 alert alert-danger" id="errorDiv" style="display: none;">
                            Please choose an option
                            <div class="col-sm-1 pull-right">
                                <button class="btn btn-default" onclick="$(errorDiv).hide();" style="background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden;">x</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 ">
                            <div class="progress" id="quiz-progress">
                                <div class="progress-bar" role="progressbar" id="progress-bar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                    <span class="sr-only">70% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-1 pull left" style="margin-top:-20px;">
                            <h3 id="completeness" style="font-size:15px";></h3>
                        </div>

                        <div class="col-sm-1 pull-right">
                            <button class="btn btn-success" style="display: none" id="finish-button" onclick="return generate_results();">Finish</button>
                            <br><button class="btn btn-primary" id="next-button" onclick="return next_click();">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Javascript -->
<script type="text/javascript" src="~/Content/plugins/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="~/Content/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="~/Content/plugins/bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="~/Content/plugins/back-to-top.js"></script>
<script type="text/javascript" src="~/Content/plugins/jquery-placeholder/jquery.placeholder.js"></script>
<script type="text/javascript" src="~/Content/plugins/pretty-photo/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="~/Content/plugins/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="~/Content/plugins/jflickrfeed/jflickrfeed.min.js"></script>
<script type="text/javascript" src="~/Content/js/main.js"></script>
<script src="{{asset('js/Quiz.js')}}"></script>
<script>

    var current = 0;
    var arr = [];
    var question = new Question("16", "I am artistic, imaginative, original, impulsive, and independent.");
    arr.push(question);
    var question = new Question("10", "I value science and understand scientific theories related to human brain.");
    arr.push(question);
    var question = new Question("31", "I keep accurate records and like to be responsible for details.");
    arr.push(question);
    var question = new Question("24", "I am helpful, friendly, and trustworthy. I like to protect people from any danger.");
    arr.push(question);
    var question = new Question("18", "I can play a musical instrument and enjoy performing in front of people.");
    arr.push(question);
    var question = new Question("21", "I express myself clearly and can lead a group discussion.");
    arr.push(question);
    var question = new Question("19", "I like to do things where I can help people like teaching, first aid, or giving information.");
    arr.push(question);
    var question = new Question("22", "I like to do volunteer work and find it good to convince people");
    arr.push(question);
    var question = new Question("20", "Compared to persons of my age, I am good at teaching, delivering my ideas to people quickly.");
    arr.push(question);
    var question = new Question("30", "I am self-confident, ambitious, and  like to play with facts and figures.");
    arr.push(question);
    var question = new Question("13", "I like to do be creative, playing different roles on different situations seems good for me.");
    arr.push(question);
    var question = new Question("3", "I am athletic, play a sport, and like to be physically active.");
    arr.push(question);
    var question = new Question("23", "I value helping people and solving problems related to their future.");
    arr.push(question);
    var question = new Question("14", "Compared to others my age, I am good at expressing things, writing them down to explain better");
    arr.push(question);
    var question = new Question("32", "I like to work with numbers, records, or machines in a set, orderly way.");
    arr.push(question);
    var question = new Question("15", "I found it good to design good and to attract more people to my creativity");
    arr.push(question);
    var question = new Question("34", "I like practical tasks, quantitative measurements, and structured environments");
    arr.push(question);
    var question = new Question("17", "I like to work on crafts and take photographs, capturing nature with hands.");
    arr.push(question);
    var question = new Question("1", "I like to work with animals, tools, or machines.");
    arr.push(question);
    var question = new Question("9", "I enjoy crossword puzzles and board games.");
    arr.push(question);
    var question = new Question("28", "I value success in politics, leadership, or business.");
    arr.push(question);
    var question = new Question("35", "I value success in business and can write effective business letters and like managing resources also.");
    arr.push(question);
    var question = new Question("33", "Compared to persons my age, I am good at working with written records and numbers in a systematic, orderly way.");
    arr.push(question);
    var question = new Question("2", "Compared to others my age, I have good skills in structuring things physically, making design of certain interiors.");
    arr.push(question);
    var question = new Question("36", "I am orderly and work well within a system.");
    arr.push(question);
    var question = new Question("5", "I love nature and like to work outdoors; my hobbies include landscaping and growing plants and flowers.");
    arr.push(question);
    var question = new Question("27", "I would like to start my own business and meet important people.");
    arr.push(question);
    var question = new Question("29", "I enjoy watching the stock market and reading business journals.");
    arr.push(question);
    var question = new Question("25", "I like to lead and persuade people, and to sell things or ideas.");
    arr.push(question);
    var question = new Question("12", "I am precise, scientific, and intellectual.");
    arr.push(question);
    var question = new Question("7", "I like to study inner self of human body and love to explore different behaviours.");
    arr.push(question);
    var question = new Question("4", "I value practical things you can see or touch like plants and animals you can grow, or things you can build or make better.");
    arr.push(question);
    var question = new Question("11", "I am interested in working with complex electrical designs and sort out workflows on them.");
    arr.push(question);
    var question = new Question("26", "I am good at convincing people and let them to visit the places that are best for them");
    arr.push(question);
    var question = new Question("8", "I am good at understanding and solving science and math problems, compared to others my age.");
    arr.push(question);
    var question = new Question("6", "I am practical, mechanical, and realistic.");
    arr.push(question);


    update_question();

    update_progressBar();
    radio_change_event();



    $(document).keypress(function (e) {
        if (e.which == 13) {
            if (current < arr.length - 1) {
                return next_click();
            }
            else {
                alert("Please click the finish button to complete test!")
            }

        }

    });


</script>
</body>
</html>