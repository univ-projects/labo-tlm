var events = []
events=parselocalstorage('events')
events=[
  {'id': 2, 'title': "GDG : Android st...", 'start': "2018-11-9 03:00", 'end': "2018-11-11 08:00", 'location': "Faculté de médecine",'start': "2018-11-10 07:00",'details':'Atelier Désign et séance de Lecture'}
  ,{'id': 2, 'title': "GDG : Android study Jams", 'start': "2018-11-10 03:00", 'end': "2018-11-15 08:00", 'location': "Faculté de médecine",'start': "2018-11-10 07:00",'details':'Atelier Désign et séance de Lecture'}
]
var renderPopup = function (jsEvent, start, end, calEvent) {
var $popup = $('#calendar-popup');
var $eventForm = $('#event-form');
$event = $('#event');
var $selectedElmt = $(jsEvent.target);

var relativeStartDay = start.calendar(null, { lastDay: '[yesterday]', sameDay: '[aujourd\'hui]'});
var endNextDay = '';

if(relativeStartDay === 'yesterday') {
endNextDay = '[aujourd\'hui à] ';
}
else if(relativeStartDay === 'aujourd\'hui') {
endNextDay = '[Demain à] ';
}
else {
endNextDay = 'dddd ';
}

$('.start-time').html(
' <p><i class="fa fa-play" aria-hidden="true"></i>' + (start.isSameOrBefore(moment()) ? 'A commencé' : 'Commence à') + '</p>'
+ '<time datetime="' + start.format() + '">'
+ start.calendar(null, {
lastWeek: 'L LT',
nextWeek: 'dddd LT',
sameElse: 'L LT'
})
+ '</time>'
);
$('.end-time').html(
'<p><i class="fa fa-stop" aria-hidden="true"></i> '
+ (end.isSameOrBefore(moment()) ? 'A terminé' : 'Termine à')
+ (end.isSame(start, 'day') ? ' à' : '')
+ '</p>'
+ '<time datetime="' + end.format() + '">'
+ end.calendar(start, {
sameDay: 'LT',
nextDay: endNextDay + 'LT',
nextWeek: 'dddd LT',
sameElse: 'L LT'
})
+ '</time>'
);

if(calEvent) {
$eventForm.hide();

$event.children('header').html(`<i class="fa fa-calendar-o"></i>`+calEvent.title);
$event.find('.location').text(calEvent.location ? calEvent.location : '(No location information.)');
$event.find('.details').text(calEvent.details ? calEvent.details : '');

$event.show();
}
else {
$event.hide();
$('#event-start').val(start.format('DD-MM-YYYY HH:mm'));
$('#event-end').val(end.format('DD-MM-YYYY HH:mm'));
$eventForm.show();
}

var leftPosition = 0;
var $prong = $('.prong');
var prongPos = 0;

if($selectedElmt.hasClass('fc-highlight')) {
leftPosition = $selectedElmt.offset().left - $popup.width() + ($selectedElmt.width() / 2);
if(leftPosition <= 0) {
leftPosition = 5;
prongPos = $popup.width() - $selectedElmt.offset().left - 30
}
else {
prongPos = 15;
}

$popup.css('left', leftPosition);
$prong.css({
'left': '',
'right': prongPos,
'float': 'right'
});
}
else {
leftPosition = jsEvent.originalEvent.pageX - $popup.width()/2;
if(leftPosition <= 0) {
leftPosition = 5;
}
prongPos = jsEvent.originalEvent.pageX - leftPosition - ($prong.width() * 1.7);

$popup.css('left', leftPosition);
$prong.css({
'left': prongPos,
'float': 'none',
'right': ''
});
}

var topPosition = (calEvent ? jsEvent.originalEvent.pageY : $selectedElmt.offset().top) - $popup.height() - 15;

if((topPosition <= window.pageYOffset)
&& !((topPosition + $popup.height()) > window.innerHeight)) {
$popup.css('top', jsEvent.originalEvent.pageY + 15);
$prong.css('top', -($popup.height() + 12))
.children('div:first-child').removeClass('bottom-prong-dk').addClass('top-prong-dk')
.next().removeClass('bottom-prong-lt').addClass('top-prong-lt');
}
else {
$popup.css('top', topPosition);
$prong.css({'top': 0, 'bottom': 0})
.children('div:first-child').removeClass('top-prong-dk').addClass('bottom-prong-dk')
.next().removeClass('top-prong-lt').addClass('bottom-prong-lt');
}

$popup.show();
$popup.find('input[type="text"]:first').focus();
}

