function reserRadioChecks() {
        document.getElementById("radio1").checked = !1,
        document.getElementById("radio2").checked = !1,
        document.getElementById("radio3").checked = !1
}
function Question(e, t) {
        this.QuestionId = e,
        this.Statement = t,
        this.AttemptedAnswer = null
}
function previous_click() {
}

function next_click() {
    var e = $("input[name=option]:checked").val();
    return $("input[name='option']").is(":checked") ? (arr[current].AttemptedAnswer = e,
        current++,
        $("#errorDiv").hide(),
        $("#quiz-container").hide(),
        reserRadioChecks(),
        update_question(),
        update_progressBar(),
        $("#quiz-container").fadeIn(1e3), void 0) : void $("#errorDiv").fadeIn(500)
}
function update_progressBar() {
    var e = document.getElementById("completeness");
    e.innerHTML = current + "/" + arr.length + " <label  style='font-size:9px; color:green'>Attempted</label> ";
    var t = current / arr.length * 100; $("#progress-bar").css("width", t + "%").attr("aria-valuenow", t), current == arr.length - 1 && ($("#finish-button").show(), $("#next-button").hide())
}

function update_question() {
    $("#question").html(current + 1 + ". " + arr[current].Statement)
}
function radio_change_event() {
    $('input:radio[name="option"]').change(function () { $("#errorDiv").is(":visible") && $("#errorDiv").fadeOut(200) })
}
function generate_results() {
    $.ajax({
        type: "POST",
        url: "/Home/GetAttemptedQuiz",
        data: { questions: JSON.stringify(arr) },
        success: function (result) {
            var str = JSON.stringify(result);
            var a = JSON.parse(str);
            var dt = new Date();
            dt = dt.getDay() + '/' + dt.getMonth() + '/' + dt.getFullYear();

            var res = '';
            res += '<div class="row"> <div class="col-md-4">' +
                '<img src="../Content/images/student.png" alt="Mountain View" style="width:150px;height:150px;">' +
                '</div>' +
                '<div class="col-md-8">' +
                '<h3 class="has-divider text-highlight">Your Personality Test Report </h3>' +
                '<dl>' +
                '<dt>'+dt+'</dt>' +
                '<dd>This Report that you are about to read demonstrate your personality based on the answers you provided in the personality questionaire.</dd>' +
                '</dl>' +
                '</div>' +
                '</div> <hr/>';
            $.each(a, function (i, item) {
                res += '<div class="row"> <div class="col-sm-12"> <h3 class="has-divider text-highlight">' + item.Name + ' '+ item.Career+
                    '</h3> <dl> <dt>Description </dt>' +
                    '<dd>' + item.Specifications + '</dd></dl></div></div>'
            });
            res += '<div class="row"> <div class="col-md-2"></div><div class="col-md-8 pull-left">' +
                '<button type="button" class="btn btn-success btn-block"><i class="icon-save"></i>Save</button>' +
                '</div>' +
                '<div class="container"> <div class="col-md-2"></div>' +
                '</div>';
            console.log(res);
            var object = document.getElementById("quiz");
            var object2 = document.getElementById("quizHeading");
            object2.innerHTML = "Personality Test Report";
            object.innerHTML = res;


        }, error: function () { $('.Quiz').html("Error"); }
    })
} $("#finish-button").button().click(function () {
    var e = $("input[name=option]:checked").val();
    return $("input[name='option']").is(":checked") ? (arr[current].AttemptedAnswer = e, void generate_results()) : void $("#errorDiv").fadeIn(500)
});