var soundInterval;
$.ajax({
  method: 'GET',
  url: '/user/settings/get',
  async: false,
  success: function(data) {
    soundInterval = data.timer_sound_interval;
  }
});

var timerHtml = '<div id="timer">' +
    '<div class="row">' +
      '<div class="col-xs-6 text-center">' +
        '<span id="timer-minutes">00</span>:<span id="timer-seconds">00</span>' +
      '</div>' +
      '<div class="col-xs-3">' +
        '<i id="timer-play" class="fa fa-play"></i>' +
      '</div>' +
      '<div class="col-xs-3">' +
        '<i id="timer-reset" class="fa fa-repeat"></i>' +
      '</div>' +
    '</div>' +
  '</div>';

$("#app").append(timerHtml);
$("footer.footer").addClass("hasTimer");

// Keep track of soundqueue. Will reset once audio plays.
var secondsSinceAudio = 0;
var seconds = 0;
var minutes = 0;

var timerMinutes = $("#timer-minutes");
var timerSeconds = $("#timer-seconds");

if (soundInterval) {
  var ding = new Audio('/media/ding.wav');
}

var intervarSettings = function() {
  seconds++;
  secondsSinceAudio++;

  if (soundInterval && secondsSinceAudio === soundInterval) {
    secondsSinceAudio = 0;
    ding.play();
  }
  
  if (seconds < 60 && minutes < 1) {
    timerMinutes.html('00');
  }
  if (seconds < 10) {
    seconds = ('0' + seconds).slice(-2); 
  }
  if (seconds === 60) {
    seconds = '00';
    minutes++;
  }

  if (minutes < 10) {
    minutes = ('0' + minutes).slice(-2);
  }

  timerSeconds.html(seconds);
  timerMinutes.html(minutes);
}

var countSeconds;

var operators = function(method) {
  if (method === "pause") {
    window.clearInterval(countSeconds);
  }

  else if (method === "play") {
    countSeconds = setInterval(function() {
      intervarSettings();
    }, 1000);
  }

  else if (method === "reset") {
    minutes = 0;
    seconds = 0;
    timerMinutes.html('00');
    timerSeconds.html('00');
  }
};

$(document).on('click', '#timer-play', function() {
  $(this).removeClass("fa-play").addClass('fa-pause').attr('id', "timer-pause");
  if (soundInterval) {
    ding.play(); ding.pause();
  }
  operators("play");
});

$(document).on('click', '#timer-pause', function() {
  $(this).removeClass("fa-pause").addClass('fa-play').attr('id', "timer-play");
  operators("pause");
});

$(document).on('click', '#timer-reset', function() {
  operators("reset");
});