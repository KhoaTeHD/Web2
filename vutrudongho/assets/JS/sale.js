
//const myChart = new Chart(ctx, config);
var myChart;
renderChart("date","","");
function renderChart(option, dateFrom, dateTo){
    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            var dataJSON = JSON.parse(this.responseText);
            //console.log(dataJSON);
            date = dataJSON.map(function(elem){
                return elem.date;
            });

            revenue = dataJSON.map(function(elem){
                return elem.total;
            });

            //console.log(date);
            const ctx = document.getElementById('myChart');
            //document.removeChild(ctx);
            if(myChart){
                myChart.destroy();
            }

            const data = {
                labels: date,
                datasets: [
                    {
                        data: revenue,
                        label: 'Doanh thu',
                        borderColor: '#6750A4',
                    },
                ],
            };

            const config = {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                            align: 'end',
                        },
                        title: {
                            display: true,
                            align: 'start',
                            text: 'Biểu đồ doanh thu'
                        }
                    },
                    scales: {
                        y: {
                            ticks: {
                                callback: function (value, index, ticks) {
                                    //return value + " VNĐ";
                                    return Chart.Ticks.formatters.numeric.apply(this, [value, index, ticks]) + " VNĐ";
                                }
                            }
                        }
                    }
                },
            };
            myChart = new Chart(ctx, config);
        }
    }
    xml.open("GET","modules/query_revenue.php?option="+option,true);
    xml.send();
}

