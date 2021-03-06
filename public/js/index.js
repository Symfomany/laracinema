jQuery(document).ready(function() {

    var socket = io(window.location.hostname + ':3000');

    socket.on("messages-channel:App\\Events\\TchatEvent", function(message){

        var media=$('<div class="media" style="display: none"><div class="media-left"></div><div class="media-body"><span class="media-status"></span><h5 class="media-heading"><small></small></h5></div></div>');

        media.find('.media-body small').append(moment(message.data.time).fromNow());
        img = $('<img class="media-object" />').attr('src', message.data.photo);
        media.find('.media-left').append(img);
        media.find('.media-body small').prepend(message.data.user);
        media.find('.media-body').append(message.data.message);
        $('#container_tchat .scroller-content').prepend(media.fadeIn('slow'));
    });


    socket.on("tasks-channel:App\\Events\\TasksEvent", function(message){

        var media=$('#list_tasks .task-item:first').clone();

        media.find('.task-desc span').text(message.data.task);
        media.addClass(message.data.criticity);
        $('#list_tasks').prepend(media.fadeIn('slow'));
    });


    $('#form_tchat button').click(function(){

        var elt = $('#form_tchat input');
        if(elt.val().length > 2){
            $.post("admin/message",{message: elt.val(), _token: elt.data('token') }, function( data ) {
                $('#form_tchat input').val('');
            });
        }

    });



    $('#form_task button').click(function(){

        var elt = $('#form_task input');
        var criticity = $('#form_task select');

        if(elt.val().length > 2){
            $.post("admin/task",{message: elt.val(),criticity: criticity.val(), _token: elt.data('token') }, function( data ) {
                $('#form_task input').val('');
            });
        }

    });


    // This page contains more Initilization Javascript than normal.
    // As a result it has its own js page. See charts.js for more info
        demoHighCharts.init();

        $('.center-mode').slick({
            dots: true,
            centerMode: false,
            autoplay: true,
            centerPadding: '60px',
            slidesToShow: 7,
            responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
            }, {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }]
        });

        $('#map_canvas2').gmap({
            'disableDefaultUI': true,
            'callback': function() {
                var self = this;
                $("[data-gmapping]").each(function(i, el) {
                    var data = $(el).data('gmapping');
                    var title = $(el).data('title');
                    self.addMarker({
                        'id': data.id,
                        'tags': data.tags,
                        'position': new google.maps.LatLng(data.latlng.lat, data.latlng.lng),
                        'bounds': true
                    }, function(map, marker) {
                        $(el).click(function() {
                            $(marker).triggerEvent('click');
                        });
                    }).click(function() {
                        self.openInfoWindow({
                            'content': title
                        }, this);
                    });
                });
            }
        });



    var pie1 = $('#high-pie');

    if (pie1.length) {

        $.getJSON($('#high-pie').data('url'), function( datas ) {

            $('#high-pie').highcharts({
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    }
                },
                title: null,
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}'
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Répartition du nb de film par catégories',
                    data: datas
                }]
            });

        });

    }

    // Init Bootstrap Maxlength Plugin
    $('input[maxlength]').maxlength({
        threshold: 50,
        placement: "bottom"
    });

    var pie1 = $('#ecommerce_chart2');

    if (pie1.length) {

        //$.getJSON($('#high-pie').data('url'), function( datas ) {
        $.getJSON($('#ecommerce_chart2').data('url'), function( datas ) {

            $('#ecommerce_chart2').highcharts({
                chart: {
                    type: 'column',
                    margin: 75,
                    options3d: {
                        enabled: true,
                        alpha: 10,
                        beta: 0,
                        depth: 50
                    }
                },
                title: null,
                subtitle: null,
                plotOptions: {
                    column: {
                        depth: 25
                    }
                },
                xAxis: {
                    categories: Highcharts.getOptions().lang.shortMonths
                },
                yAxis: {
                    title: {
                        text: null
                    }
                },
                series: [{
                    name: null,
                    data: datas
                }]
            });
        });

        //});

    }



    // Init Widget Demo JS
    // demoHighCharts.init();

    // Because we are using Admin Panels we use the OnFinish
    // callback to activate the demoWidgets. It's smoother if
    // we let the panels be moved and organized before
    // filling them with content from various plugins

    // Init plugins used on this page
    // HighCharts, JvectorMap, Admin Panels

    // Init Admin Panels on widgets inside the ".admin-panels" container
    $('.admin-panels').adminpanel({
        grid: '.admin-grid',
        draggable: true,
        preserveGrid: true,
        // mobile: true,
        onStart: function() {
            // Do something before AdminPanels runs
        },
        onFinish: function() {
            $('.admin-panels').addClass('animated fadeIn').removeClass('fade-onload');

            // Init the rest of the plugins now that the panels
            // have had a chance to be moved and organized.
            // It's less taxing to organize empty panels
            demoHighCharts.init();
            runVectorMaps(); // function below
        },
        onSave: function() {
            $(window).trigger('resize');
        }
    });


    // Init plugins for ".calendar-widget"
    // plugins: FullCalendar
    //
    $('#calendar-widget').fullCalendar({
        // contentHeight: 397,
        editable: true,
        events: [{
            title: 'Sony Meeting',
            start: '2015-05-1',
            end: '2015-05-3',
            className: 'fc-event-success',
        }, {
            title: 'Conference',
            start: '2015-05-11',
            end: '2015-05-13',
            className: 'fc-event-warning'
        }, {
            title: 'Lunch Testing',
            start: '2015-05-21',
            end: '2015-05-23',
            className: 'fc-event-primary'
        },
        ],
        eventRender: function(event, element) {
            // create event tooltip using bootstrap tooltips
            $(element).attr("data-original-title", event.title);
            $(element).tooltip({
                container: 'body',
                delay: {
                    "show": 100,
                    "hide": 200
                }
            });
            // create a tooltip auto close timer
            $(element).on('show.bs.tooltip', function() {
                var autoClose = setTimeout(function() {
                    $('.tooltip').fadeOut();
                }, 3500);
            });
        }
    });


    // Init plugins for ".task-widget"
    // plugins: Custom Functions + jQuery Sortable
    //
    var taskWidget = $('div.task-widget');
    var taskItems = taskWidget.find('li.task-item');
    var currentItems = taskWidget.find('ul.task-current');
    var completedItems = taskWidget.find('ul.task-completed');

    // Init jQuery Sortable on Task Widget
    taskWidget.sortable({
        items: taskItems, // only init sortable on list items (not labels)
        handle: '.task-menu',
        axis: 'y',
        connectWith: ".task-list",
        update: function( event, ui ) {
            var Item = ui.item;
            var ParentList = Item.parent();

            // If item is already checked move it to "current items list"
            if (ParentList.hasClass('task-current')) {
                Item.removeClass('item-checked').find('input[type="checkbox"]').prop('checked', false);
            }
            if (ParentList.hasClass('task-completed')) {
                Item.addClass('item-checked').find('input[type="checkbox"]').prop('checked', true);
            }

        }
    });

    // Custom Functions to handle/assign list filter behavior
    taskItems.on('click', function(e) {
        e.preventDefault();
        var This = $(this);
        var Target = $(e.target);

        if (Target.is('.task-menu') && Target.parents('.task-completed').length) {
            This.remove();
            return;
        }

        if (Target.parents('.task-handle').length) {
            // If item is already checked move it to "current items list"
            if (This.hasClass('item-checked')) {
                This.removeClass('item-checked').find('input[type="checkbox"]').prop('checked', false);
            }
            // Otherwise move it to the "completed items list"
            else {
                This.addClass('item-checked').find('input[type="checkbox"]').prop('checked', true);
            }
        }

    });


    var highColors = [bgSystem, bgSuccess, bgWarning, bgPrimary];

    // Chart data
    var seriesData = [{
        name: 'Phones',
        data: [5.0, 9, 17, 22, 19, 11.5, 5.2, 9.5, 11.3, 15.3, 19.9, 24.6]
    }, {
        name: 'Notebooks',
        data: [2.9, 3.2, 4.7, 5.5, 8.9, 12.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
    }, {
        name: 'Desktops',
        data: [15, 19, 22.7, 29.3, 22.0, 17.0, 23.8, 19.1, 22.1, 14.1, 11.6, 7.5]
    }, {
        name: 'Music Players',
        data: [11, 6, 5, 15, 17.0, 22.0, 30.8, 24.1, 14.1, 11.1, 9.6, 6.5]
    }];

    var ecomChart = $('#ecommerce_chart1');
    if (ecomChart.length) {
        ecomChart.highcharts({
            credits: false,
            colors: highColors,
            chart: {
                backgroundColor: 'transparent',
                className: '',
                type: 'line',
                zoomType: 'x',
                panning: true,
                panKey: 'shift',
                marginTop: 45,
                marginRight: 1,
            },
            title: {
                text: null
            },
            xAxis: {
                gridLineColor: '#EEE',
                lineColor: '#EEE',
                tickColor: '#EEE',
                categories: ['Jan', 'Feb', 'Mar', 'Apr',
                    'May', 'Jun', 'Jul', 'Aug',
                    'Sep', 'Oct', 'Nov', 'Dec'
                ]
            },
            yAxis: {
                min: 0,
                tickInterval: 5,
                gridLineColor: '#EEE',
                title: {
                    text: null,
                }
            },
            plotOptions: {
                spline: {
                    lineWidth: 3,
                },
                area: {
                    fillOpacity: 0.2
                }
            },
            legend: {
                enabled: true,
                floating: false,
                align: 'right',
                verticalAlign: 'top',
                x: -15
            },
            series: seriesData
        });
    }

    // Widget VectorMap
    function runVectorMaps() {

        // Jvector Map Plugin
        var runJvectorMap = function() {
            // Data set
            var mapData = [900, 700, 350, 500];
            // Init Jvector Map
            $('#WidgetMap').vectorMap({
                map: 'us_lcc_en',
                //regionsSelectable: true,
                backgroundColor: 'transparent',
                series: {
                    markers: [{
                        attribute: 'r',
                        scale: [3, 7],
                        values: mapData
                    }]
                },
                regionStyle: {
                    initial: {
                        fill: '#E8E8E8'
                    },
                    hover: {
                        "fill-opacity": 0.3
                    }
                },
                markers: [{
                    latLng: [37.78, -122.41],
                    name: 'San Francisco,CA'
                }, {
                    latLng: [36.73, -103.98],
                    name: 'Texas,TX'
                }, {
                    latLng: [38.62, -90.19],
                    name: 'St. Louis,MO'
                }, {
                    latLng: [40.67, -73.94],
                    name: 'New York City,NY'
                }],
                markerStyle: {
                    initial: {
                        fill: '#a288d5',
                        stroke: '#b49ae0',
                        "fill-opacity": 1,
                        "stroke-width": 10,
                        "stroke-opacity": 0.3,
                        r: 3
                    },
                    hover: {
                        stroke: 'black',
                        "stroke-width": 2
                    },
                    selected: {
                        fill: 'blue'
                    },
                    selectedHover: {}
                },
            });
            // Manual code to alter the Vector map plugin to
            // allow for individual coloring of countries
            var states = ['US-CA', 'US-TX', 'US-MO',
                'US-NY'
            ];
            var colors = [bgInfo, bgPrimaryLr, bgSuccessLr, bgWarningLr];
            var colors2 = [bgInfo, bgPrimary, bgSuccess, bgWarning];
            $.each(states, function(i, e) {
                $("#WidgetMap path[data-code=" + e + "]").css({
                    fill: colors[i]
                });
            });
            $('#WidgetMap').find('.jvectormap-marker')
                .each(function(i, e) {
                    $(e).css({
                        fill: colors2[i],
                        stroke: colors2[i]
                    });
                });
        }

        if ($('#WidgetMap').length) {
            runJvectorMap();
        }
    }

});
//# sourceMappingURL=all.js.map
