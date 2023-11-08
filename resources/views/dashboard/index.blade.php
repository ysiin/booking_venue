@extends('template.layouts')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12" style="color: white">
            <div id="calendar"></div>
        </div>
    </div>
</div>
    
@endsection

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.9/index.global.min.js'></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      timeZone: 'local',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      weekNumbers: true,
      dayMaxEvents: true, // allow "more" link when too many events
      themeSystem: 'bootstrap5',
      events: 'datacalendar',
      eventColor: '#117ef2'
    });
    calendar.render();
  });

</script>
