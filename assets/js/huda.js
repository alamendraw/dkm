$(document).ready(function(){
    $('.dropify').dropify({
        messages: {
            default: 'Drag and drop to select image',
            replace: 'Replace',
            remove:  'Remove',
            error:   'error'
        }
    });
});
function get_huda_chart(xval,valid){ 

    var $success = '#28C76F';
    var $strok_color = '#b9c3cd';
    var goalChartoptions = {
        chart: {
        height: 250,
        type: 'radialBar',
        sparkline: {
            enabled: true,
        },
        dropShadow: {
            enabled: true,
            blur: 3,
            left: 1,
            top: 1,
            opacity: 0.1
        },
        },
        colors: [$success],
        plotOptions: {
        radialBar: {
            size: 110,
            startAngle: -150,
            endAngle: 150,
            hollow: {
            size: '77%',
            },
            track: {
            background: $strok_color,
            strokeWidth: '50%',
            },
            dataLabels: {
            name: {
                show: false
            },
            value: {
                offsetY: 18,
                color: '#99a2ac',
                fontSize: '4rem'
            }
            }
        }
        },
        fill: {
        type: 'gradient',
        gradient: {
            shade: 'dark',
            type: 'horizontal',
            shadeIntensity: 0.5,
            gradientToColors: ['#00b5b5'],
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100]
        },
        },
        series: [xval],
        stroke: {
        lineCap: 'round'
        },

    }

    var goalChart = new ApexCharts(
        document.querySelector("#"+valid),
        goalChartoptions
    );
 
    goalChart.render();

}
 
function huda_delete(urlId){ 
    Swal.fire({
    title: 'Peringatan?',
    text: "Data akan di hapus?",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Iya, Hapus',
    cancelButtonText: 'Batal',
    confirmButtonClass: 'btn btn-primary',
    cancelButtonClass: 'btn btn-danger ml-1',
    buttonsStyling: false,
    }).then(function (result) {
    if (result.value) {
        $.ajax({
            type:'post',
            url:urlId,
            dataType:'json',
            success: function(data){
                Swal.fire({
                    type: data.status,
                    title: data.title,
                    text: data.message,  
                });
                location.reload();
            }
        });
        
    }
    });
}


function month_romawi(oo){
    switch (oo) {
        case '01':
            return 'I';
        break; 
        case '02':
            return 'II';
        break;
        case '03':
            return 'III';
        break;
        case '04':
            return 'IV';
        break;
        case '05':
            return 'V';
        break;
        case '06':
            return 'VI';
        break;
        case '07':
            return 'VII';
        break;
        case '08':
            return 'VIII';
        break;
        case '09':
            return 'IX';
        break;
        case '10':
            return 'X';
        break;
        case '11':
            return 'XI';
        break;
    
        default:
            return 'XII';
        break;
    }
}
    