$(document).ready(function() {
$('#calendar').fullCalendar({
lang:'fr',
header: {
left: 'title',
right: 'prev,next today'
},
timezone: 'local',
defaultView: 'month',
allDayDefault: false,
allDaySlot: false,
slotEventOverlap: true,
slotDuration: "01:00:00",
slotLabelInterval: "01:00:00",
snapDuration: "00:15:00",
contentHeight: 600,
scrollTime :  "8:00:00",
axisFormat: 'h:mm a',
timeFormat: 'h:mm A()',
selectable: true,
events: function(start, end, timezone, callback) {
let arr = parselocalstorage('events')
callback(arr);
},
eventColor: '#67aac9',
eventClick: function (calEvent, jsEvent) {

renderPopup(jsEvent, calEvent.start, calEvent.end, calEvent);


},
eventRender: function(event, element) {
    element.append( `<span class='I_delete'><i class="fa fa-eye fa-2x"></i></span>` );
    element.append( `<span class='I_edit'><i class="fa fa-plus fa-2x"></i></span>` );
    element.find(".I_delete").click(function() {
      window.location.href="event.html";
    // $('#calendar-popup').hide();
    // if(confirm('Voulez vous vraiment supprimer l\'événement?')) {
    //  $('#calendar').fullCalendar('removeEvents',event._id);
    // var index=events.map(function(x){ return x.id; }).indexOf(event.id);
    // events.splice(index,1);
    // localStorage.setItem('events', JSON.stringify(events));
    //
    // events=parselocalstorage('events')
    //
    //   }
    });
element.find(".I_edit").click(function() {
    $('#calendar-popup').hide();

  $('#eventname').val(event.title)
  $('#location').val(event.location)
  $('#eventdetails').val(event.details)
  $('input#eventstart').val(event.start._i)
   $('input#eventend').val(event.end._i)
  $('#simplemodal').show();


  //update events
  var that=event;
   $('#edit-form').on('submit', function(e) {
   e.preventDefault();
   $form = $(e.currentTarget);

 $title = $form.find('input#eventname');
 $location = $form.find('input#location');
 $details = $form.find('textarea#eventdetails');
     $start= $form.find('input#eventstart');
     $end= $form.find('input#eventend');
    //update value
     that.title=$title.val();
      that.location=$location.val();
     that.details=$details.val();
        that.start=$start.val();
       that.end=$end.val();

    $('#calendar').fullCalendar('updateEvent', that);
     console.log('after update',events)
      $('#simplemodal').hide();
      $('#calendar-popup').hide();
   });
   $('#calendar').fullCalendar('updateEvent', event);

 //
   // 		localStorage.setItem('events', JSON.stringify(events));
    });

$('#close-btnid').click(function(){
          $('#simplemodal').hide();
})

var modal=document.getElementById('simplemodal')

window.addEventListener('click',clickOutside)
function clickOutside(e){
if(e.target==modal){
modal.style.display='none';

}
}
}
,
select: function(start, end, jsEvent) {
$('.btn-primary').css('opacity',1)
  $('.btn-primary').click(function(){
renderPopup(jsEvent, start.local(), end.local());
})
renderPopup(jsEvent, start.local(), end.local());

}
});

$('#event-form').on('submit', function(e) {
e.preventDefault();

$form = $(e.currentTarget);

$title = $form.find('input#event-title');
$location = $form.find('input#event-location');
$details = $form.find('textarea#event-details');
$ID = '_' + Math.random().toString(36).substr(2, 9)
events.push({
id:$ID,
title: $title.val(),
start: $form.find('input#event-start').val(),
end: $form.find('input#event-end').val(),
location: $location.val(),
details: $details.val()
});

$title.val('');
$location.val('');
$details.val('');

$form.parent().blur().hide();
localStorage.setItem('events', JSON.stringify(events));
$('#calendar').fullCalendar('refetchEvents');

});



// //Set hide action for ESC key event
// $('#calendar-popup').on('keydown', function(e) {
//     $this = $(this);
//     console.log($this);
//     if($this.is(':visible') && e.which === 27) {
//     $this.blur();
//     }
// })
// //Set hide action for lost focus event
//   .on('focusout', function(e) {
//     $this = $(this);
//     if($this.is(':visible') && !$(e.relatedTarget).is('#calendar-popup, #calendar-popup *')) {
//     $this.hide();
//   }
// });
});

/*** TESTING/DEMO ***/
var date = new Date();
var aujourd = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();
aujourd = aujourd < 10 ? '0' + aujourd.toString() : aujourd;
var tomorrow = aujourd + 1 < 10 ? '0' + (aujourd + 1).toString() : aujourd + 1; //aujourd not last day
var yesterday = aujourd - 1 < 10 ? '0' + (aujourd - 1).toString() : aujourd - 1; //aujourd not first day
localStorage.clear()

