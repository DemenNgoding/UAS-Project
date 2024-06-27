<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Calendar</title>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container">
        <div class="text-right mb-3">
            <a href="/home" class="btn btn-primary">Home</a>
        </div>
        <h1>Event Calendar</h1>
        @auth
            <button id="addEventButton" class="btn btn-primary">Add Event</button>
        @endauth
        <div id="calendar"></div>
    </div>

    @auth
    <!-- Modal untuk menambahkan event -->
    <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEventModalLabel">Add Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="eventForm">
                        <div class="form-group">
                            <label for="eventName">Event Name:</label>
                            <input type="text" class="form-control" id="eventName" name="event_name" required>
                        </div>
                        <div class="form-group">
                            <label for="eventContent">Event Content (Link):</label>
                            <input type="text" class="form-control" id="eventContent" name="content" required>
                        </div>
                        <div class="form-group">
                            <label for="eventLocation">Event Location:</label>
                            <select id="eventLocation" class="form-control" name="location" size="5">
                                <option value="banda-aceh">Banda Aceh</option>
                                <option value="medan">Medan</option>
                                <option value="binjai">Binjai</option>
                                <option value="pekanbaru">Pekanbaru</option>
                                <option value="dumai">Dumai</option>
                                <option value="jambi">Jambi</option>
                                <option value="palembang">Palembang</option>
                                <option value="batam">Batam</option>
                                <option value="tanjungpinang">Tanjung Pinang</option>
                                <option value="pangkalpinang">Pangkal Pinang</option>
                                <option value="tanjungpandan">Tanjung Pandan</option>
                                <option value="bengkulu">Bengkulu</option>
                                <option value="bandar-lampung">Bandar Lampung</option>
                                <option value="serang">Serang</option>
                                <option value="tangerang">Tangerang</option>
                                <option value="tangerang-sel">Tangerang Selatan</option>
                                <option value="jakarta">Jakarta</option>
                                <option value="bekasi">Bekasi</option>
                                <option value="depok">Depok</option>
                                <option value="cirebon">Cirebon</option>
                                <option value="indramayu">Indramayu</option>
                                <option value="bandung">Bandung</option>
                                <option value="pekalongan">Pekalongan</option>
                                <option value="semarang">Semarang</option>
                                <option value="demak">Demak</option>
                                <option value="solo">Solo</option>
                                <option value="yogyakarta">Yogyakarta</option>
                                <option value="sidoarjo">Sidoarjo</option>
                                <option value="malang">Malang</option>
                                <option value="surabaya">Surabaya</option>
                                <option value="denpasar">Denpasar</option>
                                <option value="pontianak">Pontianak</option>
                                <option value="palangkaraya">Palangkaraya</option>
                                <option value="banjarmasin">Banjarmasin</option>
                                <option value="banjarbaru">Banjarbaru</option>
                                <option value="samarinda">Samarinda</option>
                                <option value="balikpapan">Balikpapan</option>
                                <option value="tarakan">Tarakan</option>
                                <option value="tanjung-selor">Tanjung Selor</option>
                                <option value="makassar">Makassar</option>
                                <option value="palu">Palu</option>
                                <option value="poso">Poso</option>
                                <option value="majene">Majene</option>
                                <option value="kendari">Kendari</option>
                                <option value="gorontalo">Gorontalo</option>
                                <option value="manado">Manado</option>
                                <option value="ambon">Ambon</option>
                                <option value="ternate">Ternate</option>
                                <option value="manokwari">Manokwari</option>
                                <option value="jayapura">Jayapura</option>
                                <option value="timika">Timika</option>
                                <option value="sorong">Sorong</option>
                                <option value="nabire">Nabire</option>
                                <option value="wamena">Wamena</option>
                                <option value="merauke">Merauke</option>
                                <option value="kupang">Kupang</option>
                                <option value="mataram">Mataram</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="eventCaption">Event Caption:</label>
                            <textarea class="form-control" id="eventCaption" name="caption" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="eventDate">Event Date:</label>
                            <input type="date" class="form-control" id="eventDate" name="date" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk melihat detail event -->
    <div class="modal fade" id="viewEventModal" tabindex="-1" role="dialog" aria-labelledby="viewEventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewEventModalLabel">Event Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 id="eventTitle"></h5>
                    <p><strong>Date:</strong> <span id="eventDateDetail"></span></p>
                    <p><strong>Location:</strong> <span id="eventLocationDetail"></span></p>
                    <p><strong>Content:</strong> <span id="eventContentDetail"></span></p>
                    <p><strong>Caption:</strong> <span id="eventCaptionDetail"></span></p>
                </div>
            </div>
        </div>
    </div>
    @endauth

    <script>
        $(document).ready(function () {
            // CSRF token setup for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '/events/fetch',
                eventClick: function(info) {
                    var eventId = info.event.id;

                    // Request data event dari server
                    $.ajax({
                        url: '/events/' + eventId,
                        type: 'GET',
                        success: function (event) {
                            console.log('Event data:', event);

                            // Mengisi informasi event pada modal
                            $('#eventTitle').text(event.event_name);
                            $('#eventDateDetail').text(event.date);
                            $('#eventLocationDetail').text(event.location);
                            
                            // Mengolah content untuk menampilkan link tanpa localhost
                            var contentLink = event.content;
                            if (!contentLink.startsWith('http://') && !contentLink.startsWith('https://')) {
                                contentLink = 'https://' + contentLink;
                            }
                            $('#eventContentDetail').html(`<a href="${contentLink}" target="_blank">${contentLink}</a>`);
                            
                            $('#eventCaptionDetail').text(event.caption);

                            // Menampilkan modal
                            $('#viewEventModal').modal('show');
                        },
                        error: function () {
                            alert('Failed to fetch event details');
                        }
                    });
                }
            });

            calendar.render();

            $('#addEventButton').on('click', function() {
                $('#addEventModal').modal('show');
            });

            // Submit form event
            $('#eventForm').submit(function (e) {
                e.preventDefault();
                
                var eventData = {
                    event_name: $('#eventName').val(),
                    content: $('#eventContent').val(),
                    location: $('#eventLocation').val(),
                    caption: $('#eventCaption').val(),
                    date: $('#eventDate').val()
                };

                // Kirim data event ke server
                $.ajax({
                    url: '/events/store',
                    type: 'POST',
                    data: eventData,
                    success: function (response) {
                        // Tambahkan event baru ke kalender setelah berhasil disimpan
                        calendar.addEvent({
                            id: response.event.id,
                            title: response.event.event_name,
                            start: response.event.date,
                            extendedProps: {
                                location: response.event.location,
                                caption: response.event.caption,
                                content: response.event.content
                            }
                        });
                        $('#addEventModal').modal('hide'); // Sembunyikan modal setelah berhasil disimpan
                        alert('Event Created');
                    },
                    error: function () {
                        alert('Failed to create event');
                    }
                });
            });
        });
    </script>
</body>
</html>
