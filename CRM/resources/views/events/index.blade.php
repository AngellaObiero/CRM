@extends('layouts.app')

@section('header')

<link href='assets/vendor/fullcalendar.css' rel='stylesheet' />
<link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />


<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script>
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script>
<script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script>
<script>

	$(document).ready(function() {
	    var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();

		/*  className colors

		className: default(transparent), important(red), chill(pink), success(green), info(blue)

		*/


		/* initialize the external events
		-----------------------------------------------------------------*/

		$('#external-events div.external-event').each(function() {

			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};

			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

		});

			var start = moment(date), // currently
	    end   = moment(), //
	    day   = 2;                    // Tuesday

			var result = [];
			var current = start.clone();

			while (current.day(7 + day).isBefore(end)) {
			  result.push(current.clone());
			}

		/* initialize the calendar
		-----------------------------------------------------------------*/

		var calendar =  $('#calendar').fullCalendar({
			header: {
				left: 'title',
				center: 'agendaDay,agendaWeek,month',
				right: 'prev,next today'
			},
			editable: true,
			firstDay: 0, //  1(Monday) this can be changed to 0(Sunday) for the USA system
			selectable: true,
			defaultView: 'month',

			axisFormat: 'h:mm',
			columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
            },
			allDaySlot: false,
			selectHelper: true,
			select: function(start, end, allDay) {
        $("#modal-form").modal();
        var today=start._d;

        $("#event_date").val(today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2));
        // console.log(start._d.getDate());
				// var title = prompt('Event Title:');
				// if (title) {
				// 	calendar.fullCalendar('renderEvent',
				// 		{
				// 			title: title,
				// 			start: start,
				// 			end: end,
				// 			allDay: allDay
				// 		},
				// 		true // make the event "stick"
				// 	);
				// }
				calendar.fullCalendar('unselect');
			},
			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped

				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');

				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);

				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;

				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}

			},

			events: [
				@foreach($events as $event)
				{
					title: "{{$event->name}}",
					start: "{{$event->event_date}}"
				},
				@endforeach

			],
		});


	});

</script>
<style>

	#wrap {
		width: 1100px;
		margin: 0 auto;
		height: auto;
		}

	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		text-align: left;
		}

	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
		}

	.external-event { /* try to mimick the look of a real event */
		margin: 10px 0;
		padding: 2px 4px;
		background: #3366CC;
		color: #fff;
		font-size: .85em;
		cursor: pointer;
		}

	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
		}

	#external-events p input {
		margin: 0;
		vertical-align: middle;
		}

	#calendar {
/* 		float: right; */
        margin: 0 auto;
		width: 900px;
		background-color: #FFFFFF;
		  border-radius: 6px;
        box-shadow: 0 1px 2px #C3C3C3;
				overflow-y: scroll;
		}

</style>
@endsection

@section('content')
<div class="" style="margin-top: 40px; margin-bottom: 40px;">
	<a href="#" data-toggle="modal" data-target="#modal-form"><button type="button" class="btn btn-sucess" name="button" data-toogle="trainingModal" data-target="#trainingModal">Add Training</button></a>
</div>


<div id='wrap'>

  <div id='calendar'></div>

  <div style='clear:both'></div>
</div>

<!-- Add Date -->
<div class="row" id="edit_modal">
<div class="col-md-4">
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
<div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
<div class="modal-content">

    <div class="modal-body p-0">

<div class="card bg-secondary shadow border-0">
    <div class="card-body px-lg-5 py-lg-5">
        <div class="text-center text-muted mb-4">
            <h3>Add Event</h3>
        </div>
        <form role="form" action="{{url('events/store')}}" method="post">
					{{csrf_field()}}
          <!-- <input type="hidden" name="event_date" value=""> -->
            <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Title" name="name" id="modal_name" type="text">
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <textarea class="form-control" placeholder="Details" name="details" id="modal_name" type="text"></textarea>
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input type="date" class="form-control" name="event_date" id="event_date" placeholder="End" type="datetime-local">
                </div>
            </div>

            <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input type="time" class="form-control" name="time_from" id="modal_email" placeholder="Start" type="datetime-local">
                </div>
            </div>

            <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input type="time" class="form-control" name="time_to" id="modal_number" placeholder="End" type="datetime-local">
                </div>
            </div>


            <div class="text-center">
                <button type="Submit" class="btn btn-primary my-4">Submit</button>
            </div>
        </form>
    </div>
</div>



            </div>

        </div>
    </div>
</div>
  </div>
</div>
@endsection
