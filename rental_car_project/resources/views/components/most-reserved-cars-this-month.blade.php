<script>
    const ctx1 = document.getElementById("myChart1");
    const x_labels = [] ;

    const y_values = [];
    const barColors = [];

    const request2 = new XMLHttpRequest();
    request2.open("GET", "/most_rented_cars");
    request2.send();

    request2.onload = function () {
        if(this.status === 200) {
            const numberOfReservations = JSON.parse(this.responseText).cars;
            for (const car in numberOfReservations) {
               x_labels.push(car);
               y_values.push(numberOfReservations[car]);
            }

            let i = 1;
            while(i <= x_labels.length) {
                barColors.push(('#' + Math.floor(Math.random() * 0xFFFFFF).toString(16)));
                i++;
            }


            new Chart(ctx1, {
                type: "bar",
                data: {
                    labels: x_labels,
                    datasets: [
                        {
                            label: "nombre de réservation pour chaque voiture",
                            data: y_values,
                            backgroundColor: barColors,
                            borderWidth: 1,
                        },
                    ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });
        }
    };

</script>