var str=	localStorage.getItem('events');
var obj=JSON.parse(str)||[]
let arr = Object.keys(obj).map((k) => obj[k])
console.log('what is in aarrr1',events)
if(events.length===0){
events.push(
{id:1,title: 'GDG : Android study Jams', start: year + '-' + month + '-' + aujourd + '07:00', end: year + '-' + month + '-' + aujourd + 'T10:00', location: 'Faculté de médecine', details: 'Atelier Désign et séance de Lecture'},
{id:2,title: 'GDG : Android study Jams', start: year + '-' + month + '-' + tomorrow + '03:00', end: year + '-' + month + '-' + tomorrow + 'T08:00', location: 'Faculté de médecine', details: 'Atelier Désign et séance de Lecture'},
{id:3,title: 'GDG : Android study Jams', start: year + '-' + month + '-' + yesterday + '20:00', end: year + '-' + month + '-' + aujourd + 'T05:00', location: 'Faculté de médecine', details: 'Atelier Désign et séance de Lecture'}
);
}
/*events.push(
{title: 'event1', start: year + '-' + month + '-' + aujourd + 'T07:00', end: year + '-' + month + '-' + aujourd + 'T10:00', location: 'The Moon', details: 'There will be cheese'},
{title: 'event2', start: year + '-' + month + '-' + tomorrow + 'T03:00', end: year + '-' + month + '-' + tomorrow + 'T08:00', location: 'The Moon', details: 'There will be cheese'},
{title: 'event3', start: year + '-' + month + '-' + yesterday + 'T20:00', end: year + '-' + month + '-' + aujourd + 'T05:00', location: 'The Moon', details: 'There will be cheese'}
);*/

localStorage.setItem('events', JSON.stringify(events));

/***************/





//handle search

var alreadyFilled = false;
function initDialog() {
clearDialog();
for (var i = 0; i < events.length; i++) {
var mS1 = {"01":'Jan', "02":'Feb', "03":'Mar', "04":'Apr', "05":'May', "06":'June', "07":'July', "08":'Aug', "09":'Sept', "10":'Oct', "11":'Nov', "12":'Dec'};

    $('.dialog').append('<div><span class="s_title">' + events[i].title +`</span><br><span class='s_des'>"` +events[i].details+

                         `</span> <span class='duration'>`+events[i].start+`</span>`

                        + `</div>
<ul class="vertical-date">
    <li class="list-daynumber">`+events[i].start.slice(8,10)+`</li>
    <li class="list-monthname">`+mS1[events[i].start.slice(5,7)]+`</li>
  </ul>

`);

}
}
function clearDialog() {
$('.dialog').empty();
}
$('.autocomplete input').click(function() {
if (!alreadyFilled) {
    $('.dialog').addClass('open');
}

});
$('body').on('click', '.dialog > div', function() {
$('.autocomplete input').val($(this).find('.s_title').text()).focus();
$('.autocomplete .close').addClass('visible');
alreadyFilled = true;
});
$('.autocomplete .close').click(function() {
alreadyFilled = false;
$('.dialog').addClass('open');
$('.autocomplete input').val('').focus();
$(this).removeClass('visible');
});

function match(str) {
str = str.toLowerCase();
clearDialog();
for (var i = 0; i < events.length; i++) {
    if ((events[i].title).toLowerCase().startsWith(str)) {

var mS2 = {"01":'Jan', "02":'Feb', "03":'Mar', "04":'Apr', "05":'May', "06":'June', "07":'July', "08":'Aug', "09":'Sept', "10":'Oct', "11":'Nov', "12":'Dec'};

        $('.dialog').append('<div><span class="s_title">' + events[i].title+`</span><br><span class='s_des'>` +events[i].details
                            +
                         ` </span><span class='duration'>`+events[i].start+`</span>`
                            +
                            `</div>
<ul class="vertical-date">
    <li class="list-daynumber">`+events[i].start.slice(8,10)+`</li>
    <li class="list-monthname">`+mS2[events[i].start.slice(5,7)]+`</li>
  </ul>
`);

    }
}
}
$('.autocomplete input').on('input', function() {
$('.dialog').addClass('open');
alreadyFilled = false;
match($(this).val());
});
$('body').click(function(e) {
if (!$(e.target).is("input, .close")) {
    $('.dialog').removeClass('open');
}
});
initDialog();


function parselocalstorage(name){
var str= localStorage.getItem(name);
var obj=JSON.parse(str)||[]
let arr = Object.keys(obj).map((k) => obj[k])||[]
return arr
}